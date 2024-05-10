<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments_model extends CI_Model {

	public function __contruct(){
        $this->load->database();
    }

    public function get_loan_details($data){
        $sql = "SELECT *, loan.status as loan_stats FROM `loan` JOIN clients ON loan.account_no=clients.account_no JOIN names ON clients.account_no=names.account_no JOIN business_details ON business_details.loan_no=loan.loan_no JOIN address ON address.account_no = clients.account_no JOIN approved_loans on approved_loans.loan_no = loan.loan_no WHERE loan.loan_no= '$data' ";
        $query = $this->db->query($sql);

        $result = $query->result_array();
        if(count($result) >0){
            return $result[0];
        }else{
            return null;
        }
    }

    public function payment_check($data){
        $sql = "SELECT * FROM `payment_transactions` WHERE loan_no = '$data' ORDER BY payment_no DESC LIMIT 1";
        $query = $this->db->query($sql);


        $result = $query->result_array();
        
        if(count($result) >0){
            return $result;
        }else{
            return null;
        }
    }

    public function insert_payment($data){
        $loan_no = $data['loan_no'];

            $payment = array(
                'loan_no' => $loan_no,
                'date' => date('Y-m-d'),
                'amount' => $data['emi_amount'],
                'emi_no'=>$data['emi_no'],
            );
            $this->db->insert('payment_transactions', $payment);
          
            $this->db->select('remaining_emis');
            $this->db->where('loan_no', $loan_no);
            $query = $this->db->get('approved_loans');
            $result = $query->row();
            $remaining_emis = $result->remaining_emis;
    
            // Update due_date and remaining_emis in approved_loan Jtable
            $this->db->where('loan_no', $loan_no);
            $this->db->set('due_date', $data["next_due"]); // Assuming due_date should be incremented by 1 day
            $this->db->set('remaining_emis', intval($remaining_emis) - 1);
            $this->db->update('approved_loans');

        

        return $this->db->affected_rows();
        
    }

  
    public function get_paid_emis($loan_no) {
        // Fetch details of a specific approved loan
        $query = $this->db->get_where('approved_loans', array('loan_no' => $loan_no));
        $loan = $query->row_array();

        // Count the number of payment transactions for the given loan number
        $this->db->where('loan_no', $loan_no);
        $paid_emis_count = $this->db->count_all_results('payment_transactions');

        // Check if the number of paid EMIs matches the remaining EMIs in the approved loan
        $remaining_emis = $loan['number_of_emis'] - $loan['remaining_emis'];
        if ($paid_emis_count == $remaining_emis) {
            // Fetch all payment transactions for the given loan number with descending order of emi_no
            $this->db->order_by('emi_no', 'DESC');
            $query = $this->db->get_where('payment_transactions', array('loan_no' => $loan_no));
            return $query->result_array();
        } else {
            // If the count doesn't match, return an empty array
            return array('err'=>"Something Wrong Happen");
        }
    }

    public function get_unpaid_emis($loan_no) {
        // Fetch details of a specific approved loan
        $query = $this->db->get_where('approved_loans', array('loan_no' => $loan_no));
        $loan = $query->row_array();
        
    
        // Fetch loan type from the loan table
        $loan_type_query = $this->db->get_where('loan', array('loan_no' => $loan_no));
        $loan_type_row = $loan_type_query->row_array();
        
    
        // Get the loan type
        $loan_type = $loan_type_row['loan_type'];
  
        // Get the date of the upcoming EMI from the approved loan table
        $upcoming_emi_date = $loan['due_date'];
    
        // Fetch the maximum emi_no from payment_transactions table
        $this->db->select_max('emi_no');
        $this->db->where('loan_no', $loan_no);
        $query = $this->db->get('payment_transactions');
        $result = $query->row_array();
        $max_emi_no = $result['emi_no'];
    
        // Calculate the starting EMI number for unpaid EMIs
        $starting_emi = $max_emi_no + 1;
       
        // Calculate unpaid EMIs
        $unpaid_emis = array();
        if ($loan_type == 'Monthly') {
            // For monthly loans, calculate unpaid EMIs based on the loan duration in months
            for ($i = $starting_emi; $i <= $loan['number_of_emis']; $i++) {
                // Calculate due date for each unpaid EMI based on the upcoming EMI date
                if ($i == $starting_emi) {
                    // For the first unpaid EMI, use the saved upcoming EMI date
                    $due_date = $upcoming_emi_date;
                } else {
                    // For subsequent unpaid EMIs, increment the due date by one month
                    $due_date = date('Y-m-d', strtotime("+$i months", strtotime($upcoming_emi_date)));
                }
                // Check if the due date is within 3 days
                $is_due_near = $this->is_due_near($due_date);
                $unpaid_emis[] = array(
                    'start' => $i,
                    'date_approved' => $loan['date_approved'],
                    'emi_amount' => $loan['emi_amount'],
                    'due_date' => $due_date,
                    'is_due_near' => $is_due_near,
                );
            }
        } elseif ($loan_type == 'Weekly') {
            // For weekly loans, calculate unpaid EMIs based on the loan duration in weeks
            for ($i = $starting_emi; $i <= $loan['number_of_emis']; $i++) {
                // Calculate due date for each unpaid EMI based on the upcoming EMI date
                if ($i == $starting_emi) {
                    // For the first unpaid EMI, use the saved upcoming EMI date
                    $due_date = $upcoming_emi_date;
                } else {
                    // For subsequent unpaid EMIs, increment the due date by one week
                    $due_date = date('Y-m-d', strtotime("+$i weeks", strtotime($upcoming_emi_date)));
                }
                // Check if the due date is within 3 days
                $is_due_near = $this->is_due_near($due_date);
                $unpaid_emis[] = array(
                    'start' => $i,
                    'date_approved' => $loan['date_approved'],
                    'emi_amount' => $loan['emi_amount'],
                    'due_date' => $due_date,
                    'is_due_near' => $is_due_near,
                );
            }
        }
    
        return $unpaid_emis;
    }
    

    private function is_due_near($due_date) {
        // Calculate current date
        $current_date = strtotime(date('Y-m-d'));
        // Calculate due date
        $due_date = strtotime($due_date);
        // Calculate three days away date
        $three_days_away = strtotime('+3 days', $current_date);
        // Check if the due date is within 3 days
        return ($due_date <= $three_days_away) ? true : false;
    }

    public function paid($data){
        $this->db->set('status', 'Paid');
        $this->db->where('loan_no', $data);
        $this->db->update('approved_loans');

        $this->db->set('status', 'Paid');
        $this->db->where('loan_no', $data);
        $this->db->update('loan');
        return $this->db->affected_rows();
    }

}
?>