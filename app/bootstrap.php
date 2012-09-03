<?php
require($_SERVER["DOCUMENT_ROOT"].'/app/config.php');
require($_SERVER["DOCUMENT_ROOT"]."/libraries/toro/toro.php");
require($_SERVER["DOCUMENT_ROOT"]."/libraries/framework/Controller.php");
require($_SERVER["DOCUMENT_ROOT"]."/libraries/framework/functions.php");

/**
 *  Autoload classes from a variety of folders.
 *  @var $class = class name
 *  @throws Exception
 */
spl_autoload_register(function ($class) {
    $folders = array(
        $_SERVER["DOCUMENT_ROOT"].'/libraries/flourish',
        $_SERVER["DOCUMENT_ROOT"].'/libraries/framework',
        $_SERVER["DOCUMENT_ROOT"].'/models',
        $_SERVER["DOCUMENT_ROOT"].'/controllers'
    );
    foreach($folders as $folder) {
        $file = sprintf("%s/%s.php", $folder, $class);
        if(file_exists($file)) {
            require $file;
            return;
        }
    }
    throw new Exception("The file ".$file." could not be loaded");
});