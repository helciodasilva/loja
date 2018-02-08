@extends('layout.principal')

@section("conteudo")

{{ Form::open(array('route' => 'login')) }}
	<div class="form-group">
		{{ Form::label('email', 'E-mail') }}
		{{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>
	@if ($errors->has('email'))
		<span class="help-block">
			<strong>{{ $errors->first('email') }}</strong>
		</span>
	@endif
	<div class="form-group">
		{{ Form::label('password', 'Senha') }}
		{{ Form::password('password', array('class' => 'form-control')) }}
	</div>
	@if ($errors->has('password'))
		<span class="help-block">
			<strong>{{ $errors->first('password') }}</strong>
		</span>
	@endif
	<div class="form-group">
		<label>
			{{ Form::checkbox('', 1, null, ['class' => 'field', 'name' => 'remember']) }}
			Mantenha-me contectado
		</label>
	</div>

	<div class="form-group">
		{{ Form::submit('Entrar', array('class' => 'btn btn-primary')) }}
	</div>
{{ Form::close() }}
@endsection
