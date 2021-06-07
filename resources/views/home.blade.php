<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
</head>

<body>
  <br>
  <br>
  <br>
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-8">
      <h1 align='center'>Livro de Receitas!</h1><br><br>
        <div class="form-wrapper">
          <form action="/" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nome" class="form-label">Receita</label>
              <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Receita">
            </div>
            <div class="mb-3">
              <label for="texto" class="form-label">Ingredientes/Método de preparo:</label>
              <textarea class="form-control" name="texto" id="texto" rows="3" placeholder="insira a receita aqui!"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Salvar Receita</button>
          </form>
        </div>
        <hr />
        <div class="d-flex flex-wrap justify-content-between" id="main-lista">
        <?php foreach( $receitas as $receita ) { ?>
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$receita->nome}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">Detalhes:</h6>
              <p class="card-text">{{$receita->receita}}</p>
              <a href="<?php echo url('/deletar') . '/' . $receita->id?>" class="btn btn-danger">Deletar</a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>