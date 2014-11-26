<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

/**
 * The model for the Login_model module.
 *
 * @author		Randolf
 * @package		ICTNed CMS
 */
class Admin_model extends CI_Model {

	private $users = 'core_users';
	private $users_groups = 'core_users_groups';
	private $_pages 			= 'core_cms_page';
	private $_blog_category 	= 'cms_blog_category';
	private $_blog_details 		= 'cms_blog_details';
	private $_gallery 			= 'core_cms_gallery';
	private $_blog_images		= 'cms_blog_images';
	private $_cms_page			= 'core_cms_menu_page';

	public function __construct()
	{
		parent::__construct();
	}

	/*
	 * @decs 	This method retrives users in a groug.
	 *			Will are using this to retrive users in a group because the method $this->ion_auth->users() in ion_auth_model
	 *			has a limited parameters and it cannot catter the number of limits and the starting number
	*/
	public function get_users_group($group, $start, $limit) 
	{
		return $this->db->select($this->users.'.*')
				->from($this->users)
				->join($this->users_groups, $this->users.'.id = '.$this->users_groups.'.id')
				->where($this->users_groups.'.group_id', $group)
				->limit($limit, $start)
				->get();
	}

	public function count_users_group($group) 
	{
		$query = $this->db->select($this->users.'.*')
				->from($this->users)
				->join($this->users_groups, $this->users.'.id = '.$this->users_groups.'.id')
				->where($this->users_groups.'.group_id', $group)
				->get();

		return $query->num_rows();
	}
	public function getusers()
	{
		$query = $this->db->select('*')
							->from('core_users')
							->where('user_type','2')
							->order_by('id','Desc')
							->get();

		return $query->result();
	}
	public function getlimitedusers($limit,$start)
	{ 
		$query = $this->db->select('*')
							->from('core_users')
							->where('user_type','2')
							->order_by('id','Desc')
							->limit($limit,$start)
							->get();
		return $query->result();
	}
	public function get_page()
	{
		$this->db->select('id,title');
		$query = $this->db->get($this->_pages);
		return $query->result();
	}
	public function get_blog_list()
	{
		$this->db->select('id,title');
		$query = $this->db->get('cms_blog_details');
		return $query->result();
	}
	public function _get_gallery($where = array(), $limit = NULL, $offset = NULL){
		
		if ($where)
			$this->db->where($where);

		$this->db->select('core_cms_gallery.image_id as id,page_id,blog_id,date_uploaded,core_cms_gallery.status as stat, cms_blog_images.*')
			->join('cms_blog_images','cms_blog_images.gallery_id = core_cms_gallery.image_id')
			->where('core_cms_gallery.type',3)
			->order_by('core_cms_gallery.image_id','asc');

		$query = $this->db->get($this->_gallery,$limit, $offset);

		if ($query->num_rows() > 0){
			return $query->result();
		}
	}
	 public function get_data($table,$id,$type,$field)
	{
		$this->db->select('*');
		$this->db->where($field,$type);
		$this->db->order_by($id,'desc');
		$query = $this->db->get($table);
		//echo $this->db->last_query();die;
		return $query->result();
	}
	public function insert($table,$data)
	{
		$this->db->insert($table, $data);
		$id = $this->db->insert_id();
		return json_encode(array('id' => $id, 'status' => 'success'));
	}
	public function deleterecords($table,$where)
	{
	   //$results=2;
       $results=$this->db->delete($table,$where);
	   return $results;
	}
	public function updatestatus($table,$field,$where)
	{
		$this->db->set($field);
        $this->db->where($where);
        $this->db->update($table);
	}
	function alldelete($where,$table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	public function get_user_data($table,$id)
	{
		$this->db->select('*');
		$this->db->where('id',$id);
		$query = $this->db->get($table);
		return $query->result();
	}
	
	public function update($table_name,$data,$id)
	{
		$this->db->where('id', $id);
		$query = $this->db->update($table_name, $data);
		if($query){
			return json_encode(array('id' => $id, 'status' => 'success'));
		}else{
			return json_encode(array('_id' => $id, 'status' => 'error'));
		}
	}
}

/* End of file login_model.php */
/* Location: ./application/modules/users/models/login_model.php */