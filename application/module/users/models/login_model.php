<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * The model for the Login_model module.
 *
 * @author		Randolf
 * @package		ICTNed CMS
 */
class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function validate_administrator()
	{
		$type = $this->input->post('type');
		switch ($type)
		{
			case 'admin_email' :
				$config = array(
					array('field' => 'email', 'label' => 'lang:user_email_address', 'rules' => 'required|matches[email_2]'),
					array('field' => 'email_2', 'label' => 'lang:user_email_address_repeat', 'rules' => '')
				);
				break;
			case 'admin_password' :
				$config = array(
					array('field' => 'password', 'label' => 'lang:user_password', 'rules' => 'required'),
					array('field' => 'password_new', 'label' => 'lang:user_password_new', 'rules' => 'required|matches[password_rep]'),
					array('field' => 'password_rep', 'label' => 'lang:user_password_new_repeat', 'rules' => '')
				);
				break;
			case 'admin_info' :
				$config = array(
					array('field' => 'company', 'label' => 'lang:user_company_name', 'rules' => 'required'),
					array('field' => 'first_name', 'label' => 'lang:user_firstname', 'rules' => 'required'),
					array('field' => 'last_name', 'label' => 'lang:user_lastname', 'rules' => 'required'),
				);
		}

		$this->form_validation->set_rules($config);

		if ($this->form_validation->run($this) == false)
			return array('status' => 'error', 'message' => lang('user_admin_update_error'));
		else
		{
			$this->load->library('encrypt'); // load the encryption library

			if ($type == 'admin_email')
				return array(
					'status' => 'success',
					'data' => array('email' => $this->input->post('email'))
				);
			elseif ($type == 'admin_password')
			{
				$password = $this->input->post('password');
				$password_new = $this->input->post('password_new');

				// check if password is correct
				$user = $this->ion_auth->user()->row();


				if ($this->encrypt->decode($user->password) == $password)
					return array('status' => 'success', 'data' => array('password' => $password_new));
				else
					return array('status' => 'error', 'message' => lang('user_admin_update_error'));
			}
			elseif ($type == 'admin_info')
				return array(
					'status' => 'success',
					'data' => array(
						'company' => $this->input->post('company'),
						'first_name' => $this->input->post('first_name'),
						'last_name' => $this->input->post('last_name'),
						'title' => $this->input->post('title')
					)
				);
		}
	}
}

/* End of file login_model.php */
/* Location: ./application/modules/users/models/login_model.php */