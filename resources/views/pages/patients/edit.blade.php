@extends('layout.master-page')
@section('title', 'Edit Patient')
@section('breadcrumb', 'Patients')

@section('content')

<div class="card">
  <div class="card-header">
    <div class="card-title ">
      <a class="text-sm" href="{{ route('patients.index') }}">
        {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
      </a>
    </div>
  </div>
  <div class="card-body">
    {{-- <div class="d-grid gap-2 d-md-block mb-4">
      <a href="{{ route('patients.index') }}" class="text-sm">
        {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
      </a>
    </div> --}}

    <form
      action="{{ route('patients.update', $patient->id) }}"
      method="POST"
      enctype="multipart/form-data">
      @csrf
      @method('PATCH')

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Image</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('{{ asset('assets/media/svg/avatars/blank.svg')}}')">
                  <div class="image-input-wrapper w-125px h-125px" style="background-image: url('{{ asset('storage/image/' . $patient->image) }}')">
                  </div>
                  <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                    <i class="bi bi-pencil-fill fs-7"></i>
                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                    <input type="hidden" name="avatar_remove" />
                  </label>
                  <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                    <i class="bi bi-x fs-2"></i>
                  </span>
                  <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                    <i class="bi bi-x fs-2"></i>
                  </span>
                </div>
                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Owner</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <select name="owner_id" id="owner_id" aria-label="Select owner" data-control="select2" data-placeholder="Select a owner" class="form-select form-select-solid form-select-lg fw-semibold">
                  @foreach ($owners as $own)
                    <option value="{{ $own->id }}" {{ (old('owners') ? old('owners') : $patient->owner->id ?? '') == $own->id ? 'selected' : '' }}>{{ $own->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Patient's Name</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <input type="text" name="name" id="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $patient->name ?? '' }}" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Date of Birth</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <input type="date" name="dob" id="dob" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Breed</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <input type="text" name="breed" id="breed" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $patient->breed ?? '' }}"/>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Gender</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <select name="gender" id="gender" aria-label="Select gender" data-control="select2" data-placeholder="Select a gender" class="form-select form-select-solid form-select-lg fw-semibold">
                  <option value="Male" @if ($patient->gender == "Male") {{ 'selected' }} @endif>Male</option>
                  <option value="Female" @if ($patient->gender == "Female") {{ 'selected' }} @endif>Female</option>
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Species</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <select name="species" id="species" aria-label="species-select" data-control="select2" data-placeholder="Select a species" class="form-select form-select-solid form-select-lg fw-semibold">
                  @foreach ($species as $sp)
                    <option value="{{ $sp->id }}" {{ (old('species') ? old('species') : $patient->species->id ?? '') == $sp->id ? 'selected' : '' }}>{{ $sp->name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Height (cm)</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <input type="number" name="height" id="height" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $patient->height ?? '' }}"/>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Weight (kg)</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <input type="number" name="weight" id="weight" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $patient->weight ?? '' }}"/>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label fw-semibold fs-6">Chronic Disease</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <input type="text" name="chronic_disease" id="chronic_disease" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ $patient->chronic_disease ?? '' }}"/>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </div>
    </form>
  </div>
</div>

@endsection

@section('scripts')
  <script>
    KTUtil.onDOMContentLoaded(function () {
      $("#dob").flatpickr({
        defaultDate: '{{ $patient->dob }}',
        altInput: true,
        altFormat: 'j F Y'
      });
    })
  </script>
@endsection




