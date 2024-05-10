<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentUpload extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary models, libraries, etc.
        $this->load->helper('url'); // Load URL helper for redirect
    }

    public function uploadAadharCard() {
        $upload_path = 'uploads/aadhar/';
        $uploaded_url= $this->upload_document($upload_path);
        $this->return_response($uploaded_url);
    }

    public function uploadPanCard() {
        $upload_path = 'uploads/pan/';
        $uploaded_url= $this->upload_document($upload_path);
        $this->return_response($uploaded_url);
    }

    public function uploadElectricityCard() {
        $upload_path = 'uploads/electricity/';
        $uploaded_url= $this->upload_document($upload_path);
        $this->return_response($uploaded_url);
    }

    public function uploadApplicationCard() {
        $upload_path = 'uploads/application/';
        $uploaded_url= $this->upload_document($upload_path);
        $this->return_response($uploaded_url);
    }
    public function uploadpassbookCard() {
        $upload_path = 'uploads/passbook/';
        $uploaded_url= $this->upload_document($upload_path);
        $this->return_response($uploaded_url);
    }

    public function uploadGAadharCard() {
        $upload_path = 'uploads/gaadhar/';
        $uploaded_url= $this->upload_document($upload_path);
        $this->return_response($uploaded_url);
    }

    public function uploadGPanCard() {
        $upload_path = 'uploads/gpan/';
        $uploaded_url= $this->upload_document($upload_path);
        $this->return_response($uploaded_url);
    }

    public function uploadProfileCard() {
        $upload_path = 'uploads/';
        $uploaded_url= $this->upload_document($upload_path);
        $this->return_response($uploaded_url);
    }

    private function upload_document($upload_path) {
        $response = array(); // Initialize response array

        if (isset($_FILES["file"]) && $_FILES["file"]['error'] === UPLOAD_ERR_OK) {
            $original_name = basename($_FILES["file"]["name"]);
            $extension = pathinfo($original_name, PATHINFO_EXTENSION); // Get file extension
            $new_filename = time() . '_' . $original_name ; // Unique filename with timestamp, original name, and extension
            
            $target_file = $upload_path . $new_filename;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // File uploaded successfully
                $response['success'] = true;
                $response['message'] = 'File uploaded successfully.';
                $response['file_url'] = $target_file; // Return the URL of the uploaded file
        
                // You can also return the file path or any other relevant information
            } else {
                // Error uploading file
                $error = error_get_last();
                $response['success'] = false;
                $response['message'] = 'Error uploading file: ' . $error['message'];
            }
        } else {
            // No file uploaded or error occurred
            $response['success'] = false;
            $response['message'] = 'No file uploaded or error occurred.';
        }

        // Send JSON response
       
        return $response;
    }

    private function return_response($data) {
        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($data);
    }
}
?>
