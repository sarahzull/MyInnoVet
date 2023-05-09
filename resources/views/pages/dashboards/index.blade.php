
@extends('layout.master')
@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboard')

@section('content')

    <!--begin::Row-->
    <div class="row g-6 g-xl-10 mb-5 mb-xl-10">
        <div class="col-md-6 col-xxl-4">
            <div class="card card-flush">
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <div class="mb-4 px-9">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1&gt;"></span>
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">{{ $totalPatients }}</span>
                            <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>2.2%</span>
                        </div>
                        <span class="fs-6 fw-semibold text-gray-400">Total Online Sales</span>
                    </div>
                    <div id="kt_card_active" class="min-h-auto" style="height: 125px"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-4">
            <div class="card card-flush">
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <div class="mb-4 px-9">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1&gt;">$</span>
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">69,700</span>
                            <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>2.2%</span>
                        </div>
                        <span class="fs-6 fw-semibold text-gray-400">Total Patients</span>
                    </div>
                    <div id="kt_card_patients" class="min-h-auto" style="height: 125px"></div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-4">
            <div class="card card-flush">
                <div class="card-body d-flex justify-content-between flex-column px-0 pb-0">
                    <div class="mb-4 px-9">
                        <div class="d-flex align-items-center mb-2">
                            <span class="fs-4 fw-semibold text-gray-400 align-self-start me-1&gt;">$</span>
                            <span class="fs-2hx fw-bold text-gray-800 me-2 lh-1">69,700</span>
                            <span class="badge badge-light-success fs-base">
                            <i class="ki-duotone ki-arrow-up fs-5 text-success ms-n1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>2.2%</span>
                        </div>
                        <span class="fs-6 fw-semibold text-gray-400">Total Online Sales</span>
                    </div>
                    <div id="kt_card_widget_8_chart" class="min-h-auto" style="height: 125px"></div>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-6 col-xxl-4">
            <div class="card card-flush">
                <div class="card-body d-flex flex-column justify-content-between bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
                    <div class="row row-cols-2">
                        <div>
                            <div class="symbol symbol-75px symbol-circle">
                                <i class="fa-regular fa-paw-simple fs-4x"></i>
                                <div class="symbol-label fs-2 fw-semibold text-success">
                                    
                                </div>
                            </div>
                        </div>
                        <div>
                            <span>
                                <p>Total Patients</p>
                                <p>{{ $totalPatients }}</p>
                            </span>
                        </div>
                    </div>
                    <div class="mb-10">
                        <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                        <span class="me-2">Try our all new Enviroment with
                        <br />
                        <span class="position-relative d-inline-block text-danger">
                            <a href="/" class="text-danger opacity-75-hover">Pro Plan</a>
                            <span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                        </span></span>for Free</div>
                        <div class="text-center">
                            <a href='#' class="btn btn-sm btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xxl-4">
            <div class="card card-flush">
                <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
                    <div class="mb-10">
                        <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                        <span class="me-2">Try our all new Enviroment with
                        <br />
                        <span class="position-relative d-inline-block text-danger">
                            <a href="/" class="text-danger opacity-75-hover">Pro Plan</a>
                            <span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                        </span></span>for Free</div>
                        <div class="text-center">
                            <a href='#' class="btn btn-sm btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-xxl-4">
            <div class="card card-flush">
                <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
                    <div class="mb-10">
                        <div class="fs-2hx fw-bold text-gray-800 text-center mb-13">
                        <span class="me-2">Try our all new Enviroment with
                        <br />
                        <span class="position-relative d-inline-block text-danger">
                            <a href="/" class="text-danger opacity-75-hover">Pro Plan</a>
                            <span class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100"></span>
                        </span></span>for Free</div>
                        <div class="text-center">
                            <a href='#' class="btn btn-sm btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-6 mb-5 mb-xl-10">
            @include('partials/widgets/charts/_widget-8')
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6 mb-5 mb-xl-10">
            @include('partials/widgets/tables/_widget-16')
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xxl-6">
            @include('partials/widgets/cards/_widget-18')
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-6">
            @include('partials/widgets/charts/_widget-36')
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
        <!--begin::Col-->
        <div class="col-xl-4">
            @include('partials/widgets/charts/_widget-35')
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8">
            @include('partials/widgets/tables/_widget-14')
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

    <!--begin::Row-->
    <div class="row gx-5 gx-xl-10">
        <!--begin::Col-->
        <div class="col-xl-4">
            @include('partials/widgets/charts/_widget-31')
        </div>
        <!--end::Col-->
        <!--begin::Col-->
        <div class="col-xl-8">
            @include('partials/widgets/charts/_widget-24')
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->
@endsection

@section('scripts')
  <script>
    KTUtil.onDOMContentLoaded(function () {
    })
  </script>
@endsection