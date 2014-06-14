<?php

/**
 * Description of Posts.
 *
 * @author anb
 */
class Post_model  extends CI_Model {
    
    protected $_name = 'ac_posts';
    
    const TIPO_POST = 'post';
    const TIPO_PAGE = 'page';
    const TIPO_PAGE_ABOUT = 'page-about';
    
    const STATUS_TRUE = 1;
    const STATUS_FALSE = 0;

    public function __construct() {
        parent::__construct();
    }    

    /***
     * list of post (lastest news)
     */
    public function listPost($post_type=Post_model::TIPO_POST, $status='', $order='desc', $limit=10, $offset='', $rows=false)
    {   
        $str_post_type = str_replace('-', '_', $post_type);
        $strRows = (int) $rows;        
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $str_post_type.'_'.$status.'_'.$strRows.'_'.$order.$limit.'_'.$offset;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('post_type', $post_type);
            if(!empty($status)) {
                $this->db->where('status', $status);
            }
            
            // -------- init
            if (!empty($limit) && !empty ($offset)) {
                $this->db->limit($limit, $offset);
            } elseif (!empty($limit)) {
                $this->db->limit($limit);
            }            
            //order
            if (!empty($order)) {
                $this->db->order_by('created_at', $order);
            }
            //$this->db->limit($limit, $offset);
            $query = $this->db->get();
            if ($rows == true) {
                $rs = $query->num_rows();
            } else {
               $rs = $query->result_array();
               $rs = $this->listPostAddComment($rs, $status);
            }            
            // -------- end
            
            $this->cache->file->save($keyCache, $rs, 600);
        }
        return $rs;
    }
    
    /**
     * helper private for nummber of comment by post
     */
    private function listPostAddComment($dataPost, $status = '')
    {   
        $CI =& get_instance();
        $CI->load->model('Comment_model');     
        
        $rs = $dataPost;
        if (is_array($rs) && count($rs) > 0) {
            foreach ($rs as $key => $array) {
                $idPost = $array['id'];
                $comment_count = $CI->Comment_model->listComment($idPost, $status,'','','',true);
                $rs[$key]['comment_count'] = (int) $comment_count;
            }
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
        if (is_array($data) && count($data) > 0) {
            $this->db->insert($this->_name, $data);
        }        
    }    
    
    /**
     * 
     * @param Integer $id
     * @return Array data Element.
     */
    public function get($id, $post_type = Post_model::TIPO_POST, $status='')
    {
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $id.'_'.$post_type.'_'.$status;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('id', $id);
            $this->db->where('post_type', $post_type);
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
    
    public function del($id, $post_type)
    {   
        $flag = false;
        if (!empty($id)) {
            $this->db->where('id', $id);
            if (!empty($post_type)) {
                $this->db->where('post_type', $post_type);
            }            
            $this->db->delete( $this->_name);
            $flag = true;
        }
        return $flag;
    }
    
    public function update($id, $post_type, $data = array())
    {   
        $flag = false;
        if (!empty($id)) {
            $this->db->where('id', $id);
            if (!empty($post_type)) {
                $this->db->where('post_type', $post_type);
            }
            if(is_array($data) && count($data) > 0 ) {
                $dataUpdate = $data;//array('nombre' => $this->input->post('nombre'));
                $this->db->update( $this->_name, $dataUpdate);
                $flag = true;
            }            
        }
        return $flag;
    }    
    
    /**
     * 
     * @param Integer $id
     * @param String $post_type
     */
    public function getPage($id, $post_type = Post_model::TIPO_PAGE) {
        
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. $id.$post_type;
        
        if (($rs = $this->cache->file->get($keyCache)) == false) {
            $this->db->select()->from($this->_name);
            $this->db->where('id', $id);
            $this->db->where('post_type', $post_type);
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
