$(window).on('load',function(){
  
  var nome = $(".nome");
  var nomeValidated = false;
  var cpf = $(".cpf");
  var cpfValidated = false;
  var email = $(".email");
  var emailValidated = false;
  var telefone = $(".telefone");
  var telefoneValidated = false;

  var senha = $(".senha");
  var senhaValidated = false;

  var confsenha = $(".confsenha");
  var confsenhaValidated = false;

  var include_path = $('base').attr('attr');
  

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

  nome.keyup(() => {
    let nomeSplit = nome.val().split(' ');
    var modENome = $('.inpNome');
    if(nomeSplit.length >= 2 && nomeSplit[1] != ''){
      // Nome tem no mínimo duas palavras
      // Campo deve conter nome e sobrenome.
      nome.css({
        borderBottom:""
      })
      nome.removeClass('err');
      modENome.css({
        'display':'none'
      })
      $('.inpNome p').remove();
      nomeValidated = true;
    }else if(nome.val().length == 0){
      // Campo vazio
      nome.css({
          borderBottom:"2px solid rgb(219, 49, 37)"
      })
      nome.addClass('err');
      modENome.css({
        'display':'flex'
      })
      $('.inpNome p').remove();
      modENome.prepend('<p>Campo nome não pode ficar vazio.</p>');
      nomeValidated = false;
    }else{
      // nome não tem nem 2 palavra
      nome.css({
          borderBottom:"2px solid rgb(219, 49, 37)"
      })
      nome.addClass('err');
      modENome.css({
        'display':'flex'
      })
      $('.inpNome p').remove();
      modENome.prepend('<p>Campo deve conter nome e sobrenome.</p>');

      nomeValidated = false;
    }
  });


  cpf.keyup(() => {
    modECpf = $('.inpCpf')
    if(cpf.val().length > 0){
      if(!validarCpf(cpf.val())){
        // Cpf não é válido
        cpf.css({
          borderBottom:"2px solid rgb(219, 49, 37)"
        })
        cpf.addClass('err');
        modECpf.css({
          'display':'flex'
        })
        $('.inpCpf p').remove();
        modECpf.prepend('<p>CPF inválido.</p>');
        cpfValidated = false;
      }else{
        // Cpf é válido
        cpf.css({
          borderBottom:""
        })
        cpf.removeClass('err');
        modECpf.css({
          'display':'none'
        })
        $('.inpCpf p').remove();
        cpfValidated = true;
      }
    }
    else if(cpf.val().length == 0){
      // Campo cpf está vazio
      cpf.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      modECpf.css({
        'display':'flex'
      })
      $('.inpCpf p').remove();
      modECpf.prepend('<p>Campo CPF não pode ficar vazio.</p>');
      cpf.addClass('err');
    }
    
  })

  email.keyup(()=>{
    var modEEmail= $('.inpEmail');
    if(email.val().length == 0){
      // Email não foi preenchido
      email.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      email.addClass('err');
      modEEmail.css({
        'display':'flex'
      })
      $('.inpEmail p').remove();
      modEEmail.prepend('<p>Campo email não pode ficar vazio.</p>');
      emailValidated = false;
    }else if(!formatEmail(email.val()) || email.val().split(' ').length > 1){
      // Formato inválido
      email.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      email.addClass('err');
      modEEmail.css({
        'display':'flex'
      })
      $('.inpEmail p').remove();
      modEEmail.prepend("<p>Formato de email inválido.<br/>Email deve conter '@' e '.' para ser válido.</p>");
      emailValidated = false;
    }else{
      // Cpf é válido
      email.css({
        borderBottom:""
      })
      email.removeClass('err');
      modEEmail.css({
        'display':'none'
      })
      $('.inpEmail p').remove();
      emailValidated = true;
    }
  })

  telefone.keyup(() => {
    modETel = $('.inpTel');
    if(telefone.val().length == 0){
      // Telefone não foi preenchido
      telefone.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      telefone.addClass('err');
      modETel.css({
        'display':'flex'
      })
      $('.inpTel p').remove();
      modETel.prepend('<p>Campo telefone não pode ficar vazio.</p>');
      telefoneValidated = false;
    }else if(!formatTel(telefone.val())){
      // Formato inválido
      telefone.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      telefone.addClass('err');
      modETel.css({
        'display':'flex'
      })
      $('.inpTel p').remove();
      modETel.prepend('<p>Número de telefone inválido.</p>');
      telefoneValidated = false;
    }else{
      // Cpf é válido
      telefone.css({
        borderBottom:""
      })
      telefone.removeClass('err');
      modETel.css({
        'display':'none'
      })
      $('.inpTel p').remove();
      telefoneValidated = true;
    }
  })

  senha.keyup(()=>{
    modESenha = $('.inpSenha');
    if(senha.val().length == 0){
      // Senha está vazia
      senha.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      senha.addClass('err');
      modESenha.css({
        'display':'flex'
      })
      $('.inpSenha p').remove();
      modESenha.prepend('<p>Campo senha não pode ficar vazio.</p>');
      senhaValidated = false;
    }else if(!formatSenha(senha.val())){
      // Senha não contem 6 dígitos ou não tem lestras e números
      senha.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      senha.addClass('err');
      modESenha.css({
        'display':'flex'
      })
      $('.inpSenha p').remove();
      modESenha.prepend('<p>Senha deve conter no mínimo 6 dígitos contendo letras e números.</p>');
      senhaValidated = false;
    }else{
      // Senha válida
      senha.css({
        borderBottom:""
      })
      senha.removeClass('err');
      modESenha.css({
        'display':'none'
      })
      $('.inpSenha p').remove();
      senhaValidated = true;
    }
  })

  confsenha.keyup(()=>{
    modEConfS = $('.confS')
    if(confsenha.val().length == 0){
      // Senha está vazia
      confsenha.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      confsenha.addClass('err');
      modEConfS.css({
        'display':'flex'
      })
      $('.confS p').remove();
      modEConfS.prepend('<p>Confirme a senha para proceguir.</p>');
      confsenhaValidated = false;
    }else if(confsenha.val() != senha.val()){
      // Senha não contem 6 dígitos ou não tem lestras e números
      confsenha.css({
        borderBottom:"2px solid rgb(219, 49, 37)"
      })
      confsenha.addClass('err');
      modEConfS.css({
        'display':'flex'
      })
      $('.confS p').remove();
      modEConfS.prepend('<p>As senhas são diferentes.</p>');
      confsenhaValidated = false;
    }else{
      // Senha válida
      confsenha.css({
        borderBottom:""
      })
      confsenha.removeClass('err');
      modEConfS.css({
        'display':'none'
      })
      $('.confS p').remove();
      confsenhaValidated = true;
    }
  })
  
  function validarCpf(strCpf){
    strCpf = strCpf.replace(/[.-]/g,'');
    var soma = 0, resto;
    for(var i = 0; i <= 10; i++){
      let compCpf = '';
      for(var x = 0; x < 11; x++) compCpf += i.toString();
      if(strCpf == compCpf) return false;
    }

    for(var i = 1; i <=9; i++){
      soma = soma + parseInt(strCpf.substring(i-1,i)) * (11 - i);
    }
    

    resto = (soma * 10) % 11;
    if((resto == 10) || (resto == 11)) resto = 0;
    
    if(resto != parseInt(strCpf.substring(9,10))) return false;
    
    var soma = 0, resto;
    for(var i = 1; i <=10; i++){
      soma = soma + parseInt(strCpf.substring(i-1,i)) * (12 - i);
    }

    resto = (soma * 10) % 11;
    if((resto == 10) || (resto == 11)) resto = 0;
    if(resto != parseInt(strCpf.substring(10,11))) return false;
    return true;
  }

  function formatEmail(strE){
    var re = /^([\w\-]+\.)*[\w\- ]+@([\w\- ]+\.)+([\w\-]{2,3})$/;
    return re.test(strE);
  }

  function formatTel(strTel){
    var re = /(\(\d{2}\)\s)(\d{4,5}\-\d{4})/g;
    return re.test(strTel);
  }

  function formatSenha(strSenha){
    var re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/g;
    return re.test(strSenha);
  }

  function cadastrarUser(){
    if(
      nomeValidated &&
      cpfValidated &&
      emailValidated &&
      telefoneValidated &&
      senhaValidated &&
      confsenhaValidated)
    {
      return true;
    }else{
      return false;
    }
  }

  if($('.box-error').length){
    let inpl = $('form input');
    let boxError = $('.box-error');
    boxError.fadeIn('fast');
    inpl.click(() => {
        boxError.fadeOut('fast');
    })

    if($('.errorS').length){
        let pass = $("#inputpass");
        pass.css({
            borderBottom:"2px solid rgb(219, 49, 37)"
        })
        pass.addClass('err');
        pass.click(() => {
            pass.css({
                borderBottom:""
            })
            pass.removeClass('err');
        })
    }else if($('.errorE').length){
        let fmInp = $("#inputpass, #inputemail");
        fmInp.css({
            borderBottom:"2px solid rgb(219, 49, 37)"
        })
        fmInp.addClass('err');
        fmInp.click(() => {
            fmInp.css({
                borderBottom:""
            })
            fmInp.removeClass('err');
        })
    }
  }

  if($('.sucessCad').length){
    var over_s = $('.sucessCad');
    var box_s = $('.content-sucess');
    over_s.show();
    box_s.show(500,() =>{
      $('#scdm').css({
        'display':'flex'
      })
    });
    $('.div-main span').click(() => {
      urlLogin = include_path+'login';
      window.location.href = urlLogin;
    })

    over_s.on('click', () => {
      var clbx = box_s.click(() => {
        return false;
      });
      if(clbx == false){
        return false;
      }else{
        over_s.hide();
        box_s.hide(500);
      }
    }).children().on('click', function (event) {
      event.stopPropagation();
      //you can also use `return false;` which is the same as `event.preventDefault()` and `event.stopPropagation()` all in one (in a jQuery event handler)
    });
    $('#closeBoxS').on('click', () => {
      over_s.hide();
      box_s.hide(500);
    })
  }
  $('body').on('submit', 'form', function(){
    return cadastrarUser();
  });

})