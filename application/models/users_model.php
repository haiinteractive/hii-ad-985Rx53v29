<?php
/**
 * The users model
 *
 * @category Users
 * @package  None
 * @author   Anoop kP
 * @license  http://www.flycell.com Flycell
 * @link     libraries/core/users.php
 *
 */
 
class Users_Model extends CI_Model
{
 
	 public $_dataMap = ''; 
	 
		
            function GetUserInfo( $user_id )
            {
                        $this->db->select("*");
                        $this->db->from('subscriber');      
                        $this->db->where(array('subscriber.subscriber_id'=>$user_id ));        
                        $query = $this->db->get();
                        $db_results = $query->result();                   
                         if (count($db_results) > 0 )
                        {            
                                return $db_results[0];
                        }else{
                                return '';
                        }
            }

            function UserLogin( $arg )
            {
                        $this->db->select("*");
                        $this->db->from('t_users');      
                        $this->db->where( $arg );        
                        $query = $this->db->get();
                        $db_results = $query->result();                   
                         if (count($db_results) > 0 )
                        {            
                                return $db_results[0];
                        }else{
                                return 'invalid';
                        }

            } 
}
/* End of file users_model.php */
?>