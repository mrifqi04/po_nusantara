<div class="form-group {{ $errors->has('jam') ? 'has-error col-7' : 'col-7' }}">
    {{ Form::label('jam', 'Jam Operasional') }}
    {{ Form::text('jam',$jam->jam,['class'=>'form-control border-input']) }}
    <span class="text-danger">{{ $errors->has('jam') ? $errors->first('jam') : '' }}</span>
</div>