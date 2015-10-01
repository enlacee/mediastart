<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('app_getOurTeam')) {
    /**
     * List of contact (team)
     * @return Array
     */
    function app_getOurTeam()
    {
        $CI =& get_instance();
        $CI->load->model('Our_team_model');
        $ourTeam = $CI->Our_team_model->listTeam(Our_team_model::STATUS_TRUE, 'asc');

        return $ourTeam;
    }
}


if(!function_exists('app_getWork')) {
    /**
     * List of LATEST WORKS
     * @return Array
     */
    function app_getWork()
    {
        $CI =& get_instance();
        $CI->load->model('Work_model');
        $works = $CI->Work_model->listWork(Work_model::STATUS_TRUE);

        return $works;
    }
}

if(!function_exists('app_getOnePortfolioByCategory')) {
    /**
     * List portfolio by category
     * @return Array
     */
    function app_getOnePortfolioByCategory($limitt='')
    {
        $CI =& get_instance();
        $CI->load->model('Portfolio_model');
        $CI->load->model('Category_model');
        // category
        $dataCategory = $CI->Category_model->listCategory(Category_model::ID_CATEGORY_PORTFOLIO);
        $listPortfolio = array();
        $limitt = (empty($limitt)) ? 5 : $limitt;
        if (is_array($dataCategory) && count($dataCategory) > 0) {
            foreach ($dataCategory as $array) {
                $response = $CI->Portfolio_model->listPorfolio($array['id'], Portfolio_model::STATUS_TRUE, 'desc', 1);
                if (isset($response[0])) {
                    $listPortfolio[] = $response[0];
                    if ($limitt == count($listPortfolio)) { break; }
                }
            }
        }

        return $listPortfolio;
    }
}

if(!function_exists('app_getPortfolioTopView')) {
    /**
     * List portfolio by category
     * @return Array
     */
    function app_getPortfolioTopView($limitt='')
    {
        $CI =& get_instance();
        $CI->load->model('Portfolio_model');
        $limitt = (empty($limitt)) ? 5 : $limitt;
        $response = $CI->Portfolio_model->topView($limitt);
        return $response;
    }
}


if(!function_exists('app_getPageFooter')) {
    /**
     * List post by category page
     * @return Array
     */
    function app_getPageFooter()
    {
        $CI =& get_instance();
        $CI->load->model('Post_model');
        $limit = 2 ;
        $response = $CI->Post_model->listPost('page', Post_model::STATUS_TRUE,'desc', $limit);
        return $response;
    }
}

if(!function_exists('app_getPageFooterLogin')) {
    function app_getPageFooterLogin()
    {
        $CI =& get_instance();
        $keyCache = __CLASS__ . __FUNCTION__ .'_'. 'Pagelogin';
        if (($rs = $CI->cache->file->get($keyCache)) == false) {
            $CI->db->select()->from('ac_posts');
            $CI->db->where(array(
                'post_type' => 'page',
                'post_type_extra' => 'page-login',
                'status' => Post_model::STATUS_TRUE
            ));
            $CI->db->limit(1);

            $query = $CI->db->get();
            $rs = $query->result('array');
            $CI->cache->file->save($keyCache, $rs, 1200);
        }

        return (is_array($rs) && count($rs)>0) ? $rs[0] : $rs;
    }
}
