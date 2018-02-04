@extends("layout.principal")
@section("conteudo")

<h1>Detalhes da Categoira {{$category->name}}</h1>
<ul class="list-group">
    <li class="list-group-item">
        <b>Nome:</b> {{$category->name}}
    </li>
    <li class="list-group-item">
		{{Html::Image($category->image? 'uploads/'.$category->image:'images/noimage.jpg', 'thumb', array('class' => 'img-thumbnail'))}} 
    </li>
@stop
