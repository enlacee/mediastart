<?php

/**
 * Description of cuadro_model
 *
 * @author anb
 */
class Banner_model  extends CI_Model {
    
    protected $_name = 'ac_banners';
    
    public function __construct() {
        parent::__construct();
    }    

    /***
     * list of banner  by status
     */
    public function listBanner($status = 1, $limit = 5)
    {   
        $this->db->select()->from($this->_name);
        $this->db->where("status = $status");
        $this->db->limit($limit);
        $query = $this->db->get();        
        return $query->result_array(); 
    }
    
}
