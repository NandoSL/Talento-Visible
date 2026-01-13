<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\ExamSettings;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public function index($course_id) {
        $data['course_details'] = Course::where('id', $course_id)->first();
        $data['exams'] = Lesson::join('exam_settings', 'lessons.exam_id', 'exam_settings.id')
            //->join('questions', 'exam_settings.id', 'questions.quiz_id')
            ->join('questions', 'lessons.id', 'questions.quiz_id')
            ->where('lessons.course_id', $course_id)
            ->where('lesson_type', 'exam')
            ->select('lessons.id as lesson_id','lessons.title','lessons.pass_mark','lessons.retake','lessons.duration','exam_settings.id as exam_id','exam_settings.type as exam_type',DB::raw('COUNT(questions.id) as questions_count'))
            ->groupBy('lessons.id','lessons.title','lessons.pass_mark','lessons.retake','lessons.duration','exam_settings.id','exam_settings.type')
            ->get();

        if($data['exams']->isNotEmpty()) {
            foreach ($data['exams'] as $index => $exam) {
                $time = $exam->duration;
                [$hours, $minutes, $seconds] = array_map('intval', explode(':', $time));
                $totalMinutes = ($hours * 60) + $minutes;
                $data['exams'][$index]->duration = $totalMinutes;
            }
        }

        return view('admin.exam.index', $data);
    }

    public function create($course_id) {
        $data['course_details'] = Course::where('id', $course_id)->first();
        $published = $this->validateDuplicated($course_id, 'published');
        $data['examPublished'] = $published->isNotEmpty();

        return view('admin.exam.create', $data);
    }

    public function store($course_id, Request $request) {
        $rules = [
            'title_exam'       => 'required|max:100',
            'description_exam'       => 'required|max:255',
            'duration' => 'required|numeric|min:1',
            'minScore' => 'required|numeric|min:1|max:10',
            'attempts' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $questions = json_decode($request->questions, true);

        if (empty($questions)) {
            return back()->withErrors('Debes agregar al menos una pregunta');
        }

        $minutes = (int) $request->duration;
        $hours = floor($minutes / 60);
        $mins  = $minutes % 60;
        $durationFormatted = sprintf('%02d:%02d:00', $hours, $mins);

        $status = $request->action == 'publish' ? 'published' : 'draft';

        $examSettingsData = [
            'type' => $status,
            'hours' => $request->waitingTime,
            'show_results' => $request->showResults ?? 0,
            'course_completed' => $request->fullCourse ?? 0,
            'camera_screen_record' => $request->recording ?? 0,
            'microphone_required' => $request->recording ?? 0,
            'person_detection' => $request->personDetection ?? 0,
            'window_detection' => $request->windowDetection ?? 0,
            'keyboard_events' => $request->block ?? 0,
        ];

        $lessonUpdateData = [
            'title' => $request->title_exam,
            'description' => $request->description_exam,
            'duration' => $durationFormatted,
            'pass_mark' => $request->minScore,
            'retake' => $request->attempts,
        ];

        if($status == 'draft') {
            $examDraft = $this->validateDuplicated($course_id, 'draft');

            if($examDraft->isNotEmpty()) {
                $exam_id = $examDraft[0]->exam_id;
                $lesson = Lesson::where('exam_id', $examDraft[0]->exam_id)->first();
                // TODO: Se crea variable que guarda el id de la seccion para su uso al guardar las preguntas
                $lesson_id = $lesson->id;
                $lesson->update($lessonUpdateData);
                ExamSettings::where('id', $examDraft[0]->exam_id)->update($examSettingsData);
            } else {
                $examSettings = ExamSettings::create($examSettingsData);
                $exam_id = $examSettings->id;
                $lesson = Lesson::create(array_merge($lessonUpdateData, [
                    'user_id' => auth()->user()->id,
                    'course_id' => $course_id,
                    'section_id' => null,
                    'exam_id' => $examSettings->id,
                    'lesson_type' => 'exam',
                    'status' => 1,
                    'total_mark' => 10
                ]));
                // TODO: Se crea variable que guarda el id de la seccion para su uso al guardar las preguntas
                $lesson_id = $lesson->id;
            }
        } elseif($request->action == 'publish') {
            $examSettings = ExamSettings::create($examSettingsData);
            $exam_id = $examSettings->id;
            $lesson = Lesson::create(array_merge($lessonUpdateData, [
                'user_id' => auth()->user()->id,
                'course_id' => $course_id,
                'section_id' => null,
                'exam_id' => $examSettings->id,
                'lesson_type' => 'exam',
                'status' => 1,
                'total_mark' => 10
            ]));
            // TODO: Se crea variable que guarda el id de la seccion para su uso al guardar las preguntas
            $lesson_id = $lesson->id;
        }

        foreach ($questions as $index => $q) {
            $answer = null;
            $options = null;

            if ($q['type'] === 'mcq') {
                $optionsArray = [];

                if (!empty($q['options']) && is_array($q['options'])) {
                    foreach ($q['options'] as $opt) {
                        if (is_array($opt)) {
                            $optionsArray[] = $opt['text'] ?? '';
                        } else {
                            $optionsArray[] = $opt;
                        }
                    }
                }

                $options = !empty($optionsArray) ? json_encode($optionsArray, JSON_UNESCAPED_UNICODE) : null;
                if (!empty($q['correct']) && $q['correct'][0] !== null) {
                    $answer = json_encode($q['correct'], JSON_UNESCAPED_UNICODE);
                } else {
                    $answer = null;
                }
            }

             if ($q['type'] === 'true_false') {
                $options = null;
                $answer  = isset($q['correct'][0]) ? $q['correct'][0] : null;
            }

            if ($q['type'] === 'fill_blanks') { $answer = null; }

            Question::insert([
                // TODO: Se utiliza la variable lesson_id en vez de exam_id
                'quiz_id' => $lesson_id, //$exam_id,
                'title'   => $q['question'],
                'type'    => $q['type'],
                'answer'  => $answer,
                'options' => $options,
                'sort'    => $index + 1
            ]);
        }



        return redirect(route('admin.exam.index', $course_id))->with('success', get_phrase('Exam created successfully'));
    }

    public function view($course_id, $exam_id) {
        $data['course_details'] = Course::where('id', $course_id)->first();
        $data['exam'] = Lesson::join('exam_settings', 'lessons.exam_id', '=', 'exam_settings.id')->where('lessons.course_id', $course_id)->select('lessons.*','exam_settings.*')->first();
        $data['questions'] = Question::where('quiz_id', $data['exam']->exam_id)
            ->orderBy('sort')
            ->get()
            ->map(function ($q) {
                return [
                    'id'       => $q->id,
                    'type'     => $q->type,
                    'question' => $q->title,
                    'points'   => $q->points,
                    'options'  => $q->options ? json_decode($q->options, true) : [],
                    'correct'  => $q->type === 'mcq'
                        ? json_decode($q->answer, true)
                        : ($q->answer !== null ? [$q->answer] : []),
                ];
            });

        if ($data['exam']) {
            $data['exam']->id = $exam_id;
        }

        $time = $data['exam']->duration;
        [$hours, $minutes, $seconds] = array_map('intval', explode(':', $time));
        $totalMinutes = ($hours * 60) + $minutes;
        $data['exam']->duration = $totalMinutes;


        return view('admin.exam.view', $data);
    }

    public function securityGet($course_id, $exam_id, Request $request) {

        $examSettings = ExamSettings::where('id', $exam_id)->firstOrFail();

        return view('admin.exam.security', [
            'course_id' => $course_id,
            'exam_id'   => $exam_id,
            'security'  => $examSettings,
        ]);
    }


    public function securityUpdate($course_id, $exam_id, Request $request) {
        $examSettingsData = [
            'course_completed' => $request->fullCourse ?? 0,
            'camera_screen_record' => $request->recording ?? 0,
            'microphone_required' => $request->recording ?? 0,
            'person_detection' => $request->personDetection ?? 0,
            'window_detection' => $request->windowDetection ?? 0,
            'keyboard_events' => $request->block ?? 0,
        ];

        ExamSettings::where('id', $exam_id)->update($examSettingsData);

        return redirect(route('admin.exam.index', $course_id))->with('success', get_phrase('Exam security updated successfully'));
    }

    public function questionsGet($course_id, $exam_id) {

        $questions = Question::where('quiz_id', $exam_id)
            ->orderBy('sort')
            ->get()
            ->map(function ($q) {
                return [
                    'id'       => $q->id,
                    'type'     => $q->type,
                    'question' => $q->title,
                    'options'  => $q->options ? json_decode($q->options, true) : [],
                    'correct'  => $q->type === 'mcq'
                        ? json_decode($q->answer, true)
                        : ($q->answer !== null ? [$q->answer] : []),
                ];
            });

        return view('admin.exam.questions', [
            'course_id' => $course_id,
            'exam_id'   => $exam_id,
            'questions'  => $questions,
        ]);
    }


    public function questionsUpdate($course_id, $exam_id, Request $request) {
        $examSettingsData = [
            'course_completed' => $request->fullCourse ?? 0,
            'camera_screen_record' => $request->recording ?? 0,
            'microphone_required' => $request->recording ?? 0,
            'person_detection' => $request->personDetection ?? 0,
            'window_detection' => $request->windowDetection ?? 0,
            'keyboard_events' => $request->block ?? 0,
        ];

        ExamSettings::where('id', $exam_id)->update($examSettingsData);

        return redirect(route('admin.exam.index', $course_id))->with('success', get_phrase('Exam security updated successfully'));
    }

    public function edit($course_id, $exam_id) {
        $data['course_details'] = Course::where('id', $course_id)->first();
        $data['exam'] = Lesson::join('exam_settings', 'lessons.exam_id', '=', 'exam_settings.id')
            ->where('lessons.course_id', $course_id)
            ->select('lessons.id as lesson_id', 'lessons.title','lessons.exam_id','lessons.duration','lessons.description','lessons.total_mark','lessons.pass_mark','lessons.retake',
                    'exam_settings.course_completed','exam_settings.camera_screen_record','exam_settings.microphone_required','exam_settings.person_detection','exam_settings.window_detection','exam_settings.keyboard_events')
            ->first();

        $published = $this->validateDuplicated($course_id, 'published');
        $data['examPublished'] = $published->isNotEmpty();
        // TODO: Ls preguntas se  obtienen por medio del id de la seccion
        //$data['questions'] = Question::where('quiz_id', $data['exam']->exam_id)
        $data['questions'] = Question::where('quiz_id', $data['exam']->lesson_id)
            ->orderBy('sort')
            ->get()
            ->map(function ($q) {
                return [
                    'id'       => $q->id,
                    'type'     => $q->type,
                    'question' => $q->title,
                    'points'   => $q->points,
                    'options'  => $q->options ? json_decode($q->options, true) : [],
                    'correct'  => $q->type === 'mcq'
                        ? json_decode($q->answer, true)
                        : ($q->answer !== null ? [$q->answer] : []),
                ];
            });

        if ($data['exam']) {
            $data['exam']->exam_id = $exam_id;
        }

        $time = $data['exam']->duration;
        [$hours, $minutes, $seconds] = array_map('intval', explode(':', $time));
        $totalMinutes = ($hours * 60) + $minutes;
        $data['exam']->duration = $totalMinutes;

        return view('admin.exam.edit', $data);
    }

    public function update($course_id, $exam_id, Request $request) {
        $rules = [
            'title_exam'       => 'required|max:100',
            'description_exam' => 'required|max:255',
            'duration'         => 'required|numeric|min:1',
            'minScore'         => 'required|numeric|min:1',
            'attempts'         => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $questions = json_decode($request->questions, true);

        if (in_array($request->action, ['save_draft', 'publish'])) {
            if (empty($questions) || count($questions) < 1) {
                return redirect()->back()
                    ->withErrors(['questions' => 'El examen debe tener al menos una pregunta'])
                    ->withInput();
            }
        }

        if (empty($questions) || count($questions) < 1) {
            return redirect()->back()
                ->withErrors(['questions' => 'El examen debe tener al menos una pregunta'])
                ->withInput();
        }

        $minutes = (int) $request->duration;
        $hours = floor($minutes / 60);
        $mins  = $minutes % 60;
        $durationFormatted = sprintf('%02d:%02d:00', $hours, $mins);

        $status = $request->action == 'publish' ? 'published' : 'draft';

        $examSettingsData = [
            'type' => $status,
            'hours' => $request->waitingTime,
            'show_results' => $request->showResults ?? 0,
            'course_completed' => $request->fullCourse ?? 0,
            'camera_screen_record' => $request->recording ?? 0,
            'microphone_required' => $request->recording ?? 0,
            'person_detection' => $request->personDetection ?? 0,
            'window_detection' => $request->windowDetection ?? 0,
            'keyboard_events' => $request->block ?? 0,
        ];

        $lessonUpdateData = [
            'title' => $request->title_exam,
            'description' => $request->description_exam,
            'duration' => $durationFormatted,
            'total_mark' => 0,
            'pass_mark' => $request->minScore,
            'retake' => $request->attempts,
        ];


        if ($status == 'draft') {
            $examDraft = $this->validateDuplicated($course_id, 'draft');

            if ($examDraft->isNotEmpty()) {
                $targetExamId = $examDraft[0]->exam_id;

                Lesson::where('exam_id', $targetExamId)->update($lessonUpdateData);
                // TODO: Se crea variable que guarda el id de la seccion para su uso al guardar las preguntas
                $lesson = Lesson::where('exam_id', $examDraft[0]->exam_id)->first();
                $lesson_id = $lesson->id;
                ExamSettings::where('id', $targetExamId)->update($examSettingsData);
            } else {
                $examSettings = ExamSettings::create($examSettingsData);
                $targetExamId = $examSettings->id;

                $lesson = Lesson::create(array_merge($lessonUpdateData, [
                    'user_id' => auth()->id(),
                    'course_id' => $course_id,
                    'exam_id' => $targetExamId,
                    'lesson_type' => 'exam',
                    'status' => 1,
                ]));
                // TODO: Se crea variable que guarda el id de la seccion para su uso al guardar las preguntas
                $lesson = Lesson::where('exam_id', $examDraft[0]->exam_id)->first();
                $lesson_id = $lesson->id;
            }
        } elseif ($request->action == 'publish') {
            $examPublish = $this->validateDuplicated($course_id, 'published');

            if ($examPublish->isNotEmpty()) {
                return view('admin.exam.duplicated');
            }

            $examSettings = ExamSettings::create($examSettingsData);
            $targetExamId = $examSettings->id;
            $lesson = Lesson::create(array_merge($lessonUpdateData, [
                'user_id' => auth()->id(),
                'course_id' => $course_id,
                'exam_id' => $targetExamId,
                'lesson_type' => 'exam',
                'status' => 1,
            ]));
            // TODO: Se crea variable que guarda el id de la seccion para su uso al guardar las preguntas
            $lesson_id = $lesson->id;
        }

        $incomingIds = collect($questions)
            ->pluck('id')
            ->filter()
            ->toArray();

        Question::where('quiz_id', $exam_id)
            ->whereNotIn('id', $incomingIds)
            ->delete();

        foreach ($questions as $index => $q) {
            $answer = null;
            $options = null;

            if ($q['type'] === 'mcq') {
                $optionsArray = [];
                foreach ($q['options'] ?? [] as $opt) {
                    $optionsArray[] = is_array($opt) ? ($opt['text'] ?? '') : $opt;
                }

                $options = json_encode($optionsArray, JSON_UNESCAPED_UNICODE);
                $answer  = !empty($q['correct']) ? json_encode($q['correct'], JSON_UNESCAPED_UNICODE) : null;
            }

            if ($q['type'] === 'true_false') {
                $answer = $q['correct'][0] ?? null;
            }

            $questionData = [
                // TODO: Se utiliza la variable lesson_id en vez de exam_id
                'quiz_id' => $lesson_id, //$targetExamId,
                'title'   => $q['question'],
                'type'    => $q['type'],
                'answer'  => $answer,
                'options' => $options,
                'sort'    => $index + 1,
            ];

            if (!empty($q['id']) && $status === 'draft') {
                Question::where('id', $q['id'])->update($questionData);
            } else {
                Question::create($questionData);
            }
        }

        return redirect(route('admin.exam.index', $course_id))->with('success', get_phrase('Exam updated successfully'));
    }

    public function delete($course_id, $exam_id, $lesson_id)
    {
        //TODO: las pegruntas se eliminan por medio del id de la leccion
        Lesson::where('exam_id', $exam_id)->delete();
        Question::where('quiz_id', $lesson_id)->delete();
        ExamSettings::where('id', $exam_id)->delete();

        return redirect(route('admin.exam.index', $course_id))->with('success', get_phrase('Exam deleted successfully'));
    }

    public function validateDuplicated($course_id, $type)
    {
        return Lesson::join('exam_settings', 'lessons.exam_id', '=', 'exam_settings.id')
            ->where('lessons.course_id', $course_id)
            ->where('exam_settings.type', $type)
            ->select('lessons.id','lessons.exam_id')
            ->get();
    }
}
