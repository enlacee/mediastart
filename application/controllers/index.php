<?php

class Index extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * home principal login
     */
    public function index()
    {/*
        $this->accesoUsuario();
        $data['token'] = $this->auth->token();
        $this->load->view('index/index', $data);*/
        $this->layout->view('index/index');
    }
    
    /**
     *  Init session with user inactive this return distint page.
     */
    private function accesoUsuario()
    {   //var_dump($this->auth);
        if ($this->userSession) {
            $usuario = $this->session->userdata('user'); //var_dump($usuario);Exit;
            if ($usuario['activo'] == '1') {
                redirect('/dashboard');
            } else { // necsita pagar membresia.
                $this->userSession = false;
                $this->session->sess_destroy();
                redirect('/index/usuarioInactivo'); 
            }
        }
    }
    
    /**
     * view for usuaruario inactive.
     */
    public function usuarioInactivo()
    {
        $this->load->view('index/usuario-inactivo');
    }
}
