@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                  @if ($message = session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif
                  
                  <div class="container text-center">
                    <div class="row row-cols-2">
                      <div class="col py-2">
                        <div class="d-flex justify-between">
                          <div class="col"></div>
                          <div class="col"></div>
                          <div class="col text-end">
                            <a href="{{ route('patients.edit', $patient->id) }}" class="text-secondary text-sm">
                              <i class="fas fa-edit"></i>
                            </a>
                          </div>
                        </div>
                        <div class="text-center mb-3">
                          <img src="{{ asset('images/' . $patient->image) }}" class="" width="40%">
                        </div>
                        <p class="fw-bold fs-5 mb-0">{{ $patient->name ?? '' }}</p>
                        <p>
                          <span class="text-secondary fw-bold">
                            {{ $patient->age() }}
                          </span> 
                          . 
                          <span class="fw-bold" style="color:#C4D23D;">{{ $patient->gender }}</span>
                        </p>

                        <div class="d-flex flex-column mb-3 gap-3">
                          <div>
                            <div class="row justify-content-center gap-3">
                              <div class="col-3 px-4 py-2 border rounded">
                                <p class="mb-1 text-secondary fw-bold">Breed</p>
                                <p class="mb-0 text-wrap">{{ $patient->breed }}</p>
                              </div>
                              <div class="col-3 px-4 py-2 border rounded">
                                <p class="mb-1 text-secondary fw-bold">Height</p>
                                <p class="mb-0">{{ $patient->height }} cm</p>
                              </div>
                              <div class="col-3 px-4 py-2 border rounded">
                                <p class="mb-1 text-secondary fw-bold">Weight</p>
                                <p class="mb-0">{{ $patient->weight }} kg</p>
                              </div>
                            </div>
                          </div>

                          <div class="p-4 border rounded text-start">
                            <p class="mb-1">
                              <span class="text-secondary fw-bold">Owner: </span>
                              <span class="fw-bold">{{ $patient->owner->name ?? '' }}</span>
                            </p>
                            <p class="mb-1">
                              <span class="text-secondary fw-bold">Contact: </span>
                              {{ $patient->owner->phone_no ?? '' }}
                            </p>
                            <p class="mb-1">
                              <span class="text-secondary fw-bold">Date of Birth: </span>
                              {{ $birthDate }}
                            </p>
                            <p class="mb-1">
                              <span class="text-secondary fw-bold">Joined: </span>
                              {{ $joinedDate }}
                            </p>
                            <p class="mb-1">
                              <span class="text-secondary fw-bold">Last Visit: </span>
                            </p>
                            <p class="mb-1">
                              <span class="text-secondary fw-bold">Chronic Disease: </span>
                              @if ($patient->chronic_disease == NULL)
                                None
                              @endif
                            </p>
                          </div>

                          <div class="p-2"></div>
                        </div>
                      </div>
                      <div class="col py-2">Column</div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
