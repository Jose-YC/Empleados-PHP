<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('name','Nombre') }}
            {{ Form::text('name', $role->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

            <div class="col-12 ">
                <div class="row">
                    {{ Form::label('name','Lista de perimisos') }}
                    <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                        @foreach ($permissions as $permission)
                            <li class="nav-item">
                                <label class="nav-link">
                                    <div>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" id="permission_{{ $permission->id }}"  {{$role->permissions->contains($permission->id) ? 'checked' : ''}} >
                                        <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {!! $errors->first('permission', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
