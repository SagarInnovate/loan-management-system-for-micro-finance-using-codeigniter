<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Borrowers extends CI_Controller
{

	public function check_auth()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect(base_url());
		}
	}

	public function create_borrowers()
	{

		$this->check_auth('create_borrowers');

		$title['title'] = "Navnirman -Create Borrowers";

		//get last account_no of client
		$account_no = $this->borrowers_model->get_account_id();

		if (is_null($account_no)) {

			$clients['acc_no'] = 1000;

			$this->load->view('templates/header', $title);
			$this->load->view('borrowers/create_borrowers', $clients);
		} else {
			$clients['acc_no'] = array('account_no' => $account_no['account_no']);

			$this->load->view('templates/header', $title);
			$this->load->view('borrowers/create_borrowers', $clients);
		}
	}

	public function new_borrowers()
	{

		$this->check_auth('create_borrowers');

		$title['title'] = "Navnirman -New Borrowers";

		$clients['new_clients'] = $this->borrowers_model->get_new_clients();
		// print_r($clients['new_clients']);

		$this->load->view('templates/header', $title);
		$this->load->view('borrowers/new_borrowers', $clients);
	}

	public function active_borrowers()
	{

		$title['title'] = "Navnirman -Active Borrowers";

		$this->check_auth('active_borrowers');

		$clients['active'] = $this->borrowers_model->get_active_clients();

		$this->load->view('templates/header', $title);
		$this->load->view('borrowers/active_borrowers', $clients);
	}

	public function borrowers_profile($account_no)
	{

		$this->check_auth('borrowers_profile');

		$result = $this->borrowers_model->get_profile($account_no);

		if (!is_null($result)) {

			$business = $this->borrowers_model->get_profile_bname($account_no);

			if (!is_null($business)) {
				$client['business'] = array('bname' => $business['business_name'], 
				'baddress' => $business['business_address'],
				'occupation' => $business['occupation'],
				'employment_status' => $business['employment_status'],
				'monthly_income' => $business['monthly_income']
			
			);
			}


			//$client['co_maker'] = $this->borrowers_model->get_co_maker($account_no);
			$client['loan'] = $this->borrowers_model->get_loan($account_no);

			$client['profile'] = array(
				'account_no' => $result['account_no'],
				'prof-img' => $result['profile_img'],
				'email' => $result['email'],
				'number1' => $result['number1'],
				'number2' => $result['number2'],
				'birthdate' => $result['birthdate'],
				'gender' => $result['gender'],
				'info' => $result['added_info'],
				'status' => $result['status'],
				// 'purok' => $result['purok_no'],
				'street' => $result['street'],
				'city' => $result['city'],
				'state' => $result['state'],
				'country' => $result['country'],
				'postal_code' => $result['postal_code'],
				'fname' => $result['firstname'],
				'mname' => $result['middlename'],
				'lname' => $result['lastname'],
				'name' => $result['name'],
				'father_name' => $result['father_name'],
				'mother_name' => $result['mother_name'],
				'literacy_level' => $result['literacy_level'],
				'marital_status' => $result['marital_status'],
				'relation' => $result['relation'],
				'adhar_no' => $result['adhar_no'],
				'pan_card_no' => $result['pan_card_no'],
				'expense_details' => $result['expense_details'],
				'adhar_uploaded_url' => $result['adhar_uploaded_url'],
				'pan_card_uploaded_url' => $result['pan_card_uploaded_url'],

				'aadhar_card_number' => $result['aadhar_card_number'],
				'electricity_bill_number' => $result['electricity_bill_number'],
				'pan_card_number' => $result['pan_card_number'],
				'application_form_number' => $result['application_form_number'],
				'aadhar_card_document' => $result['aadhar_card_document'],
				'pan_card_document' => $result['pan_card_document'],
				'electricity_bill_document' => $result['electricity_bill_document'],
				'application_form_document' => $result['application_form_document'],

				'bank_name' => $result['bank_name'],
				'ifsc_code' => $result['ifsc_code'],
				'passbook_no' => $result['passbook_no'],
				'branch_address' => $result['branch_address'],
				'passbook_url' => $result['passbook_url']


			);

			$title['title'] = "Profile-" . $result['firstname'] . ' ' . $result['middlename'] . ' ' . $result['lastname'];

			$this->load->view('templates/header', $title);
			$this->load->view('borrowers/profile', $client);
		} else {
			redirect(base_url('error404'));
		}
	}

	public function register_borrowers()
	{
		$validator = array('success' => false, 'messages' => array());
 // Begin transaction
 $this->db->trans_start();

		// Load upload library and configuration
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

		// Check if client_img file was uploaded successfully
		if ($this->upload->do_upload('client_img')) {
			// Retrieve upload data after successful upload
			$upload_data = $this->upload->data();
			$uploaded_url = base_url('uploads/' . $upload_data['file_name']);
		} else {
			// Error uploading client_img file or no file selected
			$uploaded_url = ""; // Set image URL as blank
			$validator['messages'][] = $this->upload->display_errors();
		}

		// Proceed to save client data
		$client_data = array(
			// personal info
			'account_no' => $this->input->post('account_no'),
			'client_img' => $uploaded_url,
			'mname' => $this->input->post('mname'),
			'gname' => $this->input->post('gname'),
			'lname' => $this->input->post('lname'),
			'email' => $this->input->post('email'),
			'number1' => $this->input->post('number1'),
			'number2' => $this->input->post('number2'),
			'street' => $this->input->post('street'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'postal_code' => $this->input->post('postal_code'),
			'birthdate' => $this->input->post('birthdate'),
			'gender' => $this->input->post('inlineRadioOptions'),
			'info' => $this->input->post('info'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'literacy_level' => $this->input->post('literacy_level'),
			'marital_status' => $this->input->post('marital_status'),
			// documents info
			'aadhar_card_number' => $this->input->post('aadhar_card_number'),
			'electricity_bill_number' => $this->input->post('electricity_bill_number'),
			'pan_card_number' => $this->input->post('pan_card_number'),
			'application_form_number' => $this->input->post('application_form_number'),
			'aadhar_card_document' => $this->input->post('aadhar_card_document'),
			'pan_card_document' => $this->input->post('pan_card_document'),
			'electricity_bill_document' => $this->input->post('electricity_bill_document'),
			'application_form_document' => $this->input->post('application_form_document'),
			'passbook_url' => $this->input->post('passbook_url'),
			'adhar_uploaded_url' => $this->input->post('adhar_uploaded_url'),
			'pan_card_uploaded_url' => $this->input->post('pan_card_uploaded_url'),
			// bank details
			'bank_name' => $this->input->post('bank_name'),
			'ifsc_code' => $this->input->post('ifsc_code'),
			'passbook_no' => $this->input->post('passbook_no'),
			'branch_address' => $this->input->post('branch_address'),
			// guarantors details
			'name' => $this->input->post('name'),
			'relation' => $this->input->post('relation'),
			'adhar_no' => $this->input->post('adhar_no'),
			'pan_card_no' => $this->input->post('pan_card_no'),
			'expense_details' => $this->input->post('expense_details'),
		);

		$insert_data = $this->borrowers_model->insert_client($client_data);

		if ($insert_data) {
			// Commit transaction
			$this->db->trans_complete();
			$validator['success'] = true;
			$validator['messages'][] = 'Successfully added!';
		} else {
			// Rollback transaction
			$this->db->trans_rollback();
			$validator['messages'][] = 'Something went wrong. Please contact the administrator';
		}
	
		echo json_encode($validator);
	}

	public function update_client()
	{
		 $validator = array('success' => false, 'messages' => array());
		 
			// Proceed to save client data
		$client_data = array(
			// personal info
			'account_no' => $this->input->post('account_no'),
			'mname' => $this->input->post('mname'),
			'gname' => $this->input->post('gname'),
			'lname' => $this->input->post('lname'),
			'email' => $this->input->post('email'),
			'number1' => $this->input->post('number1'),
			'number2' => $this->input->post('number2'),
			'street' => $this->input->post('street'),
			'city' => $this->input->post('city'),
			'state' => $this->input->post('state'),
			'postal_code' => $this->input->post('postal_code'),
			'birthdate' => $this->input->post('birthdate'),
			'gender' => $this->input->post('inlineRadioOptions'),
			'info' => $this->input->post('info'),
			'father_name' => $this->input->post('father_name'),
			'mother_name' => $this->input->post('mother_name'),
			'literacy_level' => $this->input->post('literacy_level'),
			'marital_status' => $this->input->post('marital_status'),
			// documents info
			'aadhar_card_number' => $this->input->post('aadhar_card_number'),
			'electricity_bill_number' => $this->input->post('electricity_bill_number'),
			'pan_card_number' => $this->input->post('pan_card_number'),
			'application_form_number' => $this->input->post('application_form_number'),
			'aadhar_card_document' => $this->input->post('aadhar_card_document'),
			'pan_card_document' => $this->input->post('pan_card_document'),
			'electricity_bill_document' => $this->input->post('electricity_bill_document'),
			'application_form_document' => $this->input->post('application_form_document'),
			'passbook_url' => $this->input->post('passbook_url'),
			'adhar_uploaded_url' => $this->input->post('adhar_uploaded_url'),
			'pan_card_uploaded_url' => $this->input->post('pan_card_uploaded_url'),
			// bank details
			'bank_name' => $this->input->post('bank_name'),
			'ifsc_code' => $this->input->post('ifsc_code'),
			'passbook_no' => $this->input->post('passbook_no'),
			'branch_address' => $this->input->post('branch_address'),
			// guarantors details
			'name' => $this->input->post('name'),
			'relation' => $this->input->post('relation'),
			'adhar_no' => $this->input->post('adhar_no'),
			'pan_card_no' => $this->input->post('pan_card_no'),
			'expense_details' => $this->input->post('expense_details'),
		);

		$updated_data = $this->borrowers_model->update_profile($client_data);

		if ($updated_data) {
			$validator['success'] = true;
			$validator['messages'][] = 'Update successfully!';
		} else {
			$validator['messages'][] = 'Something went wrong. Please contact the administrator';
		}

		echo json_encode($validator);
	}

	public function delete_clients()
	{
		$result = $this->borrowers_model->delete_clients($this->input->post('id'));
		if ($result) {
			echo "All client records has been deleted!";
		} else {
			echo "False";
		}
	}
}
