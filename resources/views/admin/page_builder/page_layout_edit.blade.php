<!DOCTYPE html>
<html lang="en">

<head>
    {{ config(['app.name' => get_settings('system_title')]) }}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ get_phrase('Edit Layout') }} | {{ config('app.name') }}</title>
    <meta content="{{ csrf_token() }}" name="csrf_token" />

    <link rel="shortcut icon" href="{{ asset(get_frontend_settings('favicon')) }}" />

    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/owl.theme.default.min.css') }}">

    <!-- Jquery Ui Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/jquery-ui.css') }}">

    <!-- Nice Select Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/nice-select.css') }}">

    <!-- Fontawasome Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/all.min.css') }}">

    <!-- FlatIcons Css -->
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-bold-rounded/css/uicons-bold-rounded.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-bold-straight/css/uicons-bold-straight.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-regular-rounded/css/uicons-regular-rounded.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-solid-rounded/css/uicons-solid-rounded.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/global/icons/uicons-solid-rounded/css/uicons-solid-rounded.css') }}" />

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/custome-front/custom-fronts.css') }}">

    <!-- Player Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/plyr.css') }}">

    <!-- Player Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/sweet_alert.css') }}">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/bootstrap.min.css') }}">

    <!-- Main Css -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/default/css/custom_style.css') }}">



    <!-- Jquery Js -->
    <script src="{{ asset('assets/frontend/default/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Js -->
    <script src="{{ asset('assets/frontend/default/js/bootstrap.bundle.min.js') }}"></script>

    <!-- nice select js -->
    <script src="{{ asset('assets/frontend/default/js/jquery.nice-select.min.js') }}"></script>

    <!-- owl carousel js -->
    <script src="{{ asset('assets/frontend/default/js/owl.carousel.min.js') }}"></script>

    <!-- Player Js -->
    <script src="{{ asset('assets/frontend/default/js/plyr.js') }}"></script>

    <!-- Jquery Ui Js -->
    <script src="{{ asset('assets/frontend/default/js/jquery-ui.min.js') }}"></script>

    <!-- price range Js -->
    <script src="{{ asset('assets/frontend/default/js/price_range_script.js') }}"></script>

    <!-- Main Js -->
    <script src="{{ asset('assets/frontend/default/js/script.js') }}"></script>
    <!-- toster file -->
    @include('frontend.default.toaster')

    <style>
        .text-30px {
            font-size: 30px;
        }
    </style>
</head>

<body>

    <!-- Builder bar -->
    <div id="editor_top_bar" class="editor_top_bar">
        <div class="container">
            <div class="row">
                <div class="col-md-5 py-3">
                    <div class="editor_title">{{ get_phrase('Page Builder') }}</div>
                </div>
                <div class="col-md-3 py-2">
                    <a class="btn btn-dark btn-lg float-end mx-1" href="{{ route('admin.pages') }}">
                        <i class="fi-rr-angle-left"> </i>{{ get_phrase('Back') }}</a>

                    <a class="btn btn-dark btn-lg float-end mx-1" target="_blank" href="{{ route('admin.page.preview', $id) }}">
                        <i class="fi-rr-eye"> </i>{{ get_phrase('Preview') }}
                    </a>
                    <button class="btn btn-dark btn-lg float-end mx-1" onclick="save_layout()">
                        <i class="fi-rr-arrow-alt-square-down"> </i>{{ get_phrase('Save') }}
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div id="main">
        @if(file_exists('public'))
            @php
                $html_code = App\Models\Builder_page::where('id', $id)->first()->html;
                $html_code = str_replace('"/uploads/', '"'.asset('').'uploads/', $html_code);
                $html_code = str_replace('"/assets/', '"'.asset('').'assets/', $html_code);
            @endphp
            {!! $html_code !!}
        @else
            {!! App\Models\Builder_page::where('id', $id)->first()->html !!}
        @endif
    </div>


    @include ('admin.page_builder.page_layout_edit_offcanvas')
    @include ('admin.toaster')
    <script>
        "use strict";

        function edit_content(editbutton) {
            let block_id = editbutton.getAttribute('edit-id')
            let content_type = $("#" + block_id).attr('content_type')
            let url = "{{ route('view', ['path' => 'admin.page_builder.page_layout_block_attributes']) }}?parent_block_id=" + block_id + '&content_type=' + content_type
            show_offcanvas(url, block_id)
        }

        function delete_block(deletebutton) {
            // Remove the block
            $(deletebutton).parent().parent().parent().remove()


            // If no block found, show a placeholder block to add new block
            if ($.trim($("#main").html()) === '') show_placeholder_block()
        }


        // Save the edited layout into database
        function save_layout() {
            // removes the options elements: buttons & borders
            $(".options").remove();

            // now extract the plain html
            let output = $("#main").html();
            if ($("#main").html().trim() === '') {
                output = "&nbsp;"
            }

            // Save the modified html codes to server
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            // Sending the ajax call
            let url = "{{ route('admin.page.layout.update', ['id' => $id]) }}";
            $.ajax({
                type: "POST",
                data: {
                    html: output,
                    id: {{ $id }}
                },
                url: url,
                success: function(msg) {
                    success('Layout updated');
                }
            });

            // Re-initiate the builder
            initiate_builder()
        }



        // Loading the saved layout from db and show editor bordrs
        $(document).ready(function() {
            initiate_builder()
        });

        function initiate_builder() {
            var section_id;
            // Remove if there is any options class exists already
            $(".options").remove();


            var divsWithAttribute = $("div.section")

            // Show the placeholder block if no section found
            if (divsWithAttribute.length == 0) {
                remove_placeholder_block() // If already exists, then remove it
                show_placeholder_block()
                return
            }
            // Bind sections with the builder guides

            for (var i = 0; i < divsWithAttribute.length; i++) {
                // Get the section id
                section_id = divsWithAttribute[i].getAttribute('id')

                var parentDiv = document.createElement('div')
                $(parentDiv).addClass("options child")
                var customHTML = `<div><button class="btn btn-lg btn-primary block_edit" onclick="edit_content(this)" edit-id="${section_id}"><i class="fi-rr-wrench-simple"></i></button> \
                                    <button class="btn btn-lg btn-primary block_delete" onclick="delete_block(this)" delete-id="${section_id}"><i class="fi-rr-cross"></i></button>\
                                    <button class="btn btn-lg btn-primary block_add" onclick="show_offcanvas('{{ route('view', ['path' => 'admin.page_builder.page_layout_blocks']) }}?parent_block_id='+this.getAttribute('add-id'));" add-id="${section_id}"><i class="fi-rr-plus"></i></button>\
                                    </div>`;
                parentDiv.innerHTML = customHTML;

                // Append the button to the current div element
                $(divsWithAttribute[i]).append(parentDiv);
            }

            // Bind texts with the builder guides
            var divsWithAttribute = $(".builder_text")
            for (var i = 0; i < divsWithAttribute.length; i++) {
                // Get the section id
                section_id = divsWithAttribute[i].getAttribute('id')

                var parentDiv = document.createElement('div')
                $(parentDiv).addClass("options child")
                var customHTML = `<div><button class="btn btn-lg btn-primary block_edit" onclick="edit_content(this)" edit-id="${section_id}"><i class="fi-rr-wrench-simple"></i></button> \
                                    <button class="btn btn-lg btn-primary block_delete" onclick="delete_block(this)" delete-id="${section_id}"><i class="fi-rr-cross"></i></button>\
                                    <button class="btn btn-lg btn-primary block_add" onclick="show_offcanvas('{{ route('view', ['path' => 'admin.page_builder.page_layout_blocks']) }}?parent_block_id='+this.getAttribute('add-id'));" add-id="${section_id}"><i class="fi-rr-plus"></i></button>\
                                    </div>`;
                parentDiv.innerHTML = customHTML;

                // Append the button to the current div element
                $(divsWithAttribute[i]).append(parentDiv);
            }

            // Bind images with the builder guides
            var divsWithAttribute = $(".builder_image")
            for (var i = 0; i < divsWithAttribute.length; i++) {
                // Get the section id
                section_id = divsWithAttribute[i].getAttribute('id')

                var parentDiv = document.createElement('div')
                $(parentDiv).addClass("options child")
                var customHTML = `<div><button class="btn btn-lg btn-primary block_edit" onclick="edit_content(this)" edit-id="${section_id}"><i class="fi-rr-wrench-simple"></i></button> \
                                    <button class="btn btn-lg btn-primary block_delete" onclick="delete_block(this)" delete-id="${section_id}"><i class="fi-rr-cross"></i></button>\
                                    <button class="btn btn-lg btn-primary block_add" onclick="show_offcanvas('{{ route('view', ['path' => 'admin.page_builder.page_layout_blocks']) }}?parent_block_id='+this.getAttribute('add-id'));" add-id="${section_id}"><i class="fi-rr-plus"></i></button>\
                                    </div>`;
                parentDiv.innerHTML = customHTML;


                // Append the button to the current div element
                $(divsWithAttribute[i]).append(parentDiv);
            }

            // Initiate sortable
            $("#main").sortable();
        }


        function show_placeholder_block() {
            var placeholder_block = `<div class="container placeholder_block_holder" id="placeholder_block">\
        <div class="row">\
            <div class="col-md-6 offset-3">\
                <div class="placeholder_block">\
                    <i class="fi-rr-cube text-30px"></i>\
                    <div>Get started by adding new blocks</div>\
                    <button class="btn btn-primary btn-lg" onclick="show_offcanvas('{{ route('view', ['path' => 'admin.page_builder.page_layout_blocks']) }}?parent_block_id='+this.getAttribute('add-id'));" add-id="main">\
                    <i class="fi-rr-square-plus"></i> Add a new block</button>\
                </div>\
            </div>\
        </div>\
    </div>`;
            $("#main").after(placeholder_block)
        }

        function remove_placeholder_block() {
            $(".placeholder_block_holder").remove()
        }
    </script>



    <style>
        .parent {
            position: relative;
            /* Add any other styles you want for the parent div */
        }

        .parent:hover {
            outline: 2px dashed black;
            display: block;
        }

        .child {
            position: absolute;
            display: none;
            float: right;
            text-align: center;
            top: 0;
            left: 0;
            width: 100%;
            cursor: move;
            margin-top: 5px;
        }

        .parent:hover>.child {
            display: block;
        }

        .block_edit {
            border-radius: 5px 0px 0px 5px !important;
            margin-right: -5px !important;
        }

        .block_delete {
            border-radius: 0px !important;
            margin-right: -5px !important;
        }

        .block_add {
            border-radius: 0px 5px 5px 0px !important;
        }


        .editor_top_bar {
            background-color: #121729;
        }

        .editor_title {
            color: #faf4ff;
            font-size: 14px;
        }

        .builder_image img {
            display: block;
        }

        .placeholder_block {
            text-align: center;
            outline: 2px dashed #c1b4d8;
            padding: 50px;
            margin-top: 50px;
            border-radius: 10px;
        }

        .placeholder_block>div {
            margin-top: 10px;
            font-size: 16px;
            margin-bottom: 20px;
            color: #12172a;
        }

        .toast {
            font-size: 13px;
        }

        /* Flaticon spacing isse fixed START*/
        i:not(.fas, .fa, .fab) {
            line-height: 1.5 !important;
            vertical-align: -0.12em !important;
            display: inline-flex !important;
            margin: 3px;
        }

        /* Flaticon spacing isse fixed END*/
    </style>

</body>

</html>
