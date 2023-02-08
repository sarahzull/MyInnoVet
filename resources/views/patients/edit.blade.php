@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Patient') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                  <form
                    action="{{ route('patients.update', $patient->id) }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                      <label for="owner" class="form-label">Owner</label>
                      <select class="form-select" aria-label="owner-select" name="owner_id">
                        <option selected>Select owner</option>
                        <option value="{{ $patient->owner->id ?? ''  }}" selected>{{ $patient->owner->name ?? '' }}</option>
                        @foreach ($owners as $own)
                          <option value="{{ $own->id }}">{{ $own->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ $patient->name ?? '' }}">
                    </div>

                    <div class="mb-3">
                      <label for="name" class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" id="dob" name="dob">
                    </div>

                    <div class="mb-3">
                      <label for="breed" class="form-label">Breed</label>
                      <input type="text" class="form-control" id="breed" name="breed" value="{{ $patient->breed ?? '' }}">
                    </div>

                    <div class="mb-3">
                      <label for="gender" class="form-label">Gender</label>
                      <select class="form-select" aria-label="gender-select" id="gender" name="gender">
                        <option value="Male" @if ($patient->gender == "Male") {{ 'selected' }} @endif>Male</option>
                        <option value="Female" @if ($patient->gender == "Female") {{ 'selected' }} @endif>Female</option>
                      </select>
                      @if($errors->has('gender'))
                          <div class="invalid-feedback">
                              {{ $errors->first('gender') }}
                          </div>
                      @endif
                    </div>

                    <div class="mb-3">
                      <label for="species" class="form-label">Species</label>
                      <select class="form-select" aria-label="species-select" name="species_id">
                        <option selected>Choose species</option>
                        @foreach ($species as $sp)
                          <option value="{{ $sp->id }}">{{ $sp->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="mb-3">
                      <label for="height" class="form-label">Height (cm)</label>
                      <input type="number" class="form-control" id="height" name="height" min="1.0" value="{{ $patient->height ?? '' }}">
                    </div>

                    <div class="mb-3">
                      <label for="weight" class="form-label">Weight (kg)</label>
                      <input type="number" class="form-control" id="weight" name="weight" value="{{ $patient->weight ?? '' }}">
                    </div>

                    <div class="mb-3">
                      <label for="chronic_disease" class="form-label">Chronic Disease</label>
                      <input type="text" class="form-control" id="chronic_disease" name="chronic_disease" value="{{ $patient->chronic_disease ?? '' }}">
                    </div>

                    <div class="mb-3">
                      <label for="image" class="form-label">Image</label>
                      <input class="form-control mb-2" type="file" id="image" name="image" value="{{ $patient->image }}">
                      <img src="{{ asset('images/' . $patient->image) }}" alt="{{ $patient->name }}" width="20%">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
  flatpickr('#dob', {
    defaultDate: '{{ $patient->dob }}',
    altInput: true,
    altFormat: 'j F Y'
  });
</script>
@endsection