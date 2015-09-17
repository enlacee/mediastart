<?php

/**
 * Description of Portfolio.
 *
 * @author anb
 */
class Portfolio_model  extends CI_Model {

    const STATUS_TRUE = 1;
    const STATUS_FALSE = 0;
    protected $_name = 'ac_portfolios';
    const FLAG_IMAGE = 'image';
    const FLAG_VIDEO = 'video';

    public function __construct() {
        parent::__construct();
    }

    /***
     * list of teams
     */ // 7

    public function listPorfolio($flag='', $category_id = '', $status = '', $order = 'desc', $limit = '',$offset = '', $rows = false)
    {
        $strRows = (int) $rows;
        $keyCache = __CLASS__ . __FUNCTION__ .'_'.$flag.'_'.$category_id.'_'.$status.'_'.$strRows.'_'.$order.$limit.'_'.$offset;

        if (TRUE/*($rs = $this->cache->file->get($keyCache)) == false*/) {
            $this->db->select("$this->_name.*, ac_category.name as category");
            $this->db->from($this->_name);
            $this->db->join('ac_category', "$this->_name.category_id = ac_category.id", 'left');
            if(!empty($status)) {
                $this->db->where("$this->_name.status", $status);
            }
            if (!empty($category_id)) {
                $this->db->where("$this->_name.category_id", $category_id);
            }

            if (!empty($flag)) {
                $this->db->where("$this->_name.flag", $flag);
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

    /**
     *
     * @param Integer $id
     * @return Array data Element.
     */
    public function get($id, $category_id = '', $status = '')
    {
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $id.'_'.$category_id.'_'.$status;

        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('id', $id);
            if(!empty($category_id)) {
                $this->db->where('category_id', $category_id);
            }
            if(!empty($status)) {
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


    // contador de visitas
    public function countView($id)
    {
        $data = $this->get($id);
        if (isset($data['count_view']) && array_key_exists('count_view', $data)) {
            $counter = ((int)$data['count_view']) + 1;
            $this->db->where('id', $id);
            $this->db->update( $this->_name, array('count_view' => $counter));
        }
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
            $this->db->where('status', Portfolio_model::STATUS_TRUE);
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
