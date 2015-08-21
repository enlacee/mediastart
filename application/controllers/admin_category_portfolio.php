<?php

$file = FCPATH . "application/core/MY_ControllerAdmin.php"; (is_file($file)) ? include($file) : die("error: {$file}");

class Admin_category_portfolio extends MY_ControllerAdmin {

    const PAGE_TITLE = 'Category Portfolio';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Category_portfolio_model');
    }

 /*
    * List all post
    */
    public function index ($page = 1)
    {
      	$limit = MY_ControllerAdmin::LIMIT;
        $count = $this->Category_portfolio_model->listItems('', '', '', '', true);     
        
        if ($count > 0) {
            $total_pages = ceil($count/$limit);
        } else {
           $total_pages = 1; 
        }
        if ($page > $total_pages) { $page = $total_pages; }// $page = 0
        if ($page < 1) { $page = 1; }
        
        $start = $limit * $page - $limit;
        
        $data['pag']['limit'] = $limit;
        $data['pag']['page'] = $page;
        $data['pag']['last_page'] = $total_pages;
        $data['pag']['start'] = $start;
        // ----- end pagination
      
        $data['page_title'] = self::PAGE_TITLE;        
        $data['data'] = $this->Category_portfolio_model->listItems('', $order = 'desc', $limit, $start, false);        
        $this->layout->view('admin/category_portfolio/index', $data); 
    }
    
    /**
     * 
     * @param String $estatus
     */
    public function add($estatus = '')
    {    
        if( $this->input->post() && $estatus == 'true') {

            $dataPost['name'] = $this->input->post('title');
            $dataPost['status'] = Category_portfolio_model::STATUS_TRUE;
            $dataPost['created_at'] = date('Y-m-d H:i:s');
            $dataPost['id_parent'] = Category_portfolio_model::CATEGORY_PARENT;
            $this->Category_portfolio_model->add($dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "Added  correctly ".self::PAGE_TITLE);  
            redirect('admin_category_portfolio/index');
        } 
        
        $stringJs = <<<EOT
        $(function () {                
            // 02 - validate                
            $('#form').validate({
                      
                //Detecta cuando se realiza el submit o se presiona el boton
                submitHandler: function(form){
                    form.submit();
                },

                //Detecta los error y abre los span con los posibles errores
                errorPlacement: function(error, element){
                error.insertAfter(element);
                }
            });
                
                
        });

EOT;
        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;            
        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));              
        $this->loadStatic(array("jstring" => $stringJs));
        
        $this->layout->view('admin/category_portfolio/add', $data);
    }
    
    /**
     * Double function
     * @param type $id
     * @param type $estatus
     */
    public function edit($id = '', $estatus = '')
    {
        if( $this->input->post() && !empty($id) && $estatus == 'true') {
            $dataPost ['name'] = $this->input->post('title');
            $dataPost ['status'] = $this->input->post('status');
            $dataPost ['updated_at'] = date('Y-m-d H:i:s');
            $this->Category_portfolio_model->update($id, $dataPost);            
            $this->cleanCache();
            $this->session->set_flashdata('flashMessage', "updated correctly ".self::PAGE_TITLE.". Id (<b>$id</b>)");  
            redirect('admin_category_portfolio/index');
        }
        
        $stringJs = <<<EOT
        $(function () {                
            // 02 - validate                
            $('#form').validate({
                      
                //Detecta cuando se realiza el submit o se presiona el boton
                submitHandler: function(form){
                    form.submit();
                },

                //Detecta los error y abre los span con los posibles errores
                errorPlacement: function(error, element){
                error.insertAfter(element);
                }
            });
                
        });
EOT;
        
        $data['data'] = '';
        $data['page_title'] = self::PAGE_TITLE;
        if (!empty($id)) {
            $data['data'] = $this->Category_portfolio_model->get($id);
        }
        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));        
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->view('admin/category_portfolio/edit', $data);
    }
    
    /**
     * Delete records Only when no records reference to that Category.
     * @param type $id (id_categoria)
     * @param type $estatus
     */
    public function del($id = '', $estatus = '')
    {
        $data['page_title'] = self::PAGE_TITLE;
        $data['id'] = $id;
        if( !empty($id) && $estatus == 'true') {
            $this->cleanCache();
            $requestCount = (int) $this->Category_portfolio_model->getChildren($id);
            if ($requestCount > 0) {
                $this->session->set_flashdata('flashMessage', "You can not be deleted CATEGORY Id(<b>$id</b>) because there are records reference.".self::PAGE_TITLE);  
                redirect('admin_category_portfolio/index');
                exit;
            }
            
            $this->Category_portfolio_model->del($id);
            $this->session->set_flashdata('flashMessage', "Eliminated ".self::PAGE_TITLE.". Id (<b>$id</b>)");  
            redirect('admin_category_portfolio/index');
        }
        $this->layout->view('admin/category_portfolio/del', $data);        
    }     
    
}
