$(window).on('load',function(){
  
  var nome = $(".nome");
  var cpf = $(".cpf");
  var email = $(".email");
  var telefone = $(".telefone");

  var senha = $(".senha");
  var senhaValidated = false;

  var confsenha = $(".confsenha");
  var confsenhaValidated = false;

  var validatedForm = false;
  

  $(document).ready(function(){
      cpf.mask('000.000.000-00', {reverse: true});

      var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

      telefone.mask(SPMaskBehavior, spOptions);
  });

  senha.keyup(()=>{
    if(senha.val().length > 3){
      senhaValidated = true;
    }else{
      console.log("Menor que 3");
    }
  })

  confsenha.keyup(()=>{
    if(senha.val() != confsenha.val()){
      $('.errorMessage').remove();
      $('.modal').prepend("<p class='errorMessage' style='font-size:16px;text-align:left;width:400px'>*As senhas não conferem</p>");
      confsenha.css({
        'border-bottom':'2px solid red',
        'color':'red'
      })
      $('.errorMessage').css({
        "padding":"0",
        "margin-top": "-5px"
        })
    }else{
      $('.errorMessage').remove();
      confsenha.css({
        'border-bottom':'',
        'color':''
      })
      confsenhaValidated = true;
    }
  })

  function cadastrarUser(){
    if(nome.val() && email.val() && cpf.val() && telefone.val() && senhaValidated && confsenhaValidated){
      return true;
    }else{
      return false;
    }
  }
  
  
  $('body').on('submit', 'form', function(){
    return cadastrarUser();
  });
})