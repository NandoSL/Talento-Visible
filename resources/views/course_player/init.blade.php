<script>
    "use strict";

    $(document).ready(function() {
        $('.flexCheckChecked').on('click', function(e) {
            const id = $(this).attr('id');
            $('#watch_history_form .lesson_id').val(id);
            $('#watch_history_form').trigger('submit');
        });

        $('#fullscreen').on('click', function(e) {
            e.preventDefault();
            $('#player_content').toggleClass('col-lg-8 col-12');
            $('#player_side_bar').toggleClass('col-lg-4 col-12');
        });

        function initializeSummernote() {
            $('textarea#summernote').summernote({
                height: 180, // set editor height
                minHeight: null, // set minimum height of editor
                maxHeight: null, // set maximum height of editor
                focus: true, // set focus to editable area after initializing summernote
                toolbar: [
                    ['color', ['color']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['para', ['ul', 'ol']],
                    ['table', ['table']],
                    ['insert', ['link']]
                ]
            });
        }

        initializeSummernote();
    });

    var formElement;
    if ($('.ajaxForm:not(.initialized)').length > 0) {
        $('.ajaxForm:not(.initialized)').ajaxForm({
            beforeSend: function(data, form) {
                var formElement = $(form);
            },
            uploadProgress: function(event, position, total, percentComplete) {},
            complete: function(xhr) {

            },
            error: function(e) {
                console.log(e);
            }
        });
        $('.ajaxForm:not(.initialized)').addClass('initialized');
    }

    $('.tagify:not(.inited)').each(function(index, element) {
        var tagify = new Tagify(element, {
            placeholder: '{{ get_phrase('Enter your keywords') }}'
        });
        $(element).addClass('inited');
    });
</script>

@if (isset($watermark_type) && $watermark_type != 'ffmpeg')
    <script>
        $(document).ready(function() {
            function updateWidthDisplay() {
                // Define maximum dimensions of the video container
                const videoContainerMaxWidth = 1900;
                const videoContainerMaxHeight = 1080;

                // Get current dimensions of the video container
                const videoContainerCurrentWidth = $('.course-video-area').width();
                const videoContainerCurrentHeight = $('.course-video-area').height();

                // Calculate ratios for resizing watermark
                const widthRatio = videoContainerMaxWidth / videoContainerCurrentWidth;
                const heightRatio = videoContainerMaxHeight / videoContainerCurrentHeight;

                // Retrieve initial watermark dimensions and positions
                const watermarkContainerInitialWidth = "{{ $width }}";
                const watermarkContainerInitialHeight = "{{ $height }}";
                const positionTop = "{{ $top }}";
                const positionLeft = "{{ $left }}";
                const opacity = "{{ $opacity }}";

                // Calculate adjusted dimensions and positions for the watermark
                const watermarkWidth = +watermarkContainerInitialWidth / widthRatio;
                const watermarkHeight = +watermarkContainerInitialHeight / heightRatio;
                const watermarkTop = (+positionTop / videoContainerMaxHeight) * videoContainerCurrentHeight;
                const watermarkLeft = (+positionLeft / videoContainerMaxWidth) * videoContainerCurrentWidth;

                // Apply CSS styles to the watermark container
                $('.watermark-container img').css({
                    'width': watermarkWidth + 'px',
                    'top': watermarkTop + 'px',
                    'left': watermarkLeft + 'px',
                    'opacity': opacity / 100
                });
            }

            // Initial call to set watermark dimensions and positions
            updateWidthDisplay();

            // Update watermark dimensions and positions on window resize
            $(window).resize(function() {
                updateWidthDisplay();
            });

            function setWatermarkPosition() {
                const videoContainerCurrentWidth = $('.course-video-area').width();
                const videoContainerCurrentHeight = $('.course-video-area').height();
                const watermarkContainerInitialWidth = "{{ $width }}";
                const watermarkContainerInitialHeight = "{{ $height }}";
                const opacity = "{{ $opacity }}";

                const top = Math.floor(Math.random() * (videoContainerCurrentHeight -
                    watermarkContainerInitialHeight + 1));
                const left = Math.floor(Math.random() * (videoContainerCurrentWidth -
                    watermarkContainerInitialWidth + 1));

                $('.watermark-container img').css({
                    'top': top + 'px',
                    'left': left + 'px',
                    'opacity': opacity / 100
                });
            }

            // append watermark in player
            function prependWatermark() {
                $.ajax({
                    type: "get",
                    url: "{{ route('player.prepend.watermark') }}",
                    success: function(response) {
                        if (response) {
                            $('.plyr__video-embed').prepend(response);
                            updateWidthDisplay();
                        }
                    }
                });
            }

            $('.plyr__poster').click(function(e) {
                e.preventDefault();
                // randomly change position of watermark
                setInterval(() => {
                    if (!$('.watermark-container img').length > 0) {
                        prependWatermark();
                    } else {
                        updateWidthDisplay();
                        setWatermarkPosition();
                    }
                }, 10000);
            });
        });
    </script>
@endif