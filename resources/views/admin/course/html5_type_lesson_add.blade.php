<input type="hidden" name="lesson_provider" value="html5">
<input type="hidden" name="lesson_type" value="html5">

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Video url') }}</label><span class="text-danger ms-1">*</span>
    <input type="text" id="html5_video_url" name="lesson_src" class="form-control ol-form-control"
        placeholder="{{ get_phrase('Enter your html5 video url') }}" required>
</div><br>

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Duration') }}</label><span class="text-danger ms-1">*</span>
    {{-- <input class="form-control ol-form-control duration_picker" name="duration"> --}}
    <div class="row" style="text-align: center">
        <div class="col-4">
            <label for="">Horas</label>
            <input class="form-control ol-form-control" type="number" min="0" max="23" name="hour"
                placeholder="00 hour" style="text-align: center" required>
        </div>
        <div class="col-4">
            <label for="">Minutos</label>
            <input class="form-control ol-form-control" type="number" min="0" max="59" name="minute"
                placeholder="00 minute" style="text-align: center" required>
        </div>
        <div class="col-4">
            <label for="">Segudos</label>
            <input class="form-control ol-form-control" type="number" min="0" max="59" name="second"
                placeholder="00" value="00" style="text-align: center" required>
        </div>
    </div>
</div>
<br>
<div class="form-group mb-2">
    <label
        class="form-label ol-form-label">{{ get_phrase('Thumbnail') }}<small>({{ get_phrase('The image size should be') }})</small>
    </label>
    <div class="input-group">
        <div class="custom-file w-100">
            <input type="file" class="form-control ol-form-control" id="thumbnail" name="thumbnail"
                onchange="changeTitleOfImageUploader(this)">
        </div>
    </div>
</div>

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Caption') }}( {{ get_phrase('.vtt') }} )</label>
    <div class="input-group">
        <div class="custom-file w-100">
            <input type="file" class="form-control ol-form-control" id="caption" name="caption"
                onchange="changeTitleOfImageUploader(this)" accept=".vtt">
        </div>
    </div>
</div>

<script>
    "use strict";
    initializeDurationPickers([".duration_picker"]);
</script>
