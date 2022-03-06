<div class="form-group{{ $errors->has('nama_service') ? 'has-error' : ''}}">
    {!! Form::label('nama_service', 'Nama Service', ['class' => 'control-label']) !!}
    {!! Form::text('nama_service', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nama_service', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('depature') ? 'has-error' : ''}}">
    {!! Form::label('depature', 'Keberangkatan', ['class' => 'control-label']) !!}
    <select name="depature" id="" class="form-control">
        <option value="Bekasi">Bekasi</option>
        <option value="Depok">Depok</option>
        <option value="Bandung">Bandung</option>
    </select>
</div>
<div class="form-group{{ $errors->has('arrival') ? 'has-error' : ''}}">
    {!! Form::label('arrival', 'Tujuan', ['class' => 'control-label']) !!}
    <select name="arrival" id="" class="form-control">
        <option value="Bekasi">Bekasi</option>
        <option value="Depok">Depok</option>
        <option value="Bandung">Bandung</option>
    </select>
</div>
<div class="form-group{{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('date', 'Tanggal Keberangkatan', ['class' => 'control-label']) !!}
    <input type="datetime-local" class="form-control" name="date" id="datetime">
</div>
<div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Harga', ['class' => 'control-label']) !!}
    {!! Form::text('price', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group" align="right">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-success btn-lg']) !!}
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-danger btn-lg">Cancel and Back</a>
</div>


<script type="text/javascript">

  var datetime = new Date();
    var day = datetime.getDate();
    if (day < 10){
        day = `0${day}`;
    }
    var month = datetime.getMonth() + 1;
    if (month < 10){
        month = `0${month}`;
    }
    var year = datetime.getFullYear();
    var date = `${year}-${month}-${day}`;
    
    document.getElementById("datetime").setAttribute("min", date);
    
</script>

