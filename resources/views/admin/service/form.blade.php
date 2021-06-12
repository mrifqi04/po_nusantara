<div class="form-group{{ $errors->has('nama_service') ? 'has-error' : ''}}">
    {!! Form::label('nama_service', 'Nama Service', ['class' => 'control-label']) !!}
    {!! Form::text('nama_service', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nama_service', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('deskripsi') ? 'has-error' : ''}}">
    {!! Form::label('deskripsi', 'Deskripsi', ['class' => 'control-label']) !!}
    {!! Form::text('deskripsi', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>
