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