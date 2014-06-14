<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('getMediaUrl'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function getMediaUrl()
    {
        return MEDIA_URL;
 
    }
}

if(!function_exists('getPublicUrl'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function getPublicUrl()
    {        
        return base_url(PUBLIC_URL);
    }
}


// lista - menu
/*if(!function_exists('get_users'))
{
    function get_users()
    {
        //asignamos a $ci el super objeto de codeigniter
        //$ci será como $this
        $ci =& get_instance();
        $query = $ci->db->get('usuarios');
        return $query->result();
 
    }
}*/

/**
 * Ayuda a seleccionar menu (MODO DINAMICO)
 * @param String $indice inicador de pagina seleccionada
 * @return Strign active
 */
function selectActive($indice) {
    // $this->router->fetch_class();
    $CI =& get_instance();
    $page = $CI->uri->segment(1);
    $subPage = $CI->uri->segment(2);
    $activeClass = '';

    if (($page == FALSE && $subPage == FALSE && $indice == 'index' ) || $indice == $page) { // index
        $activeClass = 'active';

    } else if ($page == 'page') {

        if ($indice == $subPage) { // about
            $activeClass = 'active';

        } elseif ($indice == $subPage) { // contact
            $activeClass = 'active';
        }

    } else if ( $indice == $page) { // portfolio
        $activeClass = 'active';
    }

    return $activeClass; 
}