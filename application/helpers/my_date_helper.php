<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('date_standar'))
{
    function date_standar($dateTime)
    {   
        if (!empty($dateTime)) {          
            $date = new DateTime($dateTime);
            return $date->format('d M Y');
        }
        return false;
    }
}