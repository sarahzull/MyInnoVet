@extends('layout.master-page')
@section('title', 'Create Permission')
@section('breadcrumb', 'Permissions')

@section('content')

<div class="card">
  <div class="card-header">
    <div class="card-title ">
      <a class="text-sm" href="{{ route('permissions.index') }}">
        {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
      </a>
    </div>
  </div>
  <div class="card-body">
    <form
        action="{{ route('permissions.store') }}"
        method="POST">
        @csrf

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Name</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <input type="text" name="name" id="name" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"/>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success">Save</button>
      </div>
    </form>

    @if (Session::has('success'))
    <script>
      KTUtil.onDOMContentLoaded(function () {
        .Swal.fire("Message", "{{ Session::get('success') }}", "success", {
          button: true,
          button: "OK",
          timer: 3000,
        })
        .then(function() {
          window.location = "{{ route('permissions.index') }}";
        })
      });
    </script>
    @endif
    
  </div>
</div>

@endsection