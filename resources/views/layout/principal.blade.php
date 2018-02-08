<html>
<head>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/loja.css" rel="stylesheet">
    <title>Loja</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/products">Produtos</a>
                <a class="navbar-brand" href="/categories">Categorias</a>
            </div>
            <div class="navbar-header pull-right">
		
				<!-- Authentication Links -->
				@guest
					<a class="navbar-brand" href="{{ route('login') }}">Entrar</a>
					<a class="navbar-brand" href="{{ route('register') }}">Criar conta</a>
				@else
					
					<a href="#" class="navbar-brand">{{ Auth::user()->name }}</a>
		
					<a href="{{ route('logout') }}" class="navbar-brand"
						onclick="event.preventDefault();
							 document.getElementById('logout-form').submit();">
						Sair
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				
				@endguest
				
            </div>
        </div>

    </nav>
	
    @yield("conteudo")
    <footer class="footer">
        <p>© Loja</p>
    </footer>
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>