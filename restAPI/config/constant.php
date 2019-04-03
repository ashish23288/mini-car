<?php
//echo "<pre>";



define('PROTOCOL',$_SERVER['REQUEST_SCHEME']);
define('BASE_URL',PROTOCOL.'://'.$_SERVER['SERVER_NAME'].'/restAPI');
define('CUR_URL',PROTOCOL.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
define('CUR_DIR_URL',PROTOCOL.'://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['PHP_SELF']));
define('BASE_PATH',$_SERVER['DOCUMENT_ROOT'].'/restAPI');
define('CUR_PATH',$_SERVER['SCRIPT_FILENAME']);
define('CUR_DIR_PATH',__DIR__);
define('FILE_NAME',basename(__FILE__));

// ECHO PROTOCOL."<BR>";
// ECHO BASE_URL."<BR>";
// ECHO CUR_URL."<BR>";
// ECHO CUR_DIR_URL."<BR>";
// ECHO BASE_PATH."<BR>";
// ECHO CUR_PATH."<BR>";
// ECHO CUR_DIR_PATH."<BR>";
// ECHO FILE_NAME."<BR>";

// print_r($_SERVER);