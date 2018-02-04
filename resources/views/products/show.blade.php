@extends("layout.principal")
@section("conteudo")

<h1>Detalhes da Produto {{$product->name}}</h1>
<ul class="list-group">
    <li class="list-group-item">
        <b>Nome:</b> {{$product->name}}
    </li>
    <li class="list-group-item">
        <b>Descrição:</b> {{$product->description}}
    </li>
    <li class="list-group-item">
        <b>Preço:</b> {{$product->price}}
    </li>
    <li class="list-group-item">
		{{Html::Image($product->image? 'uploads/'.$product->image:'images/noimage.jpg', 'thumb', array('class' => 'img-thumbnail'))}} 
    </li>
</ul>
@stop
