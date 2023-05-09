@extends('layout.master')
@section('title', 'User List')
@section('breadcrumb', 'Users')
@section('header-button')
  @can('user_create')
    <a href="{{ route('users.create') }}" class="btn fw-bold btn-success">Add User</a>
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
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Last Seen</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center w-150px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $index => $user)
            <tr>
              <th scope="row" class="text-center">{{ $index + 1 }}</th>
              <td>{{ $user->name ?? '' }}</td>
              <td>{{ $user->email ?? '' }}</td>
              <td>
                @foreach ($user->roles as $role)
                  @if ($role->name == 'Customer Service Executive')
                    <span class="badge badge-dark">{{ $role->name }}</span>
                  @elseif ($role->name == 'Veterinarian')
                    <span class="badge badge-warning">{{ $role->name }}</span>
                  @elseif ($role->name == 'Patient')
                    <span class="badge badge-success">{{ $role->name }}</span>
                  @elseif ($role->name == 'Client')
                    <span class="badge badge-primary">{{ $role->name }}</span>
                  @endif
                @endforeach
              </td>
              <td>
                {{ $user->last_seen ? Carbon\Carbon::parse($user->last_seen)->diffForHumans() : '' }}
              </td>
              <td class="text-center">
                  @if(Cache::has('user-is-online-' . $user->id))
                      <span class="text-success">Online</span>
                  @else
                      <span class="text-secondary">Offline</span>
                  @endif
              </td>
              <td class="text-center">
                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                  <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                    </svg>
                  </span>
                </a>
                  <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                    @can('user_show')
                    <div class="menu-item px-3">
                      <a href="{{ route('users.show', $user->id) }}" class="menu-link px-3">View</a>
                    </div>
                    @endcan

                    @can('user_edit')
                    <div class="menu-item px-3">
                      <a href="{{ route('users.edit', $user->id) }}" class="menu-link px-3">Edit</a>
                    </div>
                    @endcan
          
                    @can('user_delete')
                    <div class="menu-item px-3">
                      <form action="{{ route('clients.destroy', $user->id) }}" onsubmit="return confirm('Are you sure want to delete?');" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm menu-link text-primary">
                            Delete
                        </button>
                      </form>
                    </div>
                    @endcan
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




