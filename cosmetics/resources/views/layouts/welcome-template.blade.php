<!DOCTYPE html>
<html>

<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>@yield('title')</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@500;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap');

        /* General styles */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Outfit', sans-serif;
        }

        /* Header styles */
        header {
            padding: 10px 20px;
            background: #FFF;
            border-bottom: 1px solid #e9e9e9e7;
        }

        .navbar-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: #3734A9;
            font-size: 24px;
        }

        .buttons {
            display: flex;
            align-items: center;
        }

        .buttons a {
            color: #3734A9;
            text-decoration: none;
            margin: 0 10px;
        }

        /* Navigation styles */
        .navbar-bottom {
            display: flex;
            justify-content: center;
            background: #F1F1FF;
            border: 1px solid #EFEFEF;
            padding: 10px 0;
            overflow-x: auto;
        }

        .navbar-bottom a {
            color: #3734A9;
            text-decoration: none;
            font-size: 14px;
            margin: 0 10px;
            white-space: nowrap;
        }

        /* Gallery styles */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 15px;
            padding: 10px;
        }

        .gallery__img {
            width: 100%;
            height: auto;
            border-radius: 5%;
        }

        .gallery__caption {
            margin-top: 10px;
            font-size: 14px;
        }

        .gallery__price {
            font-size: 14px;
            font-weight: bold;
        }

        .gallery__button {
            margin-top: 10px;
            padding: 5px;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: #3734A9;
            font-size: 14px;
        }

        /* Responsive media queries */
        @media screen and (max-width: 768px) {
            .buttons {
                flex-direction: column;
                align-items: flex-start;
            }

            .buttons a {
                margin: 5px 0;
            }

            .navbar-bottom {
                flex-direction: row;
                justify-content: flex-start;
            }

            .navbar-bottom a {
                margin: 0 10px;
            }

            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="navbar-top">
            <div class="logo"><a href="/" style="text-decoration: none">CATÁLOGO <span
                        style="color: #000">ONLINE</span></a></div>
            <div class="buttons">

                @guest
                    <a href="/login">Login</a>
                    <a href="/register">Cadastre-se</a>
                @endguest


                @auth
                    @if (auth()->user()->role === \App\Models\User::ROLE_ADMIN)
                        <a href="/products/create">Cadastrar produto</a>
                        <a href="/products/admin/manage">Gerenciar Produtos</a>
                        <a href="/products/admin/dashboard">Relatório</a>
                        <a href="/products/admin/orders">Pedidos</a>
                    @endif
                    <a href="/my-orders">Meus Pedidos</a>
                    <a href="/user/profile">Minha Conta</a>
                    <a href="/cart"><i class='bx bx-cart'></i></a>
                @endauth
            </div>
        </div>
        <nav class="navbar-bottom">
            @foreach ($categories as $category)
                <a href="{{ route('products.index', ['category' => $category->product_category]) }}">
                    {{ $category->product_category }}
                </a>
            @endforeach


        </nav>
        @if (session('msg'))
            <div class="msg"
                style="background: green; color:greenyellow; border-radius:3px; width:100%; height: 30px; margin:5px;">
                <p class="msg">{{ session('msg') }}</p>
        @endif


        </div>
    </header>

    @yield('content')

</body>

</html>
