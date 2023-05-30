@extends('layout.master')
@section('title', 'Patients')
@section('breadcrumb', 'Patients Details')

@section('content')

<div class="row g-5 g-xl-10 mb-5 mb-xl-10">
  <div class="col-xxl-6">
    <div class="card card-flush h-md-100">
      <div class="card-body d-flex flex-column justify-content-between bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
        <div class="mb-10">
          <div class="col py-2">
            <div class="d-flex justify-between">
              <div class="col text-start">
                <a href="{{ route('patients.index') }}" class="text-sm">
                  {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
                </a>
              </div>
              <div class="col"></div>
              <div class="col text-end">
                @can('patient_edit')
                <a href="{{ route('patients.edit', $patient->id) }}" class="text-sm">
                  {!! getSvgIcon('duotune/general/gen055.svg', 'svg-icon svg-icon-2') !!}
                </a>
                @endcan
              </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-5">
                    {{ session('success') }}
                </div>
            @endif

            <div class="text-center mb-3">
              <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                <img src="{{ asset('storage/image/' . $patient->image) }}" class="" width="40%">
              </div>
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
                  @if ($lastVisit)
                    {{ $lastVisit->format('d F Y') }}
                  @else
                      N/A
                  @endif
                </p>
                <p class="mb-1">
                  <span class="fw-bold">Chronic Disease: </span>
                  @if ($patient->chronic_disease)
                    N/A
                  @endif
                </p>
              </div>

              <div class="p-2"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xxl-6">
    <div class="card card-flush h-md-100">
      <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0">
        <div class="mb-10">
          <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#pills-medical-tab">Medical History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#pills-medications-tab">Medications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#pills-appointments-tab">Appointments</a>
            </li>
          </ul>

          <div class="separator my-4"></div>

          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="pills-medical-tab" role="tabpanel">
              <div class="scroll h-400px px-4">
                <div class="d-flex justify-between">
                  <div class="col"></div>
                  <div class="col"></div>
                  <div class="col text-end">
                    <a href="{{ route('medical-records.showId', $patient->id) }}" class="btn btn-sm btn-outline btn-outline-line btn-outline-primary">View All</a>
                  </div>
                </div>
                @foreach($medicalRecords as $record)
                  <div class="card border mt-2">
                    <div class="card-body p-6">
                      <p class="fs-5 fw-bold mb-0">{{ $record->diagnosis }}</p>
                      <p class="mb-0 text-muted">{{ $record->created_at->format('d F Y') }}</p>
                      <p class="mb-0 text-muted">
                        @if ($record->creator->id == 1)
                          Admin
                        @else
                          Veterinarian {{ $record->creator->name }}
                        @endif
                      </p>
                    </div>
                  </div>   
                @endforeach           
              </div>            
            </div>
            <div class="tab-pane fade" id="pills-medications-tab" role="tabpanel">
              @foreach($medicalRecords as $record)
                  <div class="card border mt-2">
                    <div class="card-body p-6">
                      <p class="fs-5 fw-bold mb-0">{{ $record->diagnosis }}</p>
                      <p class="mb-0 text-muted">{{ $record->medication }}</p>
                      <p class="mb-0 text-muted">{{ $record->created_at->format('d F Y') }}</p>
                      {{-- <p class="mb-0 text-muted">
                        @if ($record->creator->id == 1)
                          Admin
                        @else
                          Veterinarian {{ $record->creator->name }}
                        @endif
                      </p> --}}
                    </div>
                  </div>   
                @endforeach     
            </div>
            <div class="tab-pane fade" id="pills-appointments-tab" role="tabpanel">
              <div class="scroll h-400px px-4">
                {{-- @foreach($appointments as $apt)
                  <div class="card border mt-2">
                    <div class="card-body p-6">
                      <p class="fs-5 fw-bold mb-0">{{ \Carbon\Carbon::parse($apt->date)->format('d F Y') }}</p>
                      <p class="mb-0 text-muted">{{ \Carbon\Carbon::parse($apt->start_time)->format('g:i A') }}</p>
                      <p class="fs-5 text-muted">{{ ucfirst($apt->type) }}</p>
                      <p class="mb-0 text-muted">
                        @if ($record->creator->id == 1)
                          Admin
                        @else
                          Veterinarian {{ $record->creator->name }}
                        @endif
                      </p>
                    </div>
                  </div>   
                @endforeach            --}}
              </div>           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
