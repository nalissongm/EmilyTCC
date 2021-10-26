$(window).on('load',function() {
    var include = $('path').attr('include');
    var elFormInputs = $('#contato-form form .campoForm');
    var elFormLabels = $('.form-content form label');

    $('body').on('submit', '#contato-form form', function(e){
        var form = $(this);
        e.preventDefault();
        $.ajax({
            beforeSend: function(){
                let bttnContact = $('#contato-form form button');
                let loadingButton = "<img style='width:30%;' src='"+
                include+"assets/img/loading.gif' alt='loading'>";

                bttnContact.children().remove();
                bttnContact.append(loadingButton);
                
            },
            url: include + 'Ajax/FormContact.php',
            method:'post',
            dataType:'json',
            data:form.serialize()
        }).done(function(data){
            if(data.sucesso){
                let formContact = $('#contato-form');
                let boxSucessSubmit = "<div class='sucess-submit'>"+
                                        "<i class='far fa-check-circle'></i>" +
                                        "<h2>Mensagem enviada com sucesso!</h2>" +
                                      "</div>";
                formContact.children().remove();
                formContact.append(boxSucessSubmit);
            }else{
                let bttnContact = $('#contato-form form button');
                let loadingButton = "<span>enviar</span>";
                
                bttnContact.children().remove();
                bttnContact.append(loadingButton);
                alert('Ops! Ocorreu algum erro. Tente mais tarde!');
                // Aqui em baixo vai o código! 
            }
        })
    }) 

    function sociallinkContact(link){
        switch (link) {
            case 'face':
                window.location.href = "http://www.facebook.com.br/";
                break;
            case 'insta':
                window.location.href = "http://www.instagram.com.br/";
                break;
            case 'twtt':
                window.location.href = "http://www.twitter.com.br/";
                break;
        }
    }

    function focusForm(stats,index){
        console.log(idxEl);
        switch (stats) {
            case 'focus':
                elFormInputs.eq(index).css({
                    "border-bottom": "2px solid #F8703E"
                })
                elFormLabels.eq(index).css({
                    "color": "#F8703E"
                })
                break;
        
            default:
                elFormInputs.eq(idxEl).css({
                    "border-bottom": ""
                })
                elFormLabels.eq(idxEl).css({
                    "color": ""
                })
                break;
        }
    }

    
})