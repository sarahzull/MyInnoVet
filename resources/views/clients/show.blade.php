@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          @if ($message = session('success'))
              <div class="alert alert-success" role="alert">
                  {{ session('success') }}
              </div>
          @endif
            <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex justify-between mb-3">
                    <div class="col-8 text-start">
                      <h3>Profile Information</h3>
                      <span class="text-muted">Update your account's profile information and email address.</span>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-3 text-end">
                      <a href="{{ route('clients.index') }}" class="text-secondary text-sm">
                        <i class="fa-solid fa-arrow-left"></i>
                      </a>
                    </div>
                  </div>
                  
                  <form
                    action="{{ route('clients.update', $client->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                      <label for="name" class="form-label fw-bold text-secondary">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $client->name ?? '' }}">
                    </div>

                    <div class="mb-3">
                      <label for="dob" class="form-label fw-bold text-secondary">Date of Birth</label>
                      <input type="text" class="form-control" id="dob" name="dob">
                    </div>

                    <div class="mb-3">
                      <label for="email" class="form-label fw-bold text-secondary">Email</label>
                      <input type="email" class="form-control" id="email" name="email" value="{{ $client->email ?? '' }}">
                    </div>

                    <div class="mb-3">
                      <label for="phone_no" class="form-label fw-bold text-secondary">Phone Number</label>
                      <input type="number" class="form-control" id="phone_no" name="phone_no" value="{{ $client->phone_no ?? '' }}">
                    </div>

                    <div class="mb-3">
                      <label for="password" class="form-label fw-bold text-secondary">Password</label>
                      <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div class="mb-3">
                      <label for="street_address" class="form-label fw-bold text-secondary">Street Address</label>
                      <input type="text" class="form-control" id="street_address" name="street_address" value="{{ $client->street_address ?? '' }}">
                    </div>
  
                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="city" class="form-label fw-bold text-secondary">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $client->city ?? '' }}">
                      </div>
  
                      <div class="col-md-4 mb-3">
                        <label for="state" class="form-label fw-bold text-secondary">State</label>
                        <input type="text" class="form-control" id="state" name="state" value="{{ $client->state ?? '' }}">
                      </div>
  
                      <div class="col-md-3 mb-3">
                        <label for="postcode" class="form-label fw-bold text-secondary">Postcode</label>
                        <input type="text" class="form-control" id="postcode" name="postcode">
                      </div>
                    </div>
                    
                    <br>
                    <div class="text-end">
                      <button type="submit" class="btn btn-success">Save</button> 
                    </div>
                  </form>
                </div>
            </div>

            {{-- <div class="card my-4">
              <div class="card-body p-4">
                <h3>Address</h3>
                <span class="text-muted">Update your address information</span>
                <br><br>
                
                <form
                  action="{{ route('clients.update', $client->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')

                  <div class="mb-3">
                    <label for="street_address" class="form-label fw-bold text-secondary">Street Address</label>
                    <input type="text" class="form-control" id="street_address" name="street_address" value="{{ $client->street_address ?? '' }}">
                  </div>

                  <div class="row">
                    <div class="col-md-4 mb-3">
                      <label for="city" class="form-label fw-bold text-secondary">City</label>
                      <input type="text" class="form-control" id="city" name="city" value="{{ $client->city ?? '' }}">
                    </div>

                    <div class="col-md-4 mb-3">
                      <label for="state" class="form-label fw-bold text-secondary">State</label>
                      <input type="text" class="form-control" id="state" name="state" value="{{ $client->state ?? '' }}">
                    </div>

                    <div class="col-md-3 mb-3">
                      <label for="postcode" class="form-label fw-bold text-secondary">Postcode</label>
                      <input type="text" class="form-control" id="postcode" name="postcode">
                    </div>
                  </div>
                  
                  <br>
                  <div class="text-end">
                    <button type="submit" class="btn btn-success">Save</button> 
                  </div>
                </form>
              </div> --}}
          </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
  flatpickr('#dob', {
    defaultDate: '{{ $client->dob ?? '' }}',
    altInput: true,
    altFormat: 'j F Y'
  });
</script>
@endsection