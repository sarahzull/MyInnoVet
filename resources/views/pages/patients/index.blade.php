@extends('layout.master')
@section('title', 'Patients')
@section('breadcrumb', 'View Patients')
@section('header-button')
  @can('patient_create')
    <a href="{{ route('patients.create')}}" class="btn btn-sm fw-bold btn-success">Add Patient</a>
  @endcan
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="kt_datatable" class="table table-striped gy-3 gs-3 align-middle">
        <thead>
          <tr class="fw-bold fs-6 text-gray-800 border-bottom">
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Breed</th>
            <th scope="col">Gender</th>
            <th scope="col">Species</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($patients as $patient)
            <tr>
            <th scope="row" class="text-center">{{ $patient->id }}</th>
            <td>{{ $patient->name ?? '' }}</td>
            <td>{{ $patient->breed ?? '' }}</td>
            <td>{{ $patient->gender ?? '' }}</td>
            <td>{{ $patient->species->name ?? '' }}</td>
            <td class="text-center">
              <a href="{{ route('patients.show', $patient->id) }}" class="text-dark">
                <i class="fa-solid fa-ellipsis"></i>
              </a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection

@section('scripts')
  <script src="{{ asset('assets/js/pages/crud/ktdatatable/base/data-local.js') }}"></script>
  <script>
    $("#kt_datatable").DataTable();
  </script>

@endsection




