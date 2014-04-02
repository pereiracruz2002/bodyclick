<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'bodyclick');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'senha');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<27HKIe=`nQP}j`eCJ5%:rGUmcgiFOu{^Ii;ym0Fv!$7//Jhv5}&#qp2m[:>ORM{');
define('SECURE_AUTH_KEY',  'dv($V:+_yxCg.]hYIb>Wn9HpVx4 =Csax:n,8*vj^=W*|1<s_0pwe0LJC6ZrWdkK');
define('LOGGED_IN_KEY',    'F13?[VW|P> M*HXu#b2X&euo`7>M&j9N9l&QC^V!,A+A=!:mApTGQ(KCq[lOTU9T');
define('NONCE_KEY',        'fN%}AZW2gExMs2YsAm8l=n:aoz]G;tfcTrVdRy*woO~* ?7siNe*w~<:l};%~}g?');
define('AUTH_SALT',        'd~3&iE=>F{8%45_5SNl(bu|D:v{ig{||kMafF)wuFH9NS`2F8qOV+k^YL9(U5M/<');
define('SECURE_AUTH_SALT', 'C^U Ou-pYa3JssKRdy%Br4#vS]P*DD9/8)F*m$8t ~|XfPDDLFv~)DL|05X/{:H,');
define('LOGGED_IN_SALT',   '+,lZX_fPk&-=5l2?jmGx-(Y[&SKnMGa>TXHTQ/L^|J!9i2PE!IYqiku+^wvDU%;%');
define('NONCE_SALT',       '/>|r2 ~-]vo6sZ,Mn?o<+uz:c~X%c0}<=q_Gv@7)_U<MIT;s?qvT+e-95UF_V$_?');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', true);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
