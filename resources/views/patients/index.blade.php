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
                              <div class="dropdown-center">
                                <button class="btn btn-transparent dropdown-toggle btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">Action</a></li>
                                  <li><a class="dropdown-item" href="#">Another action</a></li>
                                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                              </div>
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
