
<?php
/**
 * The Users class file.
 *
 * @category Users
 * @package  None
 * @author   Anoop KP
 * @license  http://www.skillsweet.com 
 * @link     models/users_model.php
 * 
 */
 
class Be_Users
{
    private $_CI;    
    

    /**
     * Constructor.
     * Loads the CI instance, the users_model and some useful helpers.
     * Creates a users_lib object, populated if passed a valid $init.    
     * @param string/int $init - user id or email of user to load   
     * @access public   
     * @return none
     */
    public function __construct($init = false)
    {
        $this->_CI = & get_instance();
        $this->_CI->load->model('users_model');         
        $this->current_date = date('Y-m-d H:i:s');
    }
    
        function GetUserInfo( $user_id )
        {
                $response = false;
                $response = $this->_CI->users_model->GetUserInfo( $user_id );
                return $response;
        }

        function UserLogin( $email, $password )
        {
                $response = false;
                    $arg = array(
                                'f_user_email' => $email,
                                'f_user_password' => md5( $password )
                        )  ; 
                $response = $this->_CI->users_model->UserLogin( $arg );
                return $response;

        }
}
