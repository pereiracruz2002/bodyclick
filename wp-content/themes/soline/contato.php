<?php
 session_start();
 require_once('recaptchalib.php');
 $publickey = "6LfKXdYSAAAAAMX_dToyas24sS-Mhzzey2yMbrOj";
 $privatekey = "6LfKXdYSAAAAAJu9GFkE-Sqahrh02nx-E-NCLQFO";

/*
Template Name: contato
*/

get_header();
?>

<!--<div id="modalContentTest"><h3></h3></div>-->
<?php
if($_POST){
	$nome = $_POST['nome'];
	$telefone = $_POST['telefone'];
	$email = $_POST['e-mail'];
	$comentario = $_POST['comentario'];
	$estado = $_POST['estado'];
	$check_sp="";
	$check_outros="";
	if($estado == "capital"){
		$check_sp=" selected='selected'";
	}else{
		$check_outros=" selected='selected'";
	}
	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

	//if($_POST["conta"]===$_POST["contafinal"] and $_GET["status"] =="enviado"){
	//if($_SESSION['captcha'] == $_POST['captcha'] and $_GET["status"] =="enviado" ){
	if($_GET["status"] =="enviado" and $resp->is_valid){


		// multiple recipients
		$to  = $_POST['nome']." <".$_POST['e-mail'].">"; // note the comma


    
    $interesse = "";

    if($_POST["produto"])
      $interesse = "Registrou interesse no produto:<br />http://www.solinemoveis.com.br".$_POST["produto"]."<br /><br />";

		// message
		$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
		$buscaip = $_SERVER['REMOTE_ADDR'];
		$hr = date("H:i:s", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
		$dia = date("d", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
		$mes = date("n", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
		$ano = date("Y", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));
		$dia_sem = date("w", mktime(gmdate("H")-3, gmdate("i"), gmdate("s"), gmdate("m"), gmdate("d"), gmdate("Y")));  
		$meses = array( 1=> "janeiro", "fevereiro", "março", "abril", "maio", "junho", "julho", "agosto", "setembro", "outubro", "novembro", "dezembro"); 
		$semanas = array("Domingo", "Segunda-Feira", "Terça-Feira", "Quarta-Feira", "Quinta-Feira", "Sexta-Feira", "Sábado");


		$message = '
		<html>
			<head>
			 <title>Soline Móveis para Escritório</title>
			</head>
			<body>
				<p>Obrigado '.$_POST['nome'].' por entrar em contato conosco, logo entraremos em contato!</p>
				<p>Endereço IP / Hostname: '.$hostname.'</p>
				<p><a href="http://www.geoiptool.com/?IP='.$buscaip.'"><b>Verificar localização do IP</b></a></p>
				<p>Enviando em: '.$semanas[$dia_sem].', '.$dia.' de '.$meses[$mes].' de '.$ano.' - '.$hr.'</p>
				<p>Confira abaixo os dados preenchidos:</p>
				<p>Telefone: '.$_POST['telefone'].' </p>
				<p>Estado: '.$_POST['estado'].' </p>
				<p>E-mail: '.$_POST['e-mail'].' </p>
				<p>Comentário: '.$_POST['comentario'].' </p>
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
		$headers .= 'From: Soline Moveis <vendas@soline.com.br>' . "\r\n";
  //  $headers .= 'To: Soline Moveis <vendas@soline.com.br>' . "\r\n";

    if($_POST["estado"]== "capital"){
         // subject
         $subject = 'Soline - Contato [CAPITAL]';
      	 $headers .= 'Cc: flaviofranca@soline.com.br' . "\r\n";
    }else{
         $subject = 'Soline - Contato';
      	 $headers .= 'Cc: sales@soline.com.br' . "\r\n";
    }


		$headers .= 'Bcc: dropbox@2843.soline.karmacrm.com' . "\r\n";

    $conversao = '<!-- Google Code for Contatos Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1032415939;
var google_conversion_language = "pt";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "rHrXCJ2I3gEQw9Wl7AM";
var google_conversion_value = 0;
if (1,00) {
  google_conversion_value = 1,00;
}
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1032415939/?value=1,00&amp;label=rHrXCJ2I3gEQw9Wl7AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>';

		// Mail it

		if(mail($to, $subject, $message, $headers)){
			$ver = true;
			//$msg = "Mensagem enviada com sucesso, logo entraremos em contato";
?>
<script type="text/javascript">
alert("Sua solicitação foi enviada com sucesso");
window.location ="http://www.solinemoveis.com.br/"
/*function simplemodal_close (dialog) {
	$.modal.close();
	top.location.href='http://www.solinemoveis.com.br/';
}
$('#modalContentTest h3').append('Sua solicitação foi enviada com sucesso.<br />Em breve entraremos em contato');
$('#modalContentTest').modal({onClose: simplemodal_close});
*/
</script>

<?php
		}else{
			$msg = "Desculpe, não foi possível enviar a mensagem, você pode tentar novamente?";
		}
	}else{
		$msg = "Desculpe, mas o código digitado está incorreto";
	}
}
$conta = rand(1,5);
 ?>
     <div id="conteudo">
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
         <div id="post-<?php the_ID(); ?>" class="central">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
          <? if(isset($msg)): ?>
          <div class="error"><?=$msg?></div>
          <?=$conversao?>
          <? endif; ?>
            <form class="vForm" method="post" action="<? bloginfo("url")?>/contato/?status=enviado">
              <label class="vObrigatorio">Nome:<input type="text" name="nome" value="<?php if(isSet($nome)){echo $nome;}else{echo '';} ?>" /></label>
              <label class="vObrigatorio">Telefone:<input type="text" name="telefone" value="<?php if(isSet($telefone)){echo $telefone;}else{echo '';} ?>" /></label>
              <label class="vObrigatorio">Estado:
                  <select name="estado">
                      <option value="">Escolha</option>
                      <option value="capital" <?php if(isSet($check_sp)){echo $check_sp;} ?>>São Paulo - Capital</option>
                      <option value="outros"  <?php if(isSet($check_outros)){echo $check_outros;} ?> >Outro</option>
                  </select>
              </label>
              <label class="vObrigatorio vEmail">E-mail:<input type="text" name="e-mail" value="<?php if(isSet($email)){echo $email;}else{echo '';} ?>"   /></label>
              <label class="vObrigatorio">Comentário:<textarea rows="20" cols="20" name="comentario"><?php if(isSet($comentario)){echo $comentario;}else{echo '';} ?></textarea></label>
              <input type="hidden" name="contafinal" value="<?=$conta*2?>" />
              <input type="hidden" name="produto" value="<?=$_GET["produto"]?>" />
              <!--<label class="vObrigatorio">Você é uma pessoa? Então responda, quanto é <?=$conta?> + <?=$conta?>:<input type="text" name="conta" /></label>-->
              <!--<img src="<?=bloginfo("template_url");?>/captcha.php" alt="código captcha" />
			   <label for="captcha">Digite o código</label>
			   <input type="text" name="captcha" id="captcha"  maxlength="10" />-->
			   <span><strong>Por favor insira as palavras que você vê na caixa, em ordem e separadas por um espaço.</strong></span>
			   <br />
			   <span><strong>Caso tenha dúvidas das palavras, clique no primeiro botão da caixa para gerar outra sequência.</strong></span>
			   <br />
			   <br />
			   <?php echo recaptcha_get_html($publickey);?>
			   <br /> <br />
              <input type="submit" value="Enviar" id="signup" />
            </form>
   			 </div><!-- #central -->
         <div id="mapa">
           <h3>Endereço da Loja</h3>
           <p>SHOW ROOM - (11)3256-6631<br />Rua Major Sertório, 194 - República</p>
           <iframe width="350" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com.br/maps?q=Rua+Major+Sert%C3%B3rio,+194+-+Rep%C3%BAblica&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Maj.+Sert%C3%B3rio,+194+-+Rep%C3%BAblica,+S%C3%A3o+Paulo,+01222-000&amp;gl=br&amp;ei=6nppTPXzG4L68AaD3dG2BA&amp;ved=0CBYQ8gEwAA&amp;z=14&amp;ll=-23.545438,-46.645836&amp;output=embed"></iframe><br /><small><a href="http://maps.google.com.br/maps?q=Rua+Major+Sert%C3%B3rio,+194+-+Rep%C3%BAblica&amp;ie=UTF8&amp;hq=&amp;hnear=R.+Maj.+Sert%C3%B3rio,+194+-+Rep%C3%BAblica,+S%C3%A3o+Paulo,+01222-000&amp;gl=br&amp;ei=6nppTPXzG4L68AaD3dG2BA&amp;ved=0CBYQ8gEwAA&amp;z=14&amp;ll=-23.545438,-46.645836&amp;source=embed" style="color:#0000FF;text-align:left">Exibir mapa ampliado</a></small>
         </div>
        <?php endwhile; ?>
		</div><!-- #conteudo -->
<?php include_once("menu.php"); ?>
<?php get_footer(); ?>
   </div>
</body>
</html>