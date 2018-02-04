@extends('layout.principal')

@section('conteudo')

<h1>Edição de Categoria</h1>

@if(count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error) 
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
{{ HTML::ul($errors->all()) }}@endif

{{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT', 'files' => true)) }}
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        {{ Form::label('name', 'Nome') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
		{{Html::Image($category->image? 'uploads/'.$category->image:'images/noimage.jpg', 'thumb', array('class' => 'img-thumbnail'))}} 
        {{ Form::file('file', Input::old('file'), array('class' => 'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('products', 'Produto') }}
		{{ Form::select('products[]', $products, null, ['multiple' => true, 'class' => 'form-control margin']) }}
	</div>	
    {{ Form::submit('Atualizar', array('class' => 'btn btn-primary btn-block')) }}
{{ Form::close() }}


@stop