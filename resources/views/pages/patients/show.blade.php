@extends('layout.master')
@section('title', 'Patients')
@section('breadcrumb', 'Patients Details')

@section('content')

<!--begin::Row-->
<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
  <!--begin::Col-->
  <div class="col-xxl-6">
    <!--begin::Engage widget 10-->
    <div class="card card-flush h-md-100">
      <!--begin::Body-->
      <div class="card-body d-flex flex-column justify-content-between bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
        <!--begin::Wrapper-->
        <div class="mb-10">
          <div class="col py-2">
            <div class="d-flex justify-between">
              <div class="col text-start">
                <a href="{{ route('patients.index') }}" class="text-sm">
                  <i class="fa-solid fa-arrow-left"></i>
                </a>
              </div>
              <div class="col"></div>
              <div class="col text-end">
                @can('patient_edit')
                <a href="{{ route('patients.edit', $patient->id) }}" class="text-sm">
                  <i class="fas fa-edit"></i>
                </a>
                @endcan
              </div>
            </div>
            <div class="text-center mb-3">
              <img src="{{ asset('images/' . $patient->image) }}" class="" width="40%">
            </div>
            
            <div class="row text-center">
              <p class="fw-bold fs-5 mb-0">{{ $patient->name ?? '' }}</p>
              <p>
                <span class="fw-bold">
                  {{ $patient->age() }}
                </span> 
                . 
                <span class="fw-bold" style="color:#9DA831;">{{ $patient->gender }}</span>
              </p>
            </div>

            <div class="row">
              <div class="col-lg-4 col-md-12 mb-4">
                <div class="card card-bordered">
                    <div class="card-body p-4">
                      <p class="mb-1 fw-bold">Breed</p>
                      <p class="mb-0 text-wrap">{{ $patient->breed }}</p>
                    </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-121 mb-4">
                <div class="card card-bordered">
                    <div class="card-body p-4">
                      <p class="mb-1 fw-bold">Height</p>
                    <p class="mb-0">{{ $patient->height }} cm</p>
                    </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12 mb-4">
                <div class="card card-bordered">
                    <div class="card-body p-4">
                      <p class="mb-1 fw-bold">Weight</p>
                      <p class="mb-0">{{ $patient->weight }} kg</p>
                    </div>
                </div>
              </div>
            </div>

            <div class="d-flex flex-column mb-3 gap-3">
              <div class="p-4 border rounded text-start">
                <p class="mb-1">
                  <span class="fw-bold">Owner: </span>
                  <span class="fw-bold" style="color:#9DA831;">{{ $patient->owner->name ?? '' }}</span>
                </p>
                <p class="mb-1">
                  <span class="fw-bold">Contact: </span>
                  {{ $patient->owner->phone_no ?? '' }}
                </p>
                <p class="mb-1">
                  <span class="fw-bold">Date of Birth: </span>
                  {{ $birthDate }}
                </p>
                <p class="mb-1">
                  <span class="fw-bold">Joined: </span>
                  {{ $joinedDate }}
                </p>
                <p class="mb-1">
                  <span class="fw-bold">Last Visit: </span>
                </p>
                <p class="mb-1">
                  <span class="fw-bold">Chronic Disease: </span>
                  @if ($patient->chronic_disease == NULL)
                    None
                  @endif
                </p>
              </div>

              <div class="p-2"></div>
            </div>
          </div>
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Body-->
    </div>
    <!--end::Engage widget 10-->
  </div>
  <div class="col-xxl-6">
    <div class="card card-flush h-md-100">
      <!--begin::Body-->
      <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
        <!--begin::Wrapper-->
        <div class="mb-10">
          <ul class="nav nav-pills mb- justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="btn btn-success btn-sm" id="pills-medical-tab" data-bs-toggle="pill" data-bs-target="#pills-medical" type="button" role="tab" aria-controls="pills-medical" aria-selected="true">Medical History</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="btn btn-success btn-sm" id="pills-medications-tab" data-bs-toggle="pill" data-bs-target="#pills-medications" type="button" role="tab" aria-controls="pills-medications" aria-selected="false">Medications</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="btn btn-success btn-sm" id="pills-appointments-tab" data-bs-toggle="pill" data-bs-target="#pills-appointments" type="button" role="tab" aria-controls="pills-appointments" aria-selected="false">Appointments</button>
            </li>
          </ul>
          <div class="separator my-4"></div>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-medical" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
              <a href="http://" class="text-success">This is medical history</a>
            </div>
            <div class="tab-pane fade" id="pills-medications" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
              This is medications
            </div>
            <div class="tab-pane fade" id="pills-appointments" role="tabpanel" aria-labelledby="pills-disabled-tab" tabindex="0">
              This is appointments
            </div>
          </div>          
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Body-->
    </div>
  </div>
  <!--end::Col-->
</div>
<!--end::Row-->
@endsection
