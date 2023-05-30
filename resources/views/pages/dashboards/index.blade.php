
@extends('layout.master')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

{{-- <style>
    .clickable-row {
        cursor: pointer;
    }
</style> --}}

@section('content')

    <!--begin::Row-->
    <div class="row g-6 g-xl-10 mb-5 mb-xl-10">
        <div class="col-12 mb-4">
            <div class="row">
                <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                    <a href="{{ route('staffs.index') }}" class=" text-decoration-none">
                    <div class="bg-info rounded p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                        <div class="rounded d-flex align-items-center justify-content-center">
                            <i class="fas fa-user-md text-white fs-4x"></i>
                        </div>
                        <div class="text-end text-white">
                            <h2 class="fs-2hx fw-bold text-white me-2 lh-1">{{ $totalVets }}</h2>
                            <h3 class="fs-6 fw-semibold text-white">Total Veterinarians</h3>
                        </div>
                    </div>
                    </a>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                    <a href="{{ route('patients.index') }}" class="text-decoration-none">
                        <div class="bg-success rounded p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div class="rounded d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-cat text-white fs-4x"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-2hx fw-bold text-white me-2 lh-1">{{ $totalPatients }}</h2>
                                <h3 class="fs-6 fw-semibold text-white">Total Patients</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                    <a href="{{ route('appointments.index') }}" class="text-decoration-none">
                        <div class="bg-warning rounded p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div class="rounded d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-calendar-check text-white fs-4x"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-2hx fw-bold text-white me-2 lh-1">{{ $todayAppointments }}</h2>
                                <h3 class="fs-6 fw-semibold text-white">Today Appointments</h3>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                    <a href="{{ route('patients.index') }}" class="text-decoration-none">
                        <div class="bg-primary rounded p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                            <div class="rounded d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-shield-cat text-white fs-4x"></i>
                            </div>
                            <div class="text-end text-white">
                                <h2 class="fs-2hx fw-bold text-white me-2 lh-1">{{ $todayRegisteredPatients }}</h2>
                                <h3 class="fs-6 fw-semibold text-white">Today Registered Patients</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    <div class="row gx-5 gx-xl-10">
        <div class="col-xxl-12 mb-5 mb-xl-10">
            <div class="card card-flush h-md-100">
                <div class="card-header pt-7">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">Recent Patients Registration</span>
                        <span class="text-gray-400 mt-1 fw-semibold fs-6">{{ $today }}</span>
                    </h3>
                    <!--end::Title-->
                    <!--begin::Toolbar-->
                    {{-- <div class="card-toolbar">
                        <a href="/" class="btn btn-sm btn-light">History</a>
                    </div> --}}
                    <!--end::Toolbar-->
                </div>

                <div class="card-body pt-6">
                    <div class="table-responsive">
                        <table class="table table-row-dashed table-hover align-middle gs-0 gy-3 my-0">
                            <thead>
                                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                    <th class="p-0 pb-3 min-w-10px text-start">#</th>
                                    <th class="p-0 pb-3 min-w-50px text-start">NAME</th>
                                    <th class="p-0 pb-3 min-w-50px text-start">BREED</th>
                                    <th class="p-0 pb-3 min-w-50px text-start pe-12">SPECIES</th>
                                    <th class="p-0 pb-3 min-w-10px text-start pe-7">GENDER</th>
                                    <th class="p-0 pb-3 w-50px text-start">REGISTERED</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($todayPatients as $index => $patient)
                                    <tr class="clickable-row" data-href="{{ route('patients.show', $patient->id) }}">
                                        <td>
                                            <span class="text-gray-600 fw-bold fs-6">{{ $index + 1 }}</span>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="symbol symbol-50px me-3">
                                                    <img src="{{ asset('storage/image/' . $patient->image) }}" class="" alt="" />
                                                </div>
                                                <div class="d-flex justify-content-start flex-column">
                                                    <a href="{{ route('patients.show', $patient->id) }}" class="text-gray-800 fw-bold text-hover-primary mb-1 fs-6">{{ $patient->name ?? '' }}</a>
                                                    <span class="text-gray-400 fw-semibold d-block fs-7">{{ $patient->owner->name ?? '' }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-start pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">{{ $patient->breed ?? '' }}</span>
                                        </td>
                                        <td class="text-start pe-0">
                                            <span class="text-gray-600 fw-bold fs-6">{{ $patient->species->name ?? '' }}</span>
                                        </td>
                                        <td class="text-start pe-12">
                                            <span class="text-gray-600 fw-bold fs-6">{{ $patient->gender ?? '' }}</span>
                                        </td>
                                        <td class="text-start pe-12">
                                            <span class="text-gray-600 fw-bold fs-6">{{ $patient->created_at ?? '' }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script>
    KTUtil.onDOMContentLoaded(function () {
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
    })
  </script>
@endsection