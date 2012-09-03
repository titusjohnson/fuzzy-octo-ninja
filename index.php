<?php
include(dirname(__FILE__).'/app/bootstrap.php');

$tpl = new fTemplating($S["templates"].$S["theme"]);
$tpl->buffer();

Toro::serve(array(
    '/'     => 'IndexController'
));

echo content();