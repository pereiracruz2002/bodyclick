      <div id="esquerda">
        <div id="menu-lateral">
          <form method="get" action="<?php echo get_bloginfo("url") ?>" id="busca_menu">
            <input type="text" name="s" value="<?php print $_GET['s'] ? $_GET['s'] : 'Procurar...' ?>" id="s-menu" class="placeholder" />
            <input type="submit" class="hidden" value="Procurar" />
          </form>
          <?php wp_nav_menu('container='); ?>
        </div>
      </div>