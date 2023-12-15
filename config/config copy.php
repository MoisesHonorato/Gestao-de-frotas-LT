<?php
define("SERVIDOR", "localhost");
define("BANCO", "transportes");
define("USUARIO", "root");
define("SENHA", "");
define("CHARSET", "UTF8");


define('CONTROLLER_PADRAO', 'home');
define('METODO_PADRAO', 'index');
define('NAMESPACE_CONTROLLER', 'app\\controllers\\');
define('TIMEZONE', "America/Fortaleza");
define('CAMINHO', realpath('./'));
define("TITULO_SITE", "mjailton-ligando vc ao mundo do conhecimento");

define('URL_BASE', 'http://' . $_SERVER["HTTP_HOST"] . '/transportes/');
define('URL_IMAGEM', 'http://' . $_SERVER['HTTP_HOST'] . '/transportes/imagens/');

define("SESSION_LOGIN", "usuario_logado");

$config_upload["verifica_extensao"] = false;
$config_upload["extensoes"]         = array(".gif", ".jpeg", ".png", ".bmp", ".jpg");
$config_upload["verifica_tamanho"]  = true;
$config_upload["tamanho"]           = 3097152;
$config_upload["caminho_absoluto"]  = realpath('./') . '/imagens/';
$config_upload["renomeia"]          = true;
