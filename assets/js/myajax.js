// ==== login ajax =====
$(document).ready(function() {
	$(".login-submit").click(function() {
		var username = $(".username").val();
		var password = $(".password").val();

		if(username.trim() == ""){
			showNotification(
							"Please enter username",
							"error",
							"warning"
						);
		}
		if(password.trim() == ""){
			showNotification(
							"Please enter your password",
							"error",
							"warning"
						);
		}


		if (username && password) {
			$.ajax({
				type: "POST",
				url: BASE_URL+"login-submit",
				data: {
					username: username,
					password: password
				},
				dataType: "json",
				cache: false,
				success: function(response) {
					$("#loading-screen").hide();
					if (response.success == true) {
						
						window.location = response.messages;
						
					} else {
						
						showNotification(
							response.messages,
							"error",
							"danger"
						);
						$("i.usr-error-icon").addClass("text-danger");
						$("i.psw-error-icon").addClass("text-danger");

					}
				}

			});
			return false;
		}
	});
});



// =============== saving borrowers info ================
$(document).ready(function() {
	$(".client-save").click(function() {
		// event.preventDefault();
		var formdata = new FormData(document.getElementById("form-register"));
		
        if (formdata.get('lname') && formdata.get('gname') && formdata.get('mname') &&
            formdata.get('email') && formdata.get('number1') && formdata.get('street') &&
            formdata.get('city') && formdata.get('state') && formdata.get('postal_code')) {

			$.ajax({
				type: "POST",
				url: BASE_URL+"register-borrowers",
				dataType: "json",
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				success: function(response) {
					if (response.success == true) {
						$("#form-register")[0].reset();
						$("#loading-screen").hide();
						
						if(response.email){
							showNotification(
								response.email,
								"info",
								"warning"
							);
						}
						showNotification(
							response.messages,
							"check_circle",
							"success"
						);
						
					} else {
						$("#loading-screen").hide();
						showNotification(
							response.messages,
							"info",
							"warning"
						);
					}
					
					setTimeout(function() {
							window.location.reload(1);
						}, 3000);

				},
				error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }

			});
			return false;
		}else{
			showNotification(
				'Please fill the form completely BUDDY',
				"info",
				"warning"
			);
		}
	});
});
// =============== Approved Loan ================
$(document).on('click', '.approve', function(){
	var id = $(this).attr('id');

	
	$.ajax({
		url: BASE_URL+"approve-loan",
		method: 'POST',
		data:{
			loan_id:id,
		},
		dataType: "json",
		success: function(data){
			if(data.success){

				showNotification(
					response.messages,
					"check_circle",
					"success"
				);
				if(data.email){
					showNotification(
						"Email notification sent successfully!",
						"check_circle",
						"success"
					);
				}else{
					showNotification(
						"Email notification failed! Email is not Valid",
						"info",
						"warning"
					);
				}
				$("#loading-screen").hide();
				setTimeout(function() {
					window.location.reload(1);
				}, 3000);
			}else{
				
				$("#loading-screen").hide();

				showNotification(
					"Something went wrong!",
					"info",
					"danger"
				);
			}

		}
	});
}); 
// =============== Delete Borrowers ================
$(document).on('click', '.delete', function(){
	var id = $(this).attr('id');

	var $button = $('#remove-loan'+id);
	var table = $("#new_client_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"delete-borrowers",
		method: 'POST',
		data:{
			id:id
		},
		success: function(data){
			if(data!="False"){

				$('.modal').modal('hide');
				$("#loading-screen").hide();

				showNotification(
					data,
					"check_circle",
					"success"
				);

				
			}else{
				$("#loading-screen").hide();
			}
	        setTimeout(function() {
				window.location.reload(1);
			}, 1000);
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
}); 
// =============== Reject loan ================
$(document).on('click', '.reject', function(){

	var id = $(this).attr('id');

	var reason = $('.reason').val();

	var $button = $('#reject-button'+id);
	var table = $("#loan_clients_table").DataTable();

	$.ajax({
		url: BASE_URL+"reject-loan",
		method: 'POST',
		data:{
			id:id,
			reason:reason
		},
		success: function(data){
			if(data!="False"){

				$('.modal').modal('hide');
				$("#loading-screen").hide();
				
				showNotification(
					data,
					"info",
					"warning"
				);
				setTimeout(function() {
					window.location.reload(1);
				}, 1000);

			}else{
				$("#loading-screen").hide();
			}
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
});

// =============== Loan Re-Apply ================
$(document).on('click', '.re-apply', function(){
	var id = $(this).attr('id');

	var $button = $('#reapply-loan'+id);
	var table = $("#rejected_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"reapply-loan",
		method: 'POST',
		data:{
			id:id
		},
		success: function(data){
			if(data!="False"){
				$('.modal').modal('hide');
				$("#loading-screen").hide();

				showNotification(
					data,
					"check_circle",
					"success"
				);

			}else{
				$("#loading-screen").hide();
			}

			setTimeout(function() {
					window.location.reload(1);
				}, 3000);
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
}); 
// =============== Loan Remove ================
$(document).on('click', '.remove', function(){
	var id = $(this).attr('id');

	var $button = $('#remove-loan'+id);
	var table = $("#loan_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"remove-loan",
		method: 'POST',
		data:{
			id:id
		},
		success: function(data){
			if(data!="False"){
				$('.modal').modal('hide');
				$("#loading-screen").hide();

				showNotification(
					data,
					"check_circle",
					"success"
				);

				
			}else{
				$("#loading-screen").hide();
			}
			setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
}); 

// =============== Remove rejected loan ================
$(document).on('click', '.remove-rejected', function(){
	var id = $(this).attr('id');

	var $button = $('#remove-rejected-loan'+id);
	var table = $("#rejected_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"remove-loan",
		method: 'POST',
		data:{
			id:id
		},
		success: function(data){
			if(data!="False"){
				$('.modal').modal('hide');
				$("#loading-screen").hide();

				showNotification(
					data,
					"check_circle",
					"success"
				);

				
			}else{
				$("#loading-screen").hide();
			}

			setTimeout(function() {
					window.location.reload(1);
				}, 3000);
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
				

		        setTimeout(function() {
					window.location.reload(1);
				}, 3000);
		    }
	});
});
// =============== Cash release ================
$(document).on('click', '.cash-release', function(){
	var id = $(this).attr('id');

	var $button = $('#cash-release'+id);
	var table = $("#approved_clients_table").DataTable();
	
	$.ajax({
		url: BASE_URL+"cash-receive",
		method: 'POST',
		data:{
			id:id
		},
		success: function(data){
			if(data!="False"){
				$('.modal').modal('hide');
				$("#loading-screen").hide();

				showNotification(
					data,
					"check_circle",
					"success"
				);

				
			}else{
				$("#loading-screen").hide();
			}

			
				 setTimeout(function() {
					window.location.reload(1);
				}, 3000);
			
		},
		error: function (jqXHR, exception) {
				$("#loading-screen").hide();
		
		        var msg = '';
		        if (jqXHR.status === 0) {
		            msg = 'Not connect.\n Verify Network.';
		        } else if (jqXHR.status == 404) {
		            msg = 'Requested page not found. [404].Please contact developer';
		        } else if (jqXHR.status == 500) {
		            msg = 'Internal Server Error [500].';
		        } else if (exception === 'parsererror') {

		           msg = 'parsererror. Please contact developer';

		        } else if (exception === 'timeout') {
		            msg = 'Time out error.Please contact developer';
		        } else if (exception === 'abort') {
		            msg = 'Ajax request aborted.Please contact developer';
		        } else {
		            msg = 'Uncaught Error.\n' + jqXHR.responseText;
		        }
		        showNotification(
						msg,
						"info",
						"warning"
				);
		    }
	});
});
// ========= Function to check internet connection =============
function checkconnection(){
	var status = navigator.onLine;

	if(status){
		showNotification(
			"Connected to internet. You can send Email and SMS notification.",
			"wifi",
			"success"
		);
	}else{
		showNotification(
			"No internet connection. You can't send Email and SMS notification.",
			"wifi_off",
			"warning"
		);
	}
}


// ============== Account no.query ==============
$(document).on('click','.search_account',function(){
	var account_no = $('.accnt_no').val();

	$.ajax({
		url: BASE_URL+'account-query',
		type: 'POST',
		dataType: "json",
		data: {
			account_no : account_no
		},
		success:function(response){
			if(response.success == true){
				$(".acc_no").addClass("has-success");
				$(".fa-search").addClass("text-success");
				$('.full_name').val(response.name);
				$('.address').val(response.address);
				$('.email').val(response.email);
				$('.sim1').val(response.sim1);
				$('.sim2').val(response.sim2);
				$(".acc_no").removeClass("has-danger");
				$(".fa-search").removeClass("text-danager");
				

				$('.fas').click();
				
				checkconnection();

			}else{
				showNotification(
					'Borrowers data not found!',
					"info",
					"danger"
				);

				$('.full_name').val('');
				$('.address').val('');
				$('.email').val('');
				$('.sim1').val('');
				$('.sim2').val('');
				$(".acc_no").removeClass("has-success");
				$(".fa-search").removeClass("text-success");
				$(".acc_no").addClass("has-danger");
				$(".fa-search").addClass("text-danger");
			}
		}
	});
	return false;
});

$(document).ready(function() {
    $(".create-loan").click(function(e) {
        e.preventDefault();

        var formData = {
            loan_no: $('.loan_no').val(),
            account_no: $('.accnt_no').val(),
            amount: $('#amount').val(),
            collector: $('.collector').val(),
            verifier: $('.verifier').val(), // There are two 'verifier' keys here. Is this intended?
            date: $('.date').val(), // Assuming 'date' is a separate field, not 'verifier'
            full_name: $('.full_name').val(),
            email: $('.email').val(),
            interestRate: $('#interestRate').val(),
            loanType: $('#loanType').val(),
            duration: $('#duration').val(),
            occupation: $('#occupation').val(),
            employer: $('#employer').val(),
            employmentStatus: $('#employmentStatus').val(),
            monthlyIncome: $('#monthlyIncome').val(),
            address: $('.address').val(),
            email_notif: $('#email-toggle').hasClass('email') ? 'yes' : '',
            sim1_notif: $('#sim1-toggle').hasClass('sim1') ? 'yes' : '',
            sim2_notif: $('#sim2-toggle').hasClass('sim2') ? 'yes' : '',
            sim1: $('#sim1-toggle').hasClass('sim1') ? $('.sim1').val() : '',
            sim2: $('#sim2-toggle').hasClass('sim2') ? $('.sim2').val() : ''
        };

        console.log("Form Data:", formData); // Log the form data for debugging

        $.ajax({
            type: "POST",
            url: BASE_URL + "insert-loan",
            dataType: "json",
            data: formData,
            cache: false,

            success: function(response) {
                console.log("AJAX Response:", response); // Log the AJAX response for debugging
                $("#loading-screen").hide();
                if (response.success == true) {
                    showNotification(response.messages, "check_circle", "success");
                    if (response.email == false) {
                        showNotification('Email notification failed! Email is not valid!', "info", "warning");
                    }
                    console.log("Loan successfully created."); // Log success message
                    // $("#loan-form")[0].reset();
                    // setTimeout(function() {
                    //     window.location.reload(1);
                    // }, 3000);
                } else {
                    showNotification(response.messages, "info", "danger");
                    console.log("Failed to create loan:", response.messages); // Log error message
                }
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:", error); // Log AJAX error for debugging
            }
        });
    });
});
