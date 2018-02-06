@extends('layout.principal')

@section('conteudo')

<h1>Edição de Produto</h1>

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error) 
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
{{ HTML::ul($errors->all()) }}@endif

{{ Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT', 'files' => true)) }}
    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Descrição') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('price', 'Preço') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
		{{Html::Image($product->image? 'uploads/'.$product->image:'images/noimage.jpg', 'thumb', array('class' => 'img-thumbnail'))}} 
        {{ Form::file('file', Input::old('file'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('categories', 'Categoria') }}
		{{ Form::select('categories[]', $categories, null, ['multiple' => true, 'class' => 'form-control margin']) }}}
	</div>
    {{ Form::submit('Atualizar', array('class' => 'btn btn-primary btn-block')) }}
{{ Form::close() }}


@stop