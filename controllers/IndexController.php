<?php
class IndexController extends Controller {
    function get() {
        global $site;
        $site->tpl->set("page_content", "index.tpl");
    }
}