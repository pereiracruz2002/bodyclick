<hr>

      <footer class="turquesa">
        <p>&copy; BodyClick - Todos os direitos reservados</p>
      </footer>

    </div> <!-- /container -->

    <!-- Arquivos Javascripts
    ================================================== -->
    <!-- jQuery direto do local -->
     <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.min.js'></script>
    <!-- jQuery direto do CDN (somente online) -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   
  <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js'></script>
  <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.jqzoom-core.js'></script>

    <script type="text/javascript">
      $(function () {
          $("[rel='tooltip']").tooltip();
      });
      $(function () {
        $("[rel='popouver']").popover();
      });
      $('.carousel').carousel()

      
    </script>
  </body>
</html>

