<?php

/**
 * Description of Posts.
 *
 * @author anb
 */
class Comment_model  extends CI_Model {
    
    protected $_name = 'ac_comments';
    
    const STATUS_TRUE = 1;
    const STATUS_FALSE = 0;   


    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param Array $data
     * @return Boolean 
     */
    public function add($data)
    {
        if (is_array($data) && count($data) > 0) {
            $this->db->insert($this->_name, $data);
        }        
    }
    
    public function getCommentByPost($idPost, $status='')
    {
        $keyCache = __CLASS__ . __FUNCTION__ .'_'.$status;
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('id_post', $idPost);
            if(!empty($status)) {
                $this->db->where('status', $status);
            }
            $query = $this->db->get();
            $rs = $query->result_array();
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }

    
    //add
    /**
     *  Lista all
     */
    public function listComment($idPost = '',$status='', $order = 'desc', $limit = '', $offset = '', $rows = false)
    {   
        $strRows = (int) $rows;   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'.$idPost.'_'.$status.'_'.$strRows.'_'.$order.$limit.'_'.$offset;     
                
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select();
            $this->db->from($this->_name);            
            if(!empty($status)) {
                $this->db->where("status", $status);
            }            
            if (!empty($idPost)) {
                $this->db->where("id_post", $idPost);
            }
            
            // -------- init
            if (!empty($limit) && !empty ($offset)) {
                $this->db->limit($limit, $offset);
            } elseif (!empty($limit)) {
                $this->db->limit($limit);
            }            
            //order
            if (!empty($order)) {
                $this->db->order_by("created_at", $order);
            }
            
            $query = $this->db->get();
            if ($rows == true) {
                $rs = $query->num_rows();
            } else {
               $rs = $query->result_array(); 
            }            
            // -------- end
            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        
        return $rs;
    }     
    
    // get comment
    public function get($id)
    {
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $id;        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('id', $id);            
            $this->db->limit(1);
            $query = $this->db->get();
            $response = $query->row_array();
            $rs = ($response == false) ? null : $response;
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }

    // delete
    public function del($id)
    {   
        $flag = false;
        if (!empty($id)) {
            $this->db->where('id', $id);                    
            $this->db->delete( $this->_name);
            $flag = true;
        }
        return $flag;
    }    
    
    // update
    public function update($id, $data = array())
    {   
        $flag = false;
        if (!empty($id)) {
            $this->db->where('id', $id);
            if(is_array($data) && count($data) > 0 ) {
                $dataUpdate = $data;
                $this->db->update( $this->_name, $dataUpdate);
                $flag = true;
            }            
        }
        return $flag;
    }    
    
}
