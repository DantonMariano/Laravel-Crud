<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todo List</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
          <?php foreach ($receitas as $receita) { ?>
            <div id='receita-<?php echo $receita->id ?>' class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">{{$receita->nome}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">Detalhes:</h6>
                <p class="card-text">{{$receita->receita}}</p>
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
  <script>
    $(document).ready(() => {
      const card_is_altered = [];
      
      alterar = (id, event) => {
        const selector = `#${id}`;
        if($(selector).has("form").length){
          const texto = $(`${selector} input[name='nome']`).val();
          const receita = $(`${selector} textarea[name='texto']`).val();
          console.log(texto);
          $(`${selector} .card-body`).unwrap();
          $(`${selector} input[type='submit']`).remove();
          $(`${selector} br`).remove();
          $(`${selector} input[name='_token']`).remove();
          $(`${selector} input[name='nome']`).replaceWith(`<h5 class="card-title">${texto} </h5>`);
          $(`${selector} textarea[name='texto']`).replaceWith(`<p class="card-text">${receita}</p>`);
        } else {
          const texto = $(`${selector} .card-title`).text();
          const receita = $(`${selector} .card-text`).text();
          $(`${selector} .card-body`).wrapAll('<form action="/alterar" method="POST">');
          $(`${selector} .card-body`).prepend('@csrf');
          $(`${selector} .card-body`).prepend(`<input type="hidden" name='id' value='${id.slice(id.length - 1)}' />`);
          $(`${selector} .card-title`).replaceWith(`<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Receita" Value='${texto}'></input><br>`);
          $(`${selector} .card-text`).replaceWith(`<textarea class="form-control" name="texto" id="texto" rows="3" placeholder="insira a receita aqui!">${receita}</textarea>`)
          $(`${selector} #cbtns`).append('<input type="submit" value="Alterar" class="btn btn-warning" style="margin-right:auto;" ></input>');
          console.log(selector);
        }
      }
    });
  </script>
</body>

</html>