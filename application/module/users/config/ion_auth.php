<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Tables.
| -------------------------------------------------------------------------
| Database table names.
*/
$config['tables']['users']           = 'core_users';
$config['tables']['groups']          = 'core_groups';
$config['tables']['users_groups']    = 'core_users_groups';
$config['tables']['login_attempts']  = 'core_login_attempts';

/*
 | Users table column and Group table column you want to join WITH.
 |
 | Joins from users.id
 | Joins from groups.id
 */
$config['join']['user']='user_id';
$config['join']['users']  = 'id';
$config['join']['groups'] = 'group_id';
$config['join']['user_type']='user_type';


$config['hash_method']    = 'ci_encrypt';	// IMPORTANT: Make sure this is set to either sha1 or bcrypt
$config['default_rounds'] = 8;		// This does not apply if random_rounds is set to true
$config['random_rounds']  = FALSE;
$config['min_rounds']     = 5;
$config['max_rounds']     = 9;

/*
 | -------------------------------------------------------------------------
 | Authentication options.
 | -------------------------------------------------------------------------
 | maximum_login_attempts: This maximum is not enforced by the library, but is
 | used by $this->ion_auth->is_max_login_attempts_exceeded().
 | The controller should check this function and act
 | appropriately. If this variable set to 0, there is no maximum.
 */
$config['site_title']           = "aafkemooij.nl"; 		// Site Title, example.com
$config['admin_email']          = "admin@aafkemooij.nl"; 	// Admin Email, admin@example.com
$config['default_group']        = 'members'; 			// Default group, use name
$config['admin_group']          = 'admin'; 				// Default administrators group, use name
$config['identity']             = 'email'; 				// A database column which is used to login with
$config['min_password_length']  = 8; 					// Minimum Required Length of Password
$config['max_password_length']  = 20; 					// Maximum Allowed Length of Password
$config['email_activation']     = FALSE; 				// Email Activation for registration
$config['manual_activation']    = FALSE; 				// Manual Activation for registration
$config['remember_users']       = TRUE; 				// Allow users to be remembered and enable auto-login
$config['user_expire']          = 86500; 				// How long to remember the user (seconds). Set to zero for no expiration
$config['user_extend_on_login'] = FALSE; 				// Extend the users cookies everytime they auto-login
$config['track_login_attempts'] = FALSE;				// Track the number of failed login attempts for each user or ip.
$config['maximum_login_attempts']     = 3; 				// The maximum number of failed login attempts.
$config['forgot_password_expiration'] = 0; 				// The number of seconds after which a forgot password request will expire. If set to 0, forgot password requests will not expire.


/*
 | -------------------------------------------------------------------------
 | Email options.
 | -------------------------------------------------------------------------
 | email_config:
 | 	  'file' = Use the default CI config or use from a config file
 | 	  array  = Manually set your email config settings
 */
$config['use_ci_email'] = FALSE; // Send Email using the builtin CI email class, if false it will return the code and the identity
$config['email_config'] = array(
	'mailtype' => 'html',
);

/*
 | -------------------------------------------------------------------------
 | Email templates.
 | -------------------------------------------------------------------------
 | Folder where email templates are stored.
 | Default: auth/
 */
$config['email_templates'] = 'auth/email/';

/*
 | -------------------------------------------------------------------------
 | Activate Account Email Template
 | -------------------------------------------------------------------------
 | Default: activate.tpl.php
 */
$config['email_activate'] = 'activate.tpl.php';

/*
 | -------------------------------------------------------------------------
 | Forgot Password Email Template
 | -------------------------------------------------------------------------
 | Default: forgot_password.tpl.php
 */
$config['email_forgot_password'] = 'forgot_password.tpl.php';

/*
 | -------------------------------------------------------------------------
 | Forgot Password Complete Email Template
 | -------------------------------------------------------------------------
 | Default: new_password.tpl.php
 */
$config['email_forgot_password_complete'] = 'new_password.tpl.php';

/*
 | -------------------------------------------------------------------------
 | Salt options
 | -------------------------------------------------------------------------
 | salt_length Default: 10
 |
 | store_salt: Should the salt be stored in the database?
 | This will change your password encryption algorithm,
 | default password, 'password', changes to
 | fbaa5e216d163a02ae630ab1a43372635dd374c0 with default salt.
 */
$config['salt_length'] = 10;
$config['store_salt']  = FALSE;

/*
 | -------------------------------------------------------------------------
 | Message Delimiters.
 | -------------------------------------------------------------------------
 */
$config['message_start_delimiter'] = '<p>'; 	// Message start delimiter
$config['message_end_delimiter']   = '</p>'; 	// Message end delimiter
$config['error_start_delimiter']   = '<p>';		// Error mesage start delimiter
$config['error_end_delimiter']     = '</p>';	// Error mesage end delimiter

/* End of file ion_auth.php */
/* Location: ./application/config/ion_auth.php */
