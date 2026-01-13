<style>
    .quiz-title {
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 12px;
        border-bottom: 1px solid #C3C9DA;
        padding-bottom: 20px;
        font-weight: 600;
    }

    .quiz-starter .starter-label {
        display: inline-block;
        width: 110px;
    }

    .quiz-starter p {
        font-size: 15px;
        font-weight: 500;
        color: #6e798a;
    }

    .question {
        min-height: 155px;
    }

    input[type="text"] {
        padding: 12px 50px 12px 20px;
        border-radius: 10px;
        border: 1px solid #6b738530;
        box-shadow: none !important;
    }

    .gradient-border {
        background: #fff;
        border: 2px solid #2f57ef;
        color: #212529;
        transition: .3s;
    }

    .gradient-border:hover {
        color: #fff;
        background: #2f57ef;
    }

    .serial {
        width: 30px;
        height: 30px;
        background: #F2F3F5;
        border-radius: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #quizTimer {
        width: 80px;
    }
</style>
@php
    $quiz = DB::table('lessons')
        ->where('id', request()->route()->parameter('id'))
        ->first();

    $questions = DB::table('questions')->where('quiz_id', $quiz->id)->get();

    $submits = DB::table('quiz_submissions')
        ->where('quiz_id', $quiz->id)
        ->where('user_id', auth()->user()->id)
        ->get();

    $completed_lesson =
        json_decode(
            App\Models\Watch_history::where('course_id', $course_details->id)
                ->where('student_id', Auth()->user()->id)
                ->value('completed_lesson'),
            true,
        ) ?? [];

    $lesson_history = App\Models\Watch_history::where('course_id', $course_details->id)
        ->where('student_id', auth()->user()->id)
        ->firstOrNew();

    $completed_lesson_arr = json_decode($lesson_history->completed_lesson, true);
    $complated_lesson = is_array($completed_lesson_arr) ? count($completed_lesson_arr) : 0;

    // <p> {{ $complated_lesson }} / {{ lesson_count($course_details->id) }}</p>

@endphp

<div class="row px-4">
    <div class="col-12">
        <h4 class="quiz-title text-center mt-4"><span>{{ $quiz->title }}</span></h4>

        <div class="timer-container d-none">
            <div class="d-flex align-content-center gap-2 justify-content-end">
                <span>
                    <i class="fi fi-rr-clock-five"></i>
                </span>
                <span class="fw-600 fs-6">{{ get_phrase('Time left : ') }}</span>
                <p class="text-center fw-600 fs-6" id="quizTimer"></p>
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <div class="description">{!! $quiz->description !!}</div>
        </div>
    </div>
</div>


<div class="row px-4 quiz-starter">
    <div class="col-md-6">
        <p>
            @php $duration = explode(':', $quiz->duration); @endphp
            <span class="starter-label">{{ get_phrase('Duration') }}</span>
            <span>: {{ $duration[0] }} {{ get_phrase('Hour') }}</span>
            <span>{{ $duration[1] }} {{ get_phrase('Minute') }}</span>
            <span>{{ $duration[2] }} {{ get_phrase('Second') }}</span>
        </p>
        <p>
            <span class="starter-label">{{ get_phrase('Total Marks') }}</span>
            <span>: {{ $quiz->total_mark < 10 ? '0' : '' }}{{ $quiz->total_mark }}</span>
        </p>
        <p>
            <span class="starter-label">{{ get_phrase('Pass Marks') }}</span>
            <span>: {{ $quiz->pass_mark < 10 ? '0' : '' }}{{ $quiz->pass_mark }}</span>
        </p>
        <p>
            <span class="starter-label">{{ get_phrase('Retake') }}</span>
            <span>: {{ $quiz->retake < 10 ? '0' : '' }}{{ $quiz->retake }}</span>
        </p>
    </div>
    <div class="col-md-6">
        <p>
            <span class="starter-label">{{ get_phrase('Question Type') }}</span>
            <span class="text-capitalize">:
                {{ str_replace('_', ' ', implode(', ', $questions->pluck('type')->unique()->toArray())) }}</span>
        </p>
        <p>
            <span class="starter-label">{{ get_phrase('Attempts') }}</span>
            <span>: {{ $submits->count() < 10 ? '0' : '' }}{{ $submits->count() }}</span>
        </p>
        <p>
            <span class="starter-label">{{ get_phrase('Total Question') }}</span>
            <span>: {{ $questions->count() < 10 ? '0' : '' }}{{ $questions->count() }}</span>
        </p>
    </div>

    <div class="col-12 d-flex justify-content-center gap-3">
        @foreach ($submits as $key => $submit)
            <button type="button" class="eBtn gradient-border result-btn" onclick="getResult(this)"
                id="{{ $submit->id }}">{{ get_phrase('View Result') }} {{ ++$key }}</button>
        @endforeach

        @if ($submits->count() < $quiz->retake)
            @if ($quiz->lesson_type == 'exam')
                @if ($exam_details?->examSetting?->course_completed && $complated_lesson != (lesson_count($course_details->id)-1))
                    <p>
                        <span class="">Es necesario terminar todas las lecciones del curso para realizar el examen</span>
                    </p>
                @else
                    <button type="button" class="eBtn gradient border-0" id="starterBtn">
                        {{ get_phrase('Start Exam') }}
                    </button>
                @endif
            @else
                <button type="button" class="eBtn gradient border-0" id="starterBtn">
                    {{ get_phrase('Start Quiz') }}
                </button>
            @endif
        @endif
    </div>
</div>

<div class="load-content px-4"></div>

<script src="{{ asset('assets/global/course_player/js/jquery.min.js') }}"></script>
<script>
    let starterContainer = document.querySelector('.quiz-starter');
    let starterBtn = document.querySelector('#starterBtn');
    let questionSection = document.querySelector('.question-section');
    let quizTimer = document.querySelector('#quizTimer');
    let description = document.querySelector('.description');
    let resultSection = document.querySelector('.result-section');
    let backBtn = document.querySelector('#backBtn');
    let existExam = "{{ $exam_details }}";
    let lessonType = "{{ $quiz->lesson_type }}";
    let retake1 = @json($quiz->retake);
    let time = "{{ $exam_details->examSetting->hours}}";
   let retakeExamStart = @json($quiz->retake_exam_failed);
let fishTime = @json($quiz->finish_time);
    let recordedChunks = [];
    let mediaRecorder;
    console.log("borrar",fishTime);
    
    
            console.log(`Esto es lessonType: ${lessonType}`);
            if (lessonType === "exam") {
                
                if (retake1 === 4) {
                    starterBtn.disabled = false;
                }
                else if (retakeExamStart === 0) {
                    starterBtn.disabled = false;
                }
                else if (retakeExamStart <= retake1 && fishTime === 0) {
                    starterBtn.disabled = true;
                }
                else if (retakeExamStart <= retake1 && fishTime === 1) {
                    starterBtn.disabled = false;
                }
                else {
                    starterBtn.disabled = true;
                }
            }
            // start quiz
    starterBtn.addEventListener('click', function() {


        if (existExam && lessonType == 'exam') {
            itsExam();
            
        }

        starterContainer.classList.add('d-none');
        description.classList.add('d-none');
        $.ajax({
            type: "get",
            url: "{{ route('load.quiz.questions') }}",
            data: {
                quiz_id: "{{ $quiz->id }}"
            },
            success: function(response) {
                $('.load-content').html(response);
                startTimer();
            }
        });
    });

    function startTimer() {
        let timerContainer = document.querySelector('.timer-container');
        timerContainer.classList.remove('d-none');

        let duration = "{{ $quiz->duration }}";
        let durationArr = duration.split(":");

        let hour = parseInt(durationArr[0]);
        let minute = parseInt(durationArr[1]);
        let second = parseInt(durationArr[2]);

        // update the initial timer
        quizTimer.innerHTML = (hour < 10 ? '0' + hour : hour) + ':' +
            (minute < 10 ? '0' + minute : minute) + ':' +
            (second < 10 ? '0' + second : second)

        // decrease the timer every second
        let timerInterval = setInterval(() => {
            if (hour === 0 && minute === 0 && second === 0) {
                clearInterval(timerInterval);
                endQuiz();
                return;
            }

            if (second === 0) {
                if (minute === 0) {
                    hour--;
                    minute = 59;
                } else {
                    minute--;
                }
                second = 59;
            } else {
                second--;
            }

            // update the timer
            quizTimer.innerHTML = (hour < 10 ? '0' + hour : hour) + ':' +
                (minute < 10 ? '0' + minute : minute) + ':' +
                (second < 10 ? '0' + second : second);
        }, 1000);
    }

    // load results
    function getResult(elem) {
        let id = $(elem).attr('id');
        description.classList.add('d-none');
        starterContainer.classList.add('d-none');

        $.ajax({
            type: "get",
            url: "{{ route('load.quiz.result') }}",
            data: {
                submit_id: id,
                quiz_id: "{{ $quiz->id }}"
            },
            success: function(response) {
                $('.load-content').html(response);
            }
        });
    }

    // end quiz
    function endQuiz() {
    retakeIncrement();
    finisTimeDesactive();
    }

    function itsExam() {
        // camera screen record
        if (@json($exam_details?->examSetting?->camera_screen_record)) {
            console.log("Grabacion de pantalla...");
            startRecording();
        }

        // person detection
        if (@json($exam_details?->examSetting?->person_detection)) {
            console.log("Deteccion de persona...");
        }

        // window detection
        if (@json($exam_details?->examSetting?->window_detection)) {
            console.log("Deteccion de cambio de pestaña...");
            let count = 0;
            // Cambio de pestaña
            window.addEventListener('blur', function() {
                console.log("Cambio de pestaña detectado", count);
                if (count > 3) {
                    //document.title = "Reprobaste por tramposo xd";
                  // CORREGIDO:
                    ajaxModal1(
                        'Combinación de Tecla Prohibida', 
                        'Examen Cancelado', 
                        retakeExamStart, 
                        retake1, 
                        time, 
                        'modal-md', 
                        'fade'
                    );
                    setTimeout(() => {
                        endQuiz();
                    }, 3000);

                }
                count++;
            });

        }

        // keyboard events
        if (@json($exam_details?->examSetting?->keyboard_events)) {
            console.log("La deteccion de teclado...");
            // Convinaciones de teclas ctrl + c o x
            document.addEventListener("keydown", (ev) => {
                //console.log("Has pulsado la tecla ", ev.key, ` (${ev.code})`);
                if (ev.ctrlKey && ev.key.toLowerCase() === "c" || ev.key.toLowerCase() === "x") {
                    ev.preventDefault();
                     
                   // CORREGIDO:
                    ajaxModal1(
                        'Combinación de Tecla Prohibida', 
                        'Examen Cancelado', 
                        retakeExamStart, 
                        retake1, 
                        time, 
                        'modal-md', 
                        'fade'
                    );

                    setTimeout(() => {
                        endQuiz();
                    }, 3000);
                }

                if (ev.key === "PrintScreen") ev.preventDefault();
            });

            // Cambio de pestaña
            window.addEventListener('blur', function() {
                if (count > 3) {
                    console.log("Cambio de pestaña detectado",count);
                    
                    document.title = "Reprobaste por tramposo xd";
                        ajaxModal1(
                    'Cambio de Pestaña Detectado', 
                    'Examen Cancelado', 
                    retakeExamStart, 
                    retake1, 
                    time, 
                    'modal-md', 
                    'fade'
                );

                    setTimeout(() => {
                        endQuiz();
                    }, 600000); 
                            
                }
                count++;
            });
        }

        if (@json($exam_details->examSetting->camera_screen_record)) {
            console.log("La Grabacion de pantalla esta activo");
            startRecording();
        }

    }

    async function startRecording() {
        const screenStream = await navigator.mediaDevices.getDisplayMedia({
            video: true,
            audio: true
        });

        const micStream = await navigator.mediaDevices.getUserMedia({
            audio: true
        });

        const combinedStream = new MediaStream([
            ...screenStream.getVideoTracks(),
            ...screenStream.getAudioTracks(),
            ...micStream.getAudioTracks()
        ]);

        mediaRecorder = new MediaRecorder(combinedStream, {
            mimeType: 'video/mp4'
        });

        mediaRecorder.ondataavailable = e => {
            if (e.data.size > 0) recordedChunks.push(e.data);
        };

        mediaRecorder.onstop = () => {
            const blob = new Blob(recordedChunks, {
                type: 'video/mp4'
            });

            // 👇 Convertimos el blob en archivo
            const file = new File([blob], 'exam_recording.mp4', {
                type: 'video/mp4'
            });

            // 👇 Lo inyectamos al input file
            const input = document.getElementById('system_video_file');
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            input.files = dataTransfer.files;

            console.log('Video listo para enviarse');
        };

        mediaRecorder.start();
        console.log('Grabando...');
    }

    function stopRecording() {
        mediaRecorder.stop();
        console.log('Grabación detenida');
    }

    function finisTimeDesactive() {
         $.ajax({
        url: "{{ route('lesson. updateFinishTimeDesactive') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            lesson_id: "{{ $quiz->id }}" 
        },
        success: function () {
            console.log('finish_time desactivado');
        },
        error: function () {
            console.error('No se pudo desactivar finish_time');
        }
    });
    }
    function retakeIncrement() {
        $.ajax({
        url: "{{ route('lesson.updateRetake') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            lesson_id: "{{ $quiz->id }}" 
        },
        success: function () {
            submitQuiz(); 
        },
        error: function () {
            console.error('No se pudo actualizar retake');
            submitQuiz();
        }
    });
}
            
</script>
@include('course_player.modal')
