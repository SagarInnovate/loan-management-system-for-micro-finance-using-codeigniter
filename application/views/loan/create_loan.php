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

                            <?php $this->load->view('navigation/loan_navbar'); ?>

                            <div class="tab-content tab-space">

                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title">Loan Application Form</h4>
                                            <p class="card-category">Complete the loan application form</p>
                                        </div>
                                        <div class="card-body form-body mt-2">
                                            <form id="loan-form" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Loan No</label>
                                                                    <?php if ($loan_no == 100) { ?>
                                                                        <input type="text" class="form-control loan_no"
                                                                            name="loan" value="L<?php echo 1000; ?>"
                                                                            readonly>
                                                                    <?php } else { ?>
                                                                        <input type="text" class="form-control loan_no"
                                                                            name="loan_no" value="L<?php echo $loan_no + 1; ?>"
                                                                            readonly>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="input-group no-border">
                                                                    <?php if (isset($account_no)) { ?>
                                                                        <input type="text" value="<?php echo $account_no ?>"
                                                                            class="form-control accnt_no " name="account_no"
                                                                            placeholder="Account no" autofocus required>
                                                                    <?php } else { ?>
                                                                        <input type="text" value=""
                                                                            class="form-control accnt_no " name="account_no"
                                                                            placeholder="Account no" autofocus required>
                                                                    <?php } ?>
                                                                    <button type="submit"
                                                                        class="btn btn-primary btn-round btn-just-icon search_account">
                                                                        <i class="material-icons">search</i>
                                                                        <div class="ripple-container"></div>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <select id="inputState1" name="collector"
                                                                        class="form-control collector" required>
                                                                        <option disabled selected>Choose collector...
                                                                        </option>
                                                                        <?php foreach ($collector as $key => $collect) {
                                                                            if (!empty($collect)) { ?>
                                                                                <option
                                                                                    value="<?php echo $collect['username']; ?>">
                                                                                    <?php echo $collect['firstname']; ?>
                                                                                </option>
                                                                            <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <select id="inputState" name="verifier"
                                                                        class="form-control verifier" required>
                                                                        <option disabled selected>Verified by...
                                                                        </option>
                                                                        <?php
                                                                        foreach ($verifier as $key => $verified) { ?>

                                                                            <?php if (!empty($verified)) { ?>
                                                                                <option
                                                                                    value="<?php echo $verified['username']; ?> ">
                                                                                    <?php echo $verified['firstname']; ?>
                                                                                </option>
                                                                            <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Date</label>
                                                                    <input type="date" class="form-control date"
                                                                        name="date" value="<?php echo date('Y-m-d'); ?>"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group input-group-prepend">
                                                                    <span class="input-group-text">₹</span>
                                                                    <label for="amount"
                                                                        class="bmd-label-floating pl-3">Loan
                                                                        Amount</label>
                                                                    <input type="number" min="0.01" step="0.01"
                                                                        
                                                                        class="form-control text-right amount font-weight-bold"
                                                                        id="amount" name="amount" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="interestRate"
                                                                        class="bmd-label-floating">Interest Rate
                                                                        (%)</label>
                                                                    <input type="number" class="form-control"
                                                                        id="interestRate" name="interestRate" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label for="loanType"
                                                                        class="bmd-label-floating">Loan Type</label>
                                                                    <select class="form-control" id="loanType"
                                                                        name="loanType" required>
                                                                        <option value="Weekly">Weekly</option>
                                                                        <option value="Monthly">Monthly</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="duration"
                                                                        class="bmd-label-floating">Loan Duration</label>
                                                                    <select class="form-control" id="duration"
                                                                        name="duration" required>
                                                                        <!-- Options will be dynamically populated based on loan type selection -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">

                                                                    <button class="btn btn-primary btn-round btn-sm"
                                                                        onclick="calculateLoan()" rel="tooltip"
                                                                        title="Calculate Loans">
                                                                        <i class="material-icons">verified_user</i>
                                                                        Calculate
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3 mb-2">
                                                            <h6 class="card-title">Borrowers Information</h6>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <!-- <label class="control-label">Full Name</label> -->
                                                                    <input type="text" class="form-control full_name"
                                                                        placeholder="Full Name" name="fullname"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <!-- <label class="bmd-label-floating">Current Address</label> -->
                                                                    <input type="text" placeholder="Current Address"
                                                                        class="form-control address" name="address"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <!-- <label class="bmd-label-floating">Email</label> -->
                                                                    <input type="email" placeholder="Email"
                                                                        class="form-control email" name="email"
                                                                        readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <!-- <label class="bmd-label-floating">SIM1-Contact No</label> -->
                                                                    <input type="text" placeholder="SIM1-Contact No"
                                                                        class="form-control sim1" name="sim1" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <!-- <label class="bmd-label-floating">SIM2-Contact No</label> -->
                                                                    <input type="text" placeholder="SIM2-Contact No"
                                                                        class="form-control sim2" name="sim2" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2" rel="tooltip"
                                                                        id="email-toggle"
                                                                        title="Send Email Notification"
                                                                        onclick="email(this)"></i>
                                                                    Send Email Notification
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2"
                                                                        onclick="sim1(this)" id="sim1-toggle"
                                                                        rel="tooltip" title="Send SMS Notification"></i>
                                                                    Send SIM1 Notification
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2"
                                                                        onclick="sim2(this)" id="sim2-toggle"
                                                                        rel="tooltip" title="Send SMS Notification"></i>
                                                                    Send SIM2 Notification
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mt-3 mb-2">
                                                            <h6 class="card-title">Employment Details</h6>
                                                        </div>

                                                        <div class="row">

                                                          
                                                            
                                                            <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating" for="occupation">Occupation</label>
                                                                <input type="text" class="form-control" id="occupation"
                                                                    name="occupation" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                   <div class="form-group">
                                                                <input type="text" class="form-control" id="employer"
                                                                    name="employer" required>
                                                                <label class="bmd-label-floating" for="employer">Company/Business/College Name</label>
                                                            </div> 
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                   <div class="form-group">
                                                                <select class="form-control" id="employmentStatus"
                                                                    name="employmentStatus" required>
                                                                    <option value="" selected disabled>Select Employment
                                                                        Status</option>
                                                                    <option value="Full-time">Full-time</option>
                                                                    <option value="Part-time">Part-time</option>
                                                                    <option value="Self-employed">Self-employed</option>
                                                                    <option value="student">Student</option>
                                                                    <!-- Add more options if needed -->
                                                                </select>
                                                                
                                                            </div> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                <div class="form-group">
                                                                <input type="number" class="form-control"
                                                                    id="monthlyIncome" name="monthlyIncome" required>
                                                                <label for="monthlyIncome" class="bmd-label-floating">Monthly Income</label>
                                                            </div>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>

                                                        <div class="row bs">

                                                            <div class="col-md-8">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating">Address</label>
                                                                    <input type="text" class="form-control street1"
                                                                        name="address" required>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                     
                                                     
                                                    </div>
                                                </div>
                                              
                                                   
                                                <div class="mt-2">
                                                    <button 
                                                        class="btn btn-primary btn-round pull-right create-loan"><i
                                                            class="material-icons">check_circle</i> Submit</button>
                                                    <button
                                                        class="btn btn-default btn-round pull-right cancel-create-loan"><i
                                                            class="material-icons">cancel</i> Cancel</button>
                                                </div>
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


    </div>


    <!-- modal for loan schedule -->
    <div class="modal fade" id="loanModal" tabindex="-1" role="dialog" aria-labelledby="loanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loanModalLabel">Loan Schedule</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p><strong>Loan Amount:</strong> <span id="loanAmount"></span></p>
                            <p><strong>Total Payable Amount:</strong> <span id="totalPayableAmount"></span></p>
                            <p><strong>Loan Duration:</strong> <span id="loanDuration"></span></p>
                            <p><strong>Type of Loan:</strong> <span id="loanTypeDisplay"></span></p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Start Date:</strong> <span id="startDate"></span></p>
                            <p><strong>End Date:</strong> <span id="endDate"></span></p>
                            <p><strong>Interest Rate:</strong> <span id="interestRateDisplay"></span></p>
                            <p><strong>Interest Rate Amount:</strong> <span id="interestRateAmount"></span></p>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>EMI Date</th>
                                <th>Principal Amount</th>
                                <th>Total EMI Amount</th>
                                <th>Remaining EMI Amount</th>
                            </tr>
                        </thead>
                        <tbody id="loanTableBody"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- end modal -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var loanTypeSelect = document.getElementById('loanType');
            var durationSelect = document.getElementById('duration');

            // Function to populate duration options based on loan type
            function populateDurationOptions() {
    durationSelect.innerHTML = '';
    var loanType = loanTypeSelect.value;
    var durationOptions = loanType === 'Weekly' ? ['50 weeks', '100 weeks'] : ['12 months', '24 months'];
    var durationValues = loanType === 'Weekly' ? [50, 100] : [12, 24]; // Numeric values array
    durationOptions.forEach(function (option, index) {
        var optionElement = document.createElement('option');
        optionElement.textContent = option;
        optionElement.value = durationValues[index]; // Assign the numeric value to the 'value' attribute
        durationSelect.appendChild(optionElement);
    });
}
            // Populate duration options when the loan type changes
            loanTypeSelect.addEventListener('change', function () {
                populateDurationOptions();
            });

            // Populate initial duration options on page load
            populateDurationOptions();
        });
    </script>
    <script>
        function calculateLoan() {
            // Get values from form fields
            var amount = parseFloat(document.getElementById('amount').value);
            var interestRate = parseFloat(document.getElementById('interestRate').value);
            var loanType = document.getElementById('loanType').value;
            var duration = parseInt(document.getElementById('duration').value);

            // Initialize loan schedule array
            var loanSchedule = [];

            // Initialize variables for important loan information
            var totalAmount, totalPayableAmount, loanTerm, startDate, endDate;

            // Calculate total payable amount (including interest)
            totalAmount = amount;
            totalPayableAmount = amount + (amount * (interestRate / 100));

            // Calculate loan term based on loan type
            if (loanType === 'Weekly') {
                loanTerm = duration * 7; // Convert weeks to days
            } else {
                loanTerm = duration * 30; // Convert months to days
            }

            // Calculate start date and end date
            startDate = new Date().toLocaleDateString(); // Current date
            endDate = new Date();
            endDate.setDate(endDate.getDate() + loanTerm);

            // Display important loan information
            document.getElementById('loanAmount').innerText = '₹' + totalAmount.toFixed(2);
            document.getElementById('totalPayableAmount').innerText = '₹' + totalPayableAmount.toFixed(2);
            document.getElementById('loanDuration').innerText = duration + ' ' + (loanType === 'Weekly' ? 'weeks' : 'months');
            document.getElementById('loanTypeDisplay').innerText = loanType.charAt(0).toUpperCase() + loanType.slice(1); // Capitalize first letter
            document.getElementById('startDate').innerText = startDate;
            document.getElementById('endDate').innerText = endDate.toLocaleDateString();
            document.getElementById('interestRateDisplay').innerText = interestRate + '%';
            document.getElementById('interestRateAmount').innerText = '₹' + (totalPayableAmount - totalAmount).toFixed(2);

            // Generate loan schedule
            if (loanType === 'Weekly') {
                // Calculate total weeks
                var weeklyEmi = totalPayableAmount / duration; // Calculate weekly EMI

                // Generate loan schedule on a weekly basis
                for (var i = 0; i < duration; i++) {
                    var emiDate = new Date();
                    emiDate.setDate(emiDate.getDate() + i * 7); // Increment date by 7 days (1 week)

                    loanSchedule.push({
                        emiDate: emiDate.toLocaleDateString(),
                        principalAmount: (amount / duration).toFixed(2),
                        totalEmiAmount: weeklyEmi.toFixed(2),
                        remainingEmiAmount: (totalPayableAmount - weeklyEmi * i).toFixed(2)
                    });
                }
            } else {
                var monthlyEmi = totalPayableAmount / duration; // Calculate monthly EMI

                // Generate loan schedule on a monthly basis
                for (var j = 1; j <= duration; j++) {
                    var emiDate = new Date();
                    emiDate.setMonth(emiDate.getMonth() + j); // Increment date by 1 month

                    loanSchedule.push({
                        emiDate: emiDate.toLocaleDateString(),
                        principalAmount: (amount / duration).toFixed(2),
                        totalEmiAmount: monthlyEmi.toFixed(2),
                        remainingEmiAmount: (totalPayableAmount - monthlyEmi * (j - 1)).toFixed(2)
                    });
                }
            }

            // Call the function to populate the loan table in the modal
            populateLoanTable(loanSchedule);
        }

        function populateLoanTable(loanSchedule) {
            // Get the table body element
            var tbody = document.getElementById('loanTableBody');

            // Clear existing table rows
            tbody.innerHTML = '';

            // Populate the table with loan data
            loanSchedule.forEach(function (loan) {
                var row = `<tr>
                        <td>${loan.emiDate}</td>
                        <td>₹${loan.principalAmount}</td>
                        <td>₹${loan.totalEmiAmount}</td>
                        <td>₹${loan.remainingEmiAmount}</td>
                    </tr>`;
                tbody.innerHTML += row;
            });

            // Show the loan modal
            $('#loanModal').modal('show');
        }



    </script>
    <?php $this->load->view('templates/change_pass') ?>
    <?php $this->load->view('templates/footer') ?>
</body>