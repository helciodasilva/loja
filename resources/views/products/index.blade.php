@extends("layout.principal")

@section("conteudo")

@if(!count($products))
<div class="alert alert-danger">
    Você não tem nenhum produto cadastrado.
</div>
@else

	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<div class="pull-right">
		{{ Form::open(array('method' => 'get', 'class'=>'form-inline', 'url' => 'products/')) }}
			{{ Form::label('filter', 'Filtrar por') }}
			{{ Form::select('filter', ['product' => 'Produto', 'category' => 'Categoria'], null,  array('class' => 'form-control')) }}
			<div class="form-group">
				{{ Form::text('q', null, array('class' => 'form-control')) }}
			</div>
			{{ Form::button('Pesquisar', array('class' => 'btn btn-primary', 'type'=>'submit')) }}
			<a href="{{ URL::to('products/create') }}" class="btn btn-success">
				<i class="glyphicon glyphicon-plus"></i>Cadastrar
			</a>
		{{ Form::close() }}
	</div>

	<h1>Produtos</h1>
		 
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th>Descrição</th>
				<th>Valor</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($products as $product)
				<tr>
					<td>{{ $product->name }} </td>
					<td>{{ $product->description }} </td>
					<td>{{ $product->price }} </td>
					<td>
						<a class="btn" href="{{ URL::to('products/' . $product->id) }}"> 
							<i class="glyphicon glyphicon-search"></i>
						</a> 
						<a href="{{ URL::to('products/' . $product->id . '/edit') }}" class="btn ">
							<span class="glyphicon glyphicon-pencil">
						</a>
						{{ Form::open(array('url' => 'products/' . $product->id)) }}
							{{ Form::hidden('_method', 'DELETE') }}
		  
							{{ Form::button(
								'<span class="glyphicon glyphicon-trash"></span>',
								array('class'=>'btn btn-link', 'type'=>'submit')) 
							}}
						{{ Form::close() }}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif
@stop