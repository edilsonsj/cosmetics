<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Meu carrinho</title>
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

            /* Novo estilo para o botão "Finalizar Compra" */
            .btn-finalizar {
                display: block;
                width: 100%;
                padding: 10px;
                font-family: 'Outfit', sans-serif;
                background-color: #3734A9;
                color: #fff;
                border: none;
                border-radius: 10px;
                cursor: pointer;
                margin-top: 20px;
            }
        </style>
        <div style="width: 100%; height: 30px; background: #f1f1ff; border: 0.50px #EFEFEF solid"></div>
        <h2><b>Olá {{$user->name}}! Este são os produtos do seu carrinho</b></h2> 

        {{$products}}
    </head>
    <body>
        <table border="1" >
            <tr bgcolor= #a6a6dd>
              <td><font color="white"><b>ID</b></font></td>
              <td><font color="white"><b>Imagem</b></font></td>
              <td><font color="white"><b>Nome</b></font></td>
              <td><font color="white"><b>Preço</b></font></td>
              <td><font color="white"><b>Quantidade</b></font></td>
              <td><font color="white"><b>Total</b></font></td>
            </tr>
                @php
                    $total_price = 0;
                @endphp
            @foreach ($products as $product)

                @php
                    $subtotal = $product->product->product_price * $product->qty;
                    $total_price += $subtotal;
                @endphp
                <tr>
                  <td><font color= #a6a6dd>{{$product->product->id}}</font></td>
                  <td><img src="img/products/{{$product->product->product_image_path}}"  style="width: 5vw"></td>
                  <td>{{$product->product->product_name}}</td>
                  <td><font color= #a6a6dd><b>R$ {{$product->product->product_price}}</b></font></td>
                  
                  <td>
                    <input type="number" class="quantidade" min="1" max="" value="{{$product->qty}}" data-id="{{$product->id}}">
                  </td>
                  <td style="color: #002A48; font-weight: bold;">
                    R$ {{$subtotal}}
                  </td>
                  
                </tr>

            @endforeach
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>@php
                    echo $total_price;
                @endphp</td>
            </tr>
          </table>

          <!-- Botão "Finalizar Compra" -->
          <button class="btn-finalizar">Finalizar Compra</button>

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

              // Adicionar evento de alteração aos campos de quantidade para atualizar a quantidade de cada produto
              const camposQuantidade = document.querySelectorAll('.quantidade');
              camposQuantidade.forEach(campo => {
                  campo.addEventListener('change', function() {
                      const productId = this.dataset.id;
                      const quantidade = this.value;

                      // Aqui você pode enviar uma requisição AJAX para atualizar a quantidade no backend,
                      // mas por simplicidade, vamos apenas exibir um alerta com as informações
                      alert(`Produto ID ${productId} - Quantidade: ${quantidade}`);
                  });
              });

              // Evento de clique no botão "Finalizar Compra"
              const btnFinalizar = document.querySelector('.btn-finalizar');
              btnFinalizar.addEventListener('click', function() {
                  alert('Finalizando a compra...');
                  // Aqui você pode adicionar a lógica para finalizar a compra, enviar os dados ao backend, etc.
              });
          </script>
    </body>
</html>
