<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';


class Address extends REST_Controller {

        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('address_model'); 
        }


	public function index_get($address_id=NULL)
	{
                if($address_id === NULL){
                  $addresses=$this->address_model->get_all_addresses();
                  if($addresses)
                  {
                     $this->response($addresses, REST_Controller::HTTP_OK);
                  }
                  $this->response(['message' => 'No Addresses found'], REST_Controller::HTTP_NOT_FOUND);
                }
                $address_details=$this->address_model->get_address_by_id($address_id);
                if($address_details){
                  $this->response($address_details[0], REST_Controller::HTTP_OK);
                }
                $this->response(['message' => 'Address Not found'], REST_Controller::HTTP_NOT_FOUND);    
	}

        public function index_post()
	{
            if(!($this->post('customer_id'))||!($this->post('street'))||!($this->post('society')))
            {
                $this->response(['message'=>'BAD REQUEST'], REST_Controller::HTTP_BAD_REQUEST);
            }
            $address_id=$this->address_model->insert(array('customer_id'=>$this->post('customer_id'),
                                              'society'=>$this->post('society'),
                                              'street'=>$this->post('street')));
            $this->response(['id'=>$address_id,'message'=>'New Address Created'], REST_Controller::HTTP_CREATED);
	}
}
