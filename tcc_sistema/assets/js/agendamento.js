$(window).on('load',function(){
    var include_path = $('base').attr('attr');
    $('body').on('submit', 'form', function(){
        event.preventDefault();
        var form = $(this);
        $.ajax({
          url:include_path+'Ajax/RequestAgendamento.php',
                method:'post',
                dataType: 'json',
                data:form.serialize()
        }).done(function(data){
            /**
             * Data Erros 
             *  - data.errorAgendamento: Agendamento já existe no banco de dados.
             *      return data.errorAgendamento.data => data do agendamento
             *      return data.errorAgendamento.hora => horario do agendamento
             * 
             *  - data.ErroFormatoData: Formato de data inválido. (Y-m-d)
             * 
             *  - data.ErroProcedimento: Procedimento inserido é inválido. ('Cabeleireiro','Maquiagem','Manicure')
             * 
             *  - data.notAuth: Usuário não autenticado.
             * 
             *  - data.erroExec: Erro de execução. Ler arquivo 'error_log' na pasta Ajax.
             */
            if(data.errorAgendamento){
                // Já existe Agendamento neste horário.
                console.log(data.errorAgendamento);
                $("#modal-data-hora").text(data.errorAgendamento.data + " - " + data.errorAgendamento.hora);
                $("#modal-aviso-data").modal("show");
          }
        })
        return false;
    })
})