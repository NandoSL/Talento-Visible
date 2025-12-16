@php
    $sections = App\Models\Section::where('course_id', $course_details->id)->orderBy('sort')->get();

    $completed_lesson =
        json_decode(
            App\Models\Watch_history::where('course_id', $course_details->id)
                ->where('student_id', Auth()->user()->id)
                ->value('completed_lesson'),
            true,
        ) ?? [];
    $active_section = App\Models\Lesson::where('id', $history->watching_lesson_id ?? '')->value('section_id');

    $lesson_history = App\Models\Watch_history::where('course_id', $course_details->id)
        ->where('student_id', auth()->user()->id)
        ->firstOrNew();
    $completed_lesson_arr = json_decode($lesson_history->completed_lesson, true);
    $complated_lesson = is_array($completed_lesson_arr) ? count($completed_lesson_arr) : 0;
    $course_progress_out_of_100 = progress_bar($course_details->id);

    $lessExam = DB::table('lessons')
        ->where('id', request()->route()->parameter('id'))
        ->first();
@endphp

@if ($lessExam->lesson_type == 'exam')
    <div class="course-content-playlist mt-10">
        <div class="course-playlist-accordion p-3 header-details-exam">
            <div class="examen-details">
                <div class="examen-details-head" style="height: 10rem">
                </div>
            </div>
        </div>
    </div>
    <br>
@endif

<div class="course-content-playlist">
    <div class="header-details">
        <div class="" style="display: flex; flex-direction: column">
            <h1 class="heading mb-2">{{ get_phrase('Course curriculum') }}</h1>
            <br>
            <div style="display: flex; align-content: center; justify-content: space-around">
                <div class="mt-3">
                    <h2>
                        {{ $course_progress_out_of_100 }}%
                    </h2>
                    <p class="info text-center">
                        <span style="font-size: small;">{{ get_phrase('Completed') }}</span>
                    </p>
                </div>
                <div class="progress-ring" style="--progress: {{ $course_progress_out_of_100 }}%">
                    <div class="progress-ring-inner">
                        <span>
                            {{ $complated_lesson }}/{{ lesson_count($course_details->id) }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="single-progress px-5 py-3">
                <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="0" aria-valuemin="0"
                    aria-valuemax="100">
                    <div class="progress-bar" style="width: {{ $course_progress_out_of_100 }}%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="course-playlist-accordion p-3">
        <div class="accordion" id="coursePlay">
            @foreach ($sections as $section)
                @php
                    $lessons = App\Models\Lesson::where('section_id', $section->id)->orderBy('sort')->get();
                @endphp
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button @if ($active_section != $section->id) collapsed @endif"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $section->id }}"
                            aria-expanded="@if ($section->id != $active_section) false @else true @endif"
                            aria-controls="collapse_{{ $section->id }}">
                            {{ ucfirst($section->title) }}
                        </button>
                    </h2>
                    <div id="collapse_{{ $section->id }}"
                        class="accordion-collapse collapse @if ($section->id == $active_section) show @endif"
                        data-bs-parent="#coursePlay">
                        <div class="accordion-body">
                            <ul class="coourse-playlist-list">
                                @foreach ($lessons as $key => $lesson)
                                    @if ($lesson->lesson_type != 'exam')
                                        <li
                                            class="coourse-playlist-item @if (isset($history->watching_lesson_id) && $lesson->id == $history->watching_lesson_id) active @else lock @endif">
                                            <div class="check-title-area align-items-center">
                                                <input class="form-check-input flexCheckChecked mt-0"
                                                    @if (in_array($lesson->id, $completed_lesson)) checked @endif type="checkbox"
                                                    id="{{ $lesson->id }}">
                                                <div class="play-lock-number">
                                                    @php $type = $lesson->lesson_type; @endphp
                                                    <span>
                                                        @if (in_array($type, ['text', 'document_type', 'iframe']))
                                                            <i class="fa-solid fa-file"></i>
                                                        @elseif (in_array($type, ['video-url', 'system-video', 'vimeo-url']))
                                                            <i class="fa-solid fa-video"></i>
                                                        @elseif ($type == 'image')
                                                            <i class="fa-solid fa-image"></i>
                                                        @elseif ($type == 'google_drive')
                                                            <i class="fa-brands fa-google-drive"></i>
                                                        @else
                                                            <i class="fa-solid fa-file"></i>
                                                        @endif
                                                    </span>
                                                </div>
                                                <p class="d-none">{{ $lesson->lesson_type }}</p>
                                                <a href="{{ route('course.player', ['slug' => $course_details->slug, 'id' => $lesson->id]) }}"
                                                    class="video-title">{{ $lesson->title }}</a>
                                            </div>

                                            @if (lesson_durations($lesson->id) != '00:00:00')
                                                <p class="duration">{{ lesson_durations($lesson->id) }}</p>
                                            @endif
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<br>
{{-- NOTE: Se agrega aparto para el examen final --}}
@if ($exam_details)
    <div class="course-content-playlist mt-10">
        <div class="course-playlist-accordion p-3 header-details-exam">
            <div class="accordion head-exam" id="coursePlay">
                <div class="head-exam-title">
                    <div class="head-exam-svg">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-files-alt" viewBox="0 0 16 16">
                            <path
                                d="M11 0H3a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2 2 2 0 0 0 2-2V4a2 2 0 0 0-2-2 2 2 0 0 0-2-2m2 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1zM2 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="heading mb-2 title-exam">
                            Examen Final: {{ $exam_details->title }}
                        </h1>
                        <p class="info text-center" style="color: black !important">
                            <span style="font-size: small; color: black !important">
                                Completa el examen para certificar tus conocimientos.
                            </span>
                            <span style="font-size: small; color: black !important">
                                Duracion: {{ $exam_details->duration }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="examen-details">
                <div class="examen-details-head">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                        <path
                            d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z" />
                        <path
                            d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                    </svg>
                    <p style="color: black !important">
                        Requisitos del examen:
                    </p>
                </div>
                @if ($exam_details->examSetting)
                    <div class="exam-requiered">
                        <ul>
                            @if ($exam_details->examSetting->course_completed ?? false)
                                <li>Examen disponible solo con el 100% del curso completado</li>
                            @endif

                            @if ($exam_details->examSetting->camera_detection ?? false)
                                <li>Cámara web activa durante todo el examen</li>
                            @endif

                            @if ($exam_details->examSetting->camera_screen_record ?? false)
                                <li>Grabación de pantalla habilitada</li>
                            @endif

                            @if ($exam_details->examSetting->microphone_required ?? false)
                                <li>Micrófono obligatorio</li>
                            @endif

                            @if ($exam_details->examSetting->keyboard_events ?? false)
                                <li>No cambiar de pestaña ni usar combinaciones de teclas</li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
            <div class="examen-btn">
                <a href="{{ route('course.player', ['slug' => $course_details->slug, 'id' => $exam_details->id]) }}">
                    <button>
                        Empezar examen
                    </button>
                </a>
            </div>

            <div class="examen-btn">

                    <button onclick="stopRecording()">
                        detener
                    </button>

            </div>
        </div>
    </div>
@endif

<form class="ajaxForm" action="{{ route('set.watch.history') }}" method="post" id="watch_history_form">
    @csrf
    <input type="hidden" class="course_id" name="course_id" value="{{ $course_details->id }}">
    <input type="hidden" class="lesson_id" name="lesson_id">
</form>
