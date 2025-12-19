@extends('layouts.instructor')
@push('title', get_phrase('Dashboard'))
@push('meta')@endpush
@push('css')
@endpush
@section('content')
    <link rel="stylesheet" href="https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css">
    <!--
        <div class="ol-card radius-8px">
            <div class="ol-card-body my-3 py-4 px-20px">
                <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                    <h4 class="title fs-16px">
                        <i class="fi-rr-settings-sliders me-2"></i>
                        {{ get_phrase('Dashboard') }}
                    </h4>
                </div>
            </div>
        </div>
    -->

  <div class="row g-2 g-sm-3 my-3 row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 justify-content-center">
        <div class="col">
            <div class="ol-card card-hover">
                 <div class="ol-card-body px-25px py-1 text-center">
                    <i class="fi fi-ss-book-open-cover p-2 txt-color bg-color-degraded"
                        style="--txt-color:#FFF; --color1:#4FD1C5; --color2:#38B2AC; border-radius:20%; font-size:2em;">
                    </i>
                    <p class="title card-title-hover fs-20px my-2">
                        {{ count_course_by_instructor(auth()->user()->id) }}
                    </p>
                    <p class="sub-title fs-14px">{{ get_phrase('Number of Courses') }}</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="ol-card card-hover">
                <div class="ol-card-body px-25px py-1">
                     <div class="ol-card-body px-25px py-1 text-center">
                    <i class="fi fi-ss-video-camera p-2 txt-color bg-color-degraded"
                        style="--txt-color:#FFF; --color1:#3BA5FF; --color2:#007BFF; border-radius:20%; font-size:2em;">
                    </i>
                    <p class="title card-title-hover fs-18px my-2">
                        {{ count_instructor_lesson(auth()->user()->id) }}
                    </p>
                    <p class="sub-title fs-14px">{{ get_phrase('Number of Lessons') }}</p>
                </div>
            </div>
        </div>
     </div>
        
        <div class="col">
            <div class="ol-card card-hover">
                <div class="ol-card-body px-25px py-1">
                     <div class="ol-card-body px-25px py-1 text-center">
                    <i class="fi fi-ss-graduation-cap p-2 txt-color bg-color-degraded"
                        style="--txt-color:#FFF; --color1:#A855F7; --color2:#7C3AED; border-radius:20%; font-size:2em;">
                    </i>
                    <p class="title card-title-hover fs-18px my-2">
                        {{--
                        {{ total_enrolled() }}
                        --}}
                        {{ total_enrolled_by_id(auth()->user()->id) }} {{ get_phrase('Student') }}
                    </p>
                    <p class="sub-title fs-14px">{{ get_phrase('Number of Students') }}</p>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Left: Line chart (Revenue) -->
        <div class="col-lg-6 col-xl-6 mb-3">
            <div class="ol-card p-3">
                <div class="d-flex align-items-start mb-3">
                    <span class="icon-square-primary me-2">
                        <i class="fi fi-rr-arrow-trend-up"></i>
                    </span>
                    <div class="flex-grow-1">
                        <h2 class="title fs-14px mb-0">{{ get_phrase('Instructor Revenue This Year') }}</h2>
                        <p class="card-subtitle">Ingresos mensuales del año</p>
                    </div>
                    <div class="text-end ms-2">
                        <a class="btn-link" href="{{ route('instructor.payout.reports') }}" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ get_phrase('Instructor Revenue') }}">
                            <i class="fi-rr-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>
                <div class="ol-card-body">
                    <canvas id="myChart" class="mw-100 w-100" height="280px"></canvas>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-xl-6 mb-3">
            <div class="ol-card p-3">
                <div class="d-flex align-items-start mb-3">
                    <span class="icon-square-success me-2">
                        <i class="fi fi-ss-book-open-cover"></i>
                    </span>
                    <div class="flex-grow-1">
                        <h4 class="title fs-14px mb-0">{{ get_phrase('Course Status') }}</h4>
                        <p class="card-subtitle">{{ get_phrase('Distribution by state') }}</p>
                    </div>
                    <div class="text-end ms-2">
                        <a class="btn-link" href="{{ route('instructor.courses') }}" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ get_phrase('Explore Courses') }}">
                            <i class="fi-rr-arrow-alt-right"></i>
                        </a>
                    </div>
                </div>

                <div class="d-flex align-items-center g-30px flex-wrap flex-xl-nowrap justify-content-center">
                    <div class="pie-chart-sm">
                        <canvas id="pie2"></canvas>
                    </div>
                    <div class="pie-chart-sm-details">
                        <ul class="color-info-list">
                            <li>
                                <span class="info-list-color bg-active"></span>
                                <span class="title2 fs-14px">{{ get_phrase('Active') }}</span>
                            </li>
                            <li>
                                <span class="info-list-color bg-upcoming"></span>
                                <span class="title2 fs-14px">{{ get_phrase('Upcoming') }}</span>
                            </li>
                            <li>
                                <span class="info-list-color bg-pending"></span>
                                <span class="title2 fs-14px">{{ get_phrase('Pending') }}</span>
                            </li>
                            <li>
                                <span class="info-list-color bg-private"></span>
                                <span class="title2 fs-14px">{{ get_phrase('Private') }}</span>
                            </li>
                            <li>
                                <span class="info-list-color bg-draft"></span>
                                <span class="title2 fs-14px">{{ get_phrase('Draft') }}</span>
                            </li>
                            <li>
                                <span class="info-list-color bg-inactive"></span>
                                <span class="title2 fs-14px">{{ get_phrase('Inactive') }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="ol-card" id='unpaid-instructor-revenue'>
            <div class="ol-card-body p-3">

                <div class="row align-items-center p-3">
                    <div class="col-auto d-flex align-items-center me-3">
                        <div class="icon-money-large">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>

                    <div class="col">
                        <h4 class="title text-20px mb-0 fw-bold">
                            {{ get_phrase('Pending Requested withdrawal') }}
                        </h4>
                        <p class="text-muted text-14px mb-0">
                            {{ get_phrase('Manage your withdrawal requests') }}
                        </p>
                    </div>
                    <div class="col-md-5 text-end">
                        <a class="btn-link" href="{{ route('instructor.payout.reports') }}" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="{{ get_phrase('Instructor Payout') }}"><i
                                class="fi-rr-arrow-alt-right"></i></a>
                    </div>
                </div>

                @php
                    $payouts = App\Models\Payout::where('user_id', auth()->user()->id)
                        ->where('status', 0) // Asumo que 0 es 'pendiente' para filtrar solo las pendientes
                        ->limit(20)
                        ->orderByDesc('id') // Ordenar por ID descendente para los más recientes
                        ->get();
                @endphp

                @if ($payouts->count() > 0)
                    <div class="table-responsive mt-3">
                        <table class="table table-centered table-hover mb-0">
                            <tbody>
                                @foreach ($payouts as $payout)
                                    <tr>
                                        <td>
                                            <p class="title fs-14px">{{ get_phrase('Name') }}: {{ $payout->user->name }}
                                            </p>
                                            <small>{{ get_phrase('Email') }}: <span
                                                    class="text-muted font-13">{{ $payout->user->email }}</span></small>
                                        </td>
                                        <td>
                                            <p class="title fs-14px">{{ currency($payout->amount) }}</p>
                                            <small><span
                                                    class="text-muted font-13">{{ get_phrase('Requested withdrawal amount') }}</span></small>
                                        </td>
                                        <td>
                                            @if ($payout->status == 1)
                                                <span class="badge bg-success">{{ get_phrase('Paid') }}</span>
                                            @else
                                                <span class="badge bg-warning">{{ get_phrase('Pending') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="d-flex flex-column align-items-center justify-content-center py-5 text-center">
                        <div class="h1 text-secondary mb-3">
                            <div class="icon-money">$</div>
                        </div>
                        <h5 class="fw-bold mb-1">{{ get_phrase('There are no pending requests') }}</h5>
                        <p class="text-muted">{{ get_phrase('When you make a withdrawal request, it will appear here') }}
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @php
        $courses = App\Models\Course::where('user_id', auth()->user()->id)
            ->get()
            ->groupBy('status');
        $active = isset($courses['active']) ? $courses['active']->count() : 0;
        $upcoming = isset($courses['upcoming']) ? $courses['upcoming']->count() : 0;
        $pending = isset($courses['pending']) ? $courses['pending']->count() : 0;
        $private = isset($courses['private']) ? $courses['private']->count() : 0;
        $draft = isset($courses['draft']) ? $courses['draft']->count() : 0;
        $inactive = isset($courses['inactive']) ? $courses['inactive']->count() : 0;
    @endphp
@endsection
@push('js')

    {{-- Oliv template start --}}
    <script src="{{ asset('assets/backend/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/backend/vendors/chart-js/chart.js') }}"></script>
    {{-- Oliv template end --}}

    <script>
        "use strict";
        const xValues = [0, "January", "February", "March", "April", "May", "June", "July", "August", "September",
            "October", "November", "December"
        ];
        new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    fill: false,
                    lineTension: 0,
                    backgroundColor: "rgba(0,0,255,1.0)",
                    borderColor: "rgba(0,0,255,0.1)",
                    data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120, 140]

                }]
            },
            options: {
                legend: {
                    display: true
                },
            }
        });

        // Pie Chart 2
        const project_progress2 = document.getElementById('pie2');
        const progressData2 = {
            labels: ['Active', 'Upcoming', 'Pending', 'Private', 'Draft', 'Deactive'],
            data: [{{ $active }}, {{ $upcoming }}, {{ $pending }}, {{ $private }},
                {{ $draft }}, {{ $inactive }}
            ],
        };
        var barColors = [
            "#12c093",
            "#1b84ff",
            "#ff2583",
            "#000",
            "#878d97",
            "#dadada",
        ];
        new Chart(project_progress2, {
            type: 'doughnut',
            data: {
                labels: progressData2.labels,
                datasets: [{
                    backgroundColor: barColors,
                    label: ' {{ get_phrase('Courses') }}',
                    data: progressData2.data,
                }, ],
            },
            options: {
                responsive: true,
                borderWidth: 5,
                hoverBorderColor: '#fff',
                plugins: {
                    legend: {
                        display: false,
                    },
                },
            },
        });
    </script>
@endpush
