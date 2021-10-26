$(window).on('load',function(){
    var include_path = $('base').attr('attr');
    $('body').on('submit', 'form', function(event){
        event.preventDefault();
        var form = $(this);
        $.ajax({
          url:include_path+'Ajax/RequestAgendamento.php',
                method:'post',
                dataType: 'json',
                data:form.serialize()
        }).done(function(data){
            /**
             * Mensagens - Retorno:
             *  - data.errorAgendamento: Agendamento já existe no banco de dados.
             *      return data.errorAgendamento.data => data do agendamento
             *      return data.errorAgendamento.hora => horario do agendamento
             * 
             *  - data.ErroFormatoData: Formato de data inválido. (Y-m-d)
             * 
             *  - data.ErroFormatoHora: Formato de hora inválido. (H:i:s) OR (H:i)
             * 
             *  - data.ErroProcedimento: Procedimento inserido é inválido. ('Cabeleireiro','Maquiagem','Manicure')
             * 
             *  - data.ErrorIndefinido: Falha ao tentar inserir dados no banco de dados. Ler arquivo 'error_log' na pasta Ajax.
             * 
             *  - data.notAuth: Usuário não autenticado.
             * 
             *  - data.usuarioNRegistrado: Email e ID inseridos não são válidos. (Usuário não está registrado)
             * 
             *  - data.erroExec: Erro de execução. Ler arquivo 'error_log' na pasta Ajax.
             * 
             *  - data.sucesso: Agendamento concluído com sucesso.
             */
            if(data.sucesso){
                
                var boxModalSucess = "<div class='modalSucess'>"+
                                        "<div class='boxSucessModal'>"+
                                            "<div class='iconsModal'>"+
                                                "<i class='fas fa-calendar-check'></i>"+
                                            "</div>"+
                                            "<div class='mensagemModal'>"+
                                                "<span>Seu agendamento está marcado para "+data.sucesso.data+" às "+data.sucesso.hora+"!</span>"+
                                                "<div class='inputsModal'>"+
                                                    "<input type='button' onclick='redirectHome()' value='Okay'>"+
                                                    "<input type='button' onclick="+"closeBox('sucess')"+" value='Novo horário'>"+
                                                "</div>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>";
                $("body").prepend(boxModalSucess);
            }
            else if(data.errorAgendamento){
                // Já existe Agendamento neste horário.
                console.log(data.errorAgendamento);
                $("#modal-data-hora").text(data.errorAgendamento.data + " - " + data.errorAgendamento.hora);
                $("#modal-aviso-data").modal("show");
            }
            else if(data.ErroFormatoData || data.ErroFormatoHora || data.ErroProcedimento ||
                    data.ErrorIndefinid || data.erroExec){
                var boxModalError = "<div class='modalError' style='display:none;'>"+
                                        "<div class='boxErrorModal' style='display:none;'>"+
                                            "<div class='iconsModal'>"+
                                                "<i class='far fa-times-circle' onclick='closeBox()'></i>"+
                                                "<i class='fas fa-exclamation-triangle'></i>"+
                                            "</div>"+
                                            "<div class='mensagemModal' style='display:none;'>"+
                                                "<span>Ops! Algo deu errado.<br>Tente mais novamente mais tarte.</span>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>";
                $("body").prepend(boxModalError);
                $("div.modalError").show();
                $("div.modalError div.boxErrorModal").show('fast', () => {
                    $(this).css({
                        "display":"flex"
                    });
                    $('div.mensagemModal').show();
                });
            }
            else if(data.notAuth || data.usuarioNRegistrado){
                var boxModalError = "<div class='modalError' style='display:none;'>"+
                                        "<div class='boxErrorModal' style='display:none;'>"+
                                            "<div class='iconsModal'>"+
                                                "<i class='far fa-times-circle' onclick='closeBox()'></i>"+
                                                "<i class='fas fa-id-card'></i>"+
                                            "</div>"+
                                            "<div class='mensagemModal' style='display:none;'>"+
                                                "<span>Usuário não tem autorização para realizar agendamento.<br>Faça login e tente novamente.</span>"+
                                                "<input type='button' onclick='redirectLogin()' value='Fazer login'>"+
                                            "</div>"+
                                        "</div>"+
                                    "</div>";
                $("body").prepend(boxModalError);
                $("div.modalError").show();
                $("div.modalError div.boxErrorModal").show('fast', () => {
                    $(this).css({
                        "display":"flex"
                    });
                    $('div.mensagemModal').show();
                });
            }


        })
        return false;
    })
})