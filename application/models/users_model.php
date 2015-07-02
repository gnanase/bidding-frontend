<?php
/**
 *
 * This is user model of bidding
 *
 * @package		CodeIgniter
 * @category	Model
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

class Users_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function add_user($set_data,$uId=NULL)
	{
		$create_on = date('Y-m-d h:i:s');
	
		$user_detail = array(
				'name' 			=> $set_data['name'],
				'password' 		=> AES_Encode($set_data['password']),
				'email' 		=> $set_data['email'],
				'phone' 		=> isset($set_data['phone'])?$set_data['phone']:'',
				'address' 		=> $set_data['address'],
				'status'		=> 1,
				'created_on' 	=> $create_on
		);
		if(isset($uId) && !empty($uId)){
			$this->db->where('md5(id)', $uId);
			$this->db->update('users',$user_detail);
		}
		else{
			$this->db->insert("users", $user_detail);
			$uId = $this->db->insert_id();
	
			$user_role_data = array(
					'uid'=>$uId,
					'rid'=>3
			);
			$this->db->insert("role_user", $user_role_data);
		}
		return $uId;
	}
	
	
	public function get_users_details($id)
	{
		$select=array('US.id as user_id','US.name','US.password','US.email','US.phone','US.address');
		$this->db->select($select);
		$this->db->from('users as US');
		$this->db->where("md5(id)", $id);
		$query = $this->db->get();
	
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
			return $query_set[0];
		}
		else
		{
			return false;
		}
	}
	
	function check_useremail($email, $users_id)
	{
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('md5(id) !=',$users_id);
		$query = $this->db->get();
		return count($query->result_array());
	}
	
}