<input type="hidden" name="lesson_type" value="google_drive">
<input type="hidden" name="lesson_provider" value="drive_video">

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Video url') }}</label>
    <input type="text" value="{{ $lessons->lesson_src }}" id="video_url" name="lesson_src"
        class="form-control ol-form-control">
    <small class="form-label text-danger text-12px d-hidden mb-0" id="invalid_url">{{ get_phrase('Invalid url') }}.
        {{ get_phrase('Your video source has to be either Google drive') }}</small>
</div>

<div class="form-group mb-2">
    <label class="form-label ol-form-label">{{ get_phrase('Duration') }}</label>
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

<script>
    "use strict";
    initializeDurationPickers(["#duration"]);
</script>
