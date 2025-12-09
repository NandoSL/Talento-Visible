@extends('layouts.instructor')
@push('title', get_phrase('Blogs'))
@push('meta')@endpush
@push('css')
    {{-- this is bootstrap tag --}}
    <link href="{{ asset('assets/backend/css/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-12px px-20px width-" style="--w:100%"  >
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Manage Blogs') }}
                </h4>
                {{-- 
                <a href="{{ route('instructor.blog.create') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                    <span class="fi-rr-plus"></span>
                    <span>{{ get_phrase('Add new blog') }}</span>
                </a>
                 --}}
            </div>
        </div>
    </div>

    <div class="bg-color-solid width- space-top rounded-t-2xl mb-3" style="--bg-color:#FFF; --w:50%; --mg-top:1%">
        <div class="row p-1">
            <div class="col width-" >
                <div class="ol-card card-hover option active p-1"data-target="#panel1" data-color="#FF8A00" style="background-color: #FF8A00;">
                    <div class="ol-card-body py-12px px-3">
                        <div class="d-flex align-content-center align-items-center ">
                            <h6 class="txt-bold fs-14px mb-1">{{ get_phrase('Manage Blogs') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col align-content-center align-items-center" >
                <div class="ol-card card-hover option p-1" data-target="#panel2" data-color="#007BFF">
                    <div class="ol-card-body py-12px px-3">
                        <div class="d-flex  cg-12px">
                            <h6 class="txt-bold fs-14px mb-1">{{ get_phrase('Add new blog') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col width-" >
                <div class="ol-card card-hover option p-1" data-target="#panel3" data-color="#28A745">
                    <div class="ol-card-body py-12px px-3">
                        <div class="d-flex align-content-center align-items-center cg-12px">
                                <h6 class="txt-bold  fs-14px mb-1">{{ get_phrase('Pending blogs') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
    <!-- Start Admin area -->
    <div id="panel1" class="panel active">
        <div class="row">
            <div class="col-12">
                <div class="ol-card p-3">
                    <div class="ol-card-body">
                        <div class="row print-d-none mt-3 mb-4">
                            <div class="col-md-6 d-flex align-items-center gap-3">
                                <div class="custom-dropdown ms-2">
                                    <button class="dropdown-header btn ol-btn-light">
                                        {{ get_phrase('Export') }}
                                        <i class="fi-rr-file-export ms-2"></i>
                                    </button>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'blogs')"><i class="fi-rr-file-pdf"></i>
                                                {{ get_phrase('PDF') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item export-btn" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" action="{{ route('instructor.blogs') }}" method="get">
                                    <div class="row row-gap-3">
                                        <div class="col-md-9">
                                            <div class="mb-3 position-relative position-relative">
                                                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search Title') }}" class="ol-form-control form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn ol-btn-primary w-100" id="submit-button" onclick="update_date_range();"> {{ get_phrase('Filter') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
    
                        @if (count($blogs) > 0)
                            <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                                <p class="admin-tInfo">
                                    {{ get_phrase('Showing') . ' ' . count($blogs) . ' ' . get_phrase('of') . ' ' . $blogs->total() . ' ' . get_phrase('data') }}
                                </p>
                            </div>
                            <div class="table-responsive course_list" id="course_list">
                                <table class="table eTable eTable-2 print-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ get_phrase('Creator') }}</th>
                                            <th scope="col">{{ get_phrase('Title') }}</th>
                                            <th scope="col">{{ get_phrase('Category') }}</th>
                                            <th scope="col">{{ get_phrase('Status') }}</th>
                                            <th scope="col" class="print-d-none">{{ get_phrase('Options') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $key => $blog)
                                            <tr>
                                                <th scope="row">
                                                    <p class="row-number">{{ $key + 1 }}</p>
                                                </th>
    
                                                <td>
                                                    <div class="dAdmin_profile d-flex align-items-center min-w-200px gap-1">
                                                        <div class="dAdmin_profile_img">
                                                            <img class="img-fluid rounded-circle image-45" width="45" height="45" src="{{ get_image($blog->thumbnail) }}" id="blog-thumbnail" />
                                                        </div>
                                                        <div class="dAdmin_profile_name">
                                                            <h4 class="title fs-14px">{{ get_user_info($blog->user_id)->name }}
                                                            </h4>
                                                            <p>{{ get_user_info($blog->user_id)->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
    
                                                <td>
                                                    <div class="dAdmin_info_name min-w-150px">
                                                        <h4 class="title fs-14px">
                                                            <a href="{{ route('blog.details', Str::slug($blog->title)) }}">
                                                                {{ $blog->title }}</a>
                                                        </h4>
                                                        <p>{{ date('D, d-M-Y', strtotime($blog->created_at)) }}</p>
                                                    </div>
                                                </td>
    
                                                <td>
                                                    @php
                                                        $category = DB::table('blog_categories')
                                                            ->where('id', $blog->category_id)
                                                            ->first();
                                                    @endphp
                                                    <div class="dAdmin_info_name min-w-150px">
                                                        <p>{{ $category->title }}</p>
                                                    </div>
                                                </td>
    
                                                <td>
                                                    <div class="dAdmin_info_name min-w-150px">
                                                        <p><span class="badge {{ $blog->status ? 'bg-success' : 'bg-danger' }} text-white">{{ get_phrase($blog->status ? 'Active' : 'Inactive') }}</span>
                                                        </p>
                                                    </div>
                                                </td>
    
                                                <td class="print-d-none">
                                                    <div class="dropdown ol-icon-dropdown ol-icon-dropdown-transparent">
                                                        <button class="btn ol-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span class="fi-rr-menu-dots-vertical"></span>
                                                        </button>
    
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="{{ route('instructor.blog.edit', ['id' => $blog->id]) }}">{{ get_phrase('Edit') }}</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#" onclick="confirmModal('{{ route('instructor.blog.delete', $blog->id) }}')">{{ get_phrase('Delete') }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            @include('instructor.no_data')
                        @endif
                        <!-- Data info and Pagination -->
                        @if (count($blogs) > 0)
                            <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                                <p class="admin-tInfo">
                                    {{ get_phrase('Showing') . ' ' . count($blogs) . ' ' . get_phrase('of') . ' ' . $blogs->total() . ' ' . get_phrase('data') }}
                                </p>
                                {{ $blogs->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="panel2" class="panel">
        <div class="row ">
            <div class="col-12">
                <div class="ol-card p-4">
                    <div class="ol-card-body">
                        <form action="{{ route('instructor.blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="mb-3">
                                        <label class="form-label ol-form-label" for="title">{{ get_phrase('Title') }}</label>
                                        <input type="text" class="form-control ol-form-control" name="title" id="title" placeholder="{{ get_phrase('Enter blog title') }}" required>
                                    </div>
                                </div>
    
                                <div class="col-sm-4">
                                    <div class="mb-3">@php
                                                        $category = DB::table('blog_categories')->get();
                                                    @endphp
                                        <label class="form-label ol-form-label" for="blog_category_id">{{ get_phrase('Category') }}</label>
                                        <select class="form-control ol-form-control ol-select2" data-toggle="select2" name="category_id" id="blog_category_id" required>
                                            <option value="">{{ get_phrase('Select a category') }}</option>
                                            @foreach ($category as $row)
                                                <option value="{{ $row->id }}">{{ $row->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
    
                            <div class=" mb-3">
                                <label class="form-label ol-form-label" for="keywords">{{ get_phrase('Keywords') }}</label>
                                <input type="text" name="keywords" class="tagify ol-form-control w-100" data-role="tagsinput">
                                <small class="text-muted">{{ get_phrase('Writing your keyword and hit htw enter button') }}</small>
                            </div>
    
                            <div class=" mb-3">
                                <label class="form-label ol-form-label" for="summernote-basic">{{ get_phrase('Description') }}</label>
                                <textarea name="description" class="form-control ol-form-control text_editor"></textarea>
                            </div>
    
                            <div class="row">
                                <div class="col-md-6 ">
                                    <label class="form-label ol-form-label" for="banner">{{ get_phrase('Blog banner') }}</label>
                                    <div class="image_preview">
                                        <img src="{{ get_image() }}" id="preview_banner" alt="blog-banner">
                                    </div>
                                    <input type="file" name="banner" id="banner" class="form-control image-upload" accept="image/*">
                                </div>
    
                                <div class="col-md-6  ">
                                    <label class="form-label ol-form-label" for="thumbnail">{{ get_phrase('Blog thumbnail') }}</label>
                                    <div class="image_preview">
                                        <img src="{{ get_image() }}" id="preview_thumbnail" alt="blog-thumbnail">
                                    </div>
                                    <input type="file" name="thumbnail" id="thumbnail" class="form-control image-upload" accept="image/*">
                                </div>
                            </div>
    
                            <div class=" mb-3 mt-3">
                                <label class="form-label ol-form-label">{{ get_phrase('Would you like to designate it as popular?') }}</label>
    
                                <div class="d-flex gap-4">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="radio" id="mark_yes" value="1" name="is_popular">
                                        <label for="mark_yes">{{ get_phrase('Yes') }}</label>
                                    </div>
    
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="radio" id="mark_no" value="0" name="is_popular" checked>
                                        <label for="mark_no">{{ get_phrase('No') }}</label>
                                    </div>
                                </div>
                            </div>
    
                            <div class=" mb-3">
                                <button type="submit" class="ol-btn-primary">{{ get_phrase('Add blog') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="panel3" class="panel">
        <div class="row">
            <div class="col-12">
                <div class="ol-card p-3">
                    <div class="ol-card-body">
                        <div class="row print-d-none mt-3 mb-4">
                            <div class="col-md-6 d-flex align-items-center gap-3">
                                <div class="custom-dropdown ms-2">
                                    <button class="dropdown-header btn ol-btn-light">
                                        {{ get_phrase('Export') }}
                                        <i class="fi-rr-file-export ms-2"></i>
                                    </button>
                                    <ul class="dropdown-list">
                                        <li>
                                            <a class="dropdown-item export-btn" href="#" onclick="downloadPDF('.print-table', 'pending-blogs')"><i class="fi-rr-file-pdf"></i>
                                                {{ get_phrase('PDF') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item export-btn" href="#" onclick="window.print();"><i class="fi-rr-print"></i> {{ get_phrase('Print') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form class="form-inline" action="{{ route('instructor.blog.pending') }}" method="get">
                                    <div class="row row-gap-3">
                                        <div class="col-md-9">
                                            <div class="mb-3 position-relative position-relative">
                                                <input type="text" name="search" value="{{ request('search') }}" placeholder="{{ get_phrase('Search Title') }}" class="ol-form-control form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit" class="btn ol-btn-primary w-100" id="submit-button" onclick="update_date_range();"> {{ get_phrase('Filter') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if (count($blogs) > 0)
                            <div class="table-responsive course_list" id="course_list">
                                <table class="table eTable eTable-2 print-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ get_phrase('Creator') }}</th>
                                            <th scope="col">{{ get_phrase('Title') }}</th>
                                            <th scope="col">{{ get_phrase('Category') }}</th>
                                            <th scope="col">{{ get_phrase('Status') }}</th>
                                            <th scope="col" class="print-d-none">{{ get_phrase('Options') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $key => $blog)
                                            <tr>
                                                <th scope="row">
                                                    <p class="row-number">{{ $key + 1 }}</p>
                                                </th>
    
                                                <td>
                                                    <div class="dAdmin_profile d-flex align-items-center min-w-200px gap-1">
                                                        <div class="dAdmin_profile_img">
                                                            <img class="img-fluid rounded-circle image-45" width="45" height="45" src="{{ get_image($blog->thumbnail) }}" id="blog-thumbnail" />
                                                        </div>
                                                        <div class="dAdmin_profile_name">
                                                            <h4 class="title fs-14px">{{ get_user_info($blog->user_id)->name }}
                                                            </h4>
                                                            <p>{{ get_user_info($blog->user_id)->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
    
                                                <td>
                                                    <div class="dAdmin_info_name min-w-150px">
                                                        <h4 class="title fs-14px">
                                                            <a href="{{ route('blog.details', Str::slug($blog->title)) }}">
                                                                {{ $blog->title }}</a>
                                                        </h4>
                                                        <p>{{ date('D, d-M-Y', strtotime($blog->created_at)) }}</p>
                                                    </div>
                                                </td>
    
                                                <td>
                                                    @php
                                                        $category = DB::table('blog_categories')
                                                            ->where('id', $blog->category_id)
                                                            ->first();
                                                    @endphp
                                                    <div class="dAdmin_info_name min-w-150px">
                                                        <p>{{ $category->title }}</p>
                                                    </div>
                                                </td>
    
                                                <td>
                                                    <div class="dAdmin_info_name min-w-150px">
                                                        <p><span class="badge {{ $blog->status ? 'bg-success' : 'bg-danger' }} text-white">{{ get_phrase($blog->status ? 'Active' : 'Inactive') }}</span>
                                                        </p>
                                                    </div>
                                                </td>
    
                                                <td class="print-d-none">
                                                    <div class="dropdown ol-icon-dropdown ol-icon-dropdown-transparent">
                                                        <button class="btn ol-btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <span class="fi-rr-menu-dots-vertical"></span>
                                                        </button>
    
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item" href="{{ route('instructor.blog.edit', ['id' => $blog->id]) }}">{{ get_phrase('Edit') }}</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#" onclick="confirmModal('{{ route('instructor.blog.delete', $blog->id) }}')">{{ get_phrase('Delete') }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            @include('instructor.no_data')
                        @endif
                        <!-- Data info and Pagination -->
                        @if (count($blogs) > 0)
                            <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                                <p class="admin-tInfo">
                                    {{ get_phrase('Showing') . ' ' . count($blogs) . ' ' . get_phrase('of') . ' ' . $blogs->total() . ' ' . get_phrase('data') }}
                                </p>
                                {{ $blogs->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Admin area -->
@endsection
@push('js')
    <script>
        function focusInput(div) {
            const input = div.querySelector("input");
            if (input) input.focus();
            
        }
        const cards = document.querySelectorAll('.option');
        cards.forEach(card => {
            card.addEventListener('click', () => {
                // Quitar active de todas
                cards.forEach(c => {
                    c.classList.remove('active');
                    c.style.backgroundColor = ""; 
                    c.style.borderColor = "";
                });
        
                // Activar la que se clickeó
                card.classList.add('active');
        
                // Tomar el color definido en cada tarjeta (data-color)
                const color = card.dataset.color;
                card.style.backgroundColor = color;
                card.style.borderColor = color;
            });
        });
        document.querySelectorAll('.option').forEach(btn => {
            btn.addEventListener('click', () => {
                const target = btn.dataset.target;
                document.querySelectorAll('.panel').forEach(p => p.classList.remove('active'));
                document.querySelector(target).classList.add('active');
            });
        });
    </script>
    <script>
        "use strict";
        $(function() {
            $('#banner, #thumbnail').change(function(e) {
                e.preventDefault();

                var img_type = $(this).attr('id');
                var x = URL.createObjectURL(event.target.files[0]);
                $('#preview_' + img_type).attr('src', x);
            });
        });
    </script>
@endpush