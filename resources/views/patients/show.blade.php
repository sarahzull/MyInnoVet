@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Patient') }}</div>

                <div class="card-body">
                  {{-- @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif --}}
                  
                  <div class="container text-center">
                    <div class="row row-cols-2">
                      <div class="col border py-2">
                        <div class="text-center">
                          <img src="{{ asset('images/' . $patient->image) }}" class="rounded-circle w-50 border">
                        </div>
                        <p class="fw-bold fs-5 mb-0">{{ $patient->name }}</p>
                        <p>
                          <span class="text-secondary fw-bold"> years old</span> 
                          . 
                          <span class="fw-bold" style="color:#C4D23D;">{{ $patient->gender }}</span>
                        </p>
                      </div>
                      <div class="col border py-2">Column</div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
