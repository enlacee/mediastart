<?php
/**
 * @author Anibal Copitan <acopitan@gmail.com>
 * @category Libreria
 * 
 * Encapsulamiento de funciones que se cargan al iniciar el controlador
 * base CI_Controller ejm : auth, cron, check, etc..
 */

class MY_ControllerAdmin extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->layout->setLayout('layout-admin/layout');
    }    
    
}
