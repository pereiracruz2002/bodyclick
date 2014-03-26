<?
	//PEGA OS DADOS ENVIADOS PELO FORMULÁRIO
	$email	=	$_POST["email"];
	
	//PREPARA O CONTEÚDO A SER GRAVADO
	$conteudo	=	"$email\r\n";
	
	//ARQUIVO TXT
	$arquivo	=	"/home/sol/public_html/wp-content/themes/soline/emails/clientes.txt";
	
	//TENTA ABRIR O ARQUIVO TXT
	if (!$abrir = fopen($arquivo, "a")) {
         $msg = "Erro abrindo arquivo ($arquivo)";
         exit;
    }
	
	//ESCREVE NO ARQUIVO TXT
	if (!fwrite($abrir, $conteudo)) {
        $msg = "Erro escrevendo no arquivo ($arquivo)";
        exit;
    }
	
	$msg = "E-mail gravado com sucesso!!";
  
  //FECHA O ARQUIVO 
	fclose($abrir);

  ?>
  <script type="text/javascript">
    alert("<?=$msg?>")
    window.location.href="http://www.solinemoveis.com.br";
  </script>