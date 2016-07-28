<?php

class Address_model extends CI_Model {


        public function __construct()
        {
                parent::__construct();
                $this->load->database();
        }

        public function get_all_addresses()
        {
                $query = $this->db->get('addresses');
                return $query->result();
        }

         public function get_address_by_id($address_id)
        {
                $query = $this->db->get_where('addresses',array('id' => $address_id));
                return $query->result();
        }

        public function insert($details)
        {
                $this->db->insert('addresses', $details);
                $insert_id = $this->db->insert_id();
                return  $insert_id;
        }

        public function get_all_addresses_by_customer_id($customer_id)
        {
                $query = $this->db->get_where('addresses',array('customer_id' => $customer_id));
                return $query->result();
        }


}