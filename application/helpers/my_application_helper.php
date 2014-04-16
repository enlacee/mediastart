<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('app_getOurTeam')) {
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


if(!function_exists('app_getWork')) {
    /**
     * List of LATEST WORKS
     * @return Array
     */
    function app_getWork()
    {
        $CI =& get_instance();
        $CI->load->model('Work_model');
        $works = $CI->Work_model->listWork();
        
        return $works;
    }
}
