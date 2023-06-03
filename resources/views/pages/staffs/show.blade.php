@extends('layout.master-page')
@section('title', 'View Staff')
@section('breadcrumb', 'Staffs')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="d-flex justify-between mb-4">
      <div class="col text-start">
        <a class="text-sm" href="{{ route('staffs.index') }}">
          {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
        </a>
      </div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    
    <div class="table-responsive">
      <table class="table table-striped gy-4 gs-4 table-bordered">
        <tbody>
          <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Name</th>
            <td>{{ $staff->name }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Phone Number</th>
            <td>{{ $staff->phone_no }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Email</th>
            <td>{{ $staff->email }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Date of Birth</th>
            <td>{{ \Carbon\Carbon::parse($staff->dob)->format('j F Y') }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Street Address</th>
            <td>{{ $staff->street_address }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">City</th>
            <td>{{ $staff->city }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">State</th>
            <td>{{ $staff->state }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Postcode</th>
            <td>{{ $staff->postcode }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

