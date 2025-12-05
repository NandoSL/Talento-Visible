<input type="hidden" name="lesson_type" value="system-video">
<input type="hidden" name="lesson_provider" value="system_video">

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Upload system video file') }}</label>
    <div class="input-group">
        <div class="custom-file w-100">
            <input type="file" class="form-control ol-form-control" id="system_video_file" name="system_video_file"
                onchange="changeTitleOfImageUploader(this)">
        </div>
    </div>
</div>

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Duration') }}</label>
    <small class="form-label text-12px d-hidden mb-0" id="perloader"><i class="fi-rr-loading mdi-loading "></i>
        {{ get_phrase('Analyzing') }}....</small>
    {{--
        <input value="@if (duration_to_seconds($lessons->duration) > 0) {{ $lessons->duration }}@else{{ '00:00:00' }} @endif"
            type="text" name="duration" id="duration" class="form-control ol-form-control" readonly>
    --}}
    <br>
    <div class="row">
        <div class="col-4">
            <label for="">Horas</label>
            <input class="form-control ol-form-control" type="number" min="0" max="23" name="hour"
                placeholder="00 hrs"
                style="text-align: center"
                value="{{ transform_time($lessons->duration, 0) }}"
                required>
        </div>
        <div class="col-4">
            <label for="">Minutos</label>
            <input class="form-control ol-form-control" type="number" min="0" max="59" name="minute"
                placeholder="00 min"
                style="text-align: center"
                value="{{ transform_time($lessons->duration, 1) }}"
                required>
        </div>
        <div class="col-4">
            <label for="">Segudos</label>
            <input class="form-control ol-form-control" type="number" min="0" max="59" name="second"
                placeholder="00 seg"
                style="text-align: center"
                value="{{ transform_time($lessons->duration, 2) }}"
                required>
        </div>
    </div>
</div>

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Caption') }}( {{ get_phrase('.vtt') }})</label>
    <div class="input-group">
        <div class="custom-file w-100">
            <input type="file" class="form-control ol-form-control" id="caption" name="caption"
                onchange="changeTitleOfImageUploader(this)" accept=".vtt">
        </div>
    </div>
</div>

<script>

    "use strict";
    initializeDurationPickers([".duration-picker"]);
</script>
