<?php
// Server Path
$docRoot = $_SERVER['DOCUMENT_ROOT'];
//$docRoot .= "demo/hospital";
$host = $_SERVER['HTTP_HOST'];

// Local Database Settings 
$config['server'] = 'localhost'; 
$config['database'] = 'astronomymanipal';
$config['user'] = 'root';
$config['pass'] = '';
$_SESSION['UserFilesPath']=dirname($_SERVER['PHP_SELF']).'/staticpageimages/';
// DirRStory Settings
define('BASE_DIR_FRONT', $docRoot); 
define('BASE_DIR_ADMIN', $docRoot.'/admin/');

define('SITEURL', 'http://localhost/aimApp');

define('ADMIN_TITLE', "Astrooooooo"); 
define('SITE_NAME', "Astrooooooo"); 
define('BASE_DIR_FILES', '../writereaddata/files/' ); 
define('BASE_DIR_GALLERY', '../writereaddata/gallery/' ); 
define('BASE_DIR_PROFILE', '../writereaddata/pics/' ); 

?>   