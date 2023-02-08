@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body p-4">
                  @if ($message = session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif
                  
                  <h3>Profile Information</h3>
                  <span class="text-muted">Update your account's profile information and email address.</span>
                  <br><br>
                  
                  <div class="mb-3">
                    <label for="name" class="form-label fw-bold text-secondary">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $client->name ?? '' }}">
                  </div>

                  <div class="mb-3">
                    <label for="email" class="form-label fw-bold text-secondary">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $client->email ?? '' }}">
                  </div>
                  
                  <br>
                  <a href="{{ route('clients.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection