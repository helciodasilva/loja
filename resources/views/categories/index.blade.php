@extends("layout.principal")

@section("conteudo")

@if(empty($categories))
<div class="alert alert-danger">
    Você não tem nenhum categoria cadastrado.
</div>
@else

	@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
	@endif
	<div class="pull-right">
		{{ Form::open(array('method' => 'get', 'class'=>'form-inline', 'url' => 'categories/')) }}
			<div class="form-group">
				{{ Form::text('q', null, array('class' => 'form-control')) }}
			</div>
			{{ Form::button('Pesquisar', array('class' => 'btn btn-primary', 'type'=>'submit')) }}
			<a href="{{ URL::to('categories/create') }}" class="btn btn-success">
				<i class="glyphicon glyphicon-plus"></i>Cadastrar
			</a>
		{{ Form::close() }}
	</div>

	<h1>Categorias</h1>
		
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Name</th>
				<th></th>
			</tr>
		</thead>
		
		<tbody>
			@foreach ($categories as $category)
				<tr>
					<td>{{ $category->name }} </td>
					<td>
						<a class="btn" href="{{ URL::to('categories/' . $category->id) }}"> 
							<i class="glyphicon glyphicon-search"></i>
						</a> 
						<a href="{{ URL::to('categories/' . $category->id . '/edit') }}" class="btn ">
							<span class="glyphicon glyphicon-pencil">
						</a>
						{{ Form::open(array('url' => 'categories/' . $category->id)) }}
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