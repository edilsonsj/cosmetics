<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Gerenciar Produto</title>
        <h1>
            <a href="/"><span class="cor1"> Catálogo </span>
                <span class="cor2"> Online </span></a>
            </h1>
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
                h2 {
                    text-align: center;
                    color: #3734A9;
                    font-family: 'Outfit', sans-serif;
                    font-weight: 700;
                }
                table {
                    text-align: center;
                    width: 100%;
                    border-collapse: collapse;  
                    font-family: 'Outfit', sans-serif;
                    border: 2px solid;
                    border-color: #a6a6dd;
                    
                } 
                tr {
                    height: 70px;
                    font-family: 'Outfit', sans-serif;
                }
                </style>
                <div style="width: 100%; height: 30px; background: #f1f1ff; border: 0.50px #EFEFEF solid"></div>
                <h2><b>GERENCIAMENTO DE PRODUTOS</b></h2> 
        </head>
        <body>
            <table border="1" >
                <tr bgcolor= #a6a6dd>
                  <td><font color="white"><b>ID</b></font></td>
                  <td><font color="white"><b>Imagem</b></font></td>
                  <td><font color="white"><b>Nome</b></font></td>
                  <td><font color="white"><b>Preço</b></font></td>
                  <td><font color="white"><b>Estoque</b></font></td> 
                  <td><font color="white"><b>Ação</b></font></td>
                </tr>
                @foreach ($products as $product)
                
                    <tr>
                      <td><font color= #a6a6dd>{{$product->id}}</td></font>
                      <td><font color= <div id="a6a6dd"><img src="/img/products/{{$product->product_image_path}}"  style="width: 5vw"></div></td></font>
                      <td>{{$product->product_name}}</td>
                      <td><font color= #a6a6dd><b>R$ {{$product->product_price}}</b></font></td>
                      <td><font color= #a6a6dd>{{$product->product_qty}}</td></font>
                      <td><font color= #a6a6dd>
                        <a href="/products/edit/{{$product->id}}">Editar</a>
                        <br>
                        <form action="/products/{{$product->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Excluir" style="appearance: none;
                            -webkit-appearance: none;
                            -moz-appearance: none;
                            background-color: transparent;
                            border: none;
                            padding: 0;
                            margin: 0;
                            cursor: pointer;
                            color: #ff4800;
                            font-family: 'Outfit', sans-serif;
                            font-size: 18px;
                            font-style: normal;
                            font-weight: 500;
                            line-height: normal;
                            text-decoration: underline;" 
                            
                            class="btn-excluir">
                        </form>
                      </td>
                    </tr>

                @endforeach
                
              </table>

              <script>
                // Adicionar evento de clique aos botões de excluir para confirmar antes de enviar o formulário
                const btnExcluir = document.querySelectorAll('.btn-excluir');
                btnExcluir.forEach(btn => {
                    btn.addEventListener('click', function(event) {
                        event.preventDefault();
                        if (confirm('Tem certeza que deseja excluir este produto?')) {
                            this.form.submit();
                        }
                    });
                });
                </script>
        </body>
    </html>