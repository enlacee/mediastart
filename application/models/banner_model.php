<?php

/**
 * Description of Banner (home, popular)
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
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $status.$limit;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where("status = $status");
            $this->db->limit($limit);
            $query = $this->db->get();
            $rs = $query->result_array();
            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
    /**
     * List of banner Random.
     * @param type $status
     * @param type $limit
     * @return type
     */
    public function listPopular($status = 1, $limit = 5)
    {   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $status.$limit;
        
        if (($rs = $this->cache->file->get($keyCache)) == false ) {
            $this->db->select()->from($this->_name);
            $this->db->where("status = $status");
            $this->db->order_by('id', 'random');
            $this->db->limit($limit);
            $query = $this->db->get();        
            $rs = $query->result_array();
            
            $this->cache->file->save($keyCache, $rs, 600);
        }        
        return $rs;
    }    
    
    
}
