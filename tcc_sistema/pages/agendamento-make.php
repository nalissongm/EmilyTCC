<!DOCTYPE html>
<html>
<head>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.3.1/dist/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.7/dist/semantic.min.css">
    <link rel="stylesheet" href="<?=INCLUDE_PATH?>assets/css/agendamento.css">
    <script src="https://cdn.jsdelivr.net/npm/fomantic-ui@2.8.7/dist/semantic.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Domine&display=swap" rel="stylesheet">
   

    <!--script>
        $(function() {
            $("#form-agendamento").submit(function(e) {
                //prevenindo envio do form
                e.preventDefault();

                //pegando os valores do formulário
                data = $("#data").val();
                hora = $("#hora").val();
                //alert("ok");

                $.ajax({
                    type: "POST",
                    url: "verifica-data.php",
                    data: {
                        data: data,
                        hora: hora
                    },
                    success: function(response) {
                        //ver a resposta
                        //se for true, permitir o cadastro
                        //se for false, a data/hora não está disponível
                        //então alertar o usuário
                        if (response.includes("false")) {
                            //mostrando o modal e bloqueando a execução

                            //colocando a data dentro do modal
                            $("#modal-data-hora").text(data + " - " + hora);


                            $("#modal-aviso-data").modal("show");

                        } else {
                            //se pode cadastrar, ir para a página de cadastro
                            window.location.href = "./salva-agendamento.php?data=" + data + "&hora=" + hora;
                        }

                    }
                });

            });
        });
    </script-->
</head>

<body style="background-color: rgb(255, 243, 202);">
<base attr="<?=INCLUDE_PATH?>" ></base>

    <div class="ui hidden divider"></div>

    <div class="ui dividing centered header" style="font-size: 50px; margin-top: 200px; font-family: 'Domine', serif;">Agendamento Maquiagem</div>

    <div class="ui sixteen wide grid">

        <div class="two wide column"></div>
        <div class="twelve wide column">
            <div class="button" onclick="window.history.back();">
                Voltar
            </div>
            <div class="msg">
                Obrigado por fazer seu agendamento conosco! Preencha a data e hora abaixo para continuar.
            </div>
            <div class="ui blue segment">
                <form class="ui form" action="" method="POST" name="form-agendamento" id="form-agendamento">
                    <div class="field">
                        <label for="data">Data:</label>
                        <input type="date" required name="data" id="data">
                    </div>

                    <div class="field">
                        <label for="data">Hora:</label>
                        <input type="time" required name="horario" id="hora">
                    </div>
                    <input type="hidden" name="procedimento" value="Maquiagem">
                <?php if(isset($_SESSION['id_usuario']) && isset($_SESSION['logado']) && isset($_SESSION['auth'])):?>
                    <input type="hidden" name="<?=md5("id_user")?>" value="<?=$_SESSION['id_usuario']?>">
                    <input type="hidden" name="email" value="<?=$_SESSION['email']?>">
                    <input type="hidden" name="<?=md5("auth")?>" value="<?=$_SESSION['auth']?>">
                <?php endif?>
                    <button class="button">Salvar</button>
                </form>

            </div>

        </div>

        <div class="four wide column"></div>


    </div>

    <div class="ui modal" id="modal-aviso-data">
        <i class="close icon"></i>
        <div class="content">
            Data/hora(<span id="modal-data-hora"></span>) inseridas já estão ocupadas. Por favor verifique e tente novamente.

        </div>
        <div class="actions">
            <div class="ui positive right labeled icon button">
                Ok
                <i class="checkmark icon"></i>
            </div>
        </div>

    </div>
    <script src="<?=INCLUDE_PATH?>assets/js/agendamento.js"></script>
</body>

</html>