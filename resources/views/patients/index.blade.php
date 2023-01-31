@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Patients') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @can('patient_create')
                      <div class="row mb-2">
                        <div class="col"></div>
                        <div class="col text-end">
                            <a type="button" class="btn btn-primary" href="{{ route('patients.create')}}">
                                Add Patient
                            </a>
                        </div>
                      </div>
                    @endcan
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Breed</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Species</th>
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($patients as $patient)
                            <tr>
                            <th scope="row">{{ $patient->id }}</th>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->breed }}</td>
                            <td>{{ $patient->gender }}</td>
                            <td>{{ $patient->species }}</td>
                            <td class="text-center">
                              <a href="{{ route('patients.show', $patient->id) }}" class="text-dark">
                                <i class="fa-solid fa-ellipsis"></i>
                              </a>
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
</div>
@endsection
