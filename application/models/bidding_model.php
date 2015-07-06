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
	
	public function winner(){
		$current_time = date('Y-m-d h:i:s');
		$select = array( 'BI.product_id', 'BI.user_id', 'BI.amount');
		$this->db->select($select);
		$this->db->select_max('BI.amount');
		$this->db->from('bidding as BI');
		$this->db->join('product as PR', 'PR.id=BI.product_id', 'inner');
		$this->db->where('PR.end_date <', $current_time);
		$query = $this->db->get();
		
		if($numrows = $query->num_rows()>0)
		{
				//$insert_query = $query->result_array(); && $insert_query[0]['product_id'] != NULL
				if($numrows == 1 && isset($numrows) && $numrows != NULL)
				{ print_r($numrows); die;
				  $this->db->insert("bid_winner", $query->row());
				  $pid = $this->db->insert_id();
				  $sql = "SELECT `product_id` FROM `bid_winner` WHERE `id` = '".$pid."'";
				  $query_delete = $this->db->query($sql);
				  $product_del = $query_delete->result_array();
				  $this->db->where('product_id', $product_del[0]['product_id']);
				  $this->db->delete('bidding');
				  return $pid;
				}elseif($numrows > 1){
			      $this->db->insert_batch("bid_winner", $query->result_array());
			      $sql = "SELECT `product_id` FROM `bid_winner` ";
			      $query_delete = $this->db->query($sql);
			      $product_del = $query_delete->result_array();
			      $this->db->where('product_id', $product_del[0]['product_id']);
			      $this->db->delete('bidding');
			    }			
		}
		else
		{
			return false;
		}
	}
	
	
	public function recent_winners(){
		$select=array('BW.id as winner_id','BW.user_id', 'BW.product_id', 'BW.transaction_id', 'BW.amount', 'PR.name as pname','PR.image', 'US.name as uname');
		$this->db->select($select);
		$this->db->from('bid_winner as BW');
		$this->db->join('product as PR', 'PR.id=BW.product_id','inner');
		$this->db->join('users as US', 'US.id=BW.user_id','inner');
		$query = $this->db->get();
		
		if($query->num_rows()>0)
		{
			$query_set = $query->result_array();
		}
		else
		{
			$query_set = '';
		}
		return  $query_set;
	}
	
	
	
}