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

class Product_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		
	}
	
	//List product from product table
	public function products_list()
	{		
		$select=array('PR.id as product_id','PR.name','PR.code','PR.desc','PR.image','PR.price','PR.min_price','PR.bid_fee','PR.start_date','PR.end_date','PR.status');
		$this->db->select($select);
		$this->db->from('product as PR');
		$this->db->order_by("PR.name", "asc");
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
	
	//Get single product details from product table
	public function get_product_details($id)
	{
		$select=array('PR.id as product_id','PR.name','PR.code','PR.desc','PR.image','PR.price','PR.min_price','PR.bid_fee','PR.start_date','PR.end_date','PR.status');
		$this->db->select($select);
		$this->db->from('product as PR');
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
	

	
	
}