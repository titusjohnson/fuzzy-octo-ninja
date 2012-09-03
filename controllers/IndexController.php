<?php
class IndexController extends Controller {
    function get() {
        global $tpl;
        $tpl->set("page_content", "index.tpl");
    }
}