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
		$url = '';
		if(/*$id_lang == 'es'*/true) {
			$url = '/en/';
		}	

		return base_url($url . $uri);;
	}
}
