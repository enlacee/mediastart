<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('truncate_string'))
{
    function truncate_string($cadena, $limite, $corte=" ", $pad="...")
    {   
        if(strlen($cadena) <= $limite)
            return $cadena;
        if(false !== ($breakpoint = strpos($cadena, $corte, $limite))) {
            if($breakpoint < strlen($cadena) - 1) {
                $cadena = substr($cadena, 0, $breakpoint) . $pad;
            }
        }
        return $cadena;
        
    }
}
