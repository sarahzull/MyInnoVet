@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Roles') }}</div>

                <div class="card-body">
                  <div class="row mb-2">
                    <div class="col"></div>
                    <div class="col text-end">
                        <a type="button" class="btn btn-primary" href="{{ route('roles.create')}}">
                            Add User
                        </a>
                    </div>
                  </div>
                  
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table-light">
                          <th scope="col" class="text-center">ID</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col" class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <th scope="row" class="text-center">{{ $user->id }}</th>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td class="text-center">
                            {{-- {{ route('lecturers.edit', $lecturer->id) }} --}}
                            <div class="d-flex justify-content-center p-0">
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm text-secondary text-decoration-none ml-2" href="">
                              <i class="fa-solid fa-pen"></i>
                              </a>
                              {{-- <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm text-secondary text-decoration-none">
                                      <i class="fa-solid fa-trash"></i>
                                  </button>
                              </form> --}}
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
