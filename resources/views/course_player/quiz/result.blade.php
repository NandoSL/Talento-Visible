<style>
    .question {
        min-height: auto !important;
    }

    .result-exam p{
        color: #000 !important;
    }
</style>

<div class="result result-exam">
    @php
        $submits = $result->submits ? json_decode($result->submits, true) : [];
        $correct_answers = $result->correct_answer ? json_decode($result->correct_answer, true) : [];
        $wrong_answers = $result->wrong_answer ? json_decode($result->wrong_answer, true) : [];
    @endphp

    <div class="container my-5">


    <div class="text-center mb-4">
        <h3 class="fw-bold text-dark">{{ get_phrase('¡Examen Completado Exitosamente!') }}</h3>
        <p class="text-muted">{{ get_phrase('Tu examen ha sido enviado y calificado correctamente.') }}</p>
    </div>

    
    <div class="card border-success mb-4 shadow-sm">
        <div class="card-body text-center">

            <h6 class="mb-1 text-muted">{{ get_phrase('Calificación obtenida') }}</h6>

            @php
                $score = count($correct_answers);
                $total = $quiz->total_mark;
            @endphp

            <h1 class="display-4 text-success fw-bold">
                {{ $score }}/{{ $total }}
            </h1>

            @if ($score >= $quiz->pass_mark)
                <span class="badge bg-info px-4 py-2 fs-6">{{ get_phrase('Aprobado') }}</span>
            @else
                <span class="badge bg-danger px-4 py-2 fs-6">{{ get_phrase('Reprobado') }}</span>
            @endif

        </div>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">

            <h6 class="fw-bold mb-3">{{ get_phrase('Detalles del examen') }}</h6>

            <div class="row">
                <div class="col-md-6">
                    <p><strong>{{ get_phrase('Preguntas totales') }}:</strong> {{ $quiz->total_mark }}</p>
                    <p class="text-success">
                        <strong>{{ get_phrase('Respuestas correctas') }}:</strong> {{ count($correct_answers) }}
                    </p>
                    <p class="text-danger">
                        <strong>{{ get_phrase('Respuestas incorrectas') }}:</strong> {{ count($wrong_answers) }}
                    </p>
                </div>

                <div class="col-md-6">
                    @php $duration = explode(':', $quiz->duration); @endphp
                    <p>
                        <strong>{{ get_phrase('Tiempo utilizado') }}:</strong>
                        {{ $duration[0] }}h {{ $duration[1] }}m {{ $duration[2] ?? 0 }}s
                    </p>

                    <p>
                        <strong>{{ get_phrase('Estado') }}:</strong>
                        @if ($score >= $quiz->pass_mark)
                            <span class="text-success">{{ get_phrase('Pass') }}</span>
                        @else
                            <span class="text-danger">{{ get_phrase('Fail') }}</span>
                        @endif
                    </p>
                </div>
            </div>

        </div>
    </div>

    
    <div class="alert alert-info d-flex align-items-center gap-2">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ get_phrase('Las grabaciones de cámara y pantalla se han guardado correctamente como evidencia.') }}</span>
    </div>


    <div class="text-center">
        <a href="{{ route('course.details', $quiz->course_id) }}" class="btn btn-dark px-4">
            {{ get_phrase('Volver al curso') }}
        </a>
    </div>

</div>

    @if ($quiz->lesson_type != 'exam')
        @foreach ($questions as $key => $question)
            @php
                $given_answer =
                    $question->type == 'true_false'
                        ? $question->answer
                        : implode(', ', json_decode($question->answer, true));
                $user_answers = array_key_exists($question->id, $submits) ? $submits[$question->id] : [];
            @endphp

            <div class="result-question mb-4 @if ($key > 0)  @endif">
                <div class="mb-1 d-flex align-items-center gap-3">
                    <span class="serial">{{ ++$key }}</span>
                    <div>{!! $question->title !!}</div>

                    @if (in_array($question->id, $correct_answers))
                        <i class="fi fi-br-check text-success"></i>
                    @elseif(in_array($question->id, $wrong_answers))
                        <i class="fi fi-br-cross-small text-danger"></i>
                    @endif
                </div>

                <div class="row gap-0">
                    @if ($question->type == 'mcq')
                        @php $options = json_decode($question->options, true) ?? []; @endphp
                        @foreach ($options as $index => $option)
                            @php $val = $user_answers ? array_search($option, $user_answers) : ''; @endphp
                            <div class="col-sm-6">
                                <input class="form-check-input" type="checkbox" value="{{ $option }}"
                                    @if (is_numeric($val)) checked @endif disabled>
                                <label class="form-check-label text-capitalize">{{ $option }}</label>
                            </div>
                        @endforeach
                    @elseif($question->type == 'fill_blanks')
                        <input type="text" class="form-control tagify" data-role="tagsinput"
                            value="{{ json_encode($user_answers) }}" disabled>
                    @elseif($question->type == 'true_false')
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" disabled
                                @if ($user_answers == 'true') checked @endif>
                            <label class="form-check-label">{{ get_phrase('True') }}</label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="radio" disabled
                                @if ($user_answers == 'false') checked @endif>
                            <label class="form-check-label">{{ get_phrase('False') }}</label>
                        </div>
                    @endif
                    <p class="text-capitalize text-success fw-600">
                        {{ get_phrase('Answer : ') }}{{ $given_answer }}
                    </p>
                </div>
            </div>
        @endforeach
    @endif


    <div class="row">
        <div class="col-12 d-flex gap-3 justify-content-center">
            <button type="button" class="eBtn gradient border-0 mb-4 d-flex align-items-center gap-2" id="backBtn"
                onclick="back()"><i class="fi fi-rr-angle-small-left fs-5"></i>{{ get_phrase('Back') }}</button>
        </div>
    </div>
</div>

<script>
    // back to main
    function back() {
        description.classList.remove('d-none');
        starterContainer.classList.remove('d-none');
        document.querySelector('.result').remove();
    }

    $('.result .tagify:not(.inited)').each(function(index, element) {
        var tagify = new Tagify(element, {
            placeholder: '{{ get_phrase('Enter your keywords') }}'
        });
        $(element).addClass('inited');
    });
</script>
