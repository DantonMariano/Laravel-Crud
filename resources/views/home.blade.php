<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Compras</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src='<?php echo url('js/script.js')?>'></script>
  <link rel="stylesheet" href="<?php echo url('css/css.css')?>">
</head>

<body>
  @if($errors->any())
    <h4 id='errmsg' >{{$errors->first()}}</h4>
  @endif
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
              <input required type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Receita">
            </div>
            <div class="mb-3">
              <label for="texto" class="form-label">Ingredientes/Método de preparo:</label>
              <textarea required class="form-control" name="texto" id="texto" rows="3" placeholder="insira a receita aqui!"></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-3">Salvar Receita</button>
          </form>
        </div>
        <hr />
        <div class="d-flex flex-wrap justify-content-between" id="main-lista">
          <?php foreach ($receitas as $receita) { ?>
            <div id='receita-<?php echo $receita->id ?>' class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$receita->nome}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Detalhes:</h6>
                <p class="card-text">{{$receita->receita}}</p>
                <div class="text-muted" style="position: relative; top:15px;">
                  <?php if ($receita->alt === 0) {?>
                    <sub>Criado Em: {{date("d/m/Y",strtotime($receita->ts))}} às {{date("H:i",strtotime($receita->ts))}}</sub>
                  <?php } else { ?>
                    <sub>Alterado Em: {{date("d/m/Y",strtotime($receita->ts))}} às {{date("H:i",strtotime($receita->ts))}}</sub>
                  <?php } ?>
                </div>
                <hr />
                <div id='cbtns' class="d-flex flex-row-reverse justify-content-even">
                  <a style="margin-left:10px" href="<?php echo url('/deletar') . '/' . $receita->id ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                  <a class="btn btn-success" onclick="alterar(`<?php echo 'receita-' . $receita->id ?>`, event)"><i class="fas fa-pencil-alt"></i></a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br><br><br><br>
</body>

</html>