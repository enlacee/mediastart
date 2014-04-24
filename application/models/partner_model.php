<?php

/**
 * Description of Partners.
 *
 * @author anb
 */
class Partner_model  extends CI_Model {
    
    const STATUS_TRUE = 1;
    const STATUS_FALSE = 0;
    
    protected $_name = 'ac_partners';
    
    public function __construct() {
        parent::__construct();
    }    

    public function listPartner($category_id = '',$status='', $order = 'desc', $limit = '', $offset = '', $rows = false)
    {   
        $strRows = (int) $rows;   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'.$category_id.'_'.$status.'_'.$strRows.'_'.$order.$limit.'_'.$offset;     
                
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select("$this->_name.*, ac_category.name AS category");
            $this->db->from($this->_name);
            $this->db->join('ac_category', "$this->_name.category_id = ac_category.id", 'left');
            if(!empty($status)) {
                $this->db->where("$this->_name.status", $status);
            }            
            if (!empty($category_id)) {
                $this->db->where("$this->_name.category_id", $category_id);
            }
            
            // -------- init
            if (!empty($limit) && !empty ($offset)) {
                $this->db->limit($limit, $offset);
            } elseif (!empty($limit)) {
                $this->db->limit($limit);
            }            
            //order
            if (!empty($order)) {
                $this->db->order_by("$this->_name.created_at", $order);
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
    
    /***
     * list of Partners
     */
    public function listCategory($idCategory, $limit = '')
    {   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'.$idCategory.'_'.$limit;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);            
            $this->db->where('category_id', $idCategory);
            $this->db->order_by('created_at', 'desc');
            if(!empty($limit)) {
                $this->db->limit($limit);
            }            
            $query = $this->db->get();
            $rs = $query->result_array();
            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
    public function get($id, $status = '')
    {
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $id.'_'.$status;        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('id', $id);
            if (!empty($status)) {
                $this->db->where('status', $status);
            }            
            $this->db->limit(1);
            $query = $this->db->get();
            $response = $query->result_array();
            $rs = ($response == false) ? null : $response[0];
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
    public function add($data)
    {
        $this->db->insert($this->_name, $data);
    }  
    
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
    
}
