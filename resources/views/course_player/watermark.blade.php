@php
    $width = get_player_settings('watermark_width');
    $height = get_player_settings('watermark_height');
    $top = get_player_settings('watermark_top');
    $left = get_player_settings('watermark_left');
    $logo = get_player_settings('watermark_logo');
    $opacity = get_player_settings('watermark_opacity');
@endphp

<div class="watermark-container">
    <img src="{{ get_image($logo) }}"
        style="
        width:{{ $width }}px;
        position:absolute;
        top:{{ $top }}px;
        left:{{ $left }}px;
        z-index:99;
        opacity:{{ $opacity }}">
</div>
