@extends('layouts.admin')
@push('title', get_phrase('Exams') . ' - ' . $course_details->title)

@section('content')
    <div class="ol-card radius-8px">
        <div class="ol-card-body my-3 py-12px px-20px">
            <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                <h4 class="title fs-16px d-flex align-items-center">
                    <span class="edit-badge py-2 px-3">
                        {{ get_phrase('Editing') }}
                    </span>
                    <span class="d-inline-block ms-3">
                        {{ $course_details->title }}
                    </span>
                </h4>
                <a href="{{ route('admin.courses') }}" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px ms-auto">
                    <span class="fi-rr-arrow-left"></span>
                    <span>{{ get_phrase('Back') }}</span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="ol-card">
            <div class="ol-card-body p-20px mb-3">

                <div class="row mb-3">
                    <div class="col-sm-8">
                        <a href="{{ route('course.details', $course_details->slug) }}" target="_blank" class="btn ol-btn-outline-secondary me-3">
                            {{ get_phrase('Frontend View') }}
                            <i class="fi-rr-arrow-up-right-from-square"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex gap-3 flex-wrap flex-md-nowrap">
                    {{-- Sidebar Tabs --}}
                    <div class="ol-sidebar-tab">
                        <div class="d-flex flex-column">
                            @php
                                $param = $course_details->id;
                            @endphp

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'curriculum']) }}">
                                <span class="fi-rr-edit"></span>
                                <span>{{ get_phrase('Curriculum') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'basic']) }}">
                                <span class="icon fi-rr-duplicate"></span>
                                <span>{{ get_phrase('Basic') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'live-class']) }}">
                                <span class="fi-rr-file-video"></span>
                                <span>{{ get_phrase('Live Class') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'pricing']) }}">
                                <span class="fi-rr-comment-dollar"></span>
                                <span>{{ get_phrase('Pricing') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'info']) }}">
                                <span class="fi-rr-tags"></span>
                                <span>{{ get_phrase('Info') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'media']) }}">
                                <span class="fi fi-rr-gallery"></span>
                                <span>{{ get_phrase('Media') }}</span>
                            </a>

                            <a class="nav-link" href="{{ route('admin.course.edit', [$param, 'tab' => 'seo']) }}">
                                <span class="fi-rr-note-medical"></span>
                                <span>{{ get_phrase('SEO') }}</span>
                            </a>

                            <a class="nav-link active" href="{{ route('admin.exam.index', $param) }}">
                                <span class="far fa-file-code"></span>
                                <span>{{ get_phrase('Exam') }}</span>
                            </a>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="tab-content w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5>{{ get_phrase('Exams') }}</h5>
                            <a href="{{ route('admin.exam.create', $course_details->id) }}" class="btn ol-btn-primary">
                                <i class="fi-rr-plus me-1"></i>
                                {{ get_phrase('Create Exam') }}
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table eTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{ get_phrase('Title') }}</th>
                                        <th>{{ get_phrase('Course') }}</th>
                                        <th>{{ get_phrase('Questions') }}</th>
                                        <th>{{ get_phrase('Duration') }}</th>
                                        <th>{{ get_phrase('Students') }}</th>
                                        <th>{{ get_phrase('Promedio') }}</th>
                                        <th>{{ get_phrase('Status') }}</th>
                                        <th class="text-center">{{ get_phrase('Options') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($exams as $key => $exam)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>
                                                <div class="dAdmin_profile_name">
                                                    <h4 class="title fs-14px">{{ $exam->title }}</h4>
                                                    <p class="sub-title2 text-12px">Aprobación: {{ $exam->pass_mark }}% | Intentos: {{ $exam->retake }}</p>
                                                </div>
                                            </td>
                                            <td class="sub-title2"><p class="sub-title2">{{ $course_details->title }}</p></td>
                                            <td><p class="sub-title2">{{ $exam->questions_count }}</p></td>
                                            <td><p class="sub-title2"><span class="far fa-clock me-2"></span>{{ $exam->duration }} {{ get_phrase('min') }}</p></td>
                                            <td><p class="sub-title2"><span class="fas fa-users me-2"></span>45</p></td>
                                            <td>0</td>
                                            <td>
                                                @if($exam->exam_type == 'published')
                                                    <span class="badge bg-success">{{ get_phrase('Published') }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ get_phrase('Draft') }}</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="dropdown ol-icon-dropdown">
                                                    <div class="buttons" style="justify-content: space-between;">
                                                        <a data-bs-toggle="tooltip" title="{{ get_phrase('View exam') }}" class="btn py-0 px-1" href="{{ route('admin.exam.view', [$course_details->id, $exam->exam_id]) }}">
                                                            <span class="fas fa-eye" style="color: #4a5565"></span>
                                                        </a>
                                                        <a href="#" data-bs-toggle="tooltip" title="{{ get_phrase('Security') }}" class="btn py-0 px-1" onclick="ajaxModal('{{ route('admin.exam.security.modal', [$course_details->id, $exam->exam_id]) }}', '{{ get_phrase('Sistema de seguridad') }}', 'modal-md')">
                                                            <span class="fas fa-lock" style="color: #4a5565"></span>
                                                        </a>
                                                        <a href="#" data-bs-toggle="tooltip" title="{{ get_phrase('Questions') }}" class="btn py-0 px-1" onclick="ajaxModal('{{ route('admin.exam.questions.modal', [$course_details->id, $exam->exam_id]) }}', '{{ get_phrase('Constructor de preguntas') }}', 'modal-lg')">
                                                            <span class="far fa-file-alt" style="color: #4a5565"></span>
                                                        </a>
                                                        @if($exam->exam_type == 'draft')
                                                        <a data-bs-toggle="tooltip" title="{{ get_phrase('Edit exam') }}" class="btn py-0 px-1" href="{{ route('admin.exam.edit', [$course_details->id, $exam->exam_id]) }}">
                                                            <span class="fi-rr-pencil" style="color: #4a5565"></span>
                                                        </a>
                                                        @endif
                                                        <a data-bs-toggle="tooltip" title="{{ get_phrase('Delete exam') }}" class="btn py-0 px-1 text-danger" onclick="confirmModal('{{ route('admin.exam.delete', [$course_details->id, $exam->exam_id]) }}')">
                                                            <span class="fi-rr-trash"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center py-4">
                                                <p class="mb-0">{{ get_phrase('No exams found') }}</p>
                                                <a href="{{ route('admin.exam.create', $course_details->id) }}" class="btn ol-btn-outline-secondary mt-2">
                                                    {{ get_phrase('Create your first exam') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


