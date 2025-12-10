@extends('layouts.instructor')
@push('title', get_phrase('Payout report'))
@push('meta')@endpush
@push('css')@endpush
@section('content')
    <!-- start page title -->
    <div class="ol-card radius-8px">
        <div class="ol-card-body py-12px px-20px my-3 width-" style="--w:100%">
            <div class="d-flex align-items-center justify-content-between flex-md-nowrap flex-wrap gap-3">
                <h4 class="title fs-16px">
                    <i class="fi-rr-settings-sliders me-2"></i>
                    {{ get_phrase('Payouts') }}
                </h4>
                @if ($payout_request)
                    <a onclick="confirmModal('{{ route('instructor.payout.delete', $payout_request->id) }}')"
                        href="javascript:void(0)" class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-minus"></span>
                        {{ get_phrase('Delete request') }}</a>
                @else
                    <a href="#"
                        onclick="ajaxModal('{{ route('modal', ['instructor.payout_report.withdrawal']) }}', '{{ get_phrase('Request a new withdrawal') }}')"
                        class="btn ol-btn-outline-secondary d-flex align-items-center cg-10px">
                        <span class="fi-rr-plus"></span>
                        <span>{{ get_phrase('Request withdrawal') }}</span>
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="bg-color-solid width- space-top rounded-t-2xl" style="--bg-color:#FFF; --w:22%; --mg-top:1%">
        <div class="row p-1">
            <div class="col width-">
                <div class="ol-card card-hover option active p-1"data-target="#panel1" data-color="#FF8A00"
                    style="background-color: #FF8A00;">
                    <div class="ol-card-body py-12px px-3">
                        <div class="d-flex align-content-center align-items-center ">
                            <h6 class="txt-bold fs-14px mb-1">{{ get_phrase('Payouts') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col width-">
                <div class="ol-card card-hover option p-1" data-target="#panel3" data-color="#28A745">
                    <div class="ol-card-body py-12px px-3">
                        <div class="d-flex align-content-center align-items-center cg-12px">
                            <h6 class="txt-bold  fs-14px mb-1">{{ get_phrase('Settings') }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="panel1" class="panel active">
        <div class="d-flex jc- gap-5 mt-3" style="--jc:center; ">
            <div class="ol-card card-hover " style="width: 100%;">
                <div class="ol-card-body py-12px px-3">
                    <div class="d-flex align-items-center cg-12px ">
                        <div class="ol-card-icon d-inline-flex bg-color-solid p-3 round-"
                            style="--bg-color:#00c951; --br:15px">
                            <span class="icon fi fi-rr-money txt-color font-icon-md d-inline-flex"
                                style="--txt-color:#FFF"></span>
                        </div>
                        <div>
                            <h6 class="sub-title fs-14px mb-1">{{ get_phrase('Available') }}</h6>
                            <p class="txt-bold fs-30px fw-semibold">{{ currency(number_format($balance, 2)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ol-card card-hover " style="width: 100%;">
                <div class="ol-card-body py-12px px-3">
                    <div class="d-flex align-items-center cg-12px">
                        <div class="ol-card-icon d-inline-flex bg-color-degraded p-3 round-"
                            style="--bg-color:#00c951;  --color1:#3B9FD0; --color2:#107BE3; --br:15px">
                            <span class="icon fi fi-rr-wallet txt-color font-icon-md d-inline-flex"
                                style="--txt-color:#FFF"></span>
                        </div>
                        <div>
                            <h6 class=" fs-14px mb-1">{{ get_phrase('Total payout') }}</h6>
                            <p class="txt-bold fs-30px fw-semibold">{{ currency(number_format($total_payout, 2)) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ol-card card-hover " style="width: 100%;">
                <div class="ol-card-body py-12px px-3">
                    <div class="d-flex align-items-center cg-12px">
                        <div class="ol-card-icon d-inline-flex bg-color-degraded p-3 round-"
                            style="--bg-color:#00c951;  --color1: #954bf3; --color2: #d252f4; --br:15px">
                            <span class="icon fi fi-rr-credit-card txt-color font-icon-md d-inline-flex"
                                style="--txt-color:#FFF"></span>
                        </div>
                        <div>
                            <h6 class=" fs-14px mb-1">{{ get_phrase('Requested') }}</h6>
                            <p class="txt-bold fs-30px fw-semibold">
                                {{ currency(number_format($payout_request->amount ?? 0, 2)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex ol-card align-items-center gap-2 mt-2 p-20px">
            <form class="width- d-flex gap-3  align-items-center " style="--w:100%;"
                action="{{ route('instructor.payout.reports') }}" method="get">
                <input type="text" class="form-control  width-" style="--w: 40%" name="eDateRange"
                    value="{{ date('m/d/Y', $start_date) }}" />

                <span>-</span>

                <input type="text" class="form-control  width-" style="--w: 40%" name="eDateRange"
                    value="{{ date('m/d/Y', $end_date) }}" />

                <button type="submit" class="btn bg-color-degraded txt-color"
                    style="width:17%; --txt-color: #FFF; --color1:#3B9FD0; --color2:#107BE3;">
                    {{ get_phrase('Filter') }}
                </button>
            </form>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="ol-card">
                    <div class="ol-card-body p-3">
                        <div class="row print-d-none mb-4 mt-3">
                            <div class="col-md-6 d-flex align-items-center gap-3">
                                @if (count($payout_reports))
                                    <div class="custom-dropdown ms-2">
                                        <button class="dropdown-header btn ol-btn-light">
                                            {{ get_phrase('Export') }}
                                            <i class="fi-rr-file-export ms-2"></i>
                                        </button>
                                        <ul class="dropdown-list">
                                            <li>
                                                <a class="dropdown-item export-btn" href="#"
                                                    onclick="downloadPDF('.print-table', 'payout-reports')"><i
                                                        class="fi-rr-file-pdf"></i> {{ get_phrase('PDF') }}</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item export-btn" href="#"
                                                    onclick="window.print();"><i class="fi-rr-print"></i>
                                                    {{ get_phrase('Print') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @if (count($payout_reports))
                            <div
                                class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center gr-15 flex-wrap">
                                <p class="admin-tInfo">
                                    {{ get_phrase('Showing') . ' ' . count($payout_reports) . ' ' . get_phrase('of') . ' ' . $payout_reports->total() . ' ' . get_phrase('data') }}
                                </p>
                            </div>
                            <div class="table-responsive">
                                <table class="eTable eTable-2 print-table table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ get_phrase('Payout amount') }}</th>
                                            <th>{{ get_phrase('Payment type') }}</th>
                                            <th>{{ get_phrase('Date processed') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($payout_reports as $key => $row)
                                            <tr class="gradeU">
                                                <td> {{ ++$key }}</td>
                                                <td>
                                                    <div class="dAdmin_profile d-flex align-items-center min-w-200px">
                                                        <div class="dAdmin_profile_name">
                                                            <h4 class="title fs-14px">
                                                                {{ currency(number_format($row->amount, 2)) }}
                                                            </h4>
                                                            <p>
                                                                {{ date('D, d M Y', strtotime($row->created_at)) }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if ($row->status == 0)
                                                        <p class="badge bg-danger">{{ get_phrase('Pending') }}</p>
                                                    @endif
                                                    {{ ucfirst($row->payment_type) }}
                                                </td>
                                                <td>
                                                    @if ($row->status == 0)
                                                        <p class="badge bg-danger">{{ get_phrase('Pending') }}</p>
                                                    @else
                                                        {{ date('D, d M Y', strtotime($row->updated_at)) }}
                                                    @endif
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
                        @if (count($payout_reports) > 0)
                            <div
                                class="admin-tInfo-pagi d-flex justify-content-md-between justify-content-center align-items-center gr-15 flex-wrap">
                                <p class="admin-tInfo">
                                    {{ get_phrase('Showing') . ' ' . count($payout_reports) . ' ' . get_phrase('of') . ' ' . $payout_reports->total() . ' ' . get_phrase('data') }}
                                </p>
                                {{ $payout_reports->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div id="panel3" class="panel mt-3 ">
        <div class="ol-card radius-8px">
            <div class="ol-card-body my-3 py-4 px-20px">
                <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap flex-md-nowrap">
                    <h4 class="title fs-16px">
                        <i class="fi-rr-settings-sliders me-2"></i>
                        {{ get_phrase('Payout setting') }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="alert alert-primary ol-alert-primary mb-3" role="alert">
            <p class="sub-title2 fs-16px">
                <span class="title2">{{ get_phrase('Be careful !!') }}</span>
                {{ get_phrase('Just configure the payment gateway you want to use, leave the rest blank.') }}
                {{ get_phrase('Also, make sure that you have configured your payment settings correctly') }}
            </p>
        </div>
        <form action="{{ route('instructor.payout.setting.store') }}" class="mb-5" method="post"
            enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                @php
                    $payment_gateways = App\Models\Payment_gateway::where('identifier', '!=', 'offline')->get();
                @endphp
                @foreach ($payment_gateways as $key => $payment_gateway)
                    @php
                        $user_data = App\Models\User::where('id', auth()->user()->id)->first();
                        $payment_keys = json_decode($user_data->paymentkeys, true);
                        $keys = json_decode($payment_gateway->keys, true);
                        $user_keys = json_decode($user_data->paymentkeys, true);
                    @endphp
                    <div class="col-md-6">
                        <div class="ol-card p-3">
                            <div class="ol-card-body">
                                {{-- <div class=" @if ($payment_gateway->status != 1 || (!addon_status($payment_gateway->identifier) && $payment_gateway->is_addon == 1)) d-none @endif"> --}}
                                <div class="{{ $payment_gateway->status != 1 ? 'd-none' : '' }}">
                                    <h4 class="title fs-16px mb-3">{{ $payment_gateway->title }}</h4>
                                    @foreach ($keys as $index => $value)
                                        @php
                                            $value = '';
                                            if (
                                                $user_keys !== '' &&
                                                isset($user_keys[$payment_gateway->identifier][$index])
                                            ) {
                                                $value = $user_keys[$payment_gateway->identifier][$index];
                                            }
                                            $indexs = implode(' ', explode('_', $index));
                                        @endphp
                                        <div class="mb-3">
                                            <input type="text" id="{{ $payment_gateway->identifier . $index }}"
                                                name="gateways[{{ $payment_gateway->identifier }}][{{ $index }}]"
                                                value="{{ $value }}" class="form-control ol-form-control"
                                                placeholder="{{ get_phrase(ucfirst($indexs)) }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                <div class="col-4 offset-4">
                    <button class="btn ol-btn-primary mt-4 w-100"
                        type="submit">{{ get_phrase('Save changes') }}</button>
                </div>
            </div>
        </form>
    </div>

@endsection
@push('js')
    <script type="text/javascript">
        function update_date_range() {
            var x = $("#selectedValue").html();
            $("#date_range").val(x);
        }
    </script>
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


@endpush
