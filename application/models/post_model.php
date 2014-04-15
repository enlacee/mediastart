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
            $this->db->order_by('created_at', $order);
            $this->db->limit($limit);
            $query = $this->db->get();
            $rs = $query->result_array();
            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
}
