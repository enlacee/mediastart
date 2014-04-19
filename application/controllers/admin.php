<?php

$file = FCPATH."application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin extends MY_ControllerAdmin {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     *  Init session with user inactive this return distint page.
     */
    private function accesoUsuario()
    {
        if ($this->adminSession) {
            $usuario = $this->session->userdata('admin');
            if ($usuario['id'] > 0) {
                redirect('admin/dashboard');
            } else {
                $this->adminSession = false;
                $this->session->sess_destroy();
                redirect('admin/index'); 
            }
        }
    }

    public function index()
    {   
        $this->accesoUsuario();
        $data['token'] = $this->auth->token();
        $this->load->view('admin/index', $data);   
        
    }
    
    public function dashboard()
    {        
        $data = array();
        $this->layout->setLayout('layout-admin/layout');
        $this->layout->view('admin/dashboard', $data);        
    }    
    
    /**
     * init session with validations CSRF
     */
    public function login()
    {
        $this->load->model('User_model');
        if ($this->input->post()) {
            if ($this->input->post('token') == $this->session->userdata('token')) {
                $dataUsuario = $this->User_model->login($this->input->post('username'), md5($this->input->post('pass')));                
                                
                if (is_array($dataUsuario) && count($dataUsuario) > 0 ) {
                    $data = array (
                       'admin' => $dataUsuario,
                    );
                    $this->saveSession($data);
                    redirect('admin/dashboard');
                }else {
                    redirect('admin/index');
                }                
            } else {
                redirect('admin/index'); // echo "token incorrecto";
            }          
        } 
    }
    
    /**
     * Save Session
     */
    private function saveSession($data) 
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
        redirect('/admin');
    }    
    
}
