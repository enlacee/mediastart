<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AuthLogin  extends MY_Controller {
        
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {echo "index-auth";exit;}
    
    /**
     * init session with validations CSRF
     */
    public function login()
    {
        $this->load->model('Usuario_model');
        if ($this->input->post()) {
            if ($this->input->post('token') == $this->session->userdata('token')) {
                $dataUsuario = $this->Usuario_model->login(
                    $this->input->post('email'),
                    $this->input->post('password'));

                //$dataObjetivo = $this->Objetivo_model->getObjetivos();            
                $data = array (
                   'user' => $dataUsuario,
                );
                // para enviar mensaje de respuesta xq no se concreto.
                $this->guardarSessionUser($data);
                redirect('/index');                
            } else {
                echo "token incorrecto";  
            }          
        } 
    }
    
    /**
     * Guardar la session
     */
    private function guardarSessionUser($data) 
    {   
        $flag = false;
        if (count($data) > 0) {             
            $this->session->set_userdata($data);
            $flag = true;
        }        
        return $flag;
    }
    
    /**
     * Cerrar session y limpiar datos en cache.
     */
    public function logout()
    {   
        $this->load->driver('cache');    
        $this->session->sess_destroy();
        $this->cache->file->clean();
        redirect('/');
    }
}
