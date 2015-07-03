<?php
/**
 *
 * This is product model of bidding
 *
 * @package		CodeIgniter
 * @category	Model
 * @author		Gnanasekaran
 * @link		http://innoppl.com/
 *
 */

class Bidding_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	
	public function add_bid($setdata){
		$user_id = $this->session->userdata('user_id');
		$bid_detail = array(
				'product_id' 	=> $setdata['pid'],
				'user_id' 		=> $user_id,
				'amount' 		=> $setdata['bid']
		);
		$this->db->insert("bidding", $bid_detail);
		$uId = $this->db->insert_id();
		return $uId;
	}
	
	
	
}