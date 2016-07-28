<?php

class Customer_model extends CI_Model {


        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        public function get_all_customers()
        {
                $query = $this->db->get('customers');
                return $query->result();
        }

         public function get_customer_by_id($customer_id)
        {
                $query = $this->db->get_where('customers',array('id' => $customer_id));
                return $query->result();
        }

        public function insert($details)
        {
                $this->db->insert('customers', $details);
                $insert_id = $this->db->insert_id();
                return  $insert_id;
        }


}