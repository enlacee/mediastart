<?php

/**
 * Description of Posts.
 *
 * @author anb
 */
class Post_model  extends CI_Model {
    
    protected $_name = 'ac_posts';
    
    public function __construct() {
        parent::__construct();
    }    

    /***
     * list of post (lastest news)
     */
    public function listPost($post_type = 'post', $order = 'desc', $limit = 10)
    {   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $post_type.$limit;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('post_type', $post_type);
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
    
}
