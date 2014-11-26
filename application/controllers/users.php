<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	 * Controller  : Home, Landing Page
	 * Created on  : 21-Nov-2011
	 * Created By  : Vijayaragavan S
	 * Modified On :
	 * Modified By :	  
	 * Project     : Hiiku
	 */

class Users extends CI_Controller {
	
	function __construct()
    {
        parent::__construct();        			
        // load the necessary libraries
        $this->load->library('form_validation');
        $this->load->library('core/be_users');
        $this->load->helper(array('form', 'url', 'cookie'));
        error_reporting(0);
    }
	/*
	 * Function: Index 
	 * Purpose : Loading the landing page
	 */	
	public function index()
	{
		$userdata = (object)$this->session->userdata('user');
		if( !empty( $userdata->user_id ) ){
			redirect('/home/index');
		}else{
			redirect('/users/login');
		}
			
	}
	
	public function Login()
	{
		$userdata = (object)$this->session->userdata('user');
		if( !empty( $userdata->user_id ) ){
			redirect('/home/index');
		}

		$purpose = $this->security->xss_clean( $this->input->post("purpose") );
		if( $purpose != '' && $purpose == 'login'  ){
			$response = $this->be_users->UserLogin( $this->security->xss_clean( $this->input->post("email") ), $this->security->xss_clean( $this->input->post("password") ) );
				if( ( $response != 'invalid' ) && $response->f_user_id > 0  ){
					$this->setsession( $response );	// SET session
					redirect('/home/index');
				}else{
					echo json_encode("User Credentials Doesn't Match ");
					die;
				}
		}else{
			$this->mysmarty->display('login.html' );
		}		
	}	

	function logout()
	{
		   $this->session->unset_userdata('user'); 
		   redirect("users/login/"); 		
	}

	public function setsession( $user_info ){
		$session_data = array(
				'user_id'	=>$user_info->f_user_id,
				'user_first_name'	=> $user_info->f_user_first_name,
				'user_last_name'	=> $user_info->f_user_last_name,
				'company_name'	=> $user_info->f_user_email,
				'user_type'	=> 'admin',
			);
		$this->session->unset_userdata('user');    
	   	 $this->session->set_userdata( array('user'=>$session_data));
	           				           		
			// clear user lang cookie
			$cookie = array(
				'name'   => 'ss_auth_lang',
				'value'  => '',
				'expire' => '0',
				'prefix' => '',
				'path'   => '/'
			);
			delete_cookie($cookie);
			// set user lang cookie
			$cookie = array(
				'name'   => 'ss_auth_lang',
				'value'  => $user_info->f_user_id,
				'expire' => time()+60*60*24*30,
				'path'   => '/',
				'prefix' => '',
			);

			$this->input->set_cookie($cookie);
		return true;		
	}

}

/* End of file home.php */
?>