<?php

/**
 * Description of Team.
 *
 * @author anb
 */
class Our_team_model  extends CI_Model {
    
    protected $_name = 'ac_our_teams';
    
    public function __construct() {
        parent::__construct();
    }    

    /***
     * list of teams
     */
    public function listTeam($order = 'desc', $limit = 7)
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
    
}
