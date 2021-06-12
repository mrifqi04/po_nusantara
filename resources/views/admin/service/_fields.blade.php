<div class="form-group {{ $errors->has('nama_service') ? 'has-error col-7' : 'col-7' }}">
    {{ Form::label('nama_service', 'Nama Service') }}
    {{ Form::text('nama_service',$service->nama_service,['class'=>'form-control border-input']) }}
    <span class="text-danger">{{ $errors->has('nama_service') ? $errors->first('nama_service') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('deskripsi') ? 'has-error col-7' : 'col-7' }}">
    {{ Form::label('deskripsi', 'Deskripsi') }}
    {{ Form::text('deskripsi',$service->deskripsi,['class'=>'form-control border-input']) }}
    <span class="text-danger">{{ $errors->has('deskripsi') ? $errors->first('deskripsi') : '' }}</span>
</div>