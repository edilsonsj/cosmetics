<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
       
        <title>Welcome</title>

        <style>

            @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@500;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap');
            
            body {
                margin: 0;
                padding: 0;
            }

            .cor1 {
                color: #3734A9;
                font-size: 32px; 
                font-family: 'Outfit', sans-serif; 
                font-weight: 400; 
                line-height: 44.99px; 
                word-wrap: "break-word";    
            }
            .cor2 {
                color: #002A48;
                font-size: 32px; 
                font-family: 'Outfit', sans-serif;
                font-weight: 400; 
                line-height: 44.99px; 
                word-wrap: "break-word";
            }
            .botao {
                border-radius: 10px;
                float: right;
                margin-bottom: 15px;
                font-weight: 400; 
                line-height: 25px; 
                word-wrap: "break-word";
                position: flex;
                right: 180px;
                top: 30px; 
                background-color: #fff; 
                color: #3734A9;
                font-family: Outfit;
            }
            
        
            .gallery {
              display: grid;
              grid-template-columns: repeat(5, 1fr);
              grid-template-rows: repeat(5, auto);
              grid-gap: 15px;
            }
            .gallery__img {
              width: 100%;
              height: auto;
              border-radius: 5%;
            }
            .gallery__comment {
              font-size: 18px;
              font-family: 'Outfit', sans-serif;
            }
            .gallery__price {
              font-size: 18px;
              font-family: "Jost", sans-serif;
  font-size: 18px;
              font-weight: bold;
            }
            .gallery__button {
              margin-top: 10px;
              padding: 5px;
              border: none;
              border-radius: 5px;
              color: white;
              background-color:#3734A9;
              font-family: "Jost", sans-serif;
              font-size: 18px;
            }
            .gallery__button:hover {
                background: #9491f1;
                cursor: pointer;
            }


header {
  padding: 10px 20px;
}

.navbar-top {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid #e9e9e9e7;
  background: #FFF;
  padding-bottom: 5px;
}

.logo {
  color: #3734A9;
  font-family: "Outfit", sans-serif;
  font-size: 32px;
  font-style: normal;
  font-weight: 400;
  line-height: 44.986px; /* 140.582% */
}

.buttons a {
  color: #3734A9;
  font-family: "Jost", sans-serif;
  font-size: 18px;
  font-style: normal;
  font-weight: 500;
  line-height: normal;
  text-decoration: none;
  padding: 0 10px;
}

/* Optional: Style the buttons to look like actual buttons */
.buttons a {
  background-color: #3734A9;
  color: #f1f1ff;
  border-radius: 4px;
  padding: 8px 12px;
  margin-left: 10px;
}

.buttons a:hover {
  background-color: #645eb4;
}

.navbar-bottom {
  display: flex;
  justify-content: center;
  border: 1px solid #EFEFEF;
  background: #F1F1FF;
  padding: 10px 0;
}

.navbar-bottom a {
  color: #3734A9;
  text-decoration: none;
  font-size: 15px;
  font-size: 15px; font-family: 'Outfit', sans-serif; font-weight: 500;
  padding: 0 10px;
}



            </style>

        </head>
        
        <body>
            <header>
                <div class="navbar-top">
                  <div class="logo"><a href="/" style="text-decoration: none">CATÁLOGO <span style="color: #000">ONLINE</span></a></div>
                  <div class="buttons">
                    <a href="/login">Login</a>
                    <a href="/register">Cadastre-se</a>
                    <a href="#"><i class='bx bx-cart'></i> Carrinho</a>
                  </div>
                </div>
                <nav class="navbar-bottom">
                    @foreach ($categories as $category)
                        <a href="{{ route('products.index', ['category' => $category->product_category]) }}">
                            {{$category->product_category}}
                        </a>  
                    @endforeach
                </nav>
                
              </header>
              <div class="gallery">

                @foreach ($products as $product)
                    
                    <figure style="border: solid 1px #e4e4e4; border-radius: 5px;">
                      <img src="/img/products/{{$product->product_image_path}}" class="gallery__img" alt="{{$product->product_name}}">
                      <figcaption class="gallery__caption">
                        <p class="gallery__comment">{{$product->product_name}}</p>
                        <span class="gallery__price">R$ {{$product->product_price}}</span>
                        <button class="gallery__button" data-id="1"><i class='bx bx-cart'></i> Adicionar ao carrinho</button>
                      </figcaption>
                    </figure>
                
                @endforeach
              </div>
            </body>
