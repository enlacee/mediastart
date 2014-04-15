<?php

class page extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function contact()
    {
        $this->layout->view('page/contact');
    }
}
