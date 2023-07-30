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
        <title>Cadastro</title>
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
        </style>
        <div style="width: 100%; height: 30px; background: #F1F1FF; border: 0.50px #EFEFEF solid"></div>
        <h2><b>CADASTRO DE PRODUTO</b></h2>
    </head>
    <body>
        <form action="../products" method="post" enctype="multipart/form-data">
            @csrf
                <div class="campos">
                    <label for="TextnomeProd"></label>
                    <input type="text" id="TextnomeProd" placeholder="Nome do produto*" name="product_name" required/>
                </div>

                <div class="campos">
                    <label for="TextDescricaoProd"></label>
                    <textarea  id="TextDescricaoProd" cols="38" rows="10" placeholder="Descrição*" name="product_description" required></textarea>
                </div>

                <div>
                    <label for="TextPrecoVenda"></label>
                    <input type="number" id="TextPrecoVenda" placeholder="Preço de venda*" name="product_price" required/>
                </div>

                <div>
                    <label for="TextQuantidade"></label>
                    <input type="number" id="TextQuantidade" placeholder="Quantidade*" name="product_qty" required/>
                </div>

                <div>
                    <label for="TextCategoria"></label>
                    <input type="text" id="TextCategoria" placeholder="Categoria*" name="product_category" required/>
                </div>

                <div>
                    <label for="image"></label>
                    <input type="file" id="image" name="product_image" accept="image/*" required/>
                </div>
                
                <p>(*) Campo de preenchimento obrigatório</p>
                <input type="submit" value="Cadastrar"/>
        </form>
    </body>
</html>
