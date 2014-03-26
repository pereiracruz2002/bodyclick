<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); ?>

      <div class="row">
        <div class="col-md-8">
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="active item"><img class="media-object img-rounded img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/slide.jpg"></div>
            <div class="item"><img class="media-object img-rounded img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/slide.jpg"></div>
            <div class="item"><img class="media-object img-rounded img-responsive" src="<?php echo get_template_directory_uri(); ?>/img/slide.jpg" ></div>
          </div>
          <!-- Carousel navegação -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
          </a>
        </div>
      </div>
      <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          <img src="<?php echo get_template_directory_uri(); ?>/img/static1.jpg">
        </div>
        <div class="col-md-12">
          <img src="<?php echo get_template_directory_uri(); ?>/img/static1.jpg">
        </div>
        <div class="col-md-12">
          <img src="<?php echo get_template_directory_uri(); ?>/img/static1.jpg">
        </div>
      </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-md-11 col-md-offset-1">
      <h3>Encontre seu suplemento e saiba como funciona e pague mais barato</h3>
    </div>
    </div>
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-3">
          <h2 class="turquesa">Menus</h2>
          <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li>
      </ul>

        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <h2 class="turquesa">10 dicas para você crescer mais</h2>
                <div class="col-md-2">
                  <img src="img/ginastica.png" class="flutuar-img">
                </div>
                <p class="col-md-10">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                 <p><a class="btn" href="post.html">Mais Detalhes &raquo;</a></p>
            </div>
            <div class="col-md-12">
              <h2 class="turquesa">10 dicas para você crescer mais</h2>
                <div class="col-md-2">
                  <img src="img/ginastica.png" class="flutuar-img">
                </div>
                <p class="col-md-10">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                 <p><a class="btn" href="post.html">Mais Detalhes &raquo;</a></p>
            </div>
            <div class="col-md-12">
              <h2 class="turquesa">Os menores preços</h2>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="img/whey.jpg" class="img-responsive">
                     </div>
            <div class="col-md-6" class="img-responsive">
                      <p>Preço</p>
                    </div>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="img/whey.jpg" class="img-responsive">
                     </div>
            <div class="col-md-6" class="img-responsive">
                      <p>Preço</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="img/whey.jpg" class="img-responsive">
                     </div>
            <div class="col-md-6" class="img-responsive">
                      <p>Preço</p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
       </div>
      </div>

      

      <hr>

      <?php get_footer(); ?>
   </div>
</body>
</html>	

