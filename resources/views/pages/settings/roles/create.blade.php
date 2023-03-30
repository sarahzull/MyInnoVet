@extends('layout.master-page')
@section('title', 'Create Role')
@section('breadcrumb', 'Roles')

@section('content')

<div class="card">
  <div class="card-header">
    <div class="card-title ">
      <a class="text-sm" href="{{ route('roles.index') }}">
        {!! getSvgIcon('duotune/arrows/arr063.svg', 'svg-icon svg-icon-2') !!}
      </a>
    </div>
  </div>
  <div class="card-body">
    <form
        action="{{ route('roles.store') }}"
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

      <div class="mb-6">
        <div class="row">
          <label class="col-lg-4 col-form-label required fw-semibold fs-6">Permission</label>
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-12 fv-row">
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-sm btn-sm select-all">Select All</span>
                    <span class="btn btn-info btn-sm btn-sm deselect-all">Deselect All</span>
                </div>
                <select class="form-control select2" name="permissions[]" id="permissions" multiple required>
                    @foreach($permissions as $id => $permission)
                        <option value="{{ $id }}">{{ $permission }}</option>
                    @endforeach
                </select>
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

@section('scripts')
    <script>
        $('.select-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', 'selected')
            $select2.trigger('change')
        })
        $('.deselect-all').click(function () {
            let $select2 = $(this).parent().siblings('.select2')
            $select2.find('option').prop('selected', '')
            $select2.trigger('change')
        })
        $('#permissions').select2();
    </script>
@endsection
