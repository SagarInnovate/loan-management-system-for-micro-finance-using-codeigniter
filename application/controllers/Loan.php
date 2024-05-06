<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan extends CI_Controller {

	public function check_auth(){
        if(!$this->session->userdata('logged_in')){
            redirect(base_url());
        }
    }

    public function create_loan($id=""){

    	$this->check_auth('create_loan');

    	$title['title'] = "Navnirman -Create Loan";

		//get last loan_no of client
		$loan_no = $this->loan_model->get_loan_no();

		$loan['verifier'] = $this->loan_model->get_verifier();
		$loan['collector'] = $this->loan_model->get_collector();

		if($id!=''){
			$loan['account_no'] = $id;
		}

		if(is_null($loan_no)){

			$loan['loan_no'] = 100;

			$this->load->view('templates/header',$title);
			$this->load->view('loan/create_loan', $loan);
			
		}else{
			$loan['loan_no'] = substr($loan_no['loan_no'], 1);

			$this->load->view('templates/header',$title);
			$this->load->view('loan/create_loan', $loan);
			
		}
    }

    public function new_loans(){

		$title['title'] = "Navnirman -New Loans";

		$this->check_auth('new_loans');


		$clients['verify'] = $this->loan_model->get_verified_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('loan/new_loans', $clients);
		
	}

	public function approved_loans(){

		$title['title'] = "Navnirman -Approved Loans";

		$this->check_auth('approve_loans');

		$clients['approved'] = $this->loan_model->get_approved_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('loan/approved_loan', $clients);
		
	}
	public function promissory($loan_no=""){

		$this->check_auth('approved_loans');

		$loan = $loan_no;

		if($loan != ''){

			$result['loan'] = $this->payments_model->get_loan_details($loan);

			if(!is_null($result)){

				$title['title'] = "Navnirman -Promissory Note";

				$result['cmaker'] = $this->borrowers_model->get_co_maker($result['loan']['account_no']);

				$this->load->view('templates/header',$title);
				$this->load->view('loan/promissory', $result);
				

			}else{
				redirect(base_url('error404'));
			}

		}
	}

	public function paid_loans(){
		$title['title'] = "Navnirman -Paid Loans";

		$this->check_auth('paid_loans');

		$clients['paid'] = $this->loan_model->get_paid_loan();

		$this->load->view('templates/header',$title);
		$this->load->view('loan/paid_loans', $clients);
		
	}

	public function rejected_loans(){

		$title['title'] = "Navnirman -Rejected Loans";

		$this->check_auth('rejected_loans');
		
		$clients['rejected'] = $this->loan_model->get_rejected_clients();

		$this->load->view('templates/header',$title);
		$this->load->view('loan/rejected_loan', $clients);
		
	}

    function send_email($name,$user_email,$amount,$b_name,$subject,$template){
			
		//setup SMTP configurion
		$config = Array(    
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'rf.servicing.corporation@gmail.com',
		  'smtp_pass' => 'CORPOration101',
		  'mailtype' => 'html',
		  'charset' => 'utf-8',
		  'TLS/SSL' => 'required'
		);

		$this->load->library('email', $config); // Load email template

		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$this->email->from($template, 'RFS Corporation');

		$data = array(
			'name' => $name,
			'amount' => $amount,
			'business' => $b_name
        );

		$this->email->to($user_email); // replace it with receiver email id
		$this->email->subject($subject); // replace it with email subject
		$message = $this->load->view($template,$data,TRUE);

		$this->email->message($message); 
		$this->email->send();

	}

	public function insert_loan() {
		// Initialize response array
		$response = array('success' => false, 'messages' => array(), 'email' => false);
	
		// Retrieve loan data from POST

		$loan_data = array(
			'loan_no' => $this->input->post('loan_no'),
			'full_name' => $this->input->post('full_name'),
			'account_no' => $this->input->post('account_no'),
			'collector' => $this->input->post('collector'),
			'verifier' => $this->input->post('verifier'),
			'date' => $this->input->post('date'),
			'email' => $this->input->post('email'),
			'amount' => $this->input->post('amount'),
			'interestRate' => $this->input->post('interestRate'),
			'loanType' => $this->input->post('loanType'),
			'duration' => $this->input->post('duration'),
			'occupation' => $this->input->post('occupation'),
			'employer' => $this->input->post('employer'),
			'employmentStatus' => $this->input->post('employmentStatus'),
			'monthlyIncome' => $this->input->post('monthlyIncome'),
			'address'=>$this->input->post('address')
		);

	
		
	
		// Retrieve notification preferences
		$email_notif = $this->input->post('email_notif');
		$loan_data['email_notif'] = $email_notif;
	
		// Insert loan data into the database
		$inserted = $this->loan_model->insert_loan($loan_data);
	
		if ($inserted) {
			// Check if email notification is requested and email is valid
			// if ($email_notif == 'yes' && filter_var($loan_data['email'], FILTER_VALIDATE_EMAIL)) {
			// 	// Send email notification
			// 	$subject = "Navnirman  Loan Application Verification";
			// 	$template = "templates/email_template";
			// 	$sendmail = $this->send_email($loan_data['full_name'], $loan_data['email'], $loan_data['amount'], $loan_data['business'], $subject, $template);
	
			// 	// Update response
			// 	if ($sendmail) {
			// 		$response['email'] = true;
			// 		$response['messages'] = 'Loan successfully registered. Email notification sent!';
			// 	} else {
			// 		$response['messages'] = 'Failed to send email notification. Loan successfully registered!';
			// 	}
			// } else {
				// Update response
				$response['messages'] = 'Loan successfully registered!';
			// }
	
			// Update borrower's data
			$this->loan_model->update_borrowers($loan_data['account_no']);
	
			// Update success flag
			$response['success'] = true;
		} else {
			// Update response
			$response['messages'] = 'Failed to register loan!';
		}
	
		// Return the response as JSON
		echo json_encode($response);
	}
	
			// ============= API is in trial ======================
			// $msg = "Hi, This is to notify you that your loan application is being process. From RFS Corporation.";
			// $apicode = "TR-Navnirman O761275_H4IDW";

			// if($sim1_notif == 'yes'){
			// 	$send_sms1 = $this->itexmo($sim1, $msg, $apicode);

			// 	if($send_sms1 == ''){

			// 		$validator['sim1'] = "Something went wrong. Please contact developer";

			// 	}elseif ($send_sms1 == 0) {

			// 		$validator['sim1'] = "SMS sent successfully!";
					
			// 	}else{
			// 		$validator['sim1'] = "SMS not sent.";
			// 	}

			// 	$validator['sim_1'] = true;
			// }

			// if ($sim2_notif == 'yes') {
			// 	$send_sms2 = $this->itexmo($sim2, $msg, $apicode);

			// 	if($send_sms == ''){

			// 		$validator['sim2'] = "Something went wrong. Please contact developer";

			// 	}elseif ($send_sms == 0) {

			// 		$validator['sim2'] = "SMS sent successfully!";

			// 	}else{
			// 		$validator['sim2'] = "SMS not sent.";
			// 	}
			// 	$validator['sim_2'] = true;
			// }

	

	public function account_query(){

		$data = array('success' => false, 'name' => array(), 'address' => array(), 'email' => array(), 'sim1' => array(), 'sim2' => array());

		$result = $this->claims_model->account_query($_POST['account_no']);

		if($result){

			$data['name'] = $result['firstname'].' '.$result['middlename'].' '.$result['lastname'];
			$data['address'] = $result['street'].', '.$result['city'].', '.$result['state'].', '.$result['postal_code'];
			$data['email'] = $result['email'];
			$data['sim1'] = $result['number1'];
			$data['sim2'] = $result['number2'];
			$data['success'] = true;

		}else{
			$data['success'] = false;
		}

		echo json_encode($data);
	}

	// ======== Send sms =========== 
	function itexmo($number,$message,$apicode){
			$passwd = '}%4$$m4ze{';
			$ch = curl_init();
			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode, 'passwd' => $passwd);
			curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			 curl_setopt($ch, CURLOPT_POSTFIELDS, 
			          http_build_query($itexmo));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			return curl_exec ($ch);
			curl_close ($ch);
	}

	
	
		public function approve_loan() {
			// Check if loan application exists for the provided loan ID
		
			$loan_id = $this->input->post('loan_id');
			$loan_exists = $this->loan_model->check_loan_exists($loan_id);
			
			
			if ($loan_exists) {
				// Retrieve loan details from loan application
				$loan_details = $this->loan_model->get_loan_details($loan_id);
				
				// Calculate values for approved loan
				$approved_loan_data = $this->calculate_approved_loan(
					$loan_details['loan_amount'],
					$loan_details['interest'],
					$loan_details['loan_type'],
					$loan_details['duration'],
					$loan_details['loan_no']
				);
				
				// Store approved loan data in the database
				$approval_result = $this->loan_model->approve_loan($approved_loan_data,$loan_id);
				
				if ($approval_result) {
					$response['messages'] = 'Loan Approved!';
					$response['success'] = true;
				} else {
					$response['messages'] = 'Something Went Wrong';
				}
			} else {
				$response['messages'] = 'Loan Application Not Found';
			}
			echo json_encode($response);
		}
	
		private function calculate_approved_loan($amount, $interest_rate, $loan_type, $duration,$loan_no) {
			// Initialize variables for important loan information
			$total_amount = $amount;
			$total_payable_amount = $amount + ($amount * ($interest_rate / 100));
	
			// Calculate loan term based on loan type
			if ($loan_type === 'Weekly') {
				$loan_term = $duration * 7; // Convert weeks to days
			} else {
				$loan_term = $duration * 30; // Convert months to days
			}
	
			// Calculate start date and end date
			$start_date = date('Y-m-d'); // Current date
			$end_date = date('Y-m-d', strtotime("+$loan_term days"));
	
			// Calculate monthly or weekly EMI
			if ($loan_type === 'Weekly') {
	
				$weekly_emi = $total_payable_amount / $duration; // Calculate weekly EMI
			} else {
				$monthly_emi = $total_payable_amount / $duration; // Calculate monthly EMI
			}
	
			// Prepare data for approved loan table
			$approved_loan_data = array(
				'loan_no' => $loan_no,
				'number_of_emis' => $duration,
				'remaining_emis' => $duration,
				'date_approved' => date('Y-m-d'),
				'loan_started' => $start_date,
				'end_date' => $end_date,
				'emi_amount' => ($loan_type === 'Weekly' ? $weekly_emi : $monthly_emi),
				'due_date' => date('Y-m-d'),
				'status' => 'Active'
			);
	
			// Return calculated values for approved loan table
			return $approved_loan_data;
		}
	
	




	public function reject_loan(){
		$result = $this->loan_model->reject_loan($this->input->post('id'),$this->input->post('reason'));
		if($result){
			echo "Loan rejected";
		}else{
			echo "False";
		}
	}

	public function remove_loan(){
		$result = $this->loan_model->remove_loan($this->input->post('id'));
		if($result){
			echo "Loan remove";
		}else{
			echo "False";
		}
		
	}
	public function cash_recieve(){

		$result = $this->loan_model->cash_recieve($this->input->post('id'));

		if($result){
			$this->loan_model->status_update($this->input->post('id'));
			echo "Cash released!";
		}else{
			echo "False";
		}
		
	}
	public function reapply_loan(){
		$result = $this->loan_model->reapply_loan($this->input->post('id'));
		if($result){
			echo "Loan successfully re-applied.";
		}else{
			echo "False";
		}
		
	}

}
?>
