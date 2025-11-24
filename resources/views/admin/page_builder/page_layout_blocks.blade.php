<style>
    .ready_block {
        width: 100%;
        padding: 5px;
        position: absolute;
        top: 0;
    }

    .block_holder {
        float: left;
        width: 48%;
        text-align: center;
        height: 100px;
        border: 1px solid #c4cdde;
        margin: 2px;
        border-radius: 5px;
        cursor: pointer;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: flex-end;
    }

    .block_holder:hover {
        border: 1px solid #97a8e4;
    }

    .block_label {
        font-size: 10px;
        font-weight: 100;
        background-color: #97a1c5;
        color: #fff;
        padding: 0px 7px;
        border-radius: 3px;
        position: absolute;
        bottom: 3px;
    }

    .d-hidden {
        display: none;
    }

    .boder-container {
        padding: 20px;
        border: 1px dotted #ccc;
    }
</style>
<!-- Pre-designed blocks -->
@foreach (App\Models\Builder_block::get() as $block)
    <div class="block_holder" onclick="insert_new_block( {{ $block->id }} )">
        <img src="{{ asset('assets/page-builder/block-thumb') . '/' . $block->id . '.png' }}" class="ready_block" />
        <div class="block_label">{{ $block->title }}</div>

    </div>
    <div id="block_storage_{{ $block->id }}" class="d-hidden">
        @if(file_exists('public'))
            @php
                $block_html = str_replace('"/uploads/', '"'.asset('').'uploads/', $block->html);
                $block_html = str_replace('"/assets/', '"'.asset('').'assets/', $block_html);
            @endphp
            {!! $block_html !!}
        @else
            {!! $block->html !!}
        @endif
    </div>
@endforeach


<!-- Basic web elements -->
<div id="basic_content" class="d-hidden">
    <button class="btn ol-btn-primary my-2" onclick="insert_new_block( '6_6' )">Insert : 6_6 </button>
    <button class="btn ol-btn-primary my-2" onclick="insert_new_block( 'youtube' )">Insert : youtube </button>

    <div id="block_storage_6_6">
        <div class="container boder-container">
            <div class="row">
                <div class="col-md-6">
                    <div class="section parent" content_type="section" id="placeholder_id">
                        Block 1
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="section parent" content_type="section" id="placeholder_id">
                        Block 2
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="block_storage_youtube">
        <p id="placeholder_id">youtube_video_embed_here</p>
    </div>
</div>

<script>
    "use strict";



    function insert_new_block(block_id) {

        // Find out the block to be inserted, which is already kept hidden in the offcanvas body
        var new_block_html = $("#block_storage_" + block_id).html()

        // Replace any placeholder id inside the new block, which will be editable further
        var substringToReplace = 'placeholder_id'
        var regex = new RegExp(substringToReplace, 'g')
        new_block_html = new_block_html.replace(regex, function() {
            return Math.floor(Math.random() * 1000); // Generate a random number (adjust range as needed)
        });

        // The parent block, inside which, the new block will be inserted
        var parent_block_id = "{{ $parent_block_id }}";

        // Prepare the new block which will be inserted
        var new_random_id = Math.floor(Math.random() * 1000)
        var block_pre_code = '<div class="section parent" id="' + new_random_id + '">'
        var block_post_code = '</div>'
        var new_block = block_pre_code + new_block_html + block_post_code

        // Remove the placeholder block if exists
        window.parent.remove_placeholder_block()

        // Append the new block.
        // If there is no block in the body, insert inside the #main block
        // Else append the new block after the currently targetted block
        if (parent_block_id == "main") {
            $("#main").html(new_block)
        } else {
            $("#" + parent_block_id).after(new_block)
        }

        // Initiate the builder engine
        window.parent.initiate_builder()

        // Close the offcanvas
        offcanvas.hide()


    }
</script>
