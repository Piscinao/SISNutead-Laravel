<html>

  <head>
      <title>Editar Produto</title>

  </head>


  <body>
          <form action="{{ route('editar_produto', ['id' => $produto->id]) }}" method="POST">

          <label for="">Nome:</label><br />
          <input type="text" name="nome" value="{{ $produto->nome }}"><br />
          <label for="">Custo:</label><br />
          <input type="text" name="custo" value="{{ $produto->custo }}"><br />
          <label for="">Preço:</label><br />
          <input type="text" name="preco" value="{{ $produto->preco }}"><br />
          <label for="">Quantidade:</label><br />
          <input type="text" name="quantidade" value="{{ $produto->quantidade }}"><br />

          <button>Salvar</button>
         </form>

  </body>

</html>

