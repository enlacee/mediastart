<?php

/**
 * Description of Posts.
 *
 * @author anb
 */
class Category_model  extends CI_Model {
    
    const ID_CATEGORY_PARTNERS = 10;
    const ID_CATEGORY_PORTFOLIO = 11;
    
    protected $_name = 'ac_category';
    
    public function __construct() {
        parent::__construct();
    }    

    /***
     * list of post (lastest news)
     */
    public function listCategory($idCategoryParent, $order = 'desc', $limit = 10)
    {   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $idCategoryParent.'_'.$order.$limit;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select(array('id','name'))->from($this->_name);
            $this->db->where('id_parent', $idCategoryParent);
            $this->db->where('status', 1);
            $this->db->order_by('created_at', $order);
            $this->db->limit($limit);
            $query = $this->db->get();
            $rs = $query->result_array();            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
}