@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Patient') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                  <form
                    action="{{ route('patients.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                      <label for="dob" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" name="nadobme">
                    </div>

                    <div class="mb-3">
                      <label for="breed" class="form-label">Breed</label>
                      <input type="text" class="form-control" id="breed" name="breed">
                    </div>

                    <div class="mb-3">
                      <label for="gender" class="form-label">Gender</label>
                      <select class="form-select" aria-label="gender-select">
                        <option selected>Choose gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Unknown">Unknown</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="species" class="form-label">Species</label>
                      <select class="form-select" aria-label="species-select">
                        <option selected>Choose species</option>
                        @foreach ($species as $sp)
                          <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="height" class="form-label">Height (cm)</label>
                      <input type="number" class="form-control" id="height" name="height" min="1">
                    </div>

                    <div class="mb-3">
                      <label for="weight" class="form-label">Weight (kg)</label>
                      <input type="number" class="form-control" id="weight" name="weight" min="1">
                    </div>

                    <div class="mb-3">
                      <label for="chronic_disease" class="form-label">Chronic Disease</label>
                      <input type="text" class="form-control" id="chronic_disease" name="chronic_disease">
                    </div>

                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input class="form-control" type="file" id="image" name="image">
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
