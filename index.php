<?php
include(dirname(__FILE__).'/config/bootstrap.php');

$site = new Site();

Toro::serve(array(
    '/'     => 'IndexController'
));

$site->tpl->place("page_content", "php");

var_dump($site);