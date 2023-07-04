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


    if(navel.length) navel.children('.bttn-nav').on('click', () => {
        openMenu();
    });

    $('ul.nav-drop li').hover(function(e){
        $(this).css({
            "background-color": "rgb(71, 71, 70)"
        });
        $(this).children().css({
            "color": "rgb(255, 255, 255)"
        });
    },function(e){
        $(this).css({
            "background-color": ""
        });
        $(this).children().css({
            "color": ""
        });
    })
    $('ul.nav-drop li').click(function(e){
        let linkA = $(this).children().attr('link');
        window.location.href = linkA;
    });

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
    
})