<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *
 * This is user controller of bidding
 *
 * @package		CodeIgniter
 * @category	controller
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

include APPPATH.'/controllers/common.php';
class Users extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		//load login model
		$this->load->model('users_model');
	
	}
	//User view page
	public function index()
	{
		$data['siteTitle'] = 'Users - '.SITE_NAME;
		$uid = $this->session->userdata('user_id');
		$data['users_details']= $this->users_model->get_users_details( md5($uid) );
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/users/view');
		$this->load->view('frontend/footer');
	}
	
	//Customer register
	public function register(){
		//if not login redirect to home
		if($this->session->userdata('logged_in') == true)
		{
			redirect(base_url().'dashboard/', 'refresh');
		}
		
		$data['siteTitle'] = 'Users - '.SITE_NAME;
		$data['ErrorMessages'] = '';
		//if set post
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
			$config = array(
					array('field' => 'name',
							'label' => 'User name',
							'rules' => 'trim|required|alpha_numeric|min_length[3]|max_length[30]'),
					array('field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|required|min_length[3]|max_length[80]|is_unique[users.email]'),
					array('field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required|min_length[3]|max_length[15]'),
					array('field' => 'phone',
							'label' => 'Phone Number',
							'rules' => 'trim|numeric|max_length[15]'),
					array('field' => 'address',
							'label' => 'Address',
							'rules' => 'trim|required|max_length[150]')
			);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
				
			if($this->form_validation->run() == FALSE)
			{
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				if( $uid = $this->users_model->add_user($_POST))
				{
					$validUser = $this->users_model->get_users_details( md5($uid) );
					$session=array(
							'user_id'	=>	$validUser['user_id'],
							'user_name'	=>	$validUser['name'],
							'mail'		=>	$validUser['email'],
							'logged_in'	=>	true
					);
					$this->session->set_userdata($session);
					$this->session->set_flashdata('SucMessage',USERS_REG_SUS);
					redirect(base_url().'dashboard/','refresh');
				}
			}
		}
		
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/users/register');
		$this->load->view('frontend/footer');
	}
	
	public function edit($uid){
		$data['siteTitle'] = 'Users - '.SITE_NAME;
		
		//if set post
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{
			$config = array(
					array('field' => 'name',
							'label' => 'User name',
							'rules' => 'trim|required|alpha_numeric|min_length[3]|max_length[30]'),
					array('field' => 'email',
							'label' => 'Email',
							'rules' => 'trim|required|min_length[3]|max_length[80]|callback_check_unique_useremail'),
					array('field' => 'password',
							'label' => 'Password',
							'rules' => 'trim|required|min_length[3]|max_length[15]'),
					array('field' => 'phone',
							'label' => 'Phone Number',
							'rules' => 'trim|numeric|max_length[15]'),
					array('field' => 'address',
							'label' => 'Address',
							'rules' => 'trim|required|max_length[150]')
			);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
			if($this->form_validation->run() == FALSE)
			{
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				if( $this->users_model->add_user($_POST, $uid))
				{
					$this->session->set_flashdata('SucMessage',USERS_UPDATE_SUS);
					redirect(base_url().'users/edit/'.$uid.'/','refresh');
				}
			}
		}
		
		$data['users_details']= $this->users_model->get_users_details($uid);
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/users/edit');
		$this->load->view('frontend/footer');
	}
	
	
	//Check unique email id for user
	function check_unique_useremail($str)
	{
		if(preg_match("/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,4})$/", $str))
		{
			$uid = $this->uri->segment(3);
			$unique = $this->users_model->check_useremail($str,$uid);
			if(!$unique)
			{
				return TRUE;
			}
			else
			{
				$this->form_validation->set_message('check_unique_useremail', USER_EMAIL_ALREADY_EXIST);
				return FALSE;
			}
		}
		else
		{
			$this->form_validation->set_message('check_unique_useremail', INVALID_EMAIL);
			return FALSE;
		}
	}
	
}