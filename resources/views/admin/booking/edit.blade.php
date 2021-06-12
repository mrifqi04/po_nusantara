<div class="form-group{{ $errors->has('booking_id') ? 'has-error' : ''}}">    
    {!! Form::hidden('booking_id', $item->id, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('booking_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="right">
    {!! Form::submit($formMode === 'Accept' ? 'Accept' : ($formMode === 'Confirm' ? 'Confirm' : 'Done'), ['class' => 'btn btn-success btn-lg']) !!}    
    <a href="#" onClick="javascript:history.go(-1)" class="btn btn-warning btn-lg">Cancel and Back</a>
</div>
