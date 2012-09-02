<?php
include(dirname(__FILE__).'/app/bootstrap.php');


Toro::serve(array(
    '/'     => 'IndexController'
));