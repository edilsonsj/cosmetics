<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #04AA6D;

}
.msg {
  background: green;
  color: greenyellow;
  padding: 5px;
}
</style>
</head>
<body>

<ul>
  <li><a href="/">Home</a></li>

  @auth

    <li><a href="/products/create">Cadastrar Produto</a></li>
    <li><a href="/products/manage">Gerenciar Produtos</a></li>
      
  @endauth

  @guest

    <li style="float:right" class="active"><a href="/register">Fazer cadastro</a></li>
    <li style="float:right" ><a href="/login">Entrar</a></li>
    
  @endguest
</ul>

@if (session('msg'))
    <h2 class="msg">{{session('msg')}}</h2>
@endif

@yield('content')

</body>
</html>