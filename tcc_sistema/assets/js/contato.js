$(window).on('load',function() {
    var elFormInputs = $('#contato-form form .campoForm');
    var elFormLabels = $('.form-content form label');

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