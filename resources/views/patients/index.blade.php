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

                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Breed</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Species</th>
                          <th scope="col">Height (cm)</th>
                          <th scope="col">Weight (kg)</th>
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
                          <td>{{ $patient->height }}</td>
                          <td>{{ $patient->weight }}</td>
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
