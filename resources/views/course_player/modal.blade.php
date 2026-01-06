<!-- AJAX MODAL -->
<div class="modal fade" id="ajaxModal1" tabindex="-1" aria-labelledby="ajaxModal1Label" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
            
            <div style="height: 35px; background: linear-gradient(to right, #f39c12, #e67e22); width: 100%;">
                <p class="text-white ps-3 pt-1 mb-0 fw-bold modal-title" style="font-size: 14px;"></p>
            </div>

            <div class="modal-body text-center p-5">

                <div class="d-flex justify-content-center mb-4">
                    <div class="rounded-4 p-3 d-flex align-items-center justify-content-center" 
                         style="background-color: #dc3545; width: 70px; height: 70px; border-radius: 15px !important;">
                        <i class="fi-rr-info text-white" style="font-size: 35px;">!</i>
                    </div>
                </div>

                <h4 class="fw-bold text-dark mb-1 modal-title"></h4>
                <p class="text-secondary small mb-4">El examen ha sido cancelado debido a violaciones detectadas.</p>

                <div class="p-3" style="background-color: #fff5f6; border: 1px solid #f8d7da; border-radius: 10px;">
                    <p class="text-danger fw-bold mb-2 small">Violaciones detectadas:</p>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="fi-rr-cross-circle text-danger me-2 small"></i>
                        <span class="text-danger small motivo"></span>
                    </div>
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


<!-- AJAX MODAL SCRIPT -->
<script type="text/javascript">
"use strict";

function ajaxModal1(motivo, title, modalClasses = 'modal-md', animation = 'fade') {

    $('#ajaxModal1 .modal-dialog')
        .removeClass('modal-sm modal-md modal-lg modal-xl modal-xxl modal-fullscreen')
        .addClass(modalClasses);

    $('#ajaxModal1').removeClass('fade').addClass(animation);

    $('#ajaxModal1 .modal-title').html(title);
    $('#ajaxModal1 .motivo').html(motivo);
    $("#ajaxModal1").modal('show');

    // $.ajax({
    //     type: 'get',
    //     url: url,
    //     success: function(response) {
    //         $('#ajaxModal1 .modal-body').html(response);
    //     }
    // });
}

</script>
