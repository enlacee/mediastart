<?php

class Social extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function category($id, $page=1)
    {
        $this->load->model('Social_model');
        $category = $this->load->get_var('categorySocial');
        $flagSearch = false;
        $category_name = '';
        $data['columRight'] = false;

        // ----- init pagination
        $limit = 9;
        $count = $this->Social_model->listPartner($id, Social_model::STATUS_TRUE, '', '', '', true);

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

        if(is_array($category)) {
            foreach ($category as $array) {
                if ($id == $array['id']) {
                    $category_name = $array['name'];
                    $flagSearch = true;
                }
            }

            // list by category
            if ($flagSearch) {
                $data['category_name'] = $category_name;
                $data['category_id'] = $id;
                $data['portfolio'] = $this->Social_model->listPartner($id, Social_model::STATUS_TRUE, $order = 'desc', $limit = 18, $offset = '', $rows = false);
            }
        }

        $data['title'] = isset($data['category_name']) ? $data['category_name'] : NULL;
        $this->layout->setLayout('layout/layout_body');
        $this->layout->view('social/category', $data);
    }

    public function category_error($id)
    {
        $this->load->model('Social_model');
        $category = $this->load->get_var('categorySocial');
        $flagSearch = false;
        $category_name = '';
        $data = array();
        //$data['columRight'] = false;
        if(is_array($category)) {
            foreach ($category as $array) {
                if ($id == $array['id']) {
                    $category_name = $array['name'];
                    $flagSearch = true;
                }
            }


            //
      	$limit = 5;
        $count = $this->Social_model->listPartner($id, '', '', '', '', true);

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
            //

            // list by category
            if ($flagSearch) {
                $data['category_name'] = $category_name;
                $data['category_id'] = $id;

                //$data['partners'] = $this->Partner_model->listCategory($id, 18);
                $data['portfolio'] = $this->Social_model->listPartner($id, $status='1', $order = 'desc', $limit = 18, $offset = '', $rows = false);

            }
        }

        $data['title'] = isset($category_name) ? $category_name : NULL;

        $this->layout->view('social/category', $data);
    }

}
