@extends('layout.principal')

@section('conteudo')
{{ Form::open(array('route' => 'register')) }}
	<div class="form-group">
		{{ Form::label('name', 'Nome') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>
	@if ($errors->has('name'))
		<span class="help-block">
			<strong>{{ $errors->first('name') }}</strong>
		</span>
	@endif	
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
		{{ Form::label('password-confirm', 'Repetir senha') }}
		{{ Form::password('password-confirm', array('class' => 'form-control', 'name' => 'password_confirmation')) }}
	</div>
	{{ Form::submit('Cadastrar', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}

@endsection
