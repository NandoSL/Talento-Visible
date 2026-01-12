<div class="row px-2">
    <div class="row col-sm-12 col-form-label" style="text-align: center; justify-content: center;">
        <div style="width: 64px; height: 64px; background-color: #fef3c6; border-radius: 38px; display: flex; justify-content: center; align-items: center; margin-bottom: 24px;">
            <span class="fas fa-exclamation-triangle" style="scale: 1.5; color: #e17100;"></span>
        </div>
        <h3 style="color: #101828; font-size: 20px; font-weight: 600; margin-bottom: 16px;">Ya existe un examen publicado</h3>
        <p style="color: #364153; font-size: 16px; margin-bottom: 24px;">Si deseas actualizar o remplazar el examen actual:</p>
    </div>
    
    <div class="col-sm-12 col-form-label" style="display: flex; background-color: #fef2f2; border: 1px solid #ffc9c9; border-radius: 16px; gap: 12px; padding: 16px; margin-bottom: 16px;">
        <span style="font-size: 24px;">🚮</span>
        <div>
            <p style="color: #101828; font-weight: 600; ">1. Elimina tu examen publicado</p>
            <p style="color: #4a5565; font-size: 14px;">Borra el examen actual de la lista</p>
        </div>
    </div>
    <div class="col-sm-12 col-form-label" style="display: flex; background-color: #eff6ff; border: 1px solid #bedbff; border-radius: 16px; gap: 12px; padding: 16px; margin-bottom: 16px;">
        <span style="font-size: 24px;">📄</span>
        <div>
            <p style="color: #101828; font-weight: 600; ">2. Genera un nuevo examen</p>
            <p style="color: #4a5565; font-size: 14px;">Crea tu nuevo examen con preguntas</p>
        </div>
    </div>

    <div class="col-sm-12 col-form-label" style="display: flex; background-color: #f0fdf4; border: 1px solid #b9f8cf; border-radius: 16px; gap: 12px; padding: 16px; margin-bottom: 16px;">
        <span style="font-size: 24px;">📄</span>
        <div>
            <p style="color: #101828; font-weight: 600; ">3. Publícalo!!!</p>
            <p style="color: #4a5565; font-size: 14px;">Haz clic en publicar para activarlo</p>
        </div>
    </div>

    <button class="btn-draft" style="color: #fff; background-color: #1A2332; font-weight: 500; padding-block: 12px; padding-inline: 24px; border-radius: 16px; transition-duration: 0.2s;"
        onmouseover="this.style.boxShadow='0 10px 20px -5px #1a2332'" onmouseout="this.style.boxShadow='none'" onclick="window.location='{{ route('admin.exam.index', $id) }}'">
        VER MIS BORRADORES
    </button>
</div>