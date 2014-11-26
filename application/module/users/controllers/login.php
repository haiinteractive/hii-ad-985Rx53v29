<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * The controller for the Login module.
 *
 * @author		Randolf
 * @package		ICTNed CMS
 */
class Login extends Admin_Controller {

	private $_data = array();
	
	public function __construct()
	{
		parent::__construct();
	}

	public function forgot_password()
	{
		$this->form_validation->set_rules('email', 'lang:login_email_address', 'required|valid email');
		if ($this->form_validation->run() == false)
		{
			//setup the input
			$this->_data['email'] = array('name' => 'email',
				'id' => 'email',
			);
			//set any errors and display the form
			$this->_data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$this->load->view('auth/forgot_password', $this->_data);
		} else
		{
			//run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($this->input->post('email'));

			if ($forgotten)
			{ //if there were no errors
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect("auth/login", 'refresh'); //we should display a confirmation page here instead of the login page
			} else
			{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect("auth/forgot_password", 'refresh');
			}
		}
	}

}

/* End of file login.php */
/* Location: ./application/modules/users/controllers/login.php */