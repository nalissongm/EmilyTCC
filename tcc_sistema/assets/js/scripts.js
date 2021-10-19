$(window).on('load',function(){
    var el = $('tag').attr('tag');
    var navel = $('#navbar-mobile');
    var eyepass = $('#eye-pass');
    var inppass = $('#inppass');
    if(el == 'agendamento'){
        var elAgend = $('#titulo')
        var divScroll = $(elAgend).offset().top;
        var menuH = $('header nav').height() + $('#titulo').height();
        $('html,body').animate({"scrollTop":divScroll-menuH},1000);
    }
    function openMenu(){
        
        var listdrop = $('.box-navbar');
        document.getElementById("navbar-mobile").classList.toggle("open");
        listdrop.slideToggle('fast');
    }

    
    if(navel.length) $('body').on('click',navel, openMenu);
    
    function eyePass(){
        if(eyepass.hasClass('fas fa-eye-slash')){
            // Mostre a senha
            eyepass.removeClass('fas fa-eye-slash');
            eyepass.addClass('fas fa-eye');
            eyepass.css({
                "color": "rgb(46, 41, 41)"
            });
            $("input[name='senha']").attr('type', 'text');
            $("input[name='senha']").click();
        }else{
            // Esconda a senha
            eyepass.removeClass('fas fa-eye');
            eyepass.addClass('fas fa-eye-slash');
            eyepass.css({
                "color": "rgba(46, 41, 41, 0.452)"
            });
            $("input[name='senha']").attr('type', 'password');
        }
    }
    
    if(eyepass.length) eyepass.click(function(){
        eyePass()
        document.getElementById("inputpass").click();
    });
})