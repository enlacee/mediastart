<?php

class Page extends MY_Controller {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function contact()
    {
        $this->load->model('Our_team_model');
        
        $data = array (
            'title' => 'Contact',
            'columRight' => 'latestWorks',
            'ourTeam' => $this->Our_team_model->listTeam(Our_team_model::STATUS_TRUE, 'desc'));
        
        $this->layout->view('page/contact', $data);
    }
    
    /*
     * list only post by category(post)
     */
    public function index($id = '')
    {
        $this->load->model('Banner_model');
        $this->load->model('Post_model');
        $this->load->helper('form');     
        
        $this->load->library('form_validation');
        $this->load->model('Post_model');
        $this->load->model('Comment_model');
        
        // validacion form
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|matches[captcha_word]');
        
        if ($this->input->post()) {
            // validation csrf
            if ($this->input->post('token') == $this->session->userdata('token')) {
                if ($this->form_validation->run() == FALSE) {
                    
                } else {
                    // insert new comment
                    $dataComment ['id_post'] = $this->input->post('id_post');
                    $dataComment ['name'] = $this->input->post('name');
                    $dataComment ['email'] = $this->input->post('email');
                    $dataComment ['comment'] = $this->input->post('comment');
                    $dataComment ['created_at'] = date('Y-m-d H:i:s');
                    $dataComment ['status'] = Comment_model::STATUS_FALSE;                   
                    $this->Comment_model->add($dataComment);
                    $this->session->set_flashdata('flashMessage', "Your comment must be approved before being published.");   
                    redirect('/page/index/'.$dataComment ['id_post']);
                    
                }
            }
            
        }       
        
        // captcha
        $cap_word = random_string('alnum', 4);
        $configCaptcha = array(
            'word' => strtoupper($cap_word),
            'img_path' => FCPATH . 'public/images/captcha/',
            'img_url' => getPublicUrl() .'/images/captcha/',
            'img_width' => '120');
        $cap = create_captcha($configCaptcha);
        
        $data['columRight'] = false;
        $data['latestNews'] = $this->Post_model->get($id, 'post', Post_model::STATUS_TRUE);
        $data['latestNewsComment'] = $this->Comment_model->getCommentByPost($id, Comment_model::STATUS_TRUE);
        $data['title'] = isset($data['latestNews']['title']) ? $data['latestNews']['title'] : NULL;
        $data['token'] = $this->auth->token();
        $data['captcha_time'] = $cap['time'];
        $data['captcha_word'] = $cap['word'];
        $data['captcha_image'] = $cap['image'];        
        
        $stringJs = <<<EOT
        ;$(function () {
            // 01 validate                
            $('#comment').validate({
                rules: {
                    name: {required : true, minlength: 3, maxlength: 100},
                    email: {required: true, email: true},
                    comment : {required: true, minlength: 3}
                  },
                      
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
        $this->loadStatic(array('js' => '/js/validate/jquery.validate.js'));
        $this->loadStatic(array('js' => '/js/validate/jquery.metadata.js'));        
        $this->loadStatic(array("jstring" => $stringJs));              
        $this->layout->view('page/index', $data);
    }
    
    /**
     * LIST Only by category (page-about)
     * @param type $id
     */
    public function about($id)
    {
        $response = $this->Post_model->get($id, $post_type = 'page-about', Post_model::STATUS_TRUE);        
        $id_lang = $this->session->userdata('id_lang');  
        
        //  seting (language with  field db)
        if(!empty($id_lang) && $id_lang != false ) {
            $id = '';
            $language = $this->load->get_var('language');            
            
            for ($i = 0; $i < count($language); $i++) {
                if ($id_lang == $language[$i]['short_name'] && $id_lang != 'en') {
                   $id =  '_'. $language[$i]['id'];
                }
            }            
                        
            $response['title'] =  $response["title$id"];
            $response['content'] =  $response["content$id"];
        }

        $data['page']= $response;
        $data['title'] = isset($data['page']['title']) ? $data['page']['title'] : NULL;        
        $this->layout->setLayout('layout/layout_contact');
        $this->layout->view('page/about', $data);  
    }
    
    /**
     * List only post by category (page)
     * @param type $id
     */
    public function admin($id = '')
    {   
        $this->load->model('Post_model');
        
        $data['columRight'] = false;
        $data['latestNews'] = $this->Post_model->get($id, 'page', Post_model::STATUS_TRUE);
        $data['title'] = isset($data['latestNews']['title']) ? $data['latestNews']['title'] : '';     
        
        $this->layout->view('page/admin', $data);
    }    
    
}