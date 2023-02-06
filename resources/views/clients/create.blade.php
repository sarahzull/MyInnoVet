@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Client') }}</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form
                    action="{{ route('patients.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                      <label for="name" class="form-label required-field">Name</label>
                      <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name">
                      @if($errors->has('name'))
                          <div class="invalid-feedback">
                              {{ $errors->first('name') }}
                          </div>
                      @endif
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label required-field">Phone Number</label>
                        <input type="number" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name">
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                      </div>

                    <div class="mb-3">
                        <label for="email" class="form-label required-field">Email</label>
                        <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email">
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label required-field">Password</label>
                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password">
                        @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="nadobme">
                    </div>

                    <div class="mb-3">
                        <label for="street_address" class="form-label">Street Address</label>
                        <input type="text" class="form-control {{ $errors->has('street_address') ? 'is-invalid' : '' }}" id="street_address" name="street_address">
                        @if($errors->has('street_address'))
                            <div class="invalid-feedback">
                                {{ $errors->first('street_address') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" id="city" name="city">
                        @if($errors->has('city'))
                            <div class="invalid-feedback">
                                {{ $errors->first('city') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }}" id="state" name="state">
                        @if($errors->has('state'))
                            <div class="invalid-feedback">
                                {{ $errors->first('state') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="postcode" class="form-label">Postcode</label>
                        <input type="text" class="form-control {{ $errors->has('postcode') ? 'is-invalid' : '' }}" id="postcode" name="postcode">
                        @if($errors->has('postcode'))
                            <div class="invalid-feedback">
                                {{ $errors->first('postcode') }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary" href="{{ route('patients.index')}}">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  flatpickr('#dob', {
      altInput: true,
      altFormat: 'j F, Y'
  });
</script>
@endsection
