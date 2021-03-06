<?php

/**
 * Description of Banner (home, popular)
 *
 * @author anb
 */
class Category_portfolio_model  extends CI_Model {
    
    const STATUS_TRUE = 1;
    const STATUS_FALSE = 0;
    const CATEGORY_PARENT = 11;
    protected $_name = 'ac_category';
    protected $_name_portfolio = 'ac_portfolios';

    public function __construct() {
        parent::__construct();
    }
    
    public function listItems($status=1, $order = 'desc', $limit = '', $offset = '', $rows = false)
    {   
        $strRows = (int) $rows;   
        $keyCache = __CLASS__ . __FUNCTION__ .'_'.$status.'_'.$strRows.'_'.$order.$limit.'_'.$offset;     
                
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('id_parent', self::CATEGORY_PARENT);
            if(!empty($status)) {                
                $this->db->where("status", $status);
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
    
 /**
     * 
     * @param Array $data
     * @return Boolean 
     */
    public function add($data)
    { 
         $this->db->insert($this->_name, $data);
    }
    
    /**
     * 
     * @param Integer $id
     * @return type
     */
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
    
    /**
     * seleccionar el numero de porfolios relacionados con una categoria
     * @param type $id ID_CATEGORY 
     * @param type $status
     * @return type
     */
    public function getChildren($id, $status = '')
    {
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $id.'_'.$status; 
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select("count($this->_name.id) as count");
            $this->db->from($this->_name);
            $this->db->join('ac_portfolios', "$this->_name.id = ac_portfolios.category_id", 'join');
            $this->db->where("$this->_name.id", $id);
            /*if(!empty($status)) {
                $this->db->where("$this->_name.status", $status);
            }*/
            
            $query = $this->db->get(); 
            $response = $query->row_array();
            $rs = empty($response['count']) ? null : $response['count'];
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
    /**
     * 
     * @param Integer $id
     * @param Array $data
     * @return boolean
     */
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
