<?php
    if(!isset($index)){
        include('../../config.php');
        header('Location: '.INCLUDE_PATH);
        die();
    }
?>
<div class="rodape">
  <center>
    <div class="bloco1">
      <p>Siga-nos em nosssas redes sociais.</p>
      <ul>
        <li>
          <a href="#"><i class="fab fa-facebook fa-2x"></i></a>
        </li>

        <li>
          <a href="#"> <i class="fab fa-instagram fa-2x"></i> </a>
        </li>

        <li>
          <a href="#"> <i class="fab fa-whatsapp fa-2x"></i> </a>
        </li>

        <li>
          <a href="#"> <i class="fab fa-twitter fa-2x"></i> </a>
        </li>
      </ul>

      <p> Precisa de ajuda? Entre em contato conosco.</p>
      <ul>
        <li>
          <i class="fas fa-phone fa-2x"></i>
        </li>
        <li>
          <p style="font-size: 30px;">(14) 991234567</p>
        </li>
      </ul>
    </div><!-- fechamento bloco 1 -->
  </center>
  <div class="bloco2">
    <p style="margin-top: 20px;">© 2021 Copyright - Direitos Reservados</p>
  </div><!-- fechamento bloco 2 -->
</div><!-- fechamento rodape -->
<!-------------------- scripts js -------------------->
<?php if(isset($_SESSION['logado']) && $url != 'contato'):?>
<script src="<?=INCLUDE_PATH?>assets/js/jquery-3.6.0.min.js"></script>
<script src="<?=INCLUDE_PATH?>assets/js/scripts.js"></script>
<?php endif?>
<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script-->
</body>
</html>