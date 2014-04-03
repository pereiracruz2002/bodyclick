<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>
<div class="row">
        <div class="col-md-3 hidden-phone">
          <h3>Mais Votadas</h3>
           <?php include_once("menu-votadas.php"); ?>
        </div>
        <div class="col-md-9">
          <div class="post">
            <div class="btn-group pull-right hidden-xs">
              <button class="btn btn-default">E-mail</button>
              <button class="btn btn-default">Imprimir</button>
              <button class="btn btn-default">Curtir</button>
            </div>
           
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" class="central">
          <h1><?php the_title(); ?></h1>
            <div class="info-post">
              <span class="data-post">Data do Post: 12 de abril de 2013</span>
              - <span class="categoria-post">Categoria: <a href="#">Tecnologia</a></span>
            </div>
            <br>
          <?php the_content(); ?>
 
<?php endwhile; ?>
            <div class="tags-post">
              Tags: <span class="badge">tags 1</span> <span class="badge">tags 2</span> <span class="badge">tags 3</span>
            </div>
            <br>
            <div class="btn-group hidden-xs">
              <button class="btn btn-info"><img src="img/twitter2.png" class="flutuar-ico"> Publicar no Twitter</button>
              <button class="btn btn-info"><img src="img/facebook.png" class="flutuar-ico"> Publicar no Facebook</button>
            </div>
            <div class="btn-group visible-xs">
              <button class="btn btn-info"><img src="img/twitter2.png" class="flutuar-ico">Twitter</button>
              <button class="btn btn-info"><img src="img/facebook.png" class="flutuar-ico">Facebook</button>
              <button class="btn btn-info">&rarr;</button>
            </div>
            <div class="clearfix"></div>
            <div class="comentario-post well" style="margin-top: 20px;">
              <h3>Comentários do Post</h3>
              <div class="row">
                <div class="col-md-4">
                  <label>Seu Nome</label>
                  <input type="text" class="form-control" placeholder="Digite seu nome...">
                </div>
                <div class="col-md-4">
                  <label>Seu E-mail</label>
                  <input type="text" class="form-control" placeholder="Digite seu email...">
                </div>
              </div>
              <div class="row" style="margin-top: 20px;">
                <div class="col-md-8">
                  <label>Seu Comentário</label>
                  <textarea rows="3" class="form-control">Digite seu comentário</textarea>
                </div>
              </div>
              <div style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary">Comentar</button>
                <button type="button" class="btn btn-defaut">Limpar</button>
              </div>
            </div>
          </div>
        </div>
      </div>


<?php include_once("menu.php"); ?>
<?php get_footer(); ?>
   </div>
</body>
</html>