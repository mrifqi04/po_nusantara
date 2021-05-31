<div class="form-group{{ $errors->has('jam') ? 'has-error' : ''}}">
    {!! Form::label('jam', 'Jam Operasional', ['class' => 'control-label']) !!}
    {!! Form::text('jam', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control', 'placeholder' => 'Contoh : 17:30']) !!}
    {!! $errors->first('jam', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
