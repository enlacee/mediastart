<?php

class User_model  extends CI_Model {
    
    protected $_name = 'ac_users';
    const STATUS_ON = 1;
    const STATUS_OFF = 0;
    
    public $id;
    public $name;
    public $user_name;
    public $email;
    public $password; 
    public $status;
  
    
    /**
     * Modelo del usuario
     * @param type $id
     * @return \Usuario_model|boolean
     */
    public function __construct($id = null)
    {
        parent::__construct();        
        if (isset($id) && !empty($id)) {
            $this->db->select()->from($this->_name)->where('id', $id);         
            $query = $this->db->get();
            $rs = $query->row_array();
            return $this->_setData($rs);          
        }
    }
    
    /**
     * Load data
     * @param Array $rs
     * @return \Usuario_model|boolean
     */
    private function _setData($rs)
    {
        if ($rs != false) {
            $this->id = $rs['id'];
            $this->name = $rs['name'];
            $this->user_name = $rs['user_name'];
            $this->email = $rs['email'];
            $this->password = $rs['password'];            
            $this->status = $rs['status'];
            return $this;                
        } else {
            return false;
        }
    }    
       

 // ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 // funciones adicionales   
    public function login($user, $password, $dataArray = true)
    {
        $this->db->select()->from($this->_name);
        $this->db->where('user_name', $user);
        $this->db->where('password', $password);
        $query = $this->db->get();
        $rs = $query->row_array();
        if ($dataArray) {
            return $rs;
        } else {
            return $this->_setData($rs);
        }
    }
    
    public function getByEmail($email)
    {
        $this->db->select()->from($this->_name)->where('email', $email);
        $query = $this->db->get();        
        $rs = $query->row_array();
        return $this->_setData($rs);        
    }
}
