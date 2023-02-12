@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Role') }}</div>

                <div class="card-body">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif --}}

                  <form
                    action="{{ route('roles.update', $role->id) }}"
                    method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ $role->name }}">
                    </div>

                    {{-- <div class="mb-3">
                        <label for="name" class="form-label required">Permissions</label>
                        <input type="text" class="form-control" id="permissions" name="permissions">
                    </div> --}}

                    <div class="mb-3">
                        <label class="required" for="permissions">Permission</label>
                        <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-sm select-all">Select All</span>
                            <span class="btn btn-info btn-sm deselect-all">Deselect All</span>
                        </div>
                        <select class="form-control select2" name="permissions[]" id="permissions" multiple required>
                            @foreach($permissions as $id => $permission)
                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permission }}</option>
                            @endforeach
                        </select>
                        {{-- <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}" name="permissions[]" id="permissions" multiple required>
                            @foreach($permissions as $id => $permission)
                                <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || $role->permissions->contains($id)) ? 'selected' : '' }}>{{ $permission }}</option>
                            @endforeach
                        </select> --}}
                        {{-- @if($errors->has('permissions'))
                            <div class="invalid-feedback">
                                {{ $errors->first('permissions') }}
                            </div>
                        @endif --}}
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                  </form>
                </div>
            </div>
        </div>
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