<div class="form-group {{ $errors->has('name') ? 'has-error col-7' : 'col-7' }}">
    {{ Form::label('name', 'Nama User') }}
    {{ Form::text('name',$user->name,['class'=>'form-control border-input', 'readonly']) }}
    <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error col-7' : 'col-7' }}">
    {{ Form::label('email', 'Email User') }}
    {{ Form::text('email',$user->email,['class'=>'form-control border-input', 'readonly']) }}
    <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
</div>

<div class="form-group{{ $errors->has('role_id') ? 'has-error col-7' : 'col-7'}}">
    {!! Form::label('role_id', 'User Role', ['class' => 'control-label']) !!} 
    <select class="form-control col-7" name="role_id" id="">
        @foreach ($roles as $item)
            <option {{ ($item->id) == $user->role_id ? 'selected' : '' }}  value="{{ $item->id }}">{{ $item->role }}</option>        
        @endforeach        
    </select>     
    {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('alamat') ? 'has-error col-7' : 'col-7' }}">
    {{ Form::label('alamat', 'Alamat User') }}
    {{ Form::text('alamat',$user->alamat,['class'=>'form-control border-input', 'readonly']) }}
    <span class="text-danger">{{ $errors->has('alamat') ? $errors->first('alamat') : '' }}</span>
</div>

<div class="form-group {{ $errors->has('no_telp') ? 'has-error col-7' : 'col-7' }}">
    {{ Form::label('no_telp', 'No Telp User') }}
    {{ Form::text('no_telp',$user->no_telp,['class'=>'form-control border-input', 'readonly']) }}
    {{ Form::hidden('user_id',$user->id) }}
    <span class="text-danger">{{ $errors->has('no_telp') ? $errors->first('no_telp') : '' }}</span>
</div>

