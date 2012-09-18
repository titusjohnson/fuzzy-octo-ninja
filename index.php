<?php
include(dirname(__FILE__).'/config/bootstrap.php');

fORMDatabase::attach(new fDatabase("mysql", "framework", "root", "root"));

$log = new loggar($_SERVER["DOCUMENT_ROOT"]."/logs/");

$tpl = new fTemplating($_SERVER["DOCUMENT_ROOT"]."/themes/default/");

// First order of business is to load the Site object
$site = new Site();

ToroHook::add("404", Errors::FourOhFour());

//Toro::serve(array(
//    '/'     => 'IndexController'
//));


var_dump($site);

$tpl->place("page_content", "php");