<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
// lista - menu
if(!function_exists('app_getOurTeam'))
{
    /**
     * List of contact (team)
     * @return Array
     */
    function app_getOurTeam()
    {
        $CI =& get_instance();
        $CI->load->model('Our_team_model');
        $ourTeam = $CI->Our_team_model->listTeam();
        
        return $ourTeam;
    }
}