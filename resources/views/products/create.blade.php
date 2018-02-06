@extends("layout.principal")

@section("conteudo")

<h1>Cadastro de Produto</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::open(array('url' => 'products',  'files' => true)) }}
    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Descrição') }}
        {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('price', 'Preço') }}
        {{ Form::text('price', Input::old('price'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('file', 'Foto') }}
        {{ Form::file('file', Input::old('file'), array('class' => 'form-control')) }}
    </div>
	<div class="form-group">
		{{ Form::label('categories', 'Categoria') }}
		{{ Form::select('categories[]', $categories, null, ['multiple' => true, 'class' => 'form-control margin']) }}
	</div>
    {{ Form::submit('Cadastrar', array('class' => 'btn btn-primary btn-block')) }}
</form>

@stop