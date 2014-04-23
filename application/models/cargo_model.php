<?php

/**
 * Description of Cargo.
 *
 * @author anb
 */
class Cargo_model  extends CI_Model {
    
    protected $_name = 'ac_cargos';
    
    public function __construct() {
        parent::__construct();
    }    

    /***
     * list
     */
    public function listCargo($limit = '')
    {   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'.$limit;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select(array('id','name'))->from($this->_name);
            if (!empty($limit)) {
                $this->db->limit($limit);
            }            
            $query = $this->db->get();
            $rs = $query->result_array();            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
}