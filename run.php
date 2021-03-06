<?php

// define a base path
$path = dirname(__FILE__);
$path = realpath($path);
define('_COS_PATH', $path);

include_once "coslib/config.php";
include_once "coslib/mycurl.php";
include_once "coslib/log.php";

log::createLog();

$config_file = _COS_PATH . '/config/config.php';
config::loadPHPConfigFile($config_file);

// simple api for getting ip. 
$my_ip = @file_get_contents('http://169.254.169.254/latest/meta-data/public-ipv4');
$my_ip = trim($my_ip);

//update or set offline?
if ($argc > 1 && $argv[1] == 'offline')
    $my_ip = '&offline=yes';

$my_hostnames = config::getMainIni('my_hostnames'); // if more hosts use a comma seperated list

$url = config::getMainIni('api_url');
$url.= "?hostname=$my_hostnames&myip=$my_ip";

$user_agent = "User-Agent: noiphp/0.0.1 dennis.iversen@gmail.com";

$curl = new mycurl($url);
$curl->useAuth(true);

$email = config::getMainIni('email');
$password = config::getMainIni('password');

$curl->setName($email);
$curl->setPass($password);
$curl->setUserAgent($user_agent);
$curl->createCurl();

$result = $curl->getWebPage();

if ($result === false)
    log::message(json_encode( $curl->getDebug() ));
else
    log::message($result);

die;
