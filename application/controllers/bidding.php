<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 *
 * This is Bidding controller of bidding
 *
 * @package	    Dashboard
 * @category	Controller
 * @author	    Gnanasekaran
 * @link	    http://innoppl.com/
 *
 */


class Bidding extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//if not login redirect to home
		if($this->session->userdata('logged_in') == false)
		{
			redirect(base_url().'login/', 'refresh');
		}
		$this->load->model('product_model');
		$this->load->model('bidding_model');
	}
	
	
	public function index()
	{
		$data['siteTitle'] = 'Bidding - '.SITE_NAME;	
		$data['product_list']=$this->product_model->products_list();
		$this->load->view('frontend/header',$data);	
		$this->load->view('frontend/dashboard',$data);
		$this->load->view('frontend/footer');
	}
	
	public function bid($pid){
		$data['siteTitle'] = 'Bidding - '.SITE_NAME;
		$data['ErrorMessages'] = '';
		
		//if set post
		if (($this->input->server('REQUEST_METHOD') == 'POST'))
		{//|greater_than['.$minprice.']
			
			$product_id = $_POST['pid'];
			$product_details=$this->product_model->get_product_details($pid);
			//print_r($product_details); die;
			$minprice = $product_details['min_price']; 
			$config = array(
						array('field' => 'bid',
							'label' => 'bid amount',
							'rules' => 'trim|required|greater_than['.$minprice.']')
			);
			$this->form_validation->set_rules($config);
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
			if($this->form_validation->run() == FALSE)
			{
				$data['ErrorMessages'] = validation_errors();
			}
			else
			{
				if( $this->bidding_model->add_bid($_POST))
				{
					$this->session->set_flashdata('SucMessage',BID_ADD_SUS);
					redirect(base_url().'bidding/','refresh');
				}
			}
		}
		
		$data['product_details']=$this->product_model->get_product_details($pid);
		$this->load->view('frontend/header',$data);
		$this->load->view('frontend/bidding/bid');
		$this->load->view('frontend/footer');
	}
	
}