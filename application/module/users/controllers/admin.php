<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * The controller for the Admin module.
 *
 * @author		Randolf
 * @author		Kirk
 * @package		ICTNed CMS
 */
class Admin extends Admin_Controller {

	private $_data = array();
	private $_page_count = 25;

	public function __construct()
	{
		echo "Asdasdasdasd";
		die;
		parent::__construct();
		$this->load->model('users/login_model');
		$this->load->model('users/admin_model');
		$this->load->library('encrypt');
	}
	
	public function administrator($task = NULL)
	{
		
		if ($task == 'edit')
		{
			$this->_administrator_edit();
			return;
		}
		else if ($task == 'add'|| $this->uri->segment(6)=="add")
		{
			$this->_administrator_add();
			return;
		}
		else if ($task == 'update_status' || $this->uri->segment(6)=="update_status" )
		{
			$this->update_status();
			return;
		}
		else if ($task == 'delete_one' || $this->uri->segment(6)=="delete_one" )
		{
			$this->delete_one();
			return;
		}
		else if ($task == 'alldelete' || $this->uri->segment(6)=="alldelete" )
		{
			$this->alldelete();
			return;
		}
		else if ($task == 'update_info' || $this->uri->segment(6)=="update_info" )
		{
			$this->update();
			return;
		}
		$page_id = NULL;
		$page_title = lang('cms_menu_settings_administrators');
		$info = $this->ion_auth->user()->row();
		$this->_data['info'] = $info;
		$this->_data['content_title'] = $page_title;
		$this->_data['page_title'] = $page_title;
		$this->_data['page_path'] = array(lang('dashboard'), lang('cms_menu_settings'), $page_title);
		parent::pagination_conf($this->_page_count, 'admin/users/administrator',count($this->admin_model->getusers())); // pagination
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$this->_data["get_data"] = $this->admin_model->getlimitedusers(25, $page);
		$this->_data['pages'] 		= $this->admin_model->get_page();
		$this->_data['blogs'] 		= $this->admin_model->get_blog_list();
		$query = $this->db->order_by('order', 'asc')->get_where('core_admin_menu', array('status' => 1, 'parent'=>0,'name' => 'settings'));
		$this->_data['result'] = $query->result();
		
		$this->_data['gallery']=$this->admin_model->_get_gallery($page_id,$this->_page_count, $this->uri->rsegment(3));
		$this->_data['get_data1']=$this->admin_model->get_data('core_users','id','1','user_type');
		$this->template->build('admin/admin_dashboard', $this->_data);
	}
	

	private function _administrator_edit()
	{
		if ($this->input->post())
		{
			$result = $this->login_model->validate_administrator();
			if ($result['status'] == 'success')
			{
				$id = $this->session->userdata('id');
				$this->ion_auth->update($id, $result['data']);
				$this->session->set_flashdata('status', 'success');
				$this->session->set_flashdata('message', lang('user_admin_update_success'));
			}
			echo json_encode($result);
			return;
		}
		if(is_numeric($this->uri->segment(6)))
		{
			$id = $this->uri->segment(6);
		 //$this->load->model('gallery_model');
		 $page_title = lang('cms_menu_settings_administrators');
		$info = $this->ion_auth->user()->row();
		$this->_data['info'] = $info;
		$this->_data['content_title'] = $page_title;
		$this->_data['page_path'] = array(lang('dashboard'), lang('cms_menu_settings'),$page_title);
		 $this->_data['get_data']=$this->admin_model->get_user_data('core_users',$id,'id');
		 /*echo "<pre>";
		 print_r ($data);
		  die;*/
		  $query = $this->db->order_by('order', 'asc')->get_where('core_admin_menu', array('status' => 1, 'name' => 'administrator'));
		$this->_data['result'] = $query->result();
		 $this->template->build('admin/editadministrator',$this->_data);
			}
			else{
		$page_title = lang('cms_menu_settings_administrators');
		$info = $this->ion_auth->user()->row();
		$this->_data['info'] = $info;
		$this->_data['content_title'] = $page_title;
		$this->_data['page_path'] = array(lang('dashboard'), lang('cms_menu_settings'), lang('cms_menu_settings_administrator'), $page_title);
		$query = $this->db->order_by('order', 'asc')->get_where('core_admin_menu', array('status' => 1, 'name' => 'administrator'));
		$this->_data['result'] = $query->result();
		$this->template->build('admin/administrator_edit', $this->_data);
	}}

	public function forgot_password()
	{
		$this->form_validation->set_rules('email', 'lang:user_email_address', 'required');
		if ($this->form_validation->run() == false)
			echo json_encode(array('status' => 'error', 'message' => validation_errors()));
		else
		{
			//run the forgot password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgot_password($this->input->post('email'));
			
			if ($forgotten)
			{
				$this->session->set_flashdata('status', 'success');
				$this->session->set_flashdata('message', lang('user_admin_forgot_password_success'));
				
				echo json_encode(array('status' => 'success'));
			}
			else
				echo json_encode(array('status' => 'error', 'message' => $this->ion_auth->errors()));
		}
	}

	public function manage_administrators($action = NULL)
	{
		$this->_data['error'] = FALSE;

		$current_pagination = 0;

		// is user logged in ???
		if ($this->ion_auth->logged_in() !== TRUE)
			redirect('admin/login');

		// This will set the uri segment 6 as value of variable $action if the page url contains pagination number
		// This can be inditified by checking if the uri segments 5 contains integer only and if the uri segment contains the action to render
		if($this->uri->segment(5) && is_numeric($this->uri->segment(5)) && $this->uri->segment(6)) 
			$action = $this->uri->segment(6);

		if($this->uri->segment(5) && is_numeric($this->uri->segment(5)))
			$current_pagination = $this->uri->segment(5);

		// Manages the administrators management action with is a basic CRUD function
		switch ($action) {
			case 'checkDuplicateAdministratorsEmail':
				$this->_check_unique_email();
				return;
				break ;

			case 'activate':
			case 'inactivate':
				$this->_change_user_status();
				return;
				break;

			case 'view':
				$this->_view_user_info();
				return;
				break ;

			case 'edit':
				$this->edit_users();
				break;

			case 'delete':
				$this->_delete_user_info();
				return;
				break;
			
			default:
				# code...
				break;
		}

		if ($this->input->post('btn_save_administrator'))
		{
			$config = array(
				array('field' => 'dhrmevr_beheerders', 'label' => 'lang:dhrmevr_beheerders', 'rules' => 'required'),
				array('field' => 'voornaam_beheerders', 'label' => 'lang:voornaam_beheerders', 'rules' => 'required'),
				array('field' => 'achternam_beheerders', 'label' => 'lang:achternam_beheerders', 'rules' => 'required'),
				array('field' => 'email_beheerders', 'label' => 'lang:email_beheerders', 'rules' => 'required'),
				array('field' => 'heirhaal_email_beheerders', 'label' => 'lang:heirhaal_email_beheerders', 'rules' => 'required'),
				array('field' => 'rights[]', 'label' => 'lang:rights', 'rules' => 'required')
			);

			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() == FALSE)
			{
				$this->_data['message'] = validation_errors();
				$this->_data['status'] = 'error';
			} else
			{
				$id = $this->input->post('administator_id');
				$title = $this->input->post('dhrmevr_beheerders');
				$fname = $this->input->post('voornaam_beheerders');
				$lname = $this->input->post('achternam_beheerders');
				$email = $this->input->post('email_beheerders');
				$rights = $this->input->post('rights');

				if ($id == 0) 
				{
					if ($this->ion_auth->register($email, 'password', $email, array('title' => $title, 'first_name' => $fname, 'last_name' => $lname), array(2)))
					{
						$this->_data['message'] = lang('the_administrator_is_successfully_added');
						$this->_data['status'] = 'success';
					} else {
						$this->_data['message'] = lang('the_administrator_is_not_successfully_added').' '.lang('please_contact_the_site_administrator');
						$this->_data['status'] = 'error';
					}
				} else {
					if ($this->ion_auth->update($id, array('title' => $title, 'first_name' => $fname, 'last_name' => $lname, 'email' => $email)))
					{
						$this->_data['message'] = lang('the_administrator_was_successfully_updated');
						$this->_data['status'] = 'success';
					} else {
						$this->_data['message'] = lang('the_administrator_was_not_successfully_updated').' '.lang('please_contact_the_site_administrator');
						$this->_data['status'] = 'error';
					}
				}
			}
		} 

		$page_title = lang('user_manage_admin_title');
		$info = $this->ion_auth->user()->row();
		$this->_data['info'] = $info;
		$this->_data['content_title'] = $page_title;

		$this->_data['page_title'] = $page_title;
		$this->_data['page_path'] = array(lang('cms_menu_settings'), $page_title);

		$this->_data['administrators_list'] = $this->admin_model->get_users_group(2, $current_pagination, $this->_page_count)->result();

		parent::pagination_conf($this->_page_count, 'admin/users/manage_administrators/', $this->admin_model->count_users_group(2)); // pagination
        $query = $this->db->order_by('order', 'asc')->get_where('core_admin_menu', array('status' => 1, 'name' => 'administrator'));
		$this->_data['result'] = $query->result();
		$this->template->build('admin/manage_administrators', $this->_data);
	}

	public function _check_unique_email()
	{
		if (isset($_POST['email'])) 
		{
			$email = $_POST['email'];

			$this->json_wrapper(
				($this->ion_auth->email_check($email)) > 0 ? FALSE : TRUE, 
				'',
				lang('the_administrator_email_was_already_existed')
			);
		}
	}

	public function _change_user_status()
	{
		if ($_POST['status'] == 'activate')
		{
			$this->json_wrapper(
				($this->ion_auth->activate($_POST['id'])) ? TRUE : FALSE, 
				lang('the_administrator_was_successfully_activated'),
				lang('the_administrator_was_not_successfully_activated').' '.lang('please_contact_the_site_administrator')
			);
		} 
		else if ($_POST['status'] == 'inactivate') 
		{
			$this->json_wrapper(
				($this->ion_auth->deactivate($_POST['id'])) ? TRUE : FALSE, 
				lang('the_administrator_was_successfully_inactivated'),
				lang('the_administrator_was_not_successfully_inactivated').' '.lang('please_contact_the_site_administrator')
			);
		}
	}

	public function _view_user_info()
	{
		if (isset($_POST)) 
		{
			$info = $this->ion_auth->user($_POST['id'])->row();

			$this->json_wrapper(
				($info) ? TRUE : FALSE, 
				array(
					array(
						'title' => $info->title,
						'full_name' => $info->first_name.' '.$info->last_name,
						'first_name' => $info->first_name,
						'last_name' => $info->last_name,
						'email' => $info->email
					)
				), 
				''
			);
		}
	}	

	public function _delete_user_info()
	{
		if (isset($_POST)) 
		{
			$this->json_wrapper(
				($this->ion_auth->delete_user($_POST['id'])) ? TRUE : FALSE, 
				lang('the_administrator_was_successfully_deleted'),
				lang('the_administrator_was_not_successfully_deleted').' '.lang('please_contact_the_site_administrator')
			);
		}
	}
	
private function _administrator_add()
	{
		if ($this->input->post())
		{
			
			$val = 1;
				$random=$this->rand_string(20);
				$firstname = $this->input->post('voornaam-beheerders');
				$lastname = $this->input->post('achternam-beheerders');
				$username = $this->input->post('username');
				$emailid = $this->input->post('email-beheerders');
				$job_title = $this->input->post('job_title');
				$country = $this->input->post('country');
				$phone_number = $this->input->post('phone_number');
				$mobile_number = $this->input->post('mobile_number');
				$password = $this->input->post('password');
				$pass= $this->encrypt->encode($password);
				$create_admin = $this->input->post('admin_confirm');
				$text_manage = $this->input->post('website_confirm');
				$project_manage = $this->input->post('project_confirm');
				$title=$this->input->post('dhrmevr-beheerders');
				$user_information=$this->input->post('user_confirm');
				$invite=$this->input->post('invite');
				// insert data
				$data = array('email' => $emailid, 'first_name' => $firstname, 'last_name' => $lastname,'username' => $username, 'title' => $title,'administrators_create' => $create_admin,'country'=>$country,'token' => $random,'password' => $pass,'mobile_phone'=>$phone_number,'address'=>$user_information,'user_type'=>'2');
				$last_id=$this->admin_model->insert('core_users',$data);
				$last_id_admin= json_decode($last_id) ;
				$link= base_url();
				
				if($invite==1){
	
	$to=$emailid;
	$subject = 'Active Dura Vermeer Account'; 
	$message = 'Please click this link and Active Your Dura Vermeer Account "<br /> \n"'
			.$link.'pages/active_?id='.$last_id_admin->id.'&activation_key='.$random.'&user_email_re='.$emailid;  
$headers='From: example@example.com';		
  						
				//mail($to, $subject, $message, $headers);
				
				}
				parent::pagination_conf($this->_page_count, 'admin/users/administrator',count($this->admin_model->getusers())); // pagination
		
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$this->_data["get_data"] = $this->admin_model->getlimitedusers(3, $page);
		
				
		//$this->template->build('admin/administrator', $this->_data);
			 

				$msg_var = ($val == 1) ? "Insert Successfully" : "bye";
		$this->session->set_flashdata('message', $msg_var);
			
		}

		$page_title = lang('user_login_details');
		$info = $this->ion_auth->user()->row();
		$this->_data['info'] = $info;
		$this->_data['content_title'] = $page_title;

		$this->_data['page_path'] = array(lang('dashboard'), lang('cms_menu_settings'), lang('cms_menu_settings_administrator'), $page_title);
		parent::pagination_conf($this->_page_count, 'admin/users/administrator',count($this->admin_model->getusers())); // pagination
		//echo $this->uri->segment(5);die;
		$page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
		$this->_data["get_data"] = $this->admin_model->getlimitedusers(3, $page);
        redirect('admin/users/administrator');
	}
	/////////serviceaction here
	public function serviceaction()
	{
		
		if($this->uri->segment(5)=='serviceaction')
		{
		 $val = $this->uri->segment(6);
		 
		  $action = $this->uri->segment(6);
		   $userid=$this->uri->segment(7);
		}
		else{
			$val = $this->uri->segment(5);
		 
		  $action = $this->uri->segment(5);
		  $userid=$this->uri->segment(6);
			}
		
		  if($action == 1)
		  {
			 $field = array('active'=>1);
			 $where = array('id'=>$this->uri->segment(6));
			 $this->admin_model->updatestatus('core_users',$field,$where);
			   if($val==1)
			  {
				  $msg_var="Administrators Successfully Activated ";
				  }
				 else
			  {
				  $msg_var="Administrators Successfully Deactivated ";
				  }
			  
		$this->session->set_flashdata('message', $msg_var);
			  redirect('admin/users/administrator');
		  }
		  if($action == 0)
		  {
			 
			 $field = array('active'=>0);
			 $where = array('id'=>$this->uri->segment(6));
			 $this->admin_model->updatestatus('core_users',$field,$where);
			 if($val==1)
			  {
				  $msg_var="Administrators Successfully Activated  ";
				  }
				 else
			  {
				  $msg_var="Administrators Successfully Deactivated ";
				  }
				  $this->session->set_flashdata('message', $msg_var);
			 redirect('admin/users/administrator');
			   }
		  
		  if($action == 4)
		  {
			
			
			 $where = array('id'=>$userid);
			 $this->admin_model->deleterecords('core_users',$where);
			
			 $msg_var=  lang('Delete_sucess');
			 			  
		$this->session->set_flashdata('message', $msg_var);	 
			  redirect('admin/users/administrator'); 
			  }
	}
	
	public function edit_users()
	{
		 
		$id = $this->uri->segment(5);
		 //$this->load->model('gallery_model');
		 $data=$this->admin_model->get_user_data('core_users',$id,'id');
		  $query = $this->db->order_by('order', 'asc')->get_where('core_admin_menu', array('status' => 1, 'name' => 'administrator'));
		$this->_data['result'] = $query->result();
		
		 $this->template->build('admin/editadministrator',$data);
		 //$this->template->build('admin/administrator', $this->_data);
		
	}
	
	
	public function alldelete()
  {
	  unset($_POST['alldelete_user']);
	  unset($_POST['total_rec']);
	  if($this->input->post()==TRUE){
		if(count($_POST)>=1)
		{
				$i=0;
				foreach ($this->input->post('user') as $key)
				{
    				$status=array('status'=>1);
					$this->admin_model->alldelete(array('id' => $key),'core_users');
    				$i++;
				}		
					
				$msg_var=  lang('Delete_sucess');
		        $this->session->set_flashdata('message', $msg_var);		 
				redirect('admin/users/administrator');
	  }
	  else{
		  redirect('admin/users/administrator');
		  }
	  }
  else{
		  redirect('admin/users/administrator');
	  }
  }
	  
	 function rand_string( $length )
	  {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
	$str="";
	$size = strlen( $chars );
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
} 

   public function update()
  {  
/*  echo "<pre/>";
     print_r($_POST); die;
*/    	//echo $this->uri->segment(5); die;
		        $random=$this->rand_string(20);
      			$firstname = $this->input->post('voornaam-beheerders');
				$lastname = $this->input->post('achternam-beheerders');
				$username = $this->input->post('username');
				$emailid = $this->input->post('email-beheerders');
				$job_title = $this->input->post('job_title');
				$country = $this->input->post('country');
				$phone_number = $this->input->post('phone_number');
				$mobile_number = $this->input->post('mobile_number');
				$password = $this->input->post('password');
				$create_admin = $this->input->post('admin_confirm');
				$text_manage = $this->input->post('website_confirm');
				$project_manage = $this->input->post('project_confirm');
				$title=$this->input->post('dhrmevr-beheerders');
				$user_information=$this->input->post('user_confirm');
				
				// insert data
				$data = array('email' => $emailid, 'first_name' => $firstname, 'last_name' => $lastname,'username' => $username, 'home_phone' => $job_title,'gender'=>$title,'country'=>$country,'token' => $random,'password' => $password,'mobile_phone'=>$phone_number,'address'=>$user_information,'user_type'=>'2');
	 
	 //$where=array('id'=>$this->uri->segment(5));
	   

	   $this->load->model('admin_model');
	    
   	   $this->admin_model->update('core_users',$data,$this->uri->segment(6));
	   	   
	   
	   $msg_var=  lang('update_sucess');
			 			  
	   $this->session->set_flashdata('message', $msg_var);	 
	   redirect('admin/users/administrator');
	  
  }
  public  function update_status()
  {
	   		$val=$this->uri->segment(6);
			if($val==0)
			{
			 $field = array('active'=>'0');
			}
			else{
				$field = array('active'=>'1');
				}
			 $where = array('id'=>$this->uri->segment(7));
			 $this->admin_model->updatestatus('core_users',$field,$where);
			   if($val==0)
			  {
				  $msg_var="Administrators Successfully Activated ";
				  }
				 else
			  {
				  $msg_var="Administrators Successfully Deactivated ";
				  }
			  
		$this->session->set_flashdata('message', $msg_var);
			  redirect('admin/users/administrator');
		
		  
	  }
	  public function delete_one()
	  {
			$userid=$this->uri->segment(6);
			$where = array('id'=>$userid);
			 $this->admin_model->deleterecords('core_users',$where);
			 $msg_var=  lang('Delete_sucess');
			$this->session->set_flashdata('message', $msg_var);	 
			  redirect('admin/users/administrator');   
	  }

	
}

/* End of file admin.php */
/* Location: ./application/modules/users/controllers/admin.php */