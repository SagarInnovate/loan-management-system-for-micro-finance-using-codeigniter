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

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-avatar" style="height: 150px">

                                    <?php if (empty($profile['prof-img'])) { ?>
                                        <img class="img img-fluid" style="height:130px"
                                            src="<?php echo base_url() . 'assets/images/person.png' ?>" alt="client-img" />
                                    <?php } else { ?>
                                        <img class="img img-fluid" style="height:130px"
                                            src="<?php echo base_url() . 'uploads/' . $profile['prof-img']; ?>"
                                            alt="client-img" />
                                    <?php } ?>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title font-weight-bold">
                                        <?php echo $profile['fname'] . ' ' . $profile['mname'] . '. ' . $profile['lname']; ?>
                                    </h4>
                                    <h6 class="card-category text-gray">Account No. <span
                                            class="text-primary"><?php echo $profile['account_no']; ?></span></h6>
                                    <p class="card-description mt-3 font-weight-bold"><?php echo $profile['info']; ?></p>
                                    <table class="w-100">
                                        <tbody>
                                            <tr style="height:40px">
                                                <td class="font-weight-bold text-left">Contact No:</td>
                                                <td class="text-right"><?php echo $profile['number1']; ?></td>
                                            </tr>
                                            <tr style="height:40px">
                                                <td class="font-weight-bold text-left">Contact No:</td>
                                                <td class="text-right"><?php echo $profile['number2']; ?></td>
                                            </tr>
                                            <tr style="height:40px">
                                                <td class="font-weight-bold text-left">Email:</td>
                                                <td class="text-right"><?php echo $profile['email']; ?></td>
                                            </tr>
                                            <tr style="height:40px;">
                                                <td class="font-weight-bold text-left">Birthdate:</td>
                                                <td class="text-right">
                                                    <?php $time = strtotime($profile['birthdate']);
                                                    echo date("M d, Y", $time); ?>
                                                </td>
                                            </tr>
                                            <tr style="height:40px;">
                                                <td class="font-weight-bold text-left ">Gender:</td>
                                                <td class="text-right"><?php echo $profile['gender']; ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="text-center">
                                        <button class="btn btn-outline-primary btn-sm btn-round"
                                            data-target="#edit_profile" data-toggle="modal" rel="tooltip"
                                            title="Edit Profile">
                                            <i class="material-icons">edit</i> Update
                                        </button>
                                        <button
                                            onclick='location.href="<?php echo base_url() . 'loan/create-loan/' . $profile['account_no']; ?>"'
                                            class="btn btn-primary btn-sm btn-round" rel="tooltip" title="Apply Loan">
                                            <i class="material-icons">monetization_on</i> Apply Loan
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header border-bottom font-weight-bold text-primary">
                                    Address
                                </div>

                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold">Business Name</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-description font-weight-bold">
                                                <?php if (!empty($business['bname'])) { ?>
                                                    <?php echo $business['bname']; ?>
                                                <?php } else { ?>
                                                    No business name
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                    <h6 class="card-title font-weight-bold">Business Address</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-description font-weight-bold">
                                                <?php if (!empty($business['baddress'])) { ?>
                                                    <?php echo $business['baddress']; ?>
                                                <?php } else { ?>
                                                    No business address
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                    <h6 class="card-title font-weight-bold">Borrowers Address</h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-description font-weight-bold">
                                                <?php echo $profile['street'] . ', ' . $profile['city'] . ', ' . $profile['state'] . ', ' . $profile['country'] . ' ' . $profile['postal_code']; ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-8">

                            <div class="card ">
                                <div class="card-header card-header-primary row">
                                    <div class="col-md-6">
                                    <div class="card-title">
                                       Profile Info</div>
                                    <p class="card-category">Detailed Account Info</p>
                                </div>
                               
                                <div class="col-md-6">
                                <div class="container  text-center">
                                <button class="btn btn-light btn-lg rounded-pill text-white" style="background-color: #ff3374; border-color: #ff3374;" data-toggle="modal" data-target="#loanInfoModal">Loan Information</button>
 </div></div></div>
                                <div class="card-body">

                                <div class="container">
        <h2 class="text-center mb-4">Borrower Details</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Personal Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Mother Name:</strong> <span id="mother-name"><?php echo $profile['mother_name']; ?></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Father Name:</strong> <span id="father-name"><?php echo $profile['father_name']; ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Marital Status:</strong> <span id="marital-status"><?php echo $profile['marital_status']; ?></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Birthdate:</strong> <span id="birthdate"><?php echo $profile['birthdate']; ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Literacy Level:</strong> <span id="literacy-level"><?php echo $profile['literacy_level']; ?></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Gender:</strong> <span id="gender"><?php echo $profile['gender']; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Documents</h3>
                        <p><strong>Aadhar Number:</strong> <span id="aadhar-number"><?php echo $profile['aadhar_card_number']; ?></span> <a href="#" class="view-document" data-toggle="modal" data-target="#viewFileModal" data-file="<?php echo base_url().$profile['aadhar_card_document']; ?>">View Document</a></p>
                        <p><strong>PAN Number:</strong> <span id="pan-number"><?php echo $profile['pan_card_number']; ?></span> <a href="#" class="view-document" data-toggle="modal" data-target="#viewFileModal" data-file="<?php echo base_url().$profile['pan_card_document']; ?>">View Document</a></p>
                        <p><strong>Electricity Bill No:</strong> <span id="electricity-bill"><?php echo $profile['electricity_bill_number']; ?></span> <a href="#" class="view-document" data-toggle="modal" data-target="#viewFileModal" data-file="<?php echo base_url().$profile['electricity_bill_document']; ?>">View Document</a></p>
                        <p><strong>Application Form:</strong><span id="application-number"><?php echo $profile['application_form_number']; ?></span>  <a href="#" class="view-document" data-toggle="modal" data-target="#viewFileModal" data-file="<?php echo base_url().$profile['application_form_document']; ?>">View Document</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Bank Details</h3>
                        <p><strong>Bank Name:</strong> <span id="bank-name"><?php echo $profile['bank_name']; ?></span></p>
                        <p><strong>IFSC Code:</strong> <span id="ifsc-code"><?php echo $profile['ifsc_code']; ?></span></p>
                        <p><strong>Account Number:</strong> <span id="account-number"><?php echo $profile['passbook_no']; ?></span></p>
                        <p><strong>Address:</strong> <span id="bank-address"><?php echo $profile['branch_address']; ?></span></p>
                        <p><strong>Passbook:</strong> <a href="#" class="view-document" data-toggle="modal" data-target="#viewFileModal" data-file="<?php echo site_url().$profile['passbook_url']; ?>">View Document</a></p>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title font-weight-bold">Guarantor Details</h3>
                        <p><strong>Name of Guarantor:</strong> <span id="guarantor-name"><?php echo $profile['name']; ?></span></p>
                        <p><strong>Relation with Borrower:</strong> <span id="relation"><?php echo $profile['relation']; ?></span></p>
                        <p><strong>Guarantor's Aadhar:</strong> <span id="guarantor-aadhar"><?php echo $profile['adhar_no']; ?></span> <a href="#" class="view-document" data-toggle="modal" data-target="#viewFileModal" data-file="<?php echo site_url().$profile['adhar_uploaded_url']; ?>">View Document</a></p>
                        <p><strong>Guarantor's PAN:</strong> <span id="guarantor-pan"><?php echo $profile['pan_card_no']; ?></span> <a href="#" class="view-document" data-toggle="modal" data-target="#viewFileModal" data-file="<?php echo site_url().$profile['pan_card_uploaded_url']; ?>">View Document</a></p>
                        <p><strong>Expense Details:</strong> <span id="expense"><?php echo $profile['expense_details']; ?></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                                   
                                </div>
                            </div>


                            <!-- <div class="card">
                                <div class="card-header border-bottom font-weight-bold text-primary">Loan History</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm" id="loan_history">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th>Loan No.</th>
                                                    <th>Loan Amount</th>
                                                    <th>Status</th>
                                                    <th>Due Date</th>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($loan)) { ?>
                                                    <?php foreach ($loan as $key => $value) { ?>
                                                        <tr>
                                                            <td><a
                                                                    href="<?php echo base_url() . 'payments/loan-details/' . $value['loan_no']; ?>"><?php echo $value['loan_no']; ?></a>
                                                            </td>
                                                            <td><?php echo $value['loan_amount']; ?></td>
                                                            <td><?php echo $value['loan_stat']; ?></td>
                                                            <td><?php $time = $value['due_date'];
                                                            echo date('M. d, Y', strtotime($time)); ?>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div> -->
<!-- model for info of loans -->
<div class="modal fade" id="loanInfoModal" tabindex="-1" role="dialog" aria-labelledby="loanInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loanInfoModalLabel">Loan Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your modal content here -->
                    <div class="card">
                                <div class="card-header border-bottom font-weight-bold text-primary">Loan History</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm" id="loan_history">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th>Loan No.</th>
                                                    <th>Loan Amount</th>
                                                    <th>Status</th>
                                                    <th>Due Date</th>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($loan)) { ?>
                                                    <?php foreach ($loan as $key => $value) { ?>
                                                        <tr>
                                                            <td><a
                                                                    href="<?php echo base_url() . 'payments/loan-details/' . $value['loan_no']; ?>"><?php echo $value['loan_no']; ?></a>
                                                            </td>
                                                            <td><?php echo $value['loan_amount']; ?></td>
                                                            <td><?php echo $value['loan_stat']; ?></td>
                                                            <td><?php $time = $value['due_date'];
                                                            echo date('M. d, Y', strtotime($time)); ?>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- Add any additional buttons here -->
                </div>
            </div>
        </div>
    </div>

                          
                            <!-- Modal for edit profile-->
                            <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static"
                                data-keyboard="false">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document" styel=" overflow-y: initial !important">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold text-primary">Update Profile</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style=" height: 80vh;
    overflow-y: auto;">
                                            <form id="update_form" enctype="mutlipart/form-data" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div
                                                                class="form-group form-file-upload form-file-multiple ">
                                                                <input type="file" accept="image/*"
                                                                    onchange="loadFile(event)" name="img"
                                                                    class="inputFileHidden" s required>
                                                                <div
                                                                    class="fileinput-new thumbnail img-raised text-center">
                                                                    <?php if (empty($loan['profile_img'])) { ?>
                                                                        <img class="border-round"
                                                                            src="<?php echo base_url() . 'assets/images/person.png' ?>"
                                                                            width="250" />
                                                                    <?php } else { ?>
                                                                        <img class="img-fluid" width="250" id="output"
                                                                            src="<?php echo base_url() . 'uploads/' . $profile['prof-img']; ?>"
                                                                            alt="client-img" />
                                                                    <?php } ?>
                                                                    <!--  <img class="img-fluid" id="output" src="<?php echo base_url() . 'uploads/' . $profile['prof-img']; ?>" alt="client-img" /> -->
                                                                </div>
                                                                <div class="input-group mt-2">
                                                                    <span class="input-group-btn">
                                                                        <button type="button"
                                                                            class="btn btn-fab btn-round btn-primary">
                                                                            <i class="material-icons">attach_file</i>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text"
                                                                        class="form-control inputFileVisible"
                                                                        placeholder="Choose client picture..">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control"
                                                                        name="account_no"
                                                                        value="<?php echo $profile['account_no']; ?>">
                                                                    <label class="bmd-label-floating">First Name</label>
                                                                    <input type="text" class="form-control" name="fname"
                                                                        value="<?php echo $profile['fname']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Middle
                                                                        Name</label>
                                                                    <input type="text" class="form-control" name="mname"
                                                                        value="<?php echo $profile['mname']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Last Name</label>
                                                                    <input type="text" class="form-control" name="lname"
                                                                        value="<?php echo $profile['lname']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Contact
                                                                        Number</label>
                                                                    <input type="number" class="form-control"
                                                                        name="num1"
                                                                        value="<?php echo $profile['number1']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Contact
                                                                        Number</label>
                                                                    <input type="number" class="form-control"
                                                                        name="num2"
                                                                        value="<?php echo $profile['number2']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Email
                                                                        Address</label>
                                                                    <input type="email" class="form-control"
                                                                        name="email"
                                                                        value="<?php echo $profile['email']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Birthday</label>
                                                                    <input type="date" class="form-control" name="bday"
                                                                        value="<?php echo $profile['birthdate']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Gender</label>
                                                                    <input type="text" class="form-control"
                                                                        name="gender"
                                                                        value="<?php echo $profile['gender']; ?>"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row mt-1">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Additional Info(Optional)</label>
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Write something about
                                                                    the client.. </label>
                                                                <textarea class="form-control" name="info"
                                                                    rows="5"><?php echo $profile['info']; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>




                                            <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title">Create Borrowers Profile</h4>
                                            <p class="card-category">Complete your client information</p>
                                        </div>
                                        <div class="card-body">
                                            <form id="form-register" enctype="mutlipart/form-data" action="<?php //echo base_url()."/register-borrowers" 
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
                                                                    <input type="text" class="form-control literacy " name="literacy " required>
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
                                                                                <h5 class="card-title">Upload Aadhar
                                                                                    Card</h5>
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Aadhar
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control city" value="" name="aadhar_no" required>
                                                                                </div>
                                                                                <input type="file" class="form-control" name="aadhar_card" accept="application/pdf" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Upload PAN Card
                                                                                </h5>
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">PAN
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control city" value="" name="pan_card_no" required>
                                                                                </div>
                                                                                <input type="file" class="form-control" name="pan_card" accept="application/pdf" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Upload
                                                                                    Electricity Bill</h5>
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Aadhar
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control city" value="" name="electricity_bill_no" required>
                                                                                </div>
                                                                                <input type="file" class="form-control" name="electricity_bill" accept="application/pdf,image/*" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <h5 class="card-title">Application Form
                                                                                </h5>
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Application
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control city" value="" name="app_no" required>
                                                                                </div>
                                                                                <input type="file" class="form-control" name="application" accept="application/pdf,image/*" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>


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
                                                                    <form id="bank-details-form" enctype="multipart/form-data">
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
                                                                                    <input type="text" class="form-control" name="account_number" required>
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
                                                                                        <input type="file" accept="application/pdf,image/*" class="inputFileHidden" name="client_img" id="client_img" required>

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
                                                                        </div>


                                                                    </form>
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
                                                                    <form id="guarantor-details-form" enctype="multipart/form-data">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Name
                                                                                        of Guarantor</label>
                                                                                    <input type="text" class="form-control" name="guarantor_name" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Relation
                                                                                        with Borrower</label>
                                                                                    <input type="text" class="form-control" name="relation_with_borrower" required>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Aadhar
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control" name="gaadhar_number" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                            <div class="form-group form-file-upload form-file-multiple ">
                                                                                        <input type="file" accept="application/pdf,image/*" class="inputFileHidden" name="gaadharn_photo" id="gaadhar_photo" required>

                                                                                        <div class="input-group mt-2">
                                                                                            <span class="input-group-btn">
                                                                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                                                    <i class="material-icons">attach_file</i>
                                                                                                </button>
                                                                                            </span>
                                                                                            <input type="text" class="form-control inputFileVisible" placeholder="Choose PAN picture..">
                                                                                        </div>
                                                                                    </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">PAN
                                                                                        Number</label>
                                                                                    <input type="text" class="form-control" name="gpan_number" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                          
                                                                                    <div class="form-group form-file-upload form-file-multiple ">
                                                                                        <input type="file" accept="application/pdf,image/*" class="inputFileHidden" name="gpan_photo" id="gpan_photo" required>

                                                                                        <div class="input-group mt-2">
                                                                                            <span class="input-group-btn">
                                                                                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                                                    <i class="material-icons">attach_file</i>
                                                                                                </button>
                                                                                            </span>
                                                                                            <input type="text" class="form-control inputFileVisible" placeholder="Choose PAN picture..">
                                                                                        </div>
                                                                                    </div>
                                                                            
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label class="bmd-label-floating">Expense
                                                                                        Detail</label>
                                                                                    <textarea class="form-control" rows="3" name="expense_detail" required></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>
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
                                        
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-round"
                                                data-dismiss="modal"><i class="material-icons">cancel</i>
                                                Cancel</button>
                                            <button type="submit" class="btn btn-primary btn-round" id="update_profile">
                                                <i class="material-icons">check_circle</i> Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of modal -->
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <!-- model for view document  -->
        <div class="modal fade" id="viewFileModal" tabindex="-1" role="dialog" aria-labelledby="viewFileModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewFileModalLabel">View File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display PDF or Image here -->

                    <embed id="fileViewer" src="" width="100%" height="600px" type="application/pdf">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
     document.addEventListener("DOMContentLoaded", function() {
    // Get all view file buttons
    var viewFileButtons = document.querySelectorAll(".view-document");

    // Add click event listener to each button
    viewFileButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            // Prevent default link behavior
            event.preventDefault();

            // Get the data-file attribute value
            var file = this.getAttribute("data-file");

            // Update the src attribute of the embed tag
            var fileViewer = document.getElementById("fileViewer");
            fileViewer.setAttribute("src", file);
        });
    });
});

    </script>
        <!-- end model -->
        <?php $this->load->view('templates/change_pass') ?>
        <?php $this->load->view('templates/footer') ?>
</body>