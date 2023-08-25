@extends('layout.master-page')
@section('title', 'View Client')
@section('breadcrumb', 'Clients')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="card-title ">
      <a class="text-sm" href="{{ route('clients.index') }}">
        {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
      </a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped gy-4 gs-4 table-bordered">
        <tbody>
          <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Name</th>
            <td>{{ $client->name }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Phone Number</th>
            <td>{{ $client->phone_no }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Email</th>
            <td>{{ $client->email }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Date of Birth</th>
            <td>{{ \Carbon\Carbon::parse($client->dob)->format('j F Y') }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Street Address</th>
            <td>{{ $client->street_address }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">City</th>
            <td>{{ $client->city }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">State</th>
            <td>{{ $client->state }}</td>
          </tr>
          <tr class="fs-6 text-gray-800 border-bottom border-gray-200">
            <th class="border w-50">Postcode</th>
            <td>{{ $client->postcode }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection

