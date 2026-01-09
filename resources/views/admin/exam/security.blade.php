@push('css')
<style>
    .new-section {
        
    }

    .new-sub-section {
        
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
<form action="{{ route('admin.exam.security', [$course_id, $exam_id]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- <div class="row m-1 pb-4" style="padding: 10px; border: 1px solid #ebe6e7; border-radius: 15px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -4px rgba(0,0,0,0.1);"> -->
    <div class="col-md-12">
        <label for="course" style="width: 100%; padding: 10px; border-radius: 16px; border: 1px solid #ebe6e7; background-color: #fbf9fa; {{ $security->type == 'draft' ? 'cursor: pointer;' : '' }}">
            <input class="ol-form-control mx-3" type="checkbox" id="course" name="fullCourse" value="1" {{ $security->course_completed ? 'checked' : '' }} {{ $security->type == 'published' ? 'disabled' : '' }}>
            <span class="title1">
                <span class="far fa-check-circle me-1"></span>
                Curso completo al 100%
            </span>
            <div class="tag ms-5" style="color: #1e2939;">
                El estudiante debe completar el curso antes de poder tomar este examen.
            </div>
        </label>
        
        <label for="recording" style="width: 100%; margin-top: 15px; padding: 10px; border-radius: 16px; border: 1px solid #bedbff; background-color: #eef2ff; {{ $security->type == 'draft' ? 'cursor: pointer;' : '' }}">
            <input class="ol-form-control mx-3" type="checkbox" id="recording" name="recording" value="1" {{ $security->camera_screen_record ? 'checked' : '' }} {{ $security->type == 'published' ? 'disabled' : '' }}>
            <span class="title fs-16">
                <span class="fas fa-camera me-1" style="color: #1447e6;"></span>
                <span class="fas fa-desktop me-1" style="color: #1447e6;"></span>
                Grabación de cámara web y pantalla
            </span>
            <div class="tag ms-5" style="color: #193cb8;">
                Se grabará la cámara web y la pantalla del estudiante durante todo el examen. Las grabaciones se guardarán como evidencia.
            </div>
        </label>
    
        <label for="person_detection" style="width: 100%; margin-top: 15px; padding: 10px; border-radius: 16px; border: 1px solid #e9d4ff; background-color: #fdf2f8; {{ $security->type == 'draft' ? 'cursor: pointer;' : '' }}">
            <input class="ol-form-control mx-3" type="checkbox" id="person_detection" name="personDetection" value="1" {{ $security->person_detection ? 'checked' : '' }} {{ $security->type == 'published' ? 'disabled' : '' }}>
            <span class="title fs-16">
                <span class="fas fa-users me-1" style="color: #8200db;"></span>
                Detección de múltiples personas
            </span>
            <div class="tag ms-5" style="color: #6e11b0;">
                Verifica que solo haya una persona frente a la cámara. Si se detectan 0 o más de 1 persona, el examen no podrá iniciarse.
            </div>
        </label>
        
        <label for="window_detection" style="width: 100%; margin-top: 15px; padding: 10px; border-radius: 16px; border: 1px solid #fee685; background-color: #fff7ed; {{ $security->type == 'draft' ? 'cursor: pointer;' : '' }}">
            <input class="ol-form-control mx-3" type="checkbox" id="window_detection" name="windowDetection" value="1" {{ $security->window_detection ? 'checked' : '' }} {{ $security->type == 'published' ? 'disabled' : '' }}>
            <span class="title fs-16">
                <span class="fas fa-eye me-1" style="color: #bb4d00;"></span>
                Detección de cambio de pestaña/ventana
            </span>
            <div class="tag ms-5" style="color: #973c00;">
                Si el estudiante cambia de pestaña, ventana o pierde el foco, el examen se cancelará automáticamente.
            </div>
        </label>
        
        <label for="block" style="width: 100%; margin-top: 15px; padding: 10px; border-radius: 16px; border: 1px solid #ffc9c9; background-color: #fff1f2; {{ $security->type == 'draft' ? 'cursor: pointer;' : '' }}">
            <input class="ol-form-control mx-3" type="checkbox" id="block" name="block" value="1" {{ $security->keyboard_events ? 'checked' : '' }} {{ $security->type == 'published' ? 'disabled' : '' }}>
            <span class="title fs-16">
                <span class="fas fa-exclamation-triangle me-1" style="color: #c10007;"></span>
                Bloqueo de combinaciones de teclas
            </span>
            <div class="tag ms-5" style="color: #9f0712;">
                Bloquea copiar, pegar, captura de pantalla y clic derecho. Cualquier intento cancelará el examen.
            </div>
        </label>

        @if ($security->type == 'draft')   
        <button style="margin-top: 15px; width: 100%; color: #fff; background-color: #1A2332; font-weight: 500; padding-block: 12px; padding-inline: 24px; border-radius: 16px; transition-duration: 0.2s;"
            onmouseover="this.style.boxShadow='0 10px 20px -5px #1a2332'" onmouseout="this.style.boxShadow='none'" type="submit">
            CONFIRMAR SEGURIDAD
        </button>
        @endif
    </div>
    <!-- </div> -->
</form>