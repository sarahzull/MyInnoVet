@extends('layout.master')
@section('title', 'Permission List')
@section('breadcrumb', 'Permissions')
@section('header-button')
  @can('patient_create')
    <a href="{{ route('permissions.create')}}" class="btn fw-bold btn-success">Add Permissions</a>
  @endcan
@endsection

@section('content')

<div class="card">
  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
    @endif
    
    <div class="table-responsive">
      <table id="kt_datatable" class="table table-bordered gy-3 gs-3 align-middle">
        <thead>
          <tr class="text-start text-gray-700 fw-bold fs-7 text-uppercase bg-light">
            <th scope="col" class="text-center w-70px">ID</th>
            <th scope="col">Name</th>
            <th scope="col" class="text-center w-150px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($permissions as $index => $permission)
            <tr>
              <th scope="row" class="text-center">{{ $index + 1 }}</th>
              <td>{{ $permission->name ?? '' }}</td>
              <td class="text-center">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                  <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                  </span>
                </a>
                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4 text-center" data-kt-menu="true">
                  <div class="menu-item px-3">
                    <button class="btn btn-sm menu-button">
                      <a href="{{ route('permissions.edit', $permission->id) }}">Edit</a>
                    </button>
                  </div>
                  <div class="menu-item px-3">
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm menu-button">
                          Delete
                      </button>
                    </form>
                  </div>
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




