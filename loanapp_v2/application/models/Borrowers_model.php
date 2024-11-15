<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrowers_model extends CI_Model {

	public function __contruct()    {
        $this->load->database();
    }

    public function insert_client($data){

        if($data['client_img'] == ""){
            $client_data = array(
                'account_no' => $data['account_no'],
                'profile_img' => $data['client_img'],
                'email' => $data['email'],
                'number1' => $data['number1'],
                'number2' => $data['number2'],
                'birthdate' => $data['birthdate'],
                'gender' => $data['gender'],
                'added_info' => $data['info'],
                'father_name' => $data['father_name'],
				'mother_name' => $data['mother_name'],
				'literacy_level' => $data['literacy_level'],
				'marital_status' => $data['marital_status'],			
            );
        }else{
             $client_data = array(
                'account_no' => $data['account_no'],
                'profile_img' => $data['client_img'],
                'email' => $data['email'],
                'number1' => $data['number1'],
                'number2' => $data['number2'],
                'birthdate' => $data['birthdate'],
                'gender' => $data['gender'],
                'added_info' => $data['info'],
                'father_name' => $data['father_name'],
				'mother_name' => $data['mother_name'],
				'literacy_level' => $data['literacy_level'],
				'marital_status' => $data['marital_status'],	
            );
        }
       
        $client_name = array(
            'account_no' => $data['account_no'],
            'firstname' => $data['gname'],
            'middlename' => $data['mname'],
            'lastname' => $data['lname'],
        );
        $client_address = array(
            'account_no' => $data['account_no'],
            // 'purok_no' => $data['purok_no'],
            'street' => $data['street'],
            'city' => $data['city'],
            'state' => $data['state'],
            'postal_code' => $data['postal_code'],
        );

        $bank_details=array(
            // bank details
            'account_no' => $data['account_no'],
            'bank_name' => $data['bank_name'],
            'ifsc_code' => $data['ifsc_code'],
            'passbook_no' => $data['passbook_no'],
            'branch_address' => $data['branch_address'],
            'passbook_url' => $data['passbook_url'],
            
        );

        $documents=array(
            // documents info
            'account_no' => $data['account_no'],
            'aadhar_card_number' => $data['aadhar_card_number'],
            'electricity_bill_number' => $data['electricity_bill_number'],
            'pan_card_number' => $data['pan_card_number'],
            'application_form_number' => $data['application_form_number'],
            'aadhar_card_document' => $data['aadhar_card_document'],
            'pan_card_document' => $data['pan_card_document'],
            'electricity_bill_document' => $data['electricity_bill_document'],
            'application_form_document' => $data['application_form_document'],

        );
        $guarantors_details=array(
           
            // guarantors details
            'account_no' => $data['account_no'],
            'name' => $data['name'],
            'relation' => $data['relation'],
            'adhar_no' => $data['adhar_no'],
            'pan_card_no' => $data['pan_card_no'],
            'expense_details' => $data['expense_details'], 
            'adhar_uploaded_url' => $data['adhar_uploaded_url'],
            'pan_card_uploaded_url' => $data['pan_card_uploaded_url'],
        
        );


        $this->db->insert('clients',$client_data);

        $this->db->insert('names',$client_name);

        $this->db->insert('address',$client_address);
        $this->db->insert('documents',$documents);
        $this->db->insert('guarantors_details',$guarantors_details); 
        $this->db->insert('bank_details',$bank_details);

        return $this->db->affected_rows();
    }

    public function update_profile($data){

        // Client Data
        $client_data = array(
            'email' => $data['email'],
            'number1' => $data['number1'],
            'number2' => $data['number2'],
            'birthdate' => $data['birthdate'],
            'gender' => $data['gender'],
            'added_info' => $data['info'],
            'father_name' => $data['father_name'],
            'mother_name' => $data['mother_name'],
            'literacy_level' => $data['literacy_level'],
            'marital_status' => $data['marital_status'],			
        );
    
        // Client Name
        $client_name = array(
            'firstname' => $data['gname'],
            'middlename' => $data['mname'],
            'lastname' => $data['lname'],
        );
    
        // Client Address
        $client_address = array(
            'street' => $data['street'],
            'city' => $data['city'],
            'state' => $data['state'],
            'postal_code' => $data['postal_code'],
        );
    
        // Bank Details
        $bank_details = array(
            'bank_name' => $data['bank_name'],
            'ifsc_code' => $data['ifsc_code'],
            'passbook_no' => $data['passbook_no'],
            'branch_address' => $data['branch_address'],
            'passbook_url' => $data['passbook_url'],
        );
    
        // Documents
        $documents = array(
            'aadhar_card_number' => $data['aadhar_card_number'],
            'electricity_bill_number' => $data['electricity_bill_number'],
            'pan_card_number' => $data['pan_card_number'],
            'application_form_number' => $data['application_form_number'],
            'aadhar_card_document' => $data['aadhar_card_document'],
            'pan_card_document' => $data['pan_card_document'],
            'electricity_bill_document' => $data['electricity_bill_document'],
            'application_form_document' => $data['application_form_document'],
        );
    
        // Guarantors Details
        $guarantors_details = array(
            'name' => $data['name'],
            'relation' => $data['relation'],
            'adhar_no' => $data['adhar_no'],
            'pan_card_no' => $data['pan_card_no'],
            'expense_details' => $data['expense_details'], 
            'adhar_uploaded_url' => $data['adhar_uploaded_url'],
            'pan_card_uploaded_url' => $data['pan_card_uploaded_url'],
        );
    
        // Begin transaction
        $this->db->trans_start();
    
        // Update Client Data
        $this->db->where('account_no', $data['account_no']);
        $this->db->update('clients', $client_data);
    
        // Update Client Name
        $this->db->where('account_no', $data['account_no']);
        $this->db->update('names', $client_name);
    
        // Update Client Address
        $this->db->where('account_no', $data['account_no']);
        $this->db->update('address', $client_address);
    
        // Update Bank Details
        $this->db->where('account_no', $data['account_no']);
        $this->db->update('bank_details', $bank_details);
    
        // Update Documents
        $this->db->where('account_no', $data['account_no']);
        $this->db->update('documents', $documents);
    
        // Update Guarantors Details
        $this->db->where('account_no', $data['account_no']);
        $this->db->update('guarantors_details', $guarantors_details);
    
        // Commit transaction
        $this->db->trans_complete();
    
        // Check if transaction was successful
        if ($this->db->trans_status() === FALSE) {
            // Transaction failed
            return false;
        } else {
            // Transaction successful
            return true;
        }
    }
    

    public function update_name($data){

            $client_name = array(
                'firstname' => $data['fname'],
                'middlename' => $data['mname'],
                'lastname' => $data['lname'],
            );    
        
        $this->db->where('account_no', $data['account_no']);
        $this->db->update('names', $client_name);

        return $this->db->affected_rows();
    }



     public function get_account_id(){
        $this->db->select('account_no');
        $this->db->from('clients');
        $this->db->order_by('account_no', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function get_new_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->where('status', 'New');
        $this->db->or_where('status', 'Verified');
        $this->db->order_by('clients.account_no', 'DESC'); // Order by the created_at column in descending order
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_active_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->where('loan.status', 'Active');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_profile($data){

        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('bank_details', 'clients.account_no = bank_details.account_no');
        $this->db->join('documents', 'clients.account_no = documents.account_no');
        $this->db->join('guarantors_details', 'clients.account_no = guarantors_details.account_no');
        $this->db->where('clients.account_no', $data);

        $query = $this->db->get();

        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function get_profile_bname($data){

        $this->db->where('business_details.account_no', $data);

        $query = $this->db->get('business_details');

        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function get_co_maker($data){
        $this->db->where('co_maker.account_no', $data);

        $query = $this->db->get('co_maker');

        $result = $query->result_array();
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }

     public function get_loan($data){
        $this->db->select('*, loan.status as loan_stat');
        $this->db->from('loan');
        $this->db->join('approved_loans', 'approved_loans.loan_no=loan.loan_no');
        $this->db->where('loan.account_no', $data);
        $query = $this->db->get(); 
        $result = $query->result_array();
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }


    public function delete_clients($data){
        $this->db->where('account_no', $data);
        $this->db->delete('clients');
        return $this->db->affected_rows();
    }

}