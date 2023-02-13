@extends('layout.master')
@section('title', 'Clients')
@section('breadcrumb', 'View Clients')
@section('header-button')
  @can('patient_create')
    <a href="{{ route('clients.create')}}" class="btn btn-sm fw-bold btn-success">Add Client</a>
  @endcan
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    <div class="table-responsive">
      <table id="kt_datatable" class="table table-bordered gy-3 gs-3 align-middle">
        <thead>
          <tr class="text-start text-gray-600 fw-bold fs-7 text-uppercase bg-light">
            <th scope="col" class="text-center">ID</th>
            <th scope="col">Name</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($clients as $client)
            <tr>
            <th scope="row" class="text-center">{{ $client->id }}</th>
            <td>{{ $client->name }}</td>
            <td class="text-center">
              {{-- <a href="{{ route('patients.show', $patient->id) }}" class="text-dark">
                <i class="fa-solid fa-ellipsis"></i>
              </a> --}}
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
      $("#kt_datatable").DataTable();
    })
  </script>
@endsection




