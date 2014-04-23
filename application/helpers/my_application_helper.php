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
        $ourTeam = $CI->Our_team_model->listTeam();
        
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
        $works = $CI->Work_model->listWork();
        
        return $works;
    }
}

if(!function_exists('app_getOnePortfolioByCategory')) {
    /**
     * List portfolio by category
     * @return Array
     */
    function app_getOnePortfolioByCategory() 
    {   
        $CI =& get_instance();
        $CI->load->model('Portfolio_model');
        $CI->load->model('Category_model');
        // category
        $dataCategory = $CI->Category_model->listCategory(Category_model::ID_CATEGORY_PORTFOLIO);
        $listPortfolio = array();
        $limitt = 4;
        if (is_array($dataCategory) && count($dataCategory) > 0) {
            foreach ($dataCategory as $array) {
                $response = $CI->Portfolio_model->listPortfolioByCategory(
                        $array['id'],
                        $order = 'desc',
                        $limit = 1);  
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
    function app_getPortfolioTopView()
    {   
        $CI =& get_instance();
        $CI->load->model('Portfolio_model');
        $limit = 4 ;
        $response = $CI->Portfolio_model->topView($limit);   
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
        $response = $CI->Post_model->listPost('page', 'desc', $limit);
        return $response;
    }
}