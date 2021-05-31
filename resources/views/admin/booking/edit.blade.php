
<div class="form-group{{ $errors->has('nama_sparepart') ? 'has-error' : ''}}">    
    {!! Form::hidden('booking_id', $item->id, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('nama_sparepart', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'Accept' ? 'Accept' : 'Done', ['class' => 'btn btn-success btn-lg']) !!}    
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-warning btn-lg">Cancel and Back</a>
</div>
