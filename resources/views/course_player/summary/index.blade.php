<div class="tab-pane fade @if ($tab == 'summary') show active @endif" id="pills-summary" role="tabpanel" aria-labelledby="pills-summary-tab" tabindex="0" >
    <div class="summery-tab-content" style="padding:0 2rem; color: #000 !important;">
        <div class="info-summary">
            {!! removeScripts($lesson_details->summary ?? '') !!}
        </div>
    </div>
</div>
