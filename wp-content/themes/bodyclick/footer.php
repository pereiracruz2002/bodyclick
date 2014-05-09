<hr>

      <footer class="cinza text-center">
      	<ul class="list-inline menu-rodape" style="padding-top: 10px;">
			<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">Inicial</a></li>
			<li><a href="<?php echo get_bloginfo('url');?>/quem-somos">Quem Somos</a></li>
			<li><a href="<?php echo get_bloginfo('url');?>/como-funcionamos">Como funcionamos</a></li>
			<li><a href="<?php echo get_bloginfo('url');?>/artigos">Artigos</a></li>
			<li><a href="<?php echo get_bloginfo('url');?>/anuncie">Anuncie</a></li>
			<li><a href="<?php echo get_bloginfo('url');?>/fale-conosco">Fale Conosco</a></li>
        </ul>
      	<p style="padding-top: 10px;"><small>O uso deste site está sujeito aos termos e condições do Termo de Uso e Política de privacidade</small></p>
        <p><small>&copy; BodyClick - Todos os direitos reservados</small></p>
      </footer>

    </div> <!-- /container -->

    <!-- Arquivos Javascripts
    ================================================== -->
    <!-- jQuery direto do local -->
     <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery-1.10.2.min.js'></script>
    <!-- jQuery direto do CDN (somente online) -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script type='text/javascript'>var base_url ="<?php echo get_bloginfo('url');?>"</script>
  <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js'></script>
  <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/jquery.jqzoom-core.js'></script>
  <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/js/utility.js'></script>

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

