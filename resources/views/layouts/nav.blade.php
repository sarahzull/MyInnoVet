@can('patient_access')
<li class="nav-item">
    <a class="nav-link" href="{{ route('patients.index') }}">{{ __('Patients') }}</a>
</li>
@endcan

@can('role_access')
<li class="nav-item">
    <a class="nav-link" href="{{ route('roles.index') }}">{{ __('Roles') }}</a>
</li>
@endcan

@can('permission_access')
<li class="nav-item">
    <a class="nav-link" href="{{ route('permissions.index') }}">{{ __('Permissons') }}</a>
</li>
@endcan

@can('user_access')
<li class="nav-item">
    <a class="nav-link" href="{{ route('users.index') }}">{{ __('Users') }}</a>
</li>
@endcan

@can('client_access')
<li class="nav-item">
    <a class="nav-link" href="{{ route('clients.index') }}">{{ __('Clients') }}</a>
</li>
@endcan