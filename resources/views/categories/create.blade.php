@extends("layout.principal")

@section("conteudo")

<h1>Cadastro de Categoria</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::open(array('url' => 'categories', 'files' => true)) }}
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('file', 'Foto') }}
        {{ Form::file('file', Input::old('file'), array('class' => 'form-control')) }}
    </div>
	<div class="form-group">
		{{ Form::label('products', 'Produto') }}
		{{ Form::select('products[]', $products, null, ['multiple' => true, 'class' => 'form-control margin']) }}
	</div>
    {{ Form::submit('Cadastrar', array('class' => 'btn btn-primary btn-block')) }}
</form>
@stop