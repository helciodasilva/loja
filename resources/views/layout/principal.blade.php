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
        </div>
    </nav>
    @yield("conteudo")
    <footer class="footer">
        <p>© Loja</p>
    </footer>
</div>
</body>
</html>