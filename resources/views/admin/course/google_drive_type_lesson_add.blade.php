<input type="hidden" name="lesson_type" value="google_drive">
<input type="hidden" name="lesson_provider" value="drive_video">

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Video url') }}</label><span class="text-danger ms-1">*</span>
    <input type="text" id="video_url" name="lesson_src" class="form-control ol-form-control" required>
    <small class="form-label text-danger text-12px d-hidden mb-0" id="invalid_url">{{ get_phrase('Invalid url') }}. {{ get_phrase('Your video source has to be either Google drive') }}</small>
</div>

<div class="form-group mb-2">
    <label>{{ get_phrase('Duration') }}</label><span class="text-danger ms-1">*</span>
    {{-- <input id="duration" name="duration" class="form-control ol-form-control"> --}}
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

<script>
    "use strict";

    initializeDurationPickers(["#duration"]);
</script>
