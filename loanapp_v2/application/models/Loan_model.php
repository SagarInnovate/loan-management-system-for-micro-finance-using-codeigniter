<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_model extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function get_loan_no(){
        $this->db->select('loan_no');
        $this->db->from('loan');
        $this->db->order_by('loan_no', 'DESC');

        $query = $this->db->get();
        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function get_paid_loan(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->join('approved_loans', 'loan.loan_no = approved_loans.loan_no');
        $this->db->join('business_details', 'loan.loan_no = business_details.loan_no');
        $this->db->where('approved_loans.status', 'Paid');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_verifier(){

        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('position', 'Loan Officer');

        $query = $this->db->get();

        $result = $query->result_array();

        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    
    }

    public function get_collector(){

        $this->db->select('*');
        $this->db->from('staff');
        $this->db->where('position', 'Collector');
        
        $query = $this->db->get();

        $result = $query->result_array();
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }

    public function insert_loan($data){

        $loan = array(
            'loan_no' => $data['loan_no'],
            'account_no' => $data['account_no'],
            'loan_amount' => $data['amount'],
            'collector' => $data['collector'],
            'verified' => $data['verifier'],
           
            'date_loan' => $data['date'],

            'loan_type' => $data['loanType'],
			'interest' => $data['interestRate'],
			'duration' => $data['duration'],
			
        );

        $business = array(
            'loan_no' => $data['loan_no'],
            'account_no' => $data['account_no'],
            'occupation' => $data['occupation'],
			'business_name' => $data['employer'],
			'employment_status' => $data['employmentStatus'],
			'monthly_income' => $data['monthlyIncome'],
            'business_address' => $data['address']

        );

        $this->db->insert('loan', $loan);
        $this->db->insert('business_details', $business);

        return $this->db->affected_rows();
            
    }

  

    public function update_borrowers($data){
        $this->db->set('status', 'Verified');
        $this->db->where('account_no', $data);
        $this->db->update('clients');
        return $this->db->affected_rows();
    }

    public function get_approved_clients(){
        $this->db->select('*, loan.status as loan_status');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->join('approved_loans', 'approved_loans.loan_no = loan.loan_no');
        $this->db->where('loan.status', 'Approved');
        $this->db->or_where('loan.status', 'Active');
        $this->db->group_by('loan.loan_no');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_rejected_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->join('business_details', 'loan.loan_no = business_details.loan_no');
        $this->db->where('loan.status', 'Rejected');
        $result = $this->db->get();

        return $result->result_array();
    }

    public function get_verified_clients(){
        $this->db->select('*');
        $this->db->from('clients');
        $this->db->join('address', 'clients.account_no = address.account_no');
        $this->db->join('names', 'clients.account_no = names.account_no');
        $this->db->join('loan', 'loan.account_no = clients.account_no');
        $this->db->join('business_details', 'loan.loan_no = business_details.loan_no');
        $this->db->where('loan.status', 'Waiting for approval');
        $this->db->or_where('loan.status', 'Re-applied loan');
        $result = $this->db->get();

        return $result->result_array();
    }

    // public function approve_loan($data,$data1){
    //     $approved_date = date('Y-m-d');
        
    //     $due_date = date('Y-m-d', strtotime("+60 days"));

    //     $amount = intval($data1);
    //     $int = $amount * 0.1;
    //     $total_int = $int*2;
    //     $amnt_int = $amount + $total_int;
    //     $daily_payment = $amnt_int/60;

    //     $this->db->set('status', "Approved");
    //     $this->db->set('approved', $this->session->userdata('username'));
    //     $this->db->where('loan_no', $data);
    //     $this->db->update('loan');


    //     $loan_data = array(
    //         'loan_no' => $data,
    //         'date_approved' => $approved_date,
    //         'daily_payment' => $daily_payment
    //     );

    //     $this->db->insert('approved_loans', $loan_data);
    //     return $this->db->affected_rows();
    // }

    // public function get_loan_details($data){
    //     $sql = "SELECT * FROM `loan` JOIN clients ON loan.account_no=clients.account_no JOIN names ON clients.account_no=names.account_no JOIN business_details ON business_details.loan_no=loan.loan_no WHERE loan.loan_no= '$data' ";
    //     $query = $this->db->query($sql);

    //     $result = $query->result_array();
    //     if(count($result) >0){
    //         return $result[0];
    //     }else{
    //         return null;
    //     }
    // }


    public function check_loan_exists($loan_id) {
        // Perform a database query to check if the loan exists
        $this->db->where('loan_no', $loan_id);
        $query = $this->db->get('loan');
    
        // Check if any rows are returned
        if ($query->num_rows() > 0) {
            return true; // Loan exists
        } else {
            return false; // Loan does not exist
        }
    }
    
    public function get_loan_details($loan_id) {
        // Perform a database query to retrieve loan details
        $this->db->where('loan_no', $loan_id);
        $query = $this->db->get('loan');
    
        // Check if any rows are returned
        if ($query->num_rows() > 0) {
            // Return the loan details as an associative array
            return $query->row_array();
        } else {
            // Loan does not exist, return empty array
            return array();
        }
    }
    
    public function approve_loan($approved_loan_data,$loan_no) {
        // Insert the approved loan data into the approved_loans table
        $this->db->set('status', "Approved");
        $this->db->set('approved', $this->session->userdata('username'));
        $this->db->where('loan_no', $loan_no);
        $this->db->update('loan');
        $insert_result = $this->db->insert('approved_loans', $approved_loan_data);
    
        // Check if the insert was successful
        if ($insert_result) {
            return true; // Loan approval successful
        } else {
            return false; // Loan approval failed
        }
    }

    public function reject_loan($data, $data1){
        if(empty($data1)){
            $data1 = "No reason given";
        }
        $this->db->set('reason', $data1);
        $this->db->set('status', "Rejected");
        $this->db->set('approved', $this->session->userdata('username'));
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }

    public function remove_loan($data){

        $this->db->where('loan_no', $data);
        $this->db->delete('loan');
    
        return $this->db->affected_rows();
    }
    public function cash_recieve($data){
        $loan_start = date('Y-m-d');
        $due_date = date('Y-m-d', strtotime("+60 days"));
 
        $this->db->set('loan_started', $loan_start);
        $this->db->set('due_date', $due_date);
        $this->db->where('loan_no', $data);
        $this->db->update('approved_loans');
        return $this->db->affected_rows();
    }
    public function status_update($data){
        $this->db->set('status', "Active");
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }

    public function reapply_loan($data){

        $this->db->set('reason', null);
        $this->db->set('status', "Re-applied loan");
        $this->db->set('approved', null);
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }

}
?>