@extends('layouts.admin')
@push('title', get_phrase('Create Exam') . ' - ' . $course_details->title)
@push('css')
<style>
    .new-section {
        padding: 10px; 
        border: 1px solid #ebe6e7; 
        border-radius: 15px; 
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1);
    }

    .new-sub-section {
        margin-top: 15px;
        padding: 16px; 
        border: 1px solid #ebe6e7; 
        border-radius: 16px; 
        background-color: #fbf9fa;
    }

    .title-1 {
        color: #101828;
        font-size: 18px;
    }

    .sub-title-1 {
        color: #4a5565;
        font-size: 16px;
    }

    .sub-title-2 {
        margin: 0;
        color: #364153;
        font-size: 16px;
    }

    .tag {
        color: #6a7282;
        font-size: 14px;
    }

    .new-input:hover {
        border-color: black !important;
        outline: none !important;
    }

    .new-input:focus {
        border-color: black !important;
        outline: none !important;
    }

    hr {
        background-color: #ebe6e7;
        margin: 0px 0px 8px 0px;
    }

    .fs-16 {
        font-size: 16px;
    }

    .constructor {
        width: 100%; 
        justify-content: center; 
        text-align: center; 
        padding: 48px; 
        border: 2px dashed #d1d5dc; 
        border-radius: 16px; 
        background-color: #fbf9fa;
    }

    .btn-add-question {
        border-radius: 16px;
        display: inline-flex; 
        width: 50%; 
        justify-content: center; 
        align-items: center; 
        gap: 8px; 
        padding-block: 12px; 
        padding-inline: 24px; 
        color: #fff; 
        background-color: #1a2332;
    }

    .btn-1 {
        padding-inline: 32px;
        padding-block: 12px;
        border-radius: 16px;
        background-color: white;
        border: 2px solid #d1d5dc; 
    }
    .btn-1:hover {
        background-color: #fbf9fa;
    }
    
    .btn-2 {
        color: #4a5565;
        padding-block: 12px;
        padding-inline: 32px;
        background-color: #ebe6e7; 
        border-radius: 16px;
        border: 2px solid #e5e7eb;
    }
    .btn-2:hover {
        background-color: #d1d5dc;
    }

    .btn-exam {
        margin-top: 10px;
        color: #fff;
        font-size: 18px;
        padding-block: 16px;
        padding-inline: 40px;
        border-radius: 16px;
        background: linear-gradient(to right, #16a34a, #059669);
    }
    .btn-exam:hover {
        box-shadow: 0 20px 25px -5px rgba(34,197,94,0.5), 0 10px 10px -5px rgba(34,197,94,0.5);
    }
</style>
@endpush

@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px d-flex align-items-center">
                    <span class="edit-badge py-2 px-3">
                        {{ get_phrase('Create Exam') }}
                    </span>
                    <span class="d-inline-block ms-3">
                        {{ $course_details->title }}
                    </span>
                </h4>
                <a href="{{ route('admin.exam.index', $course_details->id) }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px ms-auto">
                    <span class="fi-rr-arrow-left"></span>
                    <span>{{ get_phrase('Back to Exams') }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="ol-card">
            <div class="ol-card-body p-20px mb-3">
                <div class="d-flex gap-3 flex-wrap flex-md-nowrap">
                    {{-- Sidebar Tabs --}}
                    <div class="ol-sidebar-tab">
                        <div class="d-flex flex-column">
                            @php
                                $param = $course_details->id;
                            @endphp

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'curriculum']) }}">
                                <span class="fi-rr-edit"></span>
                                <span>{{ get_phrase('Curriculum') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'basic']) }}">
                                <span class="icon fi-rr-duplicate"></span>
                                <span>{{ get_phrase('Basic') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'live-class']) }}">
                                <span class="fi-rr-file-video"></span>
                                <span>{{ get_phrase('Live Class') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'pricing']) }}">
                                <span class="fi-rr-comment-dollar"></span>
                                <span>{{ get_phrase('Pricing') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'info']) }}">
                                <span class="fi-rr-tags"></span>
                                <span>{{ get_phrase('Info') }}</span>
                            </a>
                            
                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'media']) }}">
                                <span class="fi fi-rr-gallery"></span>
                                <span>{{ get_phrase('Media') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'seo']) }}">
                                <span class="fi-rr-note-medical"></span>
                                <span>{{ get_phrase('SEO') }}</span>
                            </a>

                            <a class="nav-link active" href="{{ route('admin.exam.index', $param) }}">
                                <span class="far fa-file-code"></span>
                                <span>{{ get_phrase('Exam') }}</span>
                            </a>
                        </div>
                    </div>
                        
                    <form action="{{ route('admin.exam.store', $course_details->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{-- Content --}}
                        <input type="hidden" name="questions" id="questionsInput">

                        <div class="tab-content w-100">
                            <div class="row new-section pb-4 mb-4">
                                <div class="col-sm-12 col-form-label">
                                    <h4 class="title">Añadir nuevo examen</h4>
                                    <label class="form-label sub-title-1">Crea un examen completo con preguntas dinámicas</label>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label ol-form-label ol-form-label title-1 mt-3">Información básica</label>
                                    <hr />
                                    <label for="title_exam" class="form-label ol-form-label col-form-label sub-title-2">
                                        Título del examen<span class="text-danger ms-1">*</span>
                                    </label>
                                    <input type="text" name="title_exam" class="form-control ol-form-control new-input mb-2" id="title_exam" required>
                                </div>

                                <div class="col-md-12">
                                    <label for="description_exam" class="form-label ol-form-label col-form-label sub-title-2">
                                        Descripción del examen
                                    </label>
                                    <input type="text" name="description_exam" class="form-control ol-form-control new-input mb-2" id="description_exam">
                                </div>
                                    
                                <div class="col-md-12 mb-3">
                                    <label class="form-label ol-form-label ol-form-label title-1 mt-3">
                                        <span class="fas fa-cogs me-2"></span>    
                                        Configuración del examen
                                    </label>
                                    <hr />

                                    <div class="row"> 
                                        <div class="col-md-3">
                                            <label for="title" class="form-label ol-form-label col-form-label sub-title-2">
                                                <span class="far fa-clock me-2"></span>Duración (minutos)
                                            </label>
                                            <input type="number" name="duration" class="form-control ol-form-control new-input" min="1" required>
                                            <label class="tag">Tiempo límite para completar</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="title" class="form-label ol-form-label col-form-label sub-title-2">
                                                <span class="far fa-check-circle me-2"></span>Puntaje aprobatorio
                                            </label>
                                            <input type="number" name="minScore" class="form-control ol-form-control new-input" min="1" required>
                                            <label class="tag">Mínimo para aprobar</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="opens" class="form-label ol-form-label col-form-label sub-title-2">
                                                <span class="fas fa-sync me-2"></span>Intentos permitidos
                                            </label>
                                            <select id="opens" name="attempts" class="form-control ol-form-control new-input" required>
                                                <option value="">Seleccione...</option>
                                                <option value="1">1 intento</option>
                                                <option value="2">2 intentos</option>
                                                <option value="3">3 intentos</option>
                                                <option value="4">Ilimitados</option>
                                            </select>
                                            <label class="tag">Veces que puede repetir</label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="waitingTime" class="form-label ol-form-label col-form-label sub-title-2">
                                                <span class="fas fa-spinner me-2"></span>Tiempo de espera
                                            </label>
                                            <select id="waitingTime" name="waitingTime" class="form-control ol-form-control new-input" required>
                                                <option value="">Seleccione...</option>
                                                <option value="3">3 horas</option>
                                                <option value="6">6 horas</option>
                                                <option value="9">9 horas</option>
                                                <option value="12">12 horas</option>
                                                <option value="24">24 horas</option>
                                            </select>
                                            <label class="tag">Periodo de espera para nuevo intento</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="showResults" style="width: 100%; cursor: pointer;">
                                        <input class="ol-form-control mx-3" type="checkbox" id="showResults" value="1" name="showResults">
                                        <span class="title fs-16">Mostrar resultados al finalizar</span>
                                        <div class="tag ms-5">Los estudiantes verán su puntaje inmediatamente después de completar</div>
                                    </label>
                                </div>
                            </div>

                            <div class="row new-section pb-3 mb-4">
                                <div class="col-sm-8 col-form-label">
                                    <h4 class="title-1">Constructor de preguntas</h4>
                                    <label class="tag">
                                        <span id="questions-count">0</span> preguntas
                                    </label>
                                </div>
                                <div class="col-sm-4 col-form-label text-end pe-5">
                                    <a href="#" onclick="ajaxModal('{{ route('modal', ['admin.questions_exam.create', 'id' => $course_details->id]) }}', 'Añadir pregunta', 'modal-lg')" class="btn-add-question w-auto">
                                        <span class="fas fa-plus" style="vertical-align: middle; display: flex; width: 18px;"></span>
                                        Añadir pregunta
                                    </a>
                                </div>

                                <div class="col-md-12 px-4 py-3" style="width: 100%;">
                                    <div id="questions-container" class="row"></div>
                                    <div class="row constructor" id="empty-state">
                                        <span class="fas fa-clipboard-list" style="scale: 3;"></span>
                                        <label class="form-label sub-title-1 pt-4">No hay preguntas añadidas</label>
                                        <a href="#" onclick="ajaxModal('{{ route('modal', ['admin.questions_exam.create', 'id' => $course_details->id]) }}', 'Añadir pregunta', 'modal-xl')" class="btn-add-question">
                                            <span class="fas fa-plus" style="vertical-align: middle; display: block; width: 18px;"></span>
                                            Añadir primera pregunta
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="row new-section pb-4 mb-4">
                                <div class="col-md-12">
                                    <label class="form-label ol-form-label ol-form-label title-1 mt-3">
                                        <span class="fas fa-shield-alt me-2"></span>    
                                        Sistema de seguridad
                                    </label>
                                    <hr />
                                </div>
                                <div class="col-md-12">
                                    <label class="new-sub-section" for="course" style="width: 100%; cursor: pointer;">
                                        <input class="ol-form-control mx-3" type="checkbox" id="course" name="fullCourse" value="1">
                                        <span class="title1">
                                            <span class="far fa-check-circle me-1"></span>
                                            Curso completo al 100%
                                        </span>
                                        <div class="tag ms-5" style="color: #1e2939;">
                                            El estudiante debe completar el curso antes de poder tomar este examen.
                                        </div>
                                    </label>

                                    <label class="new-sub-section" for="recording" style="width: 100%; cursor: pointer; border-color: #bedbff; background-color: #eef2ff;">
                                        <input class="ol-form-control mx-3" type="checkbox" id="recording" name="recording" value="1">
                                        <span class="title fs-16">
                                            <span class="fas fa-camera me-1" style="color: #1447e6;"></span>
                                            <span class="fas fa-desktop me-1" style="color: #1447e6;"></span>
                                            Grabación de cámara web y pantalla
                                        </span>
                                        <div class="tag ms-5" style="color: #193cb8;">
                                            Se grabará la cámara web y la pantalla del estudiante durante todo el examen. Las grabaciones se guardarán como evidencia.
                                        </div>
                                    </label>

                                    <label class="new-sub-section" for="person_detection" style="width: 100%; cursor: pointer; border-color: #e9d4ff; background-color: #fdf2f8;">
                                        <input class="ol-form-control mx-3" type="checkbox" id="person_detection" name="personDetection" value="1">
                                        <span class="title fs-16">
                                            <span class="fas fa-users me-1" style="color: #8200db;"></span>
                                            Detección de múltiples personas
                                        </span>
                                        <div class="tag ms-5" style="color: #6e11b0;">
                                            Verifica que solo haya una persona frente a la cámara. Si se detectan 0 o más de 1 persona, el examen no podrá iniciarse.
                                        </div>
                                    </label>

                                    <label class="new-sub-section" for="window_detection" style="width: 100%; cursor: pointer; border-color: #fee685; background-color: #fff7ed;">
                                        <input class="ol-form-control mx-3" type="checkbox" id="window_detection" name="windowDetection" value="1">
                                        <span class="title fs-16">
                                            <span class="fas fa-eye me-1" style="color: #bb4d00;"></span>
                                            Detección de cambio de pestaña/ventana
                                        </span>
                                        <div class="tag ms-5" style="color: #973c00;">
                                            Si el estudiante cambia de pestaña, ventana o pierde el foco, el examen se cancelará automáticamente.
                                        </div>
                                    </label>

                                    <label class="new-sub-section" for="block" style="width: 100%; cursor: pointer; border-color: #ffc9c9; background-color: #fff1f2;">
                                        <input class="ol-form-control mx-3" type="checkbox" id="block" name="block" value="1">
                                        <span class="title fs-16">
                                            <span class="fas fa-exclamation-triangle me-1" style="color: #c10007;"></span>
                                            Bloqueo de combinaciones de teclas
                                        </span>
                                        <div class="tag ms-5" style="color: #9f0712;">
                                            Bloquea copiar, pegar, captura de pantalla y clic derecho. Cualquier intento cancelará el examen.
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="row new-section pb-4 mb-4">
                                <div style="display: flex; align-items: center; justify-content: space-between; padding-top: 10px;">
                                    <div>
                                        <label class="form-label sub-title-1">Asegúrate de haber configurado todas las preguntas correctamente</label>
                                    </div>
                                    <div style="display: flex; gap: 12px">
                                        <button type="button" class="btn-1" onclick="window.location='{{ route('admin.exam.index', $course_details->id) }}'">
                                            Cancelar
                                        </button>
                                        <button class="btn-2" type="submit" name="action" value="save_draft">Guardar borrador</button>
                                        <button class="btn-add-question" name="action" value="publish" 
                                            @if ($examPublished) onclick="ajaxModal('{{ route('modal', ['admin.exam.duplicated', 'id' => $course_details->id]) }}', '', 'modal-md')" type="button" @else type="submit" @endif>
                                            <span class="far fa-check-circle" style="vertical-align: middle; display: block; width: 18px;"></span>
                                            Publicar examen
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.querySelector('form').addEventListener('submit', function () {
                                document.getElementById('questionsInput').value = JSON.stringify(examQuestions);
                            });
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    let examQuestions = [];

    function toggleQuestion(index) {
        examQuestions[index].expanded = !examQuestions[index].expanded;
        renderQuestions();
    }
    

    function removeQuestion(index) {
        examQuestions.splice(index, 1);
        renderQuestions();
    }
    
    function closeAjaxModal() {
        const modal = document.querySelector('.modal.show');
        if (!modal) return;

        const instance = bootstrap.Modal.getInstance(modal);
        if (instance) {
            instance.hide();
        }
    }

    function getQuestionTypeMeta(type) {
        switch (type) {
            case 'mcq':
                return {
                    label: 'Opción múltiple',
                    badge: 'color: #1447e6; background-color: #dbeafe;'
                };
            case 'true_false':
                return {
                    label: 'Verdadero/Falso',
                    badge: 'color: #008236; background-color: #dcfce7;'
                };
            case 'fill_blanks':
                return {
                    label: 'Respuesta abierta',
                    badge: 'color: #8200db; background-color: #f3e8ff;'
                };
        }
    }

    function updateExamStats() {
        const questionsCount = examQuestions.length;
        document.getElementById('questions-count').textContent = questionsCount;
    }

    function renderQuestions() {
        const container = document.getElementById('questions-container');
        const emptyState = document.getElementById('empty-state');

        container.innerHTML = '';
        updateExamStats();

        if (!examQuestions || examQuestions.length === 0) {
            container.style.display = 'none';
            emptyState.style.display = 'flex';
            return;
        }

        container.style.display = 'block';
        emptyState.style.display = 'none';

        examQuestions.forEach((q, index) => {
            const meta = getQuestionTypeMeta(q.type);
            const expanded = q.expanded ?? false;

            container.innerHTML += `
                <div style="background-color: #fff; border: 2px solid #ebe6e7; border-radius: 16px; transition: all 0.2s ease; margin-block-end: 12px;" onmouseover="this.style.borderColor='rgba(26,35,50,0.3)'" onmouseout="this.style.borderColor='#ebe6e7'">
                    <div class="d-flex items-start gap-3" style="padding: 16px;">
                        <div style="flex: 1; min-width: 0px;">
                            <div class="d-flex justify-between gap-2" style="align-items: flex-start;">
                                <div style="flex: 1; font-weight: 500;">
                                    <div class="d-flex items-center gap-2 mb-2" style="font-size: 12px;">
                                        <span class="px-2 py-1 text-white" style="background-color: #1a2332; border-radius: 4px;">
                                            Pregunta ${index + 1}
                                        </span>
                                        <span class="px-2 py-1" style="${meta.badge} border-radius: 4px;">
                                            ${meta.label}
                                        </span>
                                    </div>
                                    <p style="color: #101828; font-size: 16px;">
                                        ${q.question}
                                    </p>
                                </div>
                                <div class="d-flex items-center gap-2">
                                    <button type="button" onclick="toggleQuestion(${index})"
                                        style="padding: 8px; color: #99a1af; background-color: transparent; border-radius: 12px; transition-property: all; transition-duration: .15s;"
                                        onmouseover="this.style.color = '#364153'; this.style.backgroundColor = '#f6f3f4';"
                                        onmouseout="this.style.color = '#99a1af'; this.style.backgroundColor = 'transparent';"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="${expanded ? 'm18 15-6-6-6 6' : 'm6 9 6 6 6-6'}"></path>
                                        </svg>
                                    </button>
                                    <button type="button" onclick="removeQuestion(${index})"
                                        style="padding: 8px; color: #99a1af; background-color: transparent; border-radius: 12px; transition-property: all; transition-duration: .15s;"
                                        onmouseover="this.style.color = '#e7000b'; this.style.backgroundColor = '#f6f3f4';"
                                        onmouseout="this.style.color = '#99a1af'; this.style.backgroundColor = 'transparent';"
                                    >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10 11v6"></path>
                                        <path d="M14 11v6"></path>
                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                                        <path d="M3 6h18"></path>
                                        <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                    </svg>
                                    </button>
                                </div>
                            </div>

                            ${expanded ? `
                                <div style="margin-top:16px;padding-top:16px;border-top:1px solid #ebe6e7;">
                                    ${renderAnswerBlock(q)}
                                </div>
                            ` : ''}
                        </div>
                    </div>
                </div>
            `;
        });
    }

    function renderAnswerBlock(q) {
        if (q.type === 'mcq') {
            return `
                <div style="font-size: 14px;">
                    <p style="font-weight: 500; color: #364153; margin-bottom: 8px;">Opciones:</p>
                    ${q.options.map(opt => {
                        const isCorrect = Array.isArray(q.correct) && q.correct.includes(opt);
                        return `
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                <div style="width: 20px; height: 20px; border-radius: 38px; display: flex; align-items: center; justify-content: center;
                                    background-color:${isCorrect ? '#dcfce7' : '#f6f3f4'};"
                                >
                                    ${isCorrect ? `
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                            viewBox="0 0 24 24" fill="none" stroke="#00a63e"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 6 9 17l-5-5"></path>
                                        </svg>
                                    ` : ''}
                                </div>
                                <span style="color:${isCorrect ? '#008236' : '#4a5565'}; font-weight:${isCorrect ? '500' : '400'};">
                                    ${opt}
                                </span>
                            </div>
                        `;
                    }).join('')}
                </div>
            `;
        }

        if (q.type === 'true_false') {
            return `
                <div style="font-size: 14px;">
                    <p style="font-weight: 500; color: #364153;">Respuesta correcta:</p>
                    <p style="color: #15803d; font-weight: 500; margin-top: 4px;">
                        ${q.correct?.[0] === 'true' ? 'Verdadero' : 'Falso'}
                    </p>
                </div>
            `;
        }

        if (q.type === 'fill_blanks') {
            return `
                <div style="font-size: 16px;">
                    <p style="color: #4a5565; font-style: italic;">
                        Pregunta de respuesta abierta – requiere evaluación manual
                    </p>
                </div>
            `;
        }

        return '';
    }
</script>
