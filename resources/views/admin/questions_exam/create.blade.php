<form id="questionForm" onsubmit="event.preventDefault(); saveQuestion();">
@csrf
    <div class="row pb-4 mb-4">
        <div class="col-sm-12" style="margin-bottom: 12px;">
            <label for="title_exam" class="form-label ol-form-label col-form-label sub-title-2">
                Tipo de pregunta<span class="text-danger ms-1">*</span>
            </label>
        </div>
        <div class="col-sm-12 mb-4">
            <div class="row grid grid-cols-1 sm:grid-cols-3 gap-3" style="justify-content: center; font-size: 14px;">
                <div class="row col-sm-4 px-4">
                    <input type="radio" class="btn-check" name="option_value" id="btn1" value="mcq" checked onchange="changeQuestionType(this); selectQuestionType(this)">
                    <label class="btn btn-outline-primary" for="btn1"
                        style="padding: 16px; color: #364153; font-weight: 500; background-color: #fff; border: 2px solid #99a1af; border-radius: 16px;"
                        onmouseover="this.style.border='2px solid #1a2332'" onmouseout="handleQuestionMouseOut(this)"
                    >
                        Opción múltiple
                    </label>
                </div>
                <div class="row col-sm-4 px-4">
                    <input type="radio" class="btn-check" name="option_value" id="btn2" value="true_false" onchange="changeQuestionType(this); selectQuestionType(this)">
                    <label class="btn btn-outline-primary" for="btn2"
                        style="padding: 16px; color: #364153; font-weight: 500; background-color: #fff; border: 2px solid #99a1af; border-radius: 16px;"
                        onmouseover="this.style.border='2px solid #1a2332'" onmouseout="handleQuestionMouseOut(this)"
                    >
                        Verdadero/Falso
                    </label>
                </div>
                <div class="row col-sm-4 px-4">
                    <input type="radio" class="btn-check" name="option_value" id="btn3" value="fill_blanks" onchange="changeQuestionType(this); selectQuestionType(this)">
                    <label class="btn btn-outline-primary" for="btn3"
                        style="padding: 16px; color: #364153; font-weight: 500; background-color: #fff; border: 2px solid #99a1af; border-radius: 16px;"
                        onmouseover="this.style.border='2px solid #1a2332'" onmouseout="handleQuestionMouseOut(this)"
                    >
                        Respuesta abierta
                    </label>
                </div>
            </div>
        </div>
        <div class="col-sm-12 mb-4">
            <label for="question" class="form-label ol-form-label col-form-label sub-title-2">
                Pregunta<span class="text-danger ms-1">*</span>
            </label>
            <textarea rows="3" name="question" id="question" class="form-control ol-form-control new-input mb-2" required></textarea>
        </div>

        <div id="js-alert-container"></div>

        <!-- Opcion mcq -->
        <div id="section-mcq">
            <div class="col-sm-12 mb-2" style="display: flex; align-items: center; justify-content: space-between; color: #364153; font-weight: 500;">
                <label class="form-label ol-form-label col-form-label sub-title-2">
                    Opciones de respuesta<span class="text-danger ms-1">*</span>
                </label>
                <button type="button" style="display: flex; align-items: center; gap: 6px; color: #fff; background-color: #1a2332; border-radius: 12px; font-size: 14px"
                    class="btn" onmouseover="this.style.backgroundColor='#2a3342'" onmouseout="this.style.backgroundColor='#1a2332'"
                    onclick="addMcqOption()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" 
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" 
                        stroke-linejoin="round" class="lucide lucide-plus" aria-hidden="true">
                        <path d="M5 12h14"></path><path d="M12 5v14"></path>
                    </svg>
                    Agregar opción
                </button>
            </div>

            <div class="col-sm-12">
                <div id="mcq-options"></div>
                <p style="margin-top: 8px; color: #6a7282; font-size: 14px;">
                    Seleccion el circulo de la respuesta correcta
                </p>
            </div>
        </div>

        <!-- Verdadero/Falso -->
        <div id="section-true_false" style="display:none;">
            <div class="col-sm-12">
                <label for="question" class="form-label ol-form-label col-form-label sub-title-2 mb-3">
                    Respuesta correcta<span class="text-danger ms-1">*</span>
                </label>
            </div>
            <div class="col-sm-12">
                <div class="d-flex gap-4 mb-3">
                    <label class="tf-label" data-type="true" onclick="selectTrueFalse(this)"
                        style="display:flex; flex:1; justify-content:center; align-items:center; gap:12px; padding:16px; border:2px solid #d1d5dc; border-radius:16px; transition:.15s;">
                        <input type="radio" name="response" value="true" hidden>
                        <span class="true_false_radio"
                            style="width: 20px; height: 20px; border-radius: 50%; border: 2px solid #1a2332; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        </span>
                        <span style="font-weight:500;color:#364153;">Verdadero</span>
                    </label>

                    <label class="tf-label" data-type="false" onclick="selectTrueFalse(this)"
                        style="display:flex; flex:1; justify-content:center; align-items:center; gap:12px; padding:16px; border:2px solid #d1d5dc; border-radius:16px; transition:.15s;">
                        <input type="radio" name="response" value="false" hidden>
                        <span class="true_false_radio" 
                            style="width: 20px; height: 20px; border-radius: 50%; border: 2px solid #1a2332; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                        </span>
                        <span style="font-weight:500;color:#364153;">Falso</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="col-sm-12" style="display: flex; justify-content: center;">
            <button style="margin-top: 30px; width: 40%; color: #fff; background-color: #1A2332; font-weight: 500; padding-block: 12px; padding-inline: 24px; border-radius: 16px; transition-duration: 0.2s;"
                onmouseover="this.style.boxShadow='0 10px 20px -5px #1a2332'" onmouseout="this.style.boxShadow='none'" type="submit">
                Añadir pregunta
            </button>
        </div>
    </div>
</form>

<script>
    function resetQuestionModal() {
        const form = document.getElementById('questionForm');
        if (!form) return;
        form.reset();
        document.getElementById('mcq-options').innerHTML = '';
        document.querySelectorAll('input[name="response"]').forEach(r => r.checked = false);
        document.querySelectorAll('.tf-label').forEach(l => {
            l.style.borderColor = '#d1d5dc';
            l.style.backgroundColor = '#fff';
            l.querySelector('.true_false_radio').innerHTML = '';
        });
        document.getElementById('js-alert-container').innerHTML = '';
        const mcqRadio = document.getElementById('btn1');
        mcqRadio.checked = true;
        changeQuestionType(mcqRadio);
        selectQuestionType(mcqRadio);
        addMcqOption();
        addMcqOption();
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

    function reindexMcqOptions() {
        document.querySelectorAll('#mcq-options .mcq-row').forEach((row, index) => {
            row.dataset.index = index;
            const radio = row.querySelector('input[type="radio"]');
            radio.value = index;
            const input = row.querySelector('input[type="text"]');
            input.placeholder = `Opción ${index + 1}`;
        });
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

        examQuestions.push(question);
        renderQuestions();
        closeAjaxModal();
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

    (function initQuestionModal() {
        resetQuestionModal();
    })();
</script>

