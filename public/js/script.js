$(document).ready(() => {
  setTimeout(()=>{
    $('#errmsg').fadeOut(2000);
  }, 4000);

  alterar = (id, event) => {
    const selector = `#${id}`;
    const token    = $('input[name="_token"]').val();
    if ($(selector).has("form").length) {
      const texto = $(`${selector} input[name='nome']`).val();
      const receita = $(`${selector} textarea[name='texto']`).val();

      $(`${selector} .card-body`).unwrap();
      $(`${selector} input[type='submit']`).remove();
      $(`${selector} br`).remove();
      $(`${selector} input[name='_token']`).remove();
      $(`${selector} input[name='nome']`).replaceWith(`<h5 class="card-title">${texto} </h5>`);
      $(`${selector} textarea[name='texto']`).replaceWith(`<p class="card-text">${receita}</p>`);
    } else {
      const texto = $(`${selector} .card-title`).text();
      const receita = $(`${selector} .card-text`).text();
      
      let num_id = id.replace(/\D/g, '');

      console.log(num_id);
      $(`${selector} .card-body`).wrapAll('<form action="/alterar" method="POST">');
      $(`${selector} .card-body`).prepend(`<input type="hidden" name="_token" value="${token}"></input>`);
      $(`${selector} .card-body`).prepend(`<input type="hidden" name='id' value='${num_id}' />`);
      $(`${selector} .card-title`).replaceWith(`<input required type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Receita" Value='${texto}'></input><br>`);
      $(`${selector} .card-text`).replaceWith(`<textarea required class="form-control" name="texto" id="texto" rows="3" placeholder="insira a receita aqui!">${receita}</textarea>`)
      $(`${selector} #cbtns`).append('<input type="submit" value="Alterar" class="btn btn-warning" style="margin-right:auto;" ></input>');
    }
  }
});