<style>
    .block_text_editor {
        width: 100%;
        border: 1px solid #e2dcff;
        border-radius: 6px;
        padding: 6px;
        font-size: 12px;
    }

    .block_label {
        font-size: 12px;
        font-weight: 100;
    }

    .block_editor_number_first {
        width: 50px;
        border: 1px solid #e2dcff;
        border-radius: 5px 0px 0px 5px;
        margin-right: -5px;
        font-size: 12px;
        padding: 0px 0px 0px 8px;
        color: #585858;
    }

    .block_editor_number_middle {
        width: 50px;
        border: 1px solid #e2dcff;
        border-radius: 0px 0px 0px 0px;
        margin-right: -5px;
        font-size: 12px;
        padding: 0px 0px 0px 8px;
        color: #585858;
    }

    .block_editor_number_last {
        width: 50px;
        border: 1px solid #e2dcff;
        border-radius: 0px 5px 5px 0px;
        margin-right: -5px;
        font-size: 12px;
        padding: 0px 0px 0px 8px;
        color: #585858;
    }

    .block_editor_select {
        border: 1px solid #e2dcff;
        border-radius: 5px 5px 5px 5px;
        font-size: 12px;
        color: #585858;
        height: 25px;
        margin: 5px;
    }
</style>
<!-- Editor for  text -->
@if ($content_type == 'text')
    <div class="">
        <div class="block_label py-2">{{ get_phrase('Text editor') }}</div>
        <textarea class="block_text_editor py-3" name="" id="text_editor" rows="5"></textarea>

        <div class="row py-3">
            <div class="col-md-9">
                <div class="block_label">{{ get_phrase('Text color') }}</div>
            </div>
            <div class="col-md-3">
                <input type="color" id="color_editor" />
            </div>
        </div>
    </div>
@endif

<!-- Editor for  image -->
@if ($content_type == 'image')
    <div class="">
        <div class="block_label py-2">{{ get_phrase('Image editor') }}</div>
        <img src="" alt="" id="image_editor" class="w-25 border mb-2">
        <input type="file" id="image_uploader">
    </div>
@endif
<hr>
<!-- Commong styles -->
<div class="py-1">
    <div class="block_label">{{ get_phrase('Padding') }}</div>
    <input type="number" id="content_padding_top" class="block_editor_number_first">
    <input type="number" id="content_padding_right" class="block_editor_number_middle">
    <input type="number" id="content_padding_bottom" class="block_editor_number_middle">
    <input type="number" id="content_padding_left" class="block_editor_number_last">
</div>
<div class="py-1">
    <div class="block_label">{{ get_phrase('Margin') }}</div>
    <input type="number" id="content_margin_top" class="block_editor_number_first">
    <input type="number" id="content_margin_right" class="block_editor_number_middle">
    <input type="number" id="content_margin_bottom" class="block_editor_number_middle">
    <input type="number" id="content_margin_left" class="block_editor_number_last">
</div>
<div class="py-1">
    <div class="block_label">{{ get_phrase('Border') }}</div>
    <input type="number" id="content_border_top" class="block_editor_number_first">
    <input type="number" id="content_border_right" class="block_editor_number_middle">
    <input type="number" id="content_border_bottom" class="block_editor_number_middle">
    <input type="number" id="content_border_left" class="block_editor_number_last">
    <select class="block_editor_select" id="content_border_style">
        <option value="">{{ get_phrase('none') }}</option>
        <option value="solid">{{ 'solid' }}</option>
        <option value="dashed">{{ get_phrase('dashed') }}</option>
        <option value="dotted">{{ get_phrase('dotted') }}</option>
    </select>

</div>
<div class="py-1">
    <div class="block_label">{{ get_phrase('Border roundness') }}</div>
    <input type="number" id="content_border_radius_top" class="block_editor_number_first">
    <input type="number" id="content_border_radius_right" class="block_editor_number_middle">
    <input type="number" id="content_border_radius_bottom" class="block_editor_number_middle">
    <input type="number" id="content_border_radius_left" class="block_editor_number_last">
</div>

<div class="">
    <div class="row py-3">
        <div class="col-md-9">
            <div class="block_label">{{ get_phrase('Border color') }}</div>
        </div>
        <div class="col-md-3">
            <input type="color" id="border_color_editor" />
        </div>
    </div>
</div>

<div class="">
    <div class="row py-3">
        <div class="col-md-9">
            <div class="block_label">{{ get_phrase('Background color') }}</div>
        </div>
        <div class="col-md-3">
            <input type="color" id="background_color_editor" />
        </div>
    </div>
</div>


{{ $parent_block_id }}
{{ $content_type }}
<script>
    "use strict";
    // Editor for all content
    function update_content() {
        // Change content padding
        $("#" + {{ $parent_block_id }}).css('padding-top', $('#content_padding_top').val());
        $("#" + {{ $parent_block_id }}).css('padding-right', $('#content_padding_right').val());
        $("#" + {{ $parent_block_id }}).css('padding-bottom', $('#content_padding_bottom').val());
        $("#" + {{ $parent_block_id }}).css('padding-left', $('#content_padding_left').val());

        // Change content margin
        $("#" + {{ $parent_block_id }}).css('margin-top', $('#content_margin_top').val());
        $("#" + {{ $parent_block_id }}).css('margin-right', $('#content_margin_right').val());
        $("#" + {{ $parent_block_id }}).css('margin-bottom', $('#content_margin_bottom').val());
        $("#" + {{ $parent_block_id }}).css('margin-left', $('#content_margin_left').val());

        // Change content border
        $("#" + {{ $parent_block_id }}).css('border-top-width', $('#content_border_top').val());
        $("#" + {{ $parent_block_id }}).css('border-right-width', $('#content_border_right').val());
        $("#" + {{ $parent_block_id }}).css('border-bottom-width', $('#content_border_bottom').val());
        $("#" + {{ $parent_block_id }}).css('border-left-width', $('#content_border_left').val());

        // Change content border style
        $("#" + {{ $parent_block_id }}).css('border-style', $('#content_border_style').val());

        // Change content border color
        $("#" + {{ $parent_block_id }}).css('border-color', rgbToHex($('#border_color_editor').val()));

        // Change content border radius
        console.log($('#content_border_radius_top').val())
        $("#" + {{ $parent_block_id }}).css('border-top-left-radius', $('#content_border_radius_top').val() + 'px');
        $("#" + {{ $parent_block_id }}).css('border-top-right-radius', $('#content_border_radius_right').val() + 'px');
        $("#" + {{ $parent_block_id }}).css('border-bottom-right-radius', $('#content_border_radius_bottom').val() + 'px');
        $("#" + {{ $parent_block_id }}).css('border-bottom-left-radius', $('#content_border_radius_left').val() + 'px');

    }

    function update_background_color() {

        // Change content background color
        $("#" + {{ $parent_block_id }}).css('background-color', rgbToHex($('#background_color_editor').val()));

    }

    $(document).ready(function() {

        // Get the padding value
        $("#content_padding_top").val($("#" + {{ $parent_block_id }}).css('padding-top').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_padding_right").val($("#" + {{ $parent_block_id }}).css('padding-right').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_padding_bottom").val($("#" + {{ $parent_block_id }}).css('padding-bottom').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_padding_left").val($("#" + {{ $parent_block_id }}).css('padding-left').match(/\d+/g)[0]) // remove 'px' by regular expression

        // Bind the padding editor, number typed|mouse clicked|arrow up/down
        $('#content_padding_top').on('keyup change', function() {
            update_content()
        })
        $('#content_padding_right').on('keyup change', function() {
            update_content()
        })
        $('#content_padding_bottom').on('keyup change', function() {
            update_content()
        })
        $('#content_padding_left').on('keyup change', function() {
            update_content()
        })

        // Get the margin value
        $("#content_margin_top").val($("#" + {{ $parent_block_id }}).css('margin-top').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_margin_right").val($("#" + {{ $parent_block_id }}).css('margin-right').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_margin_bottom").val($("#" + {{ $parent_block_id }}).css('margin-bottom').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_margin_left").val($("#" + {{ $parent_block_id }}).css('margin-left').match(/\d+/g)[0]) // remove 'px' by regular expression

        // Bind the margin editor, number typed|mouse clicked|arrow up/down
        $('#content_margin_top').on('keyup change', function() {
            update_content()
        })
        $('#content_margin_right').on('keyup change', function() {
            update_content()
        })
        $('#content_margin_bottom').on('keyup change', function() {
            update_content()
        })
        $('#content_margin_left').on('keyup change', function() {
            update_content()
        })

        // Get the border value
        $("#content_border_top").val($("#" + {{ $parent_block_id }}).css('border-top-width').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_border_right").val($("#" + {{ $parent_block_id }}).css('border-right-width').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_border_bottom").val($("#" + {{ $parent_block_id }}).css('border-bottom-width').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_border_left").val($("#" + {{ $parent_block_id }}).css('border-left-width').match(/\d+/g)[0]) // remove 'px' by regular expression

        // Bind the border editor, number typed|mouse clicked|arrow up/down
        $('#content_border_top').on('keyup change', function() {
            update_content()
        })
        $('#content_border_right').on('keyup change', function() {
            update_content()
        })
        $('#content_border_bottom').on('keyup change', function() {
            update_content()
        })
        $('#content_border_left').on('keyup change', function() {
            update_content()
        })

        // Get the border style
        $("#content_border_style").val($("#" + {{ $parent_block_id }}).css('border-style'))
        // Bind the border style editor
        $('#content_border_style').on('change', function() {
            update_content()
        })

        // Get the border color
        $('#border_color_editor').val(rgbToHex($("#" + {{ $parent_block_id }}).css('border-color')))
        // Bind the border color
        $('#border_color_editor').on('change', function() {
            update_content()
        })

        // Get the background color
        $('#background_color_editor').val(rgbToHex($("#" + {{ $parent_block_id }}).css('background-color')))
        // Bind the background color
        $('#background_color_editor').on('change', function() {
            update_background_color()
        })

        // Get the border radius value
        $("#content_border_radius_top").val($("#" + {{ $parent_block_id }}).css('border-top-left-radius').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_border_radius_right").val($("#" + {{ $parent_block_id }}).css('border-top-right-radius').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_border_radius_bottom").val($("#" + {{ $parent_block_id }}).css('border-bottom-right-radius').match(/\d+/g)[0]) // remove 'px' by regular expression
        $("#content_border_radius_left").val($("#" + {{ $parent_block_id }}).css('border-bottom-left-radius').match(/\d+/g)[0]) // remove 'px' by regular expression

        // // Bind the border radius editor, number typed|mouse clicked|arrow up/down
        $('#content_border_radius_top').on('keyup change', function() {
            update_content()
        })
        $('#content_border_radius_right').on('keyup change', function() {
            update_content()
        })
        $('#content_border_radius_bottom').on('keyup change', function() {
            update_content()
        })
        $('#content_border_radius_left').on('keyup change', function() {
            update_content()
        })
    });

    // Editor for text
    @if ($content_type == 'text')


        $(document).ready(function() {
            // get the text value by advacned dom query
            let editing_text = $("#" + {{ $parent_block_id }}).contents().filter(function() {
                return this.nodeType === 3; // Filter only text nodes
            })
            $("#text_editor").val(editing_text[0]['data'])

            // Get the color value
            let text_color = $("#" + {{ $parent_block_id }}).css('color')
            text_color = rgbToHex(text_color)
            $('#color_editor').val(text_color)

            // Bind the editors on change event
            $('#text_editor').on('keyup', function() {
                update_text()
            })
            $('#color_editor').change(function() {
                update_text()
            })
        });

        function update_text() {
            // Change text value
            let new_text = $("#text_editor").val()
            if (new_text == "") new_text = " "
            $("#" + {{ $parent_block_id }}).contents().filter(function() {
                return this.nodeType === 3; // Filter only text nodes
            }).replaceWith(new_text);

            // Change text color
            $("#" + {{ $parent_block_id }}).css('color', rgbToHex($("#color_editor").val()));


        }
    @endif

    // Editor for image
    @if ($content_type == 'image')
        $(document).ready(function() {
            // Find the editing image source first
            var imgSrc = $("#" + {{ $parent_block_id }}).find('img').attr('src');
            console.log(imgSrc)
            $("#image_editor").attr('src', imgSrc)


        });

        // Bind the uploader to upload new image and update the source
        $(document).ready(function() {
            $('#image_uploader').change(function() {
                var file = this.files[0]; // Get the selected file

                // Check if a file is selected
                if (file) {
                    var formData = new FormData(); // Create a FormData object

                    formData.append('file', file); // Append the file to the FormData object with 'file' as the key
                    formData.append('remove_file', $('#image_editor').attr('src')); // Append the file to the FormData object with 'file' as the key

                    // Perform AJAX request to upload the file
                    $.ajax({
                        url: "{{ route('admin.page.layout.image.update') }}", // Replace 'upload.php' with your server-side script URL
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: formData,
                        processData: false, // Prevent jQuery from automatically processing the data
                        contentType: false, // Prevent jQuery from automatically setting the Content-Type header
                        success: function(response) {
                            // Handle the success response
                            console.log(response);
                            // Now change the source
                            $("#" + {{ $parent_block_id }}).find('img').attr('src', response);
                        },
                        error: function(xhr, status, error) {
                            // Handle the error
                            console.error('Error uploading file:', error);
                        }
                    });
                }
            });
        });
    @endif

    // Required for color code conversion | it's a common function
    function rgbToHex(rgb) {
        // Parse the RGB components using regex
        var match = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

        // Convert the parsed RGB components to hexadecimal
        if (match) {
            return '#' +
                ('0' + parseInt(match[1], 10).toString(16)).slice(-2) +
                ('0' + parseInt(match[2], 10).toString(16)).slice(-2) +
                ('0' + parseInt(match[3], 10).toString(16)).slice(-2);
        }
        // If RGB format is incorrect, return original value
        else {
            return rgb;
        }
    }

    function update_block(block_id) {


    }
</script>
