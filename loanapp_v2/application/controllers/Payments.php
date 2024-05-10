<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payments extends CI_Controller {
	
	public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url());
        }
    }

	public function loan_details($loan_no = "") {
		$this->check_auth('borrowers_profile');
	
		if (!empty($loan_no)) {
			// Fetch loan details
			$loan_details = $this->payments_model->get_loan_details($loan_no);
	
			if (!empty($loan_details)) {
				// Fetch payment information
			
	
				// Fetch paid EMIs for the loan
				$paid_emis = $this->payments_model->get_paid_emis($loan_no);
	
				// Fetch unpaid EMIs for the loan
				$unpaid_emis = $this->payments_model->get_unpaid_emis($loan_no);
	
				// Pass data to the view
				$data['loan'] = $loan_details;
				$data['paid_emis'] = $paid_emis;
				$data['unpaid_emis'] = $unpaid_emis;
	
				$title['title'] = "Navnirman -Loan Details";
	
				$this->load->view('templates/header', $title);
				$this->load->view('payments/loan_payments', $data);
			} else {
				// Redirect to 404 page if loan details not found
				redirect(base_url('error404'));
			}
		} else {
			// Load view to search for loans if no loan number provided
			$title['title'] = "Navnirman -Search Loans";
	
			$this->load->view('templates/header', $title);
			$this->load->view('payments/loan_search');
		}
	}
	

	public function search_loan(){
		$validator = array('success' => false, 'loan' => array());

		$data = $this->input->post('loan_no');

		$result = $this->payments_model->get_loan_details($data);

		if(!is_null($result)){
			$validator['success'] = true;

			$validator['loan'] = array(
				'loan_no' => $result['loan_no'],
				'name' => $result['firstname'].' '.$result['middlename'].' '.$result['lastname'],
				'amount' => $result['loan_amount'],
				'date' => $result['date_approved']
			);

		}else{

			$validator['success'] = false;
			$validator['loan'] = "Loan number not found. Please check the number carefully!";
		}

		echo json_encode($validator);
	}

	public function pay_loan(){
		$validator = array('success' => false, 'message' => array());

		$data = $this->input->post();
		
		    $result = $this->payments_model->insert_payment($data);

			if($result){
				$validator['success'] = true;
				$validator['message'] = "Payment successfull!";

			}else{
				$validator['success'] = false;
				$validator['message'] = "Payment error!";
			}
		

			

		echo json_encode($validator);
	}

	public function fully_paid(){
		$data = array('success' => false, 'message' => array());

		$result = $this->payments_model->paid($this->input->post('loan_no'));

		if($result){

			$data['success'] = true;
			$data['message'] = "This loan is fully paid!";

		}else{
			$data['success'] = false;
			$data['message'] = "This loan is not fully paid!";
		}

		echo json_encode($data);
	}


	}
?>