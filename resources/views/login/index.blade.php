@extends("layout.principal")

@section("conteudo")

<h1>Login</h1>

{{ Form::open(array('url' => 'login')) }}
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-group">
        {{ Form::label('email', 'E-mail') }}
        {{ Form::text('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Senha') }}
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>
    {{ Form::submit('Entrar', array('class' => 'btn btn-primary btn-block')) }}
</form>

@stop