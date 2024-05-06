<body class="">
<?php $this->load->view('loading_screen');?>
    <div class="wrapper ">

        <!-- Top NavBar -->
        <?php $this->load->view('navigation/sidebar');?>
        <!-- End of NavBar -->

        <div class="main-panel">

        <!-- Navbar -->
        <?php $this->load->view('navigation/topbar');?>
        <!-- End Navbar -->

        <div class="content">
            
            <div class="container-fluid">
                        <div class="row" style="margin-top: -50px;">
                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-header border-bottom row">
                                        <div class="col-md-8">
                                            <h4 class=" font-weight-bold text-primary">Loan Information</h4>
                                        </div>
                                        <?php if($loan['loan_stats'] == 'Paid'){?>
                                            <div class="col-md-2 text-right">
                                                <!-- <button class="btn btn-outline-primary btn-round pull-right btn-sm" data-target="#payment-modal" data-toggle="modal" disabled=""><i class="material-icons">monetization_on</i> Pay Loan</button>                  -->
                                            </div>

                                            <div class="col-md-1 text-right">
                                                <button rel="tooltip" title="Applicable only if loan is in due date" class="btn btn-outline-primary btn-round pull-right btn-sm" disabled="">Fully Paid</button>
                                            </div>

                                         <?php }else{?>
                                            <div class="col-md-2 text-right">
                                                <!-- <button class="btn btn-outline-primary btn-round pull-right btn-sm" data-target="#payment-modal" data-toggle="modal"><i class="material-icons">monetization_on</i> Pay Loan</button>                  -->
                                            </div>

                                            <div class="col-md-1 text-right">
                                            <?php  
                                                $due = date('M. d, Y', strtotime($loan['due_date']));
                                                $now = date('M. d, Y');

                                                if(strtotime($due) >= strtotime($now)){ ?>
                                                    <button rel="tooltip" title="Applicable only if loan is in due date" class="btn btn-outline-primary btn-round pull-right btn-sm" disabled="">Fully Paid</button>
                                                <?php }else{ ?>
                                                    <button class="btn btn-outline-primary btn-round pull-right btn-sm fully_paid" id="<?php echo $loan['loan_no'];?>">Fully Paid</button>
                                                <?php } ?>
                                            </div>

                                        <?php } ?>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-md-4 card-loan">
                                                <div class="fileinput-new thumbnail img-raised" style="width: 250px;">
                                                <?php if(empty($loan['profile_img'])){ ?>
                                                            <img class="border-round" src="<?php echo base_url().'assets/images/person.png' ?>" width="250"/>
                                                        <?php }else{ ?>
                                                            <img class="img-fluid" width="250" id="output" src="<?php echo base_url().'uploads/'.$loan['profile_img']; ?>" alt="client-img"  />
                                                        <?php } ?>
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="row">
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Account Number:</label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['account_no'];?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Loan No.:</label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['loan_no'];?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Date Loan:</label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php $time = strtotime($loan['loan_started']); echo date("M. d, Y", $time);?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-0">
                                                    <div class="col-md-6 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Client's Name</label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['firstname'].' '.$loan['middlename'].'. '.$loan['lastname'];?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Gender: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['gender']; ?>" disabled>
                                                        </div>
                                                    </div> 
                                                </div>
                                                 <div class="row p-0">
                                                    <div class="col-md-12 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Current Address: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value=" <?php echo $loan['street'].', '.$loan['city'].', '.$loan['state'].', '.$loan['country'].' '.$loan['postal_code'];?>" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row p-0">
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Amount Loan:  </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['loan_amount'];?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">EMI Start Date: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['loan_started'];?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">EMI End Date: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['end_date'];?>" disabled>
                                                        </div>
                                                    </div> 
                                                </div>
                                                 <div class="row p-0">
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Intrest Rate : </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['interest']."%";?>" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Loan Type: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['loan_type'] ."( ".$loan['duration']." )";?> " disabled>
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">EMI Amount: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $loan['emi_amount'];?> " disabled>
                                                        </div>
                                                    </div> 
                                                    </div>
                                                    <?php
$total_amount= intval($loan['duration'])*intval($loan['emi_amount']);
$remaining=intval($loan['remaining_emis'])*intval($loan['emi_amount']);
$recived=$total_amount-$remaining;


?>
                                                    <div class="row p-0">
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Total Amount: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $total_amount;?> " disabled> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Recived : </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $recived;?> " disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 p-0">
                                                        <div class="form-group input-group-prepend">
                                                            <label class="bmd-label-floating text-primary">Remaining: </label>
                                                            <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $remaining; ?> " disabled>
                                                        </div>
                                                    </div>     
                                                </div>                                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
           
                                <div class="row" style="margin-top: -40px">
                                    <div class="col-md-6">
                                        <div class="card">
                                     
                                            <div class="card-body">
                                           
                                                <div class="table-responsive">
                                                <?php if(!isset($paid_emis['err'])){ ?>
                                                    <table class="table table-sm">
                                                        <thead class="text-primary">
                                                            <th>EMI No</th>
                                                            <th>EMI Paid Date</th>
                                                            <th>EMI Amount</th>
                                                            <th>Status</th>
                                                        </thead>
                                                        <tbody>
                                                       <?php

                                                          foreach ($paid_emis as $emi): ?>
                                                                <tr>
                                                                
                                                                    <td><?php echo $emi['emi_no']; ?></td>
                                                                    <td><?php echo $emi['date']; ?></td>
                                                                    <td><?php echo $emi['amount']; ?></td>
                                                                    <td style="color:#85BB65">PAID</td>
                                                                </tr>
                                                                <?php endforeach;    }else{
                                                                    echo "<b>".$paid_emis['err']."</b>";
                                                                }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-sm">
                                                        <thead class="text-primary">
                                                            <th>EMI No</th>
                                                            <th>Due Date</th>
                                                            <th>EMI Amount</th>
                                                            <th>Action</th>
                                                        </thead>
                                                        <tbody>
                                                        <?php for($i = 0; $i < count($unpaid_emis)- 1; $i++){ 
                                                            
                                                            $unpaid_emis[$i]["next_due"]=$unpaid_emis[$i+1]["due_date"];
                                                            
                                                            ?>
                                                                <tr>
                                                                
                                                               
                                                                    <td><?php echo $unpaid_emis[$i]["start"]; ?></td>
                                                                    <td><?php echo $unpaid_emis[$i]["due_date"]; ?></td>
                                                                    <td><?php echo $unpaid_emis[$i]["emi_amount"]; ?></td>
                                                                   
                                                       <td>
                <?php if ($unpaid_emis[$i]['is_due_near']): ?>
                    <button class="btn btn-outline-success btn-round pull-right btn-sm" data-next_due="<?php echo $unpaid_emis[$i]["next_due"]; ?>" onclick="openPaymentModal(this)" data-amount="<?php echo $unpaid_emis[$i]["emi_amount"]; ?>"  data-emi_no="<?php echo $unpaid_emis[$i]["start"]; ?>" ><i class="material-icons">monetization_on</i> Pay EMI</button>                 
                                           
                <?php else: ?>
                    <!-- Button disabled if due date is not near -->
                    <button class="btn btn-outline-success btn-round pull-right btn-sm" disabled><i class="material-icons">lock</i> Pay EMI</button>                 
                  
                <?php endif; ?>
            </td></tr> <?php 
        } 
        $lastIndex = count($unpaid_emis)-1;
        $unpaid_emis[$lastIndex]['next_due'] = $unpaid_emis[$lastIndex]['due_date'];

        ?>
  <tr>
                                                                
                                                              
                                                                <td><?php echo $unpaid_emis[$lastIndex]["start"]; ?></td>
                                                                <td><?php echo $unpaid_emis[$lastIndex]["due_date"]; ?></td>
                                                                <td><?php echo $unpaid_emis[$lastIndex]["emi_amount"]; ?></td>
                                                               
                                                   <td>
            <?php if ($unpaid_emis[$i]['is_due_near']): ?>
                <button class="btn btn-outline-success btn-round pull-right btn-sm" data-next_due="<?php echo $unpaid_emis[$i]["next_due"]; ?>" onclick="openPaymentModal(this)" data-amount="<?php echo $unpaid_emis[$i]["emi_amount"]; ?>"  data-emi_no="<?php echo $unpaid_emis[$i]["start"]; ?>" ><i class="material-icons">monetization_on</i> Pay EMI</button>                 
                                       
            <?php else: ?>
                <!-- Button disabled if due date is not near -->
                <button class="btn btn-outline-success btn-round pull-right btn-sm" disabled><i class="material-icons">lock</i> Pay EMI</button>                 
              
            <?php endif; ?>
        </td></tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                 <!-- Modal  -->
                                        <div class="modal fade " id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Transactions</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="ml-auto mr-auto">
                                                                    
                                                                </div>    
                                                            </div><form action="<?php echo base_url()."pay-loan"  ?>" method="post">

                                                            <div class="form-group mt-4">
                                                                <label class="bmd-label-floating">Date Now</label>
                                                                <input type="text" class="form-control pl-3" value="<?php echo date('M d, Y');?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group input-group-prepend">
                                                               
                                                                <label class="bmd-label-floating">EMI Amount
                                                                <input type="text" class="form-control pl-3 emi_amount" id="amountInput" name="emi_amount"  readonly required>
                                                            </div>
                                                            
                                                            

                                                            
                                                    
                                                            <input type="hidden" class="form-control loan_no" name="loan_no" value="<?php echo $loan['loan_no'];?>">
                                                            <input type="hidden" class="form-control emi_no" name="emi_no" id="emiNoInput">
                                                            <input type="hidden" class="form-control next_due" name="next_due" id="nextDue">
                                                        </div>
                                                       
                                                       
                                                    </div>

                                                    <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary btn-round btn-sm ml-3 paqy">Pay</button>
                                                    </form>
                                                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of modal -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php $this->load->view('templates/change_pass') ?>
	<?php $this->load->view('templates/footer') ?>
</body>
<script>

function openPaymentModal(button) {
    // Fetch EMI number and EMI amount from button's data attributes
    var emiNumber = button.getAttribute('data-emi_no');
    var emiAmount = button.getAttribute('data-amount');
    var next_due = button.getAttribute('data-next_due');

    // Populate modal fields with fetched data
 document.getElementById('emiNoInput').value = emiNumber;
   document.getElementById('amountInput').value = emiAmount;
    document.getElementById('nextDue').value = next_due;


    // Show the modal
    $('#payment-modal').modal('show');
}
</script>