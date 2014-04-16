<?php

/**
 * Description of Team.
 *
 * @author anb
 */
class Work_model  extends CI_Model {
    
    protected $_name = 'ac_works';
    
    public function __construct() {
        parent::__construct();
    }    

    /***
     * list of teams
     */
    public function listWork($order = 'desc', $limit = 7)
    {   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $order.$limit;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);            
            $this->db->where('status', 1);
            $this->db->order_by('created_at', $order);
            $this->db->limit($limit);
            $query = $this->db->get();
            $rs = $query->result_array();
            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
    /**
     * 
     * @param Integer $id
     * @return Array data Element.
     */
    public function get($id)
    {
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $id;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('id', $id);
            $this->db->where('status', 1);
            $this->db->limit(1);
            $query = $this->db->get();
            $response = $query->result_array();
            $rs = ($response == false) ? null : $response[0];
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
    /**
     * List of Work by category.
     * @param Integer $idCategory
     * @param String $order
     * @param Integer $limit
     * @return type Array
     */
    public function listWorkByCategory($idCategory, $order = 'desc', $limit = 9)
    {
        $strIdCategoria = str_replace(' ', '_', $idCategory);
        $strIdCategoria = str_replace('-', '_', $idCategory);
        
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $strIdCategoria.'_'.$order.$limit;
        
        if (/*($rs = $this->cache->file->get($keyCache)) == false*/true) {
            $this->db->select()->from($this->_name);
            $this->db->where('category', $idCategory);
            $this->db->where('status', 1);
            $this->db->limit($limit);
            $query = $this->db->get();           
            $rs = $query->result_array();            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;        
        
    }
    
}
