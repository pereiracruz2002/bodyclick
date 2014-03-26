<?php
/*
Template Name: arquitetos
*/
if($_POST){

	if($_POST["conta"]===$_POST["contafinal"]){

		// multiple recipients
		$to  = $_POST['email']; // note the comma

		// subject
		$subject = 'Soline Móveis - Parceria';
    
    $interesse = "";

    if($_POST["interesse"])
      $interesse = "Registrou interesse no produto:<br /><a href='http://www.solinemoveis.com.br/".$_POST["categoria"]."/".$_POST["interesse"]."'>".$_POST["interesse"]."</a>";

		// message
		$message = '
		<html>
			<head>
			 <title>Soline Móveis para Escritório</title>
			</head>
			<body>
				<p>Obrigado '.$_POST['nome'].' por entrar em contato conosco!</p>
				<p>Recebemos seus dados com sucesso e logo entraremos em contato</p>
				<p>Telefone: '.$_POST['telefone'].' </p>
				<p>E-mail: '.$_POST['e-mail'].' </p>
				<p>Mini currículo: '.$_POST['comentario'].' </p>
				<br /><br />'.$interesse.'
				<p>Atenciosamente<br />Soline Móveis<br />
				<a href="http://www.solinemoveis.com.br" title="Visite nosso site">http://www.solinemoveis.com.br</a>
				</p>
			</body>
		</html>
		';

		/* Atenção se você pretende inserir numa variável uma mensagem html mais
		 complexa do que essa sem precisar escapar os carateres 
		 necessários pode ser feito o uso da sintaxe heredoc, consulte tipos-string-sintaxe-heredoc */

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		// Additional headers
		//$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
		$headers .= 'From: Soline Móveis <vendas@solinemoveis.com.br>' . "\r\n";
		//$headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
		$headers .= 'Bcc: vendas@soline.com.br' . "\r\n";

		// Mail it
		if(mail($to, $subject, $message, $headers)){
			$ver = true;
			$msg = "Mensagem enviada com sucesso, logo entraremos em contato";
		}else{
			$msg = "Desculpe, não foi possível enviar a mensagem, você pode tentar novamente?";
		}
	}else{
		$msg = "Desculpe, mas a conta está errada, tente novamente";
	}
}
$conta = rand(1,5);

get_header(); ?>
     <div id="conteudo">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
         <div id="post-<?php the_ID(); ?>" class="central">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
          <? if(isset($msg)): ?>
          <div class="error"><?=$msg?></div>
          <? endif; ?>
            <form class="vForm arquiF " action="" method="post" style="font-size:14px;">
              <br />
              <label class="vObrigatorio">Nome:<input type="text" name="nome" /></label>
              <label class="vObrigatorio">Telefone:<input type="text" name="telefone" /></label>
              <label class="vObrigatorio vEmail">E-mail:<input type="text" name="e-mail" /></label>
              <label class="vObrigatorio">Conte-nos sua experiência:<textarea cols="20" rows="20" name="comentario"></textarea></label>
              <input type="hidden" name="contafinal" value="<?=$conta*2?>" />
              <input type="hidden" name="interesse" value="<?=$_GET["nome"]?>" />
              <input type="hidden" name="categoria" value="<?=$_GET["categoria"]?>" />
              <label class="vObrigatorio">Você é uma pessoa? Então responda, quanto é <?=$conta?> + <?=$conta?>:<input type="text" name="conta" /></label>
              <input type="submit" value="Enviar" />
            </form>
    			 </div><!-- #central -->
       <?php endwhile; ?>
       <?php get_sidebar(); ?>
		</div><!-- #conteudo -->
<?php include_once("menu.php"); ?>
<?php get_footer(); ?>
   </div>
</body>
</html>