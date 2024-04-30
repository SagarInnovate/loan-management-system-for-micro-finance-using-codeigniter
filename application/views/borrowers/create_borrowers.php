<body class="">

    <?php $this->load->view('loading_screen'); ?>

    <div class="wrapper ">

        <!-- Top NavBar -->
        <?php $this->load->view('navigation/sidebar'); ?>
        <!-- End of NavBar -->

        <div class="main-panel">

            <!-- Navbar -->
            <?php $this->load->view('navigation/topbar'); ?>
            <!-- End Navbar -->

            <div class="content" style="margin-top:50px">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <?php $this->load->view('navigation/borrowers_navbar'); ?>

                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title">Create Borrowers Profile</h4>
                                            <p class="card-category">Complete your client information</p>
                                        </div>
                                        <div class="card-body">
                                            <form id="form-register" enctype="mutlipart/form-data" action="<?php echo base_url()."/register-borrowers" 
                                                                                                            ?>" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="form-group form-file-upload form-file-multiple ">
                                                                <input type="file" accept="image/*" onchange="loadFile(event)" class="inputFileHidden" name="client_img" id="client_img" required>
                                                                <div class="fileinput-new thumbnail img-raised text-center">
                                                                    <img class="img-fluid" id="output" src="<?php echo base_url(); ?>assets/images/person.png" alt="client-img" />
                                                                </div>
                                                                <div class="input-group mt-2">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                            <i class="material-icons">attach_file</i>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control inputFileVisible" placeholder="Choose client picture..">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Account
                                                                        no.</label>
                                                                    <?php if ($acc_no == 1000) { ?>
                                                                        <input type="number" class="form-control account_no" name="account_no" value="<?php echo $acc_no + 10000; ?>" readonly>
                                                                    <?php } else { ?>
                                                                        <input type="number" class="form-control account_no" name="account_no" value="<?php echo $acc_no['account_no'] + 1; ?>" readonly>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Last Name</label>
                                                                    <input type="text" class="form-control lname" name="lname" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">First Name</label>
                                                                    <input type="text" class="form-control gname" name="gname" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Middle
                                                                        Name</label>
                                                                    <input type="text" class="form-control mname" name="mname" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Father
                                                                        Name</label>
                                                                    <input type="text" class="form-control father" name="father_name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Mother
                                                                        Name</label>
                                                                    <input type="text" class="form-control mother" name="mother_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Email
                                                                        Address</label>
                                                                    <input type="email" class="form-control email" name="email" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <!-- <label class="bmd-label-floating" for="marital_status">Marital Status</label> -->
                                                                    <select class="form-control" id="marital_status" name="marital_status">
                                                                        <option value="" selected disabled>Select
                                                                            Marital Status</option>
                                                                        <option value="single">Single</option>
                                                                        <option value="married">Married</option>
                                                                        <option value="divorced">Divorced</option>
                                                                        <option value="widowed">Widowed</option>
                                                                        <!-- Add more options as needed -->
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Birthdate</label>
                                                                    <input type="text" class="form-control birthdate" name="birthdate" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Literacy
                                                                        Level</label>
                                                                    <input type="text" class="form-control literacy"  name="literacy_level"  required>
                                                                </div>
                                                            </div>


                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating mr-3">Gender</label>
                                                                    <div class="form-check form-check-radio form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input gender" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Male" required>
                                                                            Male
                                                                            <span class="circle">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-radio form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input gender" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Female" required> Female
                                                                            <span class="circle">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Contact
                                                                        Number</label>
                                                                    <input type="number" class="form-control number1" name="number1" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Contact Number
                                                                        (Optional)</label>
                                                                    <input type="number" class="form-control number2" name="number2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!-- <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Purok No.</label>
                                                            <input type="number" class="form-control purok_no" name="purok_no" required>
                                                        </div>
                                                    </div> -->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Street/Area</label>
                                                                    <input type="text" class="form-control street" name="street" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">City</label>
                                                                    <input type="text" class="form-control city" value="Nagpur" name="city" required>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">State</label>
                                                                    <input type="text" class="form-control state" name="state" value="maharashtra" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Country</label>
                                                                    <input type="text" class="form-control" disabled value="India">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Postal
                                                                        Code</label>
                                                                    <input type="number" class="form-control postal_code" value="440001" name="postal_code" required>
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="card">
                                                            <div class="card-header card-header-primary">
                                                                <div class="card-title">
                                                                    Ducuments
                                                                </div>
                                                                <p class="card-category">Upload Important Document Here
                                                                    :)</p>
                                                            </div>
                                                            <div class="card-body">


                                                            <div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Aadhar Card</h5>
                <div class="form-group">
                    <label class="bmd-label-floating">Aadhar Number</label>
                    <input type="text" class="form-control city" value="" name="aadhar_card_number" required>
                  
                </div>
                <input type="file" class="form-control" id="aadharFile" name="aadhar_card" accept="application/pdf" required>
                <div id="aadharSpinner" class="spinner" style="display: none;">Loading...</div>

               <b> <div id="aadharUploadMsg" style="color:green"></div></b> <!-- Upload message container -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload PAN Card</h5>
                <div class="form-group">
                    <label class="bmd-label-floating">PAN Number</label>
                    <input type="text" class="form-control city" value="" name="pan_card_number" required>
                   
                </div>
                <input type="file" class="form-control" id="panFile" name="pan_card" accept="application/pdf" required>
                <div id="panSpinner" class="spinner" style="display: none;">Loading...</div>




                <b><div id="panUploadMsg" style="color:green"></div></b> <!-- Upload message container -->
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Electricity Bill</h5>
                <div class="form-group">
                    <label class="bmd-label-floating">Electricity Bill Number</label>
                    <input type="text" class="form-control city" value="" name="electricity_bill_number" required>
                
                </div>
                <input type="file" class="form-control" id="electricityBillFile" name="electricity_bill" accept="application/pdf,image/*" required>
                <div id="electricitySpinner" class="spinner" style="display: none;">Loading...</div>
              
               
                <b><div id="electricityUploadMsg" style="color:green"></div></b> <!-- Upload message container -->
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Upload Application Form</h5>
                <div class="form-group">
                    <label class="bmd-label-floating">Application Number</label>
                    <input type="text" class="form-control city" value="" name="application_form_number" required>
                      </div>
                <input type="file" class="form-control" id="applicationFile" name="application" accept="application/pdf,image/*" required>
            
                <div id="applicationSpinner" class="spinner" style="display: none;">Loading...</div>
 
                <b>  <div id="applicationUploadMsg" style="color:green"></div></b> <!-- Upload message container -->
             
            </div>
        </div>
    </div>
</div>

<input type="hidden" id="aadhar_url" name="aadhar_card_document" value="">
<input type="hidden" id="pan_url" name="pan_card_document" value="">
<input type="hidden" id="electricity_url" name="electricity_bill_document" value="">
<input type="hidden" id="application_url" name="application_form_document" value="">
<input type="hidden" id="passbook_url" name="passbook_url" value="">
<input type="hidden" id="gaadhar_url" name="adhar_uploaded_url" value="">
<input type="hidden" id="gpan_url" name="pan_card_uploaded_url" value="">



                                                            </div>
                                                        </div>

                                                        <div class="card mt-5">
                                                            <div class="card-header card-header-primary ">
                                                                <div class="card-title">
                                                                Other Info :)
                                                                </div>
                                                                <p class="card-category"></p>
                                                            </div>
                                                            <div class="card-body">


                                                            <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Additional Info(Optional)</label>
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Write something about
                                                                    the client.. </label>
                                                                <textarea class="form-control info" name="info" rows="5"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                               
                                                               

                                                               


                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="card">
                                                            <div class="card-header card-header-primary">
                                                                <h4 class="card-title">Bank Details</h4>
                                                                <p class="card-category">Add Borrower Bank Details Here
                                                                </p>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                               
                                                                        <div class="row">

                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Bank
                                                                                        Name</label>
                                                                                    <input type="text" class="form-control" name="bank_name" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">IFSC
                                                                                        Code</label>
                                                                                    <input type="text" class="form-control" name="ifsc_code" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Account
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control" name="passbook_no" required>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Branch
                                                                                        Address</label>
                                                                                    <textarea class="form-control" rows="3" name="branch_address" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <div class="form-group form-file-upload form-file-multiple ">
                                                                                        <input type="file" accept="application/pdf,image/*" class="inputFileHidden" name="passbook" id="passbookFile" required>

                                                                                        <div class="input-group mt-2">
                                                                                            <span class="input-group-btn">
                                                                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                                                    <i class="material-icons">attach_file</i>
                                                                                                </button>
                                                                                            </span>
                                                                                            <div>
                                                                                            <input type="text" class="form-control inputFileVisible" placeholder="Choose Passbook picture..">
                                                                                        <div id="passbookSpinner" class="spinner" style="display:none ;">Loading...</div>
 
                                                                                    <b>  <div id="passbookUploadMsg" style="color:green"></div></b> <!-- Upload message container -->
                                                                                    </div>
                                                                                        </div>
                                                                                    </div>
                                                                                   
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card mt-5">
                                                            <div class="card-header card-header-primary">
                                                                <h4 class="card-title">Guarantors Details </h4>
                                                                <p class="card-category">Add Guarantors Details Below
                                                                </p>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="card-body">
                                                                   
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Name
                                                                                        of Guarantor</label>
                                                                                    <input type="text" class="form-control" name="name" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Relation
                                                                                        with Borrower</label>
                                                                                    <input type="text" class="form-control" name="relation" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Aadhar
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control" name="adhar_no" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <div class="form-group form-file-upload form-file-multiple ">
                                                                                        <input type="file" accept="application/pdf" class="inputFileHidden" name="gaadhar" id="gaadharFile" required>

                                                                                        <div class="input-group mt-2">
                                                                                            <span class="input-group-btn">
                                                                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                                                    <i class="material-icons">attach_file</i>
                                                                                                </button>
                                                                                            </span>
                                                                                            <div>
                                                                                            <input type="text" class="form-control inputFileVisible" placeholder="Choose Aadhar picture..">
                                                                                            <div id="gaadharSpinner" class="spinner" style="display:none ;">Loading...</div>
 
                                                                                            <b>  <div id="gaadharUploadMsg" style="color:green"></div></b> <!-- Upload message container -->
                                                                                            </div>
                                                                                       
                                                                                       
                                                                                       
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">PAN
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control" name="pan_card_no" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                          
                                                                                    <div class="form-group form-file-upload form-file-multiple ">
                                                                                        <input type="file" accept="application/pdf" class="inputFileHidden" name="gpan" id="gpanFile" required>

                                                                                        <div class="input-group mt-2">
                                                                                            <span class="input-group-btn">
                                                                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                                                    <i class="material-icons">attach_file</i>
                                                                                                </button>
                                                                                            </span>
                                                                                            <div>
                                                                                            <input type="text" class="form-control inputFileVisible" placeholder="Choose PAN picture..">
                                                                                            <div id="gpanSpinner" class="spinner" style="display: none;">Loading...</div>
 
 <b>  <div id="gpanUploadMsg" style="color:green"></div></b> <!-- Upload message container -->
 </div>
                                                                                        </div>
                                                                                    </div>
                                                                            
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Expense
                                                                                        Detail</label>
                                                                                    <textarea class="form-control" rows="3" name="expense_details" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                               
                                                <button class="btn btn-primary btn-round pull-right client-save"> <i class="material-icons">check_circle</i> Submit</button>
                                                <button class="btn btn-default btn-round pull-right cancel-create"><i class="material-icons">cancel</i> Cancel</button>
                                                <div class="clearfix"></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <?php $this->load->view('templates/change_pass') ?>
        <?php $this->load->view('templates/footer') ?>
</body>
<script type="text/javascript">
   document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded');

    document.getElementById('aadharFile').addEventListener('change', function() {
        console.log('Aadhar file changed');
        uploadDocument('aadhar', 'aadharFile', '#aadharUploadMsg');
    });

    document.getElementById('panFile').addEventListener('change', function() {
        console.log('PAN file changed');
        uploadDocument('pan', 'panFile', '#panUploadMsg');
    });

    document.getElementById('electricityBillFile').addEventListener('change', function() {
        console.log('Electricity bill file changed');
        uploadDocument('electricity', 'electricityBillFile',  '#electricityUploadMsg');
    });

    document.getElementById('applicationFile').addEventListener('change', function() {
        console.log('Application file changed');
        uploadDocument('application', 'applicationFile', '#applicationUploadMsg');
    });

    document.getElementById('passbookFile').addEventListener('change', function() {
        console.log('Passbook file changed');
        uploadDocument('passbook', 'passbookFile', '#passbookUploadMsg');
    });

    document.getElementById('gaadharFile').addEventListener('change', function() {
        console.log('Gurantors Aadhar file changed');
        uploadDocument('gaadhar', 'gaadharFile', '#gaadharUploadMsg');
    });

    document.getElementById('gpanFile').addEventListener('change', function() {
        console.log('Garantors PAN file changed');
        uploadDocument('gpan', 'gpanFile', '#gpanUploadMsg');
    });


    function uploadDocument(documentType, fileField, msgContainer) {
    console.log('Uploading document: ' + documentType);
    var fileInput = document.getElementById(fileField).files[0];
    console.log(fileInput);
    var formData = new FormData();
    formData.append('file', fileInput);
   
    
    var url = '<?php echo base_url("documentupload/upload") ?>' + documentType + 'card';
    console.log(url)
    var spinnerId = documentType + 'Spinner';
    var spinner = document.getElementById(spinnerId);
    spinner.style.display = 'block';

    fetch(url, {
        method: 'POST',
        body: formData
    })
    .then(function(response) {
        spinner.style.display = 'none';

        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }
        return response.json(); // Assuming the server returns JSON response
    })
    .then(function(data) {
        // Assuming the server returns the uploaded file URL in the response
        document.querySelector(msgContainer).innerHTML = data.message;
        // Set the uploaded file URL to the corresponding hidden input field
        document.getElementById(documentType + '_url').value = data.file_url;
    })
    .catch(function(error) {
        spinner.style.display = 'none';
        console.error('There was a problem with the fetch operation:', error.message);
    });
}

});

</script>
