<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Base URL Lang
 * 
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('base_url_lang'))
{
	function base_url_lang($uri = '')
	{
            $CI =& get_instance();               
            $id_lang = $CI->session->userdata('id_lang'); 
            $url = '';
            if(!empty($id_lang)) {
                $url .= "/$id_lang/";
            }
            $stringUrl = $url . $uri;
            return base_url($stringUrl);
	}
}
