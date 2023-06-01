@extends('layout.master-page')
@section('title', 'Medical Record Details')
@section('breadcrumb', 'Medical Records')

@section('content')
<div class="card">
  <div class="card-header">
    <div class="card-title">
      <a class="text-sm" href="{{ route('medical-records.index') }}">
        {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
      </a>
      {{-- <h2 class="fw-bold">Medical Record Details</h2> --}}
    </div>
    @if (auth()->check() && auth()->user()->getRoleNames()->first() === 'Veterinarian')
      <div class="card-toolbar">
        <a href="{{ route('medical-records.edit', $record->id) }}" class="btn btn-light">Update Medical Record</a>
      </div>
    @endif
  </div>
  <div class="card-body">
    <div class="d-flex justify-between mb-4">
      <div class="col text-start">
        <a class="text-sm" href="{{ url()->previous() }}">
          {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
        </a>
      </div>
      <div class="col"></div>
      <div class="col"></div>
    </div>
    <div class="mb-10">
      @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif

      <h5 class="mb-4">Patient Details:</h5>
      <div class="d-flex flex-wrap py-5">
        <div class="flex-equal me-5">
          <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
            <tr>
              <td class="text-gray-400 min-w-175px w-175px">Patient Name:</td>
              <td class="text-gray-800 min-w-200px">
                <a href="{{ route('patients.show', $record->patient->id) }}" class="text-gray-800 text-hover-primary">{{ $record->patient->name }}</a>
              </td>
            </tr>
            <tr>
              <td class="text-gray-400">Species:</td>
              <td class="text-gray-800">{{ $record->patient->species->name }}</td>
            </tr>
            <tr>
              <td class="text-gray-400">Gender:</td>
              <td class="text-gray-800">{{ $record->patient->gender }}</td>
            </tr>
            <tr>
              <td class="text-gray-400">Age:</td>
              <td class="text-gray-800">{{ $record->patient->age() }}</td>
            </tr>
          </table>
        </div>
        <div class="flex-equal">
          <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
            <tr>
              <td class="text-gray-400 min-w-175px w-175px">Owner:</td>
              <td class="text-gray-800 min-w-200px">
                <a href="{{ route('clients.show', $record->patient->owner->id) }}" class="text-gray-800 text-hover-primary">{{ $record->patient->owner->name }}</a>
              </td>
            </tr>
            <tr>
              <td class="text-gray-400">Phone:</td>
              <td class="text-gray-800">{{ $record->patient->owner->phone_no }}</td>
            </tr>
            <tr>
              <td class="text-gray-400">Joined:</td>
              <td class="text-gray-800">
                @if ($record->patient->created_at)
                    {{ $record->patient->created_at->format('d F Y') }}
                @else
                    N/A
                @endif
              </td>
            </tr>
            <tr>
              <td class="text-gray-400">Last Visit:</td>
              <td class="text-gray-800">
                @if ($record->created_at)
                    {{ $record->created_at->format('d F Y') }}
                @else
                    N/A
                @endif
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="mb-0">
      <h5 class="mb-4">Medical Record Details:</h5>
      <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
          <thead>
            <tr class="border-bottom border-gray-200 text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
              <th class="min-w-150px">Diagnosis</th>
              <th class="min-w-150px">Treatment</th>
              <th class="min-w-150px">Medication</th>
            </tr>
          </thead>
          <tbody class="fw-semibold text-gray-800">
            <tr>
              <td>
                {{ $record->diagnosis }}
              </td>
              <td>
                {{ $record->treatment }}
              </td>
              <td>
                {{ $record->medication }}
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    
  $('#dob').flatpickr({
    altInput: true,
    altFormat: "j F Y",
  });
</script>
@endsection
