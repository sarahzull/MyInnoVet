@extends('layout.master')
@section('title', 'Patient List')
@section('breadcrumb', 'Patients')
@section('header-button')
  @can('patient_create')
    <a href="{{ route('patients.create')}}" class="btn btn-sm fw-bold btn-success">Add Patient</a>
  @endcan
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="kt_datatable" class="table table-bordered gy-3 gs-3 align-middle">
        <thead>
          <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase bg-light">
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
  <script>
    KTUtil.onDOMContentLoaded(function () {
      $("#kt_datatable").DataTable({
        "bSort": false,
        language: {
          paginate: {
            previous: '<i class="previous"></i>', // or '←'
            next: '<i class="next"></i>' // or '→'   
          }
        }
      });
    })
  </script>
@endsection




