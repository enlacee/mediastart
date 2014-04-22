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
        
        $stringUrl = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';        
        $stringUrl = str_replace(base_url(), '', $stringUrl);
        $urlArray = !empty($stringUrl) ? preg_split("#/#", $stringUrl) : '';     
        $stringUrlNew = base_url();
        
        if (is_array($urlArray) && count($urlArray) > 0) {
            for($i = 0; $i < count($urlArray); $i++) {
                if($i == 0 ) {
                    if ($this->is_language($urlArray[$i])) {//if pertecene a un idioma //es, it
                        $stringUrlNew .= $data['id_lang'] . '/';
                    } else {                      
                        $stringUrlNew .= $data['id_lang'].'/'.$urlArray[$i] . '/';
                    }            
                } else {
                    $stringUrlNew .= $urlArray[$i] . '/';
                }
            }            
            $stringUrlNew = substr($stringUrlNew, 0,(strlen($stringUrlNew)-1));
        }
             
        redirect($stringUrlNew);
    }
    

}