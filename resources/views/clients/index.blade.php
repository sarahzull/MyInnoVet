@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Clients') }}</div>

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
                            <a type="button" class="btn btn-primary" href="{{ route('clients.create')}}">
                                Add Client
                            </a>
                        </div>
                      </div>
                    @endcan
                    
                    <div class="table-responsive">
                      <table class="table table table-bordered">
                        <thead>
                          <tr class="table-light">
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($clients as $client)
                            <tr>
                            <th scope="row" class="text-center">{{ $client->id }}</th>
                            <td>{{ $client->name }}</td>
                            <td class="text-center">
                              <a href="{{ route('clients.show', $client->id) }}" class="text-dark">
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
