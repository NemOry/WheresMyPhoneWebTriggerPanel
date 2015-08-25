<?php 

defined('DS') ? null : 				define('DS', DIRECTORY_SEPARATOR);
//defined('SITE_ROOT') ? null : 		define('SITE_ROOT', DS.'home'.DS.'wwwkelly'.DS.'public_html');
defined('SITE_ROOT') ? null : 		define('SITE_ROOT'		, DS.'xampp'.DS.'htdocs'.DS.'trigger');
defined('INCLUDES_PATH') ? null : 	define('INCLUDES_PATH', SITE_ROOT.DS.'includes');
defined('PHP_MAILER') ? null : 		define('PHP_MAILER', INCLUDES_PATH.DS.'PHPMailer');
defined('TWITTER_PHP_SDK') ? null :define('TWITTER_PHP_SDK', INCLUDES_PATH.DS.'twitteroauth');
defined('DROPBOX') ? null : 		define('DROPBOX', INCLUDES_PATH.DS.'dropbox-sdk');

// PHP MAILER
require_once(PHP_MAILER.DS."class.phpmailer.php");
require_once(PHP_MAILER.DS."class.smtp.php");

// TWITTER PHP SDK
require_once(TWITTER_PHP_SDK.DS."twitteroauth.php");

// DROPBOX
require_once(DROPBOX.DS."Dropbox/autoload.php");

?>