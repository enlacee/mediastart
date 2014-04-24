<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('createThumbnail'))
{
/**
 *
 * @param $pathImagen: ruta de la imagen en el servidor /home/imagen/file.jpg
 * @param $ancho: ancho para la imagen a generar
 * @param $alto: alto de la imagen a generar
 * @return void
 */
    function create_thumbnail($pathImagen, $width, $height)
    {   
        // filtro 01 
        $fileName = $pathImagen;
        $flag = false;
        if(strlen($fileName) >= 3) {
            for ($i = 3; $i <= 5; $i++) { 
                $extension =  substr($fileName, (strlen($fileName)-$i));
                if(strpos($extension, '.') !== false) {
                    $flag = true;
                    break;
                }
            }            
        }
        
        // filtro 02
        $flag = (is_file($pathImagen)) ? true : false;
        
        // filtro 03
        if (!empty($flag)) {
            // cargar libreria de imagen    
            $CI =& get_instance();
            $CI->load->library('image_lib'); 

            $partPathImagen = preg_split('/\//', $pathImagen);
            $imagenName = $partPathImagen[(count($partPathImagen)-1)];// file.jpg
            $imagenPath = str_replace($imagenName, '', $pathImagen); // /home/imagen/

            $estension = substr($imagenName, (strlen($imagenName)-3)); // jpg, png, gif
            $file = substr($imagenName, 0,(strlen($imagenName)-4)); // file

            $config['image_library'] = 'GD2';   // libreria a utilizar
            $config['source_image'] = $pathImagen;
            $config['width'] = $width;
            $config['height'] = $height;
            //$config['create_thumb'] = TRUE;
            $config['quality'] = '100%';
            $imageNameResult = $file .'-'.$width.'x'.$height.'.'.$estension;
            $config['new_image'] = $imagenPath . $imageNameResult; // foto-2-113x150.jpg 
            $CI->image_lib->initialize($config);  // asignar parametros de configuracion a la libreria
            $CI->image_lib->resize();    

            echo $CI->image_lib->display_errors();
        } else {
            $imageNameResult = "image.jpg";
        }
        
        return $imageNameResult;
    }
}
