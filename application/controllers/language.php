<?php

class Language extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * Seter of Languague in session
     * @param type $prefix
     */
    public function set($prefixLang = '')
    {
        $id = (!empty($prefixLang)) ? $prefixLang : '';
        $data['id_lang'] =  $id; // numeric = language
        $this->session->set_userdata($data); 
        $refer = (!empty($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : '/';
        redirect($refer);
    }    
}