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

        var_dump($this->uri->segment(1));// exit;
    }   
    
    private function dependencias()
    {  
        $this->load->library(array('layout', 'auth', 'ZendImage'));        
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
        
        // work ourTeam
        $data['workPath'] = FCPATH . 'public/images/ourTeam/';
        $data['workUrl'] = getPublicUrl() .'/images/ourTeam/';  
        
        // portfolio
        $data['portfolioPath'] = FCPATH . 'public/images/porfolio/';
        $data['portfolioUrl'] = getPublicUrl() .'/images/porfolio/';          
             
        //partners
        $data['partnerPath'] = FCPATH . 'public/images/partners/';
        $data['partnerUrl'] = getPublicUrl() .'/images/partners/';          
        
        $this->load->vars($data);
        

        
        
                
        //load category 
        $this->load->model('Category_model');
        $category['category'] = $this->Category_model->listCategory();        
        $this->load->vars($category);
        
        //load pages (about us)
        $this->load->model('Post_model');
        $pagesAboutUs = array();
        $pagesAboutUs['pagesAboutUs'] = $this->Post_model->listPost(
                $post_type = 'page-about',
                $order = 'desc',
                $limit = 2);
        $this->load->vars($pagesAboutUs);
        
        //load category partners (temp)
        $categoryPartner['categoryPartner'][] = array('id' => 1, 'name' => 'Agencies');
        $categoryPartner['categoryPartner'][] = array('id' => 2, 'name' => 'Producers');
        $categoryPartner['categoryPartner'][] = array('id' => 3, 'name' => 'Directors');
        $categoryPartner['categoryPartner'][] = array('id' => 4, 'name' => 'Directors of Photography');        
        $categoryPartner['categoryPartner'][] = array('id' => 5, 'name' => 'Filmakers');
        $categoryPartner['categoryPartner'][] = array('id' => 6, 'name' => 'Postproduction');
        $categoryPartner['categoryPartner'][] = array('id' => 7, 'name' => 'Photographer');
        $categoryPartner['categoryPartner'][] = array('id' => 8, 'name' => 'Other');
        $this->load->vars($categoryPartner);
    }

    /**
     * Load language disponible in website
     * @return Void()
     */
    public function loadLanguage()
    {        
        $language['language'][] = array('id' => 0, 'name' => 'ENGLISH', 'short_name' => 'en');
        $language['language'][] = array('id' => 1, 'name' => 'ESPAÑOL', 'short_name' => 'es');
        $language['language'][] = array('id' => 2, 'name' => 'FRANÇAIS', 'short_name' => 'fr');
        $language['language'][] = array('id' => 3, 'name' => 'DEUTSCH', 'short_name' => 'de');
        $language['language'][] = array('id' => 4, 'name' => 'ITALIANO', 'short_name' => 'it');
        $language['language'][] = array('id' => 5, 'name' => 'PORTUGUÊS', 'short_name' => 'po');
        $language['language'][] = array('id' => 6, 'name' => 'РУССКИЙ', 'short_name' => 'rs'); // ruso
        $language['language'][] = array('id' => 7, 'name' => '简体中文', 'short_name' => 'ch'); // chino
        $language['language'][] = array('id' => 8, 'name' => 'العربية', 'short_name' => 'ar'); // arabe
        $language['language'][] = array('id' => 9, 'name' => '日本語', 'short_name' => 'jp'); // japones

        $this->load->vars($language); //$language = $this->load->get_var('language');
    }
}
