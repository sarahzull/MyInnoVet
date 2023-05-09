@extends('layout.master')
@section('title', 'Create Medical Record')
@section('breadcrumb', 'Medical Records')

@section('styles')
<style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }

    /* Firefox */
    input[type=number] {
    -moz-appearance: textfield;
    }

    .form-control:disabled {
      color: #3F4254 !important;
      opacity: none !important;
    }
</style>
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-between mb-4">
      <div class="col text-start">
        <a class="text-sm" href="{{ url()->previous() }}">
          {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
        </a>
      </div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    
    <form
      action="{{ route('medical-records.store') }}"
      method="POST">
      @csrf

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Patient's Name</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <input type="patient_id" name="patient_id" id="patient_id" class="form-control form-control-flush" value="{{ $visit->patient->name }}" disabled/>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Diagnosis</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <textarea name="diagnosis" id="diagnosis" class="form-control form-control-solid rounded-3" rows="4" required></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Treatment</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <textarea name="treatment" id="treatment" class="form-control form-control-solid rounded-3" rows="4" required></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Medication</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <textarea name="medication" id="medication" class="form-control form-control-solid rounded-3" rows="4" required></textarea>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('medical-records.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
    
  $('#dob').flatpickr({
    altInput: true,
    altFormat: "j F Y",
  });
</script>
@endsection
