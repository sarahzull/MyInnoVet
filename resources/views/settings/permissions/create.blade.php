@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Permission') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                  <form
                    action="{{ route('permissions.store') }}"
                    method="POST">
                    @csrf

                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
