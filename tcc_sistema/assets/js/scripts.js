$(window).on('load',function(){
    var el = $('tag').attr('tag');
    if(el == 'agendamento'){
        var elAgend = $('#titulo')
        var divScroll = $(elAgend).offset().top;
        var menuH = $('header nav').height() + $('#titulo').height();
        $('html,body').animate({"scrollTop":divScroll-menuH},1000);
    }
    function openMenu(){
        var navel = $('#navbar-mobile');
        var listdrop = $('.box-navbar');
        document.getElementById("navbar-mobile").classList.toggle("open");
        listdrop.slideToggle('fast');
    }
    
    document.getElementById("navbar-mobile").addEventListener('click', openMenu);
})