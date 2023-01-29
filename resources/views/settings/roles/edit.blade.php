@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Role') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                  <form
                    action="{{ route('roles.update', $role->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
