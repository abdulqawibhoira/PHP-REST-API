<?php
defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';


class Customer extends REST_Controller {

        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('customer_model');
                $this->load->model('address_model'); 
        }


	public function index_get($customer_id=NULL)
	{
           try{
                if($customer_id === NULL){
                  $customers=$this->customer_model->get_all_customers();
                  if($customers)
                  {
                     $this->response($customers, REST_Controller::HTTP_OK);
                  }
                  $this->response(['message' => 'No Customers found'], REST_Controller::HTTP_NOT_FOUND);
                }
                $customer_details=$this->customer_model->get_customer_by_id($customer_id);
                if($customer_details){
                  $this->response($customer_details[0], REST_Controller::HTTP_OK);
                }
                $this->response(['message' => 'Customer Not found'], REST_Controller::HTTP_NOT_FOUND);
              
              }catch (Exception $e) {
                 $this->response(['message'=>$e->getMessage()], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
	}

        public function index_post()
	{
            try{    
              if(!($this->post('name'))||!($this->post('phone_number')))
              {
                  $this->response(['message'=>'BAD REQUEST'], REST_Controller::HTTP_BAD_REQUEST);
              }
              $customer_id=$this->customer_model->insert(array('name'=>$this->post('name'),
                                                'phone_number'=>$this->post('phone_number')));
              $this->response(['id'=>$customer_id,'message'=>'Customer Created'], REST_Controller::HTTP_CREATED);
            }catch (Exception $e) {
                 $this->response(['message'=>$e->getMessage()], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
            }
	}

        public function get_all_addresses_get($customer_id=NULL)
	{
            try{
              if($customer_id===NULL)
              {
                  $this->response(['message'=>'BAD REQUEST'], REST_Controller::HTTP_BAD_REQUEST);
              }
              $customer_addresses=$this->address_model->get_all_addresses_by_customer_id($customer_id);
              if($customer_addresses){
                $this->response($customer_addresses, REST_Controller::HTTP_OK);
              }  
              $this->response(['message' => 'No Addresses found For this Customer'], REST_Controller::HTTP_NOT_FOUND);
              }catch (Exception $e) {
                   $this->response(['message'=>$e->getMessage()], REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
              }
	}
}
