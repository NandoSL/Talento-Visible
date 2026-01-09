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
<div class="row pb-3 mb-4">
    <div class="col-sm-12 col-form-label text-end pe-5">
        <a href="#" onclick="ajaxModal('{{ route('modal', ['admin.questions_exam.create', 'id' => $course_id]) }}', 'Añadir pregunta', 'modal-xl')" class="btn-add-question w-auto">
            <span class="fas fa-plus" style="vertical-align: middle; display: flex; width: 18px;"></span>
            Añadir pregunta
        </a>
    </div>

    <div class="col-md-12 px-4 py-3" style="width: 100%;">
        <div id="questions-container" class="row"></div>
    </div>
</div>
<script>
    let examQuestions = @json($questions ?? []);
    console.log($questions);

    document.addEventListener('DOMContentLoaded', () => {
        renderQuestions();
    });

    function toggleQuestion(index) {
        examQuestions[index].expanded = !examQuestions[index].expanded;
        renderQuestions();
    }

    function removeQuestion(index) {
        examQuestions.splice(index, 1);
        renderQuestions();
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

    function renderQuestions() {
        const container = document.getElementById('questions-container');
        container.innerHTML = '';
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