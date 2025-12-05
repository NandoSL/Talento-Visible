<input type="hidden" name="lesson_type" value="system-video">
<input type="hidden" name="lesson_provider" value="system_video">

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Upload system video file') }}</label><span class="text-danger ms-1">*</span>
    <div class="input-group">
        <div class="custom-file w-100">
            <input type="file" class="form-control ol-form-control" id="system_video_file" name="system_video_file" required>
        </div>
    </div>
</div>

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Duration') }}</label><span class="text-danger ms-1">*</span>
    {{-- <input class="form-control ol-form-control duration-picker" id="duration_picker_field" name="duration"> --}}
    <div class="row" style="text-align: center">
        <div class="col-4">
            <label for="">Horas</label>
            <input class="form-control ol-form-control" type="number" min="0" max="23" name="hour"
                placeholder="00 hour"
                style="text-align: center"
                required>
        </div>
        <div class="col-4">
            <label for="">Minutos</label>
            <input class="form-control ol-form-control" type="number" min="0" max="59" name="minute"
                placeholder="00 minute"
                style="text-align: center"
                required>
        </div>
        <div class="col-4">
            <label for="">Segudos</label>
            <input class="form-control ol-form-control" type="number" min="0" max="59" name="second"
                placeholder="00"
                value="00"
                style="text-align: center"
                required>
        </div>
    </div>
</div>


<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Caption') }}( {{ get_phrase('.vtt') }})</label>
    <div class="input-group">
        <div class="custom-file w-100">
            <input type="file" class="form-control ol-form-control" id="caption" name="caption" accept=".vtt">
        </div>
    </div>
</div>


<script>
    "use strict";
    initializeDurationPickers([".duration-picker"]);
</script>
