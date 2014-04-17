<?php
/**
 * @author Anibal <acopitan@gmail.com>
 * @category Libreria
 * 
 * Encapsulamiento de funciones que se cargan al iniciar el controlador
 * para el Administrador (cpanel)
 * 
 */

class MY_ControllerAdmin extends MY_Controller {    

    public function __construct()
    {
        parent::__construct();
        $this->dependencias();
        $this->loadVariableImage();
    }  
    
    /*
     * Load dependends basic (admin) 
     */
    private function dependencias()
    {  
        
    }
    
    /**
     * list of variables for consummer and response
     * process (create thumbnail)
     */
    public function loadVariableImage()
    {   

        
    }
}
