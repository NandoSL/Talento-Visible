<div class="modal fade" id="ajaxModal1" tabindex="-1" aria-labelledby="ajaxModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
            
            <div style="height: 35px; background: linear-gradient(to right, #f39c12, #e67e22); width: 100%;">
                <p class="text-white ps-3 pt-1 mb-0 fw-bold modal-title" style="font-size: 14px;"></p>
            </div>

            <div class="modal-body text-center p-4">
                <div class="d-flex justify-content-center mb-4">
                    <div class="rounded-4 p-3 d-flex align-items-center justify-content-center" 
                         style="background-color: #dc3545; width: 70px; height: 70px; border-radius: 15px !important;">
                        <i class="fi-rr-info text-white" style="font-size: 35px;">!</i>
                    </div>
                </div>

                <h4 class="fw-bold text-dark mb-1 modal-title"></h4>
                <p class="text-secondary small mb-4">El examen ha sido cancelado debido a violaciones detectadas.</p>

                <div class="p-3 mb-3" style="background-color: #fff5f6; border: 1px solid #f8d7da; border-radius: 10px;">
                    <p class="text-danger fw-bold mb-2 small">Violaciones detectadas:</p>
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="fi-rr-cross-circle text-danger me-2 small"></i>
                        <span class="text-danger small motivo"></span>
                    </div>
                </div>

                <div id="exam-stats-container" class="p-4" style="border: 2px solid #ffcc80; border-radius: 15px; background-color: #FFF6EA;">
                    
                    <div class="d-flex justify-content-center align-items-center mb-3" style="width: 100%;">
                        <div class="d-flex align-items-center" style="white-space: nowrap;">
                            <div class="display-4 fw-bold me-3" style="color: #f39c12; line-height: 1;" id="intentos-restantes">0</div>
                            
                            <div class="text-start">
                                <div class="fw-bold text-dark" style="font-size: 0.85rem; line-height: 1;">Intentos restantes</div>
                                <div class="text-muted small text-dark" style="color: black; line-height: 1.2;" id="intentos-totales-container"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="progress mb-3" style="height: 10px; background-color: #f8f9fa; border-radius: 5px;">
                        <div id="barra-intentos" class="progress-bar" role="progressbar" style="background-color: #ff8a65; width: 0%; border-radius: 5px;"></div>
                    </div>

                    <div class="p-2 border rounded-3" style="background-color: #ffff;">
                        <div id="resumen-final-container" class="small" style="color: #555; text-align: center;"></div>
                    </div>
                </div>
            </div>
            
            <div class="px-4 pb-3">
                <div class="card-custom p-3" style="background-color: #f0f7ff; border-radius: 12px; border-left: 5px solid #007bff; text-align: left;">
                    <div class="fw-bold mb-2" style="color: #0056b3; font-size: 0.9rem;">
                        💡 Recomendaciones para el próximo intento:
                    </div>
                    <ul class="list-unstyled small text-secondary mb-0">
                        <li class="mb-1">• Asegúrate de estar en un lugar tranquilo</li>
                        <li class="mb-1">• Mantén esta ventana en foco durante todo el examen</li>
                        <li class="mb-1">• No uses otras aplicaciones ni cambies de pestaña</li>
                        <li class="mb-1">• Permanece solo frente a la cámara</li>
                        <li>• Evita usar combinaciones de teclas prohibidas</li>
                    </ul>
                </div>
            </div>

            <div class="modal-footer border-0 justify-content-center pb-4">
                <button type="button" class="btn btn-dark px-5 py-2 fw-bold" data-bs-dismiss="modal" 
                        style="background-color: #1e272e; border-radius: 8px;">
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
"use strict";

function ajaxModal1(motivo, title, intentosRestantes, intentosTotales, textoHoras, modalClasses = 'modal-md', animation = 'fade') {
    $('#ajaxModal1 .modal-dialog').removeClass('modal-sm modal-md modal-lg modal-xl').addClass(modalClasses);
    $('#ajaxModal1').removeClass('fade').addClass(animation);
    $('#ajaxModal1 .modal-title').html(title);
    $('#ajaxModal1 .motivo').html(motivo);

    $('#intentos-restantes').text(intentosRestantes);
    $('#intentos-totales-container').html('de'+' ' + intentosTotales +' '+ 'intentos totales');
    let textoResumen = '⏱️ Tienes <strong style="color: #f39c12;">' + textoHoras + '</strong> para completar el examen con tus ' + intentosRestantes + ' intentos restantes.';
    $('#resumen-final-container').html(textoResumen);
    let porcentaje = (intentosRestantes / intentosTotales) * 100;
    $('#barra-intentos').css('width', porcentaje + '%');

    $("#ajaxModal1").modal('show');
}
</script>