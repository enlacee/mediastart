<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_portfolio_gallery extends MY_ControllerAdmin {

    const PAGE_TITLE = 'Portfolio Gallery';

    public function __construct()
    {
        parent::__construct();
    }

}
