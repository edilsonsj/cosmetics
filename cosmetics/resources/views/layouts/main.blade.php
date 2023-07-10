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
</style>
</head>
<body>

<ul>
  <li><a href="/">Home</a></li>
  <li><a href="/products/create">Cadastrar Produto</a></li>
  <li><a href="/products/manage">Gerenciar Produtos</a></li>
  <li style="float:right"><a class="active" href="test2">test</a></li>
</ul>

@yield('content')

</body>
</html>


