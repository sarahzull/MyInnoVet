@extends('layout.master')
@section('title', 'Roles')
@section('breadcrumb', 'Roles List')
@section('header-button')
  @can('patient_create')
    <a href="{{ route('roles.create')}}" class="btn btn-sm fw-bold btn-success">Add Roles</a>
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
            <th scope="col">Role</th>
            <th scope="col" class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($roles as $role)
            <tr>
              <th scope="row" class="text-center">{{ $role->id }}</th>
              <td>{{ $role->name }}</td>
              <td>
                @foreach($role->permissions as $key => $item)
                  <span class="badge badge-secondary badge">{{ $item->name }}</span>
                @endforeach
              </td>
              <td class="text-center">
                <div class="d-flex justify-content-center p-0">
                  <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm text-secondary text-decoration-none ml-2" href="">
                  <i class="fa-solid fa-pen"></i>
                  </a>
                  <form action="{{ route('roles.destroy', $role->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm text-secondary text-decoration-none">
                          <i class="fa-solid fa-trash"></i>
                      </button>
                  </form>
                </div>
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




