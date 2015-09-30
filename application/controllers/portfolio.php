<?php

class Portfolio extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model');
    }

    /**
     *  List by category
     * @param type $id
     */
    public function category($id, $page=1)
    {
        $category = $this->load->get_var('category');
        $flagSearch = false;
        $category_name = '';
        $data['columRight'] = false;

        // ----- init pagination
        $limit = 6;
        $count = $this->Portfolio_model->listPorfolio('',$id, Portfolio_model::STATUS_TRUE, '', '', '', true);

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
                $data['portfolio'] = $this->Portfolio_model->listPorfolio('',$id, Portfolio_model::STATUS_TRUE, 'desc', $limit, $start,false);
            }
        }

        $stringJs = <<<EOT
        //Muestra video
        $(".porfolioCtnVideoShow img").click(function(){
            var img = $(this);
            var contenHtml = '';
            var flag = img.attr('data-flag');

            if (flag == 'image') {
                agregarItemsSlider(JSON.parse(img.attr('data-json')));
                $('#carousel-example-generic').show();
                $('#carousel-example-generic').insertBefore('#porfolioCtnVideoIframeShow');
                $('#porfolioCtnVideoIframeShow').css({"margin": "0px","padding": "0px"});

            } else if (flag == 'video') {
                $('#carousel-example-generic').hide();
                $('#porfolioCtnVideoIframeShow').attr('style','');
                var attData = img.attr('data');
                var elArray = attData.split('/');
                var idVideo = elArray[(elArray.length-1)];

                var contenHtml = '<iframe ';
                contenHtml = contenHtml + 'src="//player.vimeo.com/video/'+ idVideo +'" ';
                contenHtml += 'width="500" height="281" frameborder="0" ';
                contenHtml += 'webkitallowfullscreen mozallowfullscreen allowfullscreen> ';
                contenHtml += '</iframe> ';
            }
            $("#porfolioCtnVideoIframeShow").html(contenHtml);
            $('#videoPorfolio').modal({backdrop: true,show: true});
        });

        function agregarItemsSlider(object) {
            var _carosel = $('#carousel-indicators');
            _carosel.html('');
            var li = '';
            for (var i = 0; i<object.length; i++) {
                var active = (i==0) ? 'active' : '';
                li += '<li data-target="#carousel-example-generic" data-slide-to="'+i+'" class="'+active+'"></li>';
            }
            _carosel.html(li);

            var _carousel_inner = $('#carousel-inner');
            _carousel_inner.html('');
            var div = '';
            for (var i = 0; i<object.length; i++) {
                var active = (i==0) ? 'active' : '';
                div += ''
                +'<div class="item '+active+'">'
                +'    <img src="'+object[i].href+'" >'
                +'    <div class="carousel-caption">'
                +'    '
                +'    </div>'
                +'</div>';
            }
            _carousel_inner.html(div);
        }
EOT;

        $data['title'] = isset($data['category_name']) ? $data['category_name'] : NULL;
        $this->loadStatic(array("jstring" => $stringJs));
        $this->layout->setLayout('layout/layout_body');
        $this->layout->view('portfolio/category', $data);
    }

    public function video($id='')
    {
        if (!empty($id)) {
            $data['portfolio'] = $this->Portfolio_model->get($id, '',  Portfolio_model::STATUS_TRUE);
            $data['portfolio']['url_image'] = $data['portfolio']['url_image'];

            $data['title'] = isset($data['portfolio']['title']) ? $data['portfolio']['title'] : NULL;
            $data['columRight'] = 'relatedVideo';
            $data['relatedVideo'] = array();
            //category_id
            $category_id = $data['portfolio']['category_id'];
            if ( isset($category_id) && $category_id > 0) {
                $data['relatedVideo'] = $this->Portfolio_model->listPorfolio('',$category_id, Portfolio_model::STATUS_TRUE, $order = 'desc', $limit = 7,$offset = '', $rows = FALSE);

                $dataDelete = $this->deleteRelatedVideo($data['relatedVideo'], $data['portfolio']['id']);
                $data['relatedVideo'] = $dataDelete;
            }

            $this->Portfolio_model->countView($id);
            $this->cleanCache();
            //$this->layout->setLayout('layout/layout_body');
            $this->layout->setLayout('layout/layout_contact');
            $this->layout->view('portfolio/video', $data);
        }
    }

    private function deleteRelatedVideo($array , $id)
    {
        if (is_array($array) && count($array) > 0 && $id > 0) {
            foreach ($array as $key => $value) {
                if ($array[$key]['id'] == $id) {
                    unset($array[$key]);
                    break;
                }
            }
            $array = array_values($array);
            //var_dump($array);exit;
        }
        return $array;
    }

}
