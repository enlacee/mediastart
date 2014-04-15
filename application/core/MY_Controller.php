<?php
/**
 * @author Anibal Copitan <acopitan@gmail.com>
 * @category Libreria
 * 
 * Encapsulamiento de funciones que se cargan al iniciar el controlador
 * base CI_Controller ejm : auth, cron, check, etc..
 */

class MY_Controller extends CI_Controller {    

    public $dataView = array();       
    private $flagGrid = false;

    public function __construct()
    {
        parent::__construct();
        $this->dependencias();
        $this->loadVariableImage();
    }   
    
    private function dependencias()
    {  
        $this->load->library(array('image_lib', 'layout', 'auth', 'ZendImage'));        
        $this->load->helper(array(
            'my_ayuda_helper',
            'my_thumbnail_helper',
            'my_date_helper',
            'my_string_helper',
            'my_application_helper',
            'url',
            'form'));
        $this->load->driver('cache');
    }    
    
    /**
     * Carga la libreria jqgrid util para la VISTA     
     *  $data['css'] = array ('file.css');
     *  $data['js'] = array ('file.js');
     */
    protected function loadJqgrid()
    {   
        if ($this->flagGrid == false) {           
            $this->dataView['css'][] = "jqgrid/css/cupertino/jquery-ui-1.10.4.custom.min.css";
            $this->dataView['css'][] = "jqgrid/css/ui.jqgrid.css";                  
            $this->dataView['js'][] = "jqgrid/i18n/grid.locale-es.js";
            $this->dataView['js'][] = "jqgrid/jquery.jqGrid.min.js";
            $this->dataView['js'][] = "jqgrid/fixGridSize.js";
            $this->flagGrid = true;
        }        
        $this->load->vars($this->dataView);
        return $this->dataView;       
    }
    
    protected function loadStatic(array $data = array()) {
      
        foreach ($data as $key => $value) {
            if ($key === 'css') {
                if (is_string($data[$key])) {
                    $this->dataView['css'][] = $value;
                } elseif (count($data[$key] > 0)) {
                    foreach ($data['css'] as $llave => $valor) {
                        $this->dataView['css'][] = $valor;
                    }                        
                }
            } elseif ($key === 'js') {
                if (is_string($data[$key])) {
                    $this->dataView['js'][] = $value;
                } elseif (count($data[$key] > 0)) {
                    foreach ($data['js'] as $llave => $valor) {
                        $this->dataView['js'][] = $valor;
                    }                        
                }                
            } elseif ($key === 'jstring') {
                if (is_string($data[$key])) {
                    $this->dataView['jstring'][] = $value;
                }
            }   
        }          
        //$this->load->get_var($key)
        $this->load->vars($this->dataView);
        return $this->dataView;
    }
    
    /**
     * list of variables for consummer and response
     * process (create thumbnail)
     */
    public function loadVariableImage()
    {   
        // banner
        $data['bannerPath'] = FCPATH . 'public/images/banner/';
        $data['bannerUrl'] = getPublicUrl() .'/images/banner/';
        
        // latestNewsUrl
        $data['latestNewsPath'] = FCPATH . 'public/images/latest-news/';
        $data['latestNewsUrl'] = getPublicUrl() .'/images/latest-news/';

        // ourTeam
        $data['ourTeamPath'] = FCPATH . 'public/images/ourTeam/';
        $data['ourTeamUrl'] = getPublicUrl() .'/images/ourTeam/';  
        
        // work
        $data['workPath'] = FCPATH . 'public/images/porfolio/';
        $data['workUrl'] = getPublicUrl() .'/images/porfolio/';       
                    
        $this->load->vars($data);
        
        
        //load category temporalmente
        $category['category'][] = array('id' => 1, 'name' => 'Showreel');
        $category['category'][] = array('id' => 2, 'name' => 'Action - Sport');
        $category['category'][] = array('id' => 3, 'name' => 'Cars');
        $category['category'][] = array('id' => 4, 'name' => 'Comedy');
        $category['category'][] = array('id' => 5, 'name' => 'Corporate');
        $category['category'][] = array('id' => 6, 'name' => 'Fashion');
        $category['category'][] = array('id' => 7, 'name' => 'Storytelling');
        $category['category'][] = array('id' => 8, 'name' => 'Trailers');
        $category['category'][] = array('id' => 9, 'name' => 'Music Videos');

        $this->load->vars($category);
    }
    
   
    
    
}
