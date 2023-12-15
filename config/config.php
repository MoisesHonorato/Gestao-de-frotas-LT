<?php
define("SERVIDOR", "108.179.192.17");
define("BANCO", "este0946_transporte");
define("USUARIO", "este0946_transporte");
define("SENHA", "@melissa08@");
define("CHARSET", "UTF8");


define('CONTROLLER_PADRAO', 'home');
define('METODO_PADRAO', 'index');
define('NAMESPACE_CONTROLLER', 'app\\controllers\\');
define('TIMEZONE', "America/Fortaleza");
define('CAMINHO', realpath('./'));
define("TITULO_SITE", "eFrotas");

define('URL_BASE', 'http://' . $_SERVER["HTTP_HOST"] . '/transportes/');
define('URL_FOTO', 'http://' . $_SERVER['HTTP_HOST'] . '/transportes/imagens/');

define("SESSION_LOGIN", "usuario_logado");

$config_upload["verifica_extensao"] = false;
$config_upload["extensoes"]         = array(".gif", ".jpeg", ".png", ".bmp", ".jpg");
$config_upload["verifica_tamanho"]  = true;
$config_upload["tamanho"]           = 3097152;
$config_upload["caminho_absoluto"]  = realpath('./') . '/imagens/';
$config_upload["renomeia"]          = false;
