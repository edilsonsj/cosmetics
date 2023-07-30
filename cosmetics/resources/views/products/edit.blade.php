<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <h1>
            <a href="/">            
                <span class="cor1"> Catálogo </span>
                <span class="cor2"> Online </span>
            </a>
        </h1>
        <title>ALTERAÇÃO DO PRODUTO: {{$product->product_name}}</title>
        <style>
              @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@400&display=swap');
              @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@700&display=swap');
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
            form {
                width: 300px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
            h2 {
                text-align: center;
                color: #3734A9;
                font-family: 'Outfit', sans-serif;
                font-weight: 700;
            }
            .h2 {
                text-align: center;
                color: #3734A9;
                font-family: 'Outfit', sans-serif;
                font-weight: 700;
            }
            input[type="submit"] {
                width: 100%;
                padding: 10px;
                font-family: 'Outfit', sans-serif;
                background-color: #3734A9;
                color: #fff;
                border: none;
                border-radius: 10px;
                cursor: pointer;
            }
            input[id="TextnomeProd"],
            input[type="file"],
            input[id="TextDescricaoProd"],
            input[id="TextPrecoVenda"],
            input[id="TextQuantidade"],
            input[id="TextCategoria"] {
                width: 95%;
                padding: 8px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
            textarea {
                border-radius: 10px;
                border: 1px solid #ccc;
                width: 95%;
                padding: 8px;
                margin-bottom: 15px;
                border-radius: 4px;
        
            }
            p {
                color: #C5C5C5; 
                font-size: 12px; 
                font-family: Inter; 
                text-align: center;
                font-weight: 400;
                word-wrap: break-word; 
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }

            .text {
                width: 100%; height: 30px; background: #F1F1FF; border: 0.50px #EFEFEF solid
            }
        </style>
        <div style="width: 100%; height: 30px; background: #F1F1FF; border: 0.50px #EFEFEF solid"></div>
        <h2><b>ALTERAÇÃO DO PRODUTO: {{$product->product_name}}</b></h2>
    </head>
    <body>
        <form action="/products/update/{{$product->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="campos">
                    <label for="TextnomeProd" class="h2">Nome do produto</label>
                    <input type="text" id="TextnomeProd" name="product_name"  value="{{$product->product_name}}" placeholder="{{$product->product_name}}"/>
                </div>

                <div class="campos">
                    <label for="TextDescricaoProd" class="h2">Descrição</label>
                    <textarea  id="TextDescricaoProd" cols="38" rows="4" placeholder="{{$product->product_description}}">{{$product->product_description}}</textarea>
                </div>

                <div>
                    <label for="TextPrecoVenda" class="h2">Preço de venda</label>
                    <input type="number" id="TextPrecoVenda"  name="product_price" step="0.01" min = "0.00" placeholder="{{$product->product_price}}" value="{{$product->product_price}}" required/>
                </div>

                <div>
                    <label for="TextQuantidade" class="h2">Quantidade disponível</label>
                    <input type="number" id="TextQuantidade" placeholder="Quantidade*" name="product_qty" placeholder="{{$product->product_qty}}" value="{{$product->product_qty}}" required/>
                </div>

                <div>
                    <label for="TextCategoria" class="h2">Categoria</label>
                    <input type="text" id="TextCategoria" value="{{$product->product_category}}" placeholder="{{$product->product_category}}" name="product_category" required/>
                </div>

                <div>
                    <label for="image" class="h2">Imagem</label>
                    <img src="/img/products/{{$product -> product_image_path}}" alt="{{ $product -> product_name }}">
                    <input type="file" id="image" name="product_image_path" accept="image/*" required/>
                </div>
                
                <input type="submit" value="Salvar alterações"/>
        </form>
    </body>
</html>
