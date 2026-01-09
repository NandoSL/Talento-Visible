<div class="row px-2">
    <div class="col-sm-8">
        <label class="pt-1 form-label" style="color: #101828; font-weight: 600;">Verificaciones de seguridad</label>
    </div>

    <div class="col-sm-4">
        <div style="padding-top: 5px; width: 100%; text-align: center; background-color: #eff6ff; border-radius: 5px;">
            <span class="fas fa-shield-alt me-1" style="color: blue;"></span>
            <label class="form-label" style="color: #1c398e; font-weight: 500;">Modo seguro</label>
        </div>
    </div>

    <div class="col-sm-12 col-form-label mt-3 p-2" style="background-color: #101828; border-radius: 10px; border: 5px solid #e5e7eb;">
        <button class="btn ol-btn-primary float-end" style="padding: 5px; background-color: #e7000b;">
            GRABANDO
        </button>
        <video id="videoPreview" autoplay playsinline style="width: 100%; height: 220px; background: #000; transform: scaleX(-1);"></video>
    </div>

    <!-- AQUI AGREGAMOS EL VIDEO Y EL MENSAJE -->
    <div class="col-sm-12 mt-3 text-center">
        <h3 id="tituloPermisos" style="color:black; text-align:center;">
            Solicitando permisos...
        </h3>

    </div>
</div>


<script>
    const video = document.getElementById("videoPreview");
    const titulo = document.getElementById("tituloPermisos");

    async function iniciarCamara() {
        try {
            const stream = await navigator.mediaDevices.getUserMedia({
                video: true,
                audio: true
            });

            // Mostrar video
            video.srcObject = stream;

            // Cambiar el título cuando los permisos se otorguen
            titulo.textContent = "Permisos completos";

        } catch (error) {
            titulo.textContent = "Permisos denegados o error al acceder a la cámara";
            console.error(error);
        }
    }

    iniciarCamara();
</script>
