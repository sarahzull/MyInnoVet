@extends('layout.master-page')
@section('title', 'View User')
@section('breadcrumb', 'Users')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="card-title ">
      <a class="text-sm" href="{{ route('users.index') }}">
        {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
      </a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped gy-4 gs-4 table-bordered">
        <tbody>
          <tr class="fw-semibold fs-6 border-bottom border-gray-200">
            <th class="border w-50">Name</th>
            <td>{{ $user->name }}</td>
          </tr>
          <tr class="fs-6 border-bottom border-gray-200">
            <th class="border w-50">Phone Number</th>
            <td>{{ $user->phone_no }}</td>
          </tr>
          <tr class="fs-6 border-bottom border-gray-200">
            <th class="border w-50">Email</th>
            <td>{{ $user->email }}</td>
          </tr>
          <tr class="fs-6 border-bottom border-gray-200">
            <th class="border w-50">Date of Birth</th>
            <td>{{ $birthDate }}</td>
          </tr>
          <tr class="fs-6 border-bottom border-gray-200">
            <th class="border w-50">Street Address</th>
            <td>{{ $user->street_address }}</td>
          </tr>
          <tr class="fs-6 border-bottom border-gray-200">
            <th class="border w-50">City</th>
            <td>{{ $user->city }}</td>
          </tr>
          <tr class="fs-6 border-bottom border-gray-200">
            <th class="border w-50">State</th>
            <td>{{ $user->state }}</td>
          </tr>
          <tr class="fs-6 border-bottom border-gray-200">
            <th class="border w-50">Postcode</th>
            <td>{{ $user->postcode }}</td>
          </tr>
          <tr class="fs-6 border-bottom border-gray-200">
            <th class="border w-50">Joined Date</th>
            <td>{{ $joinedDate }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

