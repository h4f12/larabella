<?php

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// File Path: /Applications/XAMPP/xamppfiles/htdocs/gallery
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'Applications' . DS . 'XAMPP' . DS . 'xamppfiles' . DS . 'htdocs' . DS . 'gallery');

// /admin/includes
// defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', 'SITE_ROOT' . DS . 'admin' . DS . 'includes');

require_once("new_config.php");
require_once("database.php");
require_once("db_object.php");
require_once("user.php");
require_once("photo.php");
require_once("session.php");
require_once("function.php");

?>