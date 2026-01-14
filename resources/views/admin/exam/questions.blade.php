<style>
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


</style>
@php
    $disableDelete = count($questions) === 1;
@endphp
<div class="row pb-3 mb-4">
    <div class="row" id="questions-view">
        <div class="col-sm-8 col-form-label">
            <h4 class="title-1"><span id="questions-count">{{ count($questions) }}</span>@if (count($questions) == 1) pregunta @else preguntas @endif</h4>
        </div>
        <div class="col-sm-4 col-form-label text-end">
            <a href="#" onclick="showQuestionForm()" class="btn-add-question w-auto">
                <span class="fas fa-plus" style="vertical-align: middle; display: flex; width: 18px;"></span>
                Añadir pregunta
            </a>
        </div>
        <div class="col-md-12 py-3" style="width: 100%;">
            @foreach ($questions as $index => $q)
                @php
                    $meta = match($q['type']) {
                        'mcq' => ['label' => 'Opción múltiple', 'badge' => 'color:#1447e6;background:#dbeafe;'],
                        'true_false' => ['label' => 'Verdadero/Falso', 'badge' => 'color:#008236;background:#dcfce7;'],
                        'fill_blanks' => ['label' => 'Respuesta abierta', 'badge' => 'color:#8200db;background:#f3e8ff;'],
                    };
                @endphp
                <div class="question-card" style="background-color: #fff; border: 2px solid #ebe6e7; border-radius: 16px; transition: all 0.2s ease; margin-block-end: 12px;" 
                    onmouseover="this.style.borderColor='rgba(26,35,50,0.3)'" onmouseout="this.style.borderColor='#ebe6e7'" data-question-id="{{ $q['id'] }}">
                    <div class="d-flex items-start gap-3" style="padding: 16px;">
                        <div style="flex: 1; min-width: 0px;">
                            <div class="d-flex justify-between gap-2" style="align-items: flex-start;">
                                <div style="flex: 1; font-weight: 500;">
                                    <div class="d-flex items-center gap-2 mb-2" style="font-size: 12px;">
                                        <span class="px-2 py-1 text-white" style="background-color: #1a2332; border-radius: 4px;">
                                            Pregunta {{ $index + 1 }}
                                        </span>
                                        <span class="px-2 py-1" style="{{ $meta['badge'] }} border-radius: 4px;">
                                            {{ $meta['label'] }}
                                        </span>
                                    </div>
                                    <p style="color: #101828; font-size: 16px;">
                                        {{ $q['question'] }}
                                    </p>
                                </div>
                                <div class="d-flex items-center gap-2">
                                    <button type="button"
                                        class="toggle-question-btn"
                                        onclick="toggleQuestion(this)"
                                        style="padding: 8px; color: #99a1af; background-color: transparent; border-radius: 12px;">
                                        
                                        <svg class="toggle-icon"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="18" height="18"
                                            viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m6 9 6 6 6-6"></path>
                                        </svg>
                                    </button>
                                    <button type="button" @if($disableDelete) disable @else onclick="confirmModal('{{ route('admin.course.question.delete', $q['id']) }}'); event.stopPropagation();" @endif
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

                            <div class="answer-block" style="display:none; margin-top:16px; padding-top:16px; border-top: 1px solid #ebe6e7;">
                                    @if ($q['type'] === 'mcq')
                                        <div style="font-size: 14px;">
                                            <p style="font-weight: 500; color: #364153; margin-bottom: 8px;">Opciones:</p>
                                            @foreach ($q['options'] as $opt)
                                                <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 8px;">
                                                    <div style="width: 20px; height: 20px; border-radius: 38px; display: flex; align-items: center; justify-content: center;
                                                        background:{{ in_array($opt, $q['correct'] ?? []) ? '#dcfce7' : '#f6f3f4' }};"
                                                    >
                                                        @if(in_array($opt, $q['correct']))
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 24 24" fill="none" stroke="#00a63e"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M20 6 9 17l-5-5"></path>
                                                        </svg>
                                                        @endif
                                                    </div>
                                                    <span>{{ $opt }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                    @if ($q['type'] === 'true_false')
                                        <div style="font-size: 14px;">
                                            <p style="font-weight: 500; color: #364153;">Respuesta correcta:</p>
                                            <p style="color: #15803d; font-weight: 500; margin-top: 4px;">
                                                {{ $q['correct'][0] === 'true' ? 'Verdadero' : 'Falso' }}
                                            </p>
                                        </div>
                                    @endif
                                    @if ($q['type'] === 'fill_blanks')
                                        <div style="font-size: 16px;">
                                            <p style="color: #4a5565; font-style: italic;">
                                                Pregunta de respuesta abierta – requiere evaluación manual
                                            </p>
                                        </div>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
            @endforeach          
        </div>
    </div>
    <div id="question-form-view" style="display:none;">
        @include('admin.questions_exam.question_form')
    </div>
</div>
<script>
    let examQuestions = @json($questions ?? []);

    function showQuestionForm() {
        document.getElementById('questions-view').style.display = 'none';
        document.getElementById('question-form-view').style.display = 'block';
        resetQuestionModal();
    }

    function toggleQuestion(button) {
        const card = button.closest('.question-card');
        const answer = card.querySelector('.answer-block');
        const icon = button.querySelector('.toggle-icon path');
        const isOpen = answer.style.display === 'block';
        document.querySelectorAll('.answer-block').forEach(b => b.style.display = 'none');
        document.querySelectorAll('.toggle-icon path')
            .forEach(p => p.setAttribute('d', 'm6 9 6 6 6-6'));

        if (!isOpen) {
            answer.style.display = 'block';
            icon.setAttribute('d', 'm18 15-6-6-6 6');
        }
    }

    function resetQuestionModal() {
        document.getElementById('questions-count').innerText = examQuestions.length;
        const form = document.getElementById('questionForm');
        if (!form) return;

        form.reset();
        const mcqContainer = document.getElementById('mcq-options');
        mcqContainer.innerHTML = '';
        document.getElementById('js-alert-container').innerHTML = '';
        document.querySelectorAll('.tf-label').forEach(l => {
            l.style.borderColor = '#d1d5dc';
            l.style.backgroundColor = '#fff';
            l.querySelector('.true_false_radio').innerHTML = '';
        });
        const mcqRadio = document.getElementById('btn1');
        mcqRadio.checked = true;
        changeQuestionType(mcqRadio);
        selectQuestionType(mcqRadio);
        addMcqOption('', false);
        addMcqOption('', false);
    }

    function changeQuestionType(el) {
        ['mcq','true_false','fill_blanks'].forEach(type => {
            const section = document.getElementById('section-' + type);
            if (section) {
                section.style.display = 'none';
            }
        });

        const active = document.getElementById('section-' + el.value);
        if (active) {
            active.style.display = 'block';
        }
    }

    function selectQuestionType(input) {
        document.querySelectorAll('input[name="option_value"]').forEach(radio => {
            const label = document.querySelector(`label[for="${radio.id}"]`);
            if (label) {
                label.style.border = '2px solid #99a1af';
                label.style.backgroundColor = '#fff';
            }
        });

        const activeLabel = document.querySelector(`label[for="${input.id}"]`);
        if (activeLabel) {
            activeLabel.style.border = '2px solid #1a2332';
            activeLabel.style.backgroundColor = '#fcf9fa';
        }
    }

    function handleQuestionMouseOut(label) {
        const input = document.getElementById(label.getAttribute('for'));
        if (!input.checked) {
            label.style.border = '2px solid #99a1af';
        }
    }

    function addMcqOption(value = '', checked = false) {
        const container = document.getElementById('mcq-options');
        const index = container.children.length;

        const html = `
            <div class="d-flex align-items-center gap-3 mcq-row" data-index="${index}" style="margin-block-end: 12px;">
                <input type="radio" name="mcq_correct" value="${index}" hidden>
                <span class="fake-radio" onclick="selectMcq(this)" style="width:20px;height:20px;background:#1a2332;border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;"></span>

                <input type="text" class="form-control ol-form-control"
                    placeholder="Opción ${index + 1}"
                    value="${value}"
                    style="padding:12px 16px;border:2px solid #ebe6e7;border-radius:16px;">

                <button type="button" onclick="removeMcqOption(this)"
                    style="padding:10px;color:#e7000b;background:transparent;border-radius:12px;">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', html);
    }

    function removeMcqOption(btn) {
        const row = btn.closest('.mcq-row');
        const radio = row.querySelector('input[type="radio"]');

        const wasChecked = radio.checked;

        row.remove();
        reindexMcqOptions();

        if (wasChecked) {
            document.querySelectorAll('.fake-radio').forEach(r => r.innerHTML = '');
        }
    }

    function reindexMcqOptions() {
        document.querySelectorAll('#mcq-options .mcq-row').forEach((row, index) => {
            row.dataset.index = index;
            const radio = row.querySelector('input[type="radio"]');
            radio.value = index;
            const input = row.querySelector('input[type="text"]');
            input.placeholder = `Opción ${index + 1}`;
        });
    }

    function selectMcq(fakeRadio) {
        document.querySelectorAll('.fake-radio').forEach(r => {
            r.innerHTML = '';
        });
        const realRadio = fakeRadio.previousElementSibling;
        realRadio.checked = true;
        fakeRadio.innerHTML = `<div style="width: 12px; height: 12px; background-color: #79c4f0ff; border-radius: 50%;"></div>`;
    }

    function selectTrueFalse(label) {
        document.querySelectorAll('.tf-label').forEach(l => {
            l.style.borderColor = '#d1d5dc';
            l.style.backgroundColor = '#fff';
            l.querySelector('.true_false_radio').innerHTML = '';
        });

        const input = label.querySelector('input[type="radio"]');
        const fakeRadio = label.querySelector('.true_false_radio');
        input.checked = true;

        fakeRadio.innerHTML = `<div style="width:12px;height:12px;border-radius:50%;background-color:#2563eb;"></div>`;

        if (label.dataset.type === 'true') {
            label.style.borderColor = '#00c951';
            label.style.backgroundColor = '#f0fdf4';
        } else {
            label.style.borderColor = '#fb2c36';
            label.style.backgroundColor = '#fef2f2';
        }
    }

    function saveQuestion() {
        const type = document.querySelector('input[name="option_value"]:checked').value;
        const questionText = document.getElementById('question').value;

        let question = {
            id: null,
            type: type,
            question: questionText,
            options: []
        };

        if (type === 'mcq') {
            const options = [];
            let correct = null;

            document.querySelectorAll('#mcq-options .mcq-row').forEach(row => {
                const text = row.querySelector('input[type="text"]').value;
                const radio = row.querySelector('input[type="radio"]');

                if (text.trim() !== '') {
                    options.push(text);

                    if (radio.checked) {
                        correct = text;
                    }
                }
            });

            if (options.length < 2) {
                showJsError('Agrega al menos 2 opciones');
                return;
            }

            if (!correct) {
                showJsError('Selecciona la respuesta correcta');
                return;
            }

            question.options = options;
            question.correct = [correct];
        }

        if (type === 'true_false') {
            const responseInput = document.querySelector('input[name="response"]:checked');

            if (!responseInput) {
                showJsError('Selecciona la respuesta correcta (Verdadero o Falso)');
                return;
            }

            question.correct = [responseInput.value];
        }

        if (type === 'fill_blanks') {
            question.correct = null;
        }

        fetch("{{ route('admin.exam.questions', $exam_id) }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                type: question.type,
                question: question.question,
                options: question.options,
                correct: question.correct
            })
        })
        .then(res => res.json())
        .then(data => {
            examQuestions = data.questions;
            location.reload();
        });
    }

    function showJsError(message) {
        const container = document.getElementById('js-alert-container');

        container.innerHTML = `
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        `;

        container.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function showQuestionsList() {
        document.getElementById('question-form-view').style.display = 'none';
        document.getElementById('questions-view').style.display = 'block';
    }
</script>