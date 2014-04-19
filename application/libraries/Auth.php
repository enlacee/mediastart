<?php
/**
 * 
 */
class Auth 
{
    public $CI;
    
    public function Auth()
    { 
        $this->CI =& get_instance();
    }  
    
    /**
     * Token util for CSRF u others.
     * @return String HASH
     */
    public function token()	
    { 
        $token = md5(uniqid(rand(), true));
        $this->CI->session->set_userdata('token', $token);
        return $token;
    }
}  
/* End of file /application/libraries/Auth.php */