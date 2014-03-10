<?php
/**
 * configuration variables
 *
 * This file has constants and global variable used through out the application.
 * 
 */
define('SITE_TITLE', 'Register');
if(isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] == '172.21.4.100'){
	define('SITE_PATH', 'http://'.$_SERVER['HTTP_HOST'].'/training/register/');
}else{
	define('SITE_PATH', 'http://ithamor.azurewebsites.net/');
}

define('STYLE_PATH', SITE_PATH.'/WebResources/Styles/');
define('SCRIPT_PATH', SITE_PATH.'/WebResources/Scripts/');

?>