<?php

/**
 * Description of Team.
 *
 * @author anb
 */
class Portfolio_model  extends CI_Model {
    
    protected $_name = 'ac_portfolios';
    
    public function __construct() {
        parent::__construct();
    }    

    /***
     * list of teams
     */
    public function listPorfolio($order = 'desc', $limit = 7)
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
     * List of Portfolio by category.
     * @param Integer $idCategory
     * @param String $order
     * @param Integer $limit
     *  $order = 'desc'
     *  $limit = 9
     *  $offset = 0
     * @return type Array
     */
    public function listPortfolioByCategory($idCategory, $order, $limit , $offset = '', $rows = false)
    {
        $strIdCategoria = str_replace(' ', '_', $idCategory);
        $strIdCategoria = str_replace('-', '_', $idCategory);
        $strRows = (int) $rows;
        
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $strIdCategoria.'_'.$strRows.'_'.$order.$limit.'_'.$offset;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('category_id', $idCategory);
            $this->db->where('status', 1);
            if (!empty($limit) && !empty ($offset)) {
                $this->db->limit($limit, $offset);
            }elseif (!empty($limit)) {
                $this->db->limit($limit);
            }
            
            //order
            if(!empty($order)) {
                $this->db->order_by('created_at', $order);
            }
            //$this->db->limit($limit, $offset);
            $query = $this->db->get();
            if($rows == true) {
                $rs = $query->num_rows();
            } else {
               $rs = $query->result_array(); 
            }
                        
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;        
        
    }
    
    /**
     * List Top portfolio
     * @param Integer $limit
     * @return Array
     */
    public function topView($limit)
    {
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $limit;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);            
            $this->db->where('status', 1);
            $this->db->order_by('count_view', 'desc');
            $this->db->limit($limit);
            $query = $this->db->get();           
            $rs = $query->result_array();            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
    //
    //----------------------- pagination -----------------
    //
    //
    
    function rows()
    {
        $query = $this->db->get($this->_name);
        return  $query->num_rows();
    }
        
    //obtenemos todas las provincias a paginar con la función
    //total_posts_paginados pasando la cantidad por página y el segmento
    //como parámetros de la misma
    function allPorfolio($limit, $offset) 
    {
        $query = $this->db->get($this->_name, $limit, $offset);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
    }    
    
}
