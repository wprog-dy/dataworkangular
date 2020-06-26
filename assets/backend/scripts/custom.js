$(document).ready(function() {
	$('#example').DataTable();
	
	$("#user_form").validate({
		rules: {
			first_name: "required",
			email: {
				required:true,
				email: true,
				remote: {
					type: 'post',
					dataType: 'json',
					cache: false,
					url: website_url + 'user/common/checkEmail',
					data: {
						id: function() {
							return $("#user_id").val(); 
						}, 
						email: function() {
							return $("#email").val(); 
						}
					},
				}
			},
			phone: {
				required:true,
				digits: true,
				minlength: 10, 
				maxlength: 10,
				remote: {
					type: 'post',
					dataType: 'json',
					cache: false,
					url: website_url + 'user/common/checkPhone',
					data: {
						id: function() {
							return $("#user_id").val(); 
						}, 
						phone: function() {
							return $("#phone").val(); 
						}
					},
				}
			},
			other_phone: {
				digits: true,
				minlength: 10, 
				maxlength: 10,
			},
			landline: {
				digits: true,
				minlength: 10, 
				maxlength: 10,
			},
			pancard_no: {
				minlength: 10, 
				maxlength: 10,
				pattern: /^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/
			},
			industry_type: "required",
			additional_info: "required",
			main_services: "required",
			services: "required",
			city: "required",
			contact_person: "required",
			company_type: "required",
			company_name: "required",
			company_website: {
				url: true
			},
			business_years: "required",
			password: "required",
			confirm_password: {
				required:function(element){
				return $("#password").val()!="";
			},
				equalTo: "#password"
			}
		},
		messages: {
			first_name: "Please enter your first name",
			email: {
				required: "Please enter your email",
				email: "Please enter a valid email",
				remote: "Email already exists"
			},
			phone: {
				required:"Please enter your phone no.",
				digits: "Please enter a valid phone no.",
				minlength: "Please enter a valid phone no.",
				maxlength: "Please enter a valid phone no.",
				remote: "Phone No. already exists"
			},
			other_phone: {
				digits: "Please enter a valid phone no.",
				minlength: "Please enter a valid phone no.", 
				maxlength: "Please enter a valid phone no.",
			},
			landline: {
				digits: "Please enter a valid phone no.",
				minlength: "Please enter a valid phone no.",
				maxlength: "Please enter a valid phone no."
			},
			pancard_no: {
				minlength: "Please enter a valid pancard no.", 
				maxlength: "Please enter a valid pancard no.",
				pattern: "Please enter a valid pancard no."
			},
			industry_type: "Please enter your industry type.",
			additional_info: "Please give details about your company",
			main_services: "Please enter main services",
			services: "Please enter your services",
			city: "Please enter your city",
			contact_person: "Please enter contact person",
			company_type: "Please enter your company type",
			company_name: "Please enter your company name",
			company_website: {
				url: "Please enter a valid url"
			},
			business_years: "Please enter your business years",
			password: "Please enter your password",
			confirm_password: {
				required:"Please retype your password",
				equalTo: "Your passwords do not match"
			}
		},
		submitHandler: function (form) {
			form.submit();
		}
	});
	
	$("#role_form").validate({
		rules: {
			name: "required",
			email: {
				required:true,
				email: true,
				remote: {
					type: 'post',
					dataType: 'json',
					cache: false,
					url: website_url + 'user/subadmin/checkEmail',
					data: {
						id: function() {
							return $("#user_id").val(); 
						}, 
						email: function() {
							return $("#email").val(); 
						}
					},
				}
			},
			phone: {
				required:true,
				digits: true,
				minlength: 10, 
				maxlength: 10,
				remote: {
					type: 'post',
					dataType: 'json',
					cache: false,
					url: website_url + 'user/subadmin/checkPhone',
					data: {
						id: function() {
							return $("#user_id").val(); 
						}, 
						phone: function() {
							return $("#phone").val(); 
						}
					},
				}
			},
			role: "required",
			dob: "required",
			joining_date: "required",
			password: "required",
			confirm_password: {
				required:function(element){
				return $("#password").val()!="";
			},
				equalTo: "#password"
			}
		},
		messages: {
			name: "Please enter your name",
			email: {
				required: "Please enter your email",
				email: "Please enter a valid email",
				remote: "Email already exists"
			},
			phone: {
				required:"Please enter your phone no.",
				digits: "Please enter a valid phone no.",
				minlength: "Please enter a valid phone no.",
				maxlength: "Please enter a valid phone no.",
				remote: "Phone No. already exists"
			},
			role: "Please select a role",
			dob: "Please enter your date of birth",
			joining_date: "Please enter your joining date",
			password: "Please enter your password",
			confirm_password: {
				required:"Please retype your password",
				equalTo: "Your passwords do not match"
			}
		},
		submitHandler: function (form) {
			form.submit();
		}
	});

	$('.status').on('click', function(e){
		
		let $this 		= $(this);
		let id 			= $(this).attr('data-id');
		let prevStatus 	= $(this).val();
		let status, confirmMsg;
		
		if(prevStatus == 0){
			status = 1;
			confirmMsg = 'Are your sure you want to unblock?';
		}else{
			status = 0;
			confirmMsg = 'Are your sure you want to block?';
		}
		
		if(confirm(confirmMsg)){
			
			
			
			$.ajax({
				url: website_url + 'user/common/changeStatus',
				type: 'POST',
				data: {'id': id, 'status': status},
				dataType: 'JSON',
				success: function(msg) { 
					if(msg == 1){
						// alert('Status changed!');
						swal("Status changed!", "", "success");
						$this.val(status);
					}else{
						// alert('Something went wrong, please try again!');
						swal("Something went wrong.", "Please try again!", "error");
						if(prevStatus == 0){
							$this.prop('checked', false);
						}else{
							$this.prop('checked', true);
						}
					}
				}
			});
		}else{
			e.preventDefault();
		}
	});
	
	$('.featured').on('click', function(e){
		
		let $this 		= $(this);
		
		let id 			= $(this).attr('data-id');
		let prevStatus 	= $(this).val();
		let featured, confirmMsg;
			
		if(prevStatus == 0){
			featured = 1;
			confirmMsg = 'Are your sure you want to make vendor featured?';
			
		}else{
			featured = 0;
			confirmMsg = 'Are your sure you want to remove vendor from featured?';
		}
		
		if(confirm(confirmMsg)){
			
			$.ajax({
				url: website_url + 'user/common/changeFeatured',
				type: 'POST',
				data: {'id': id, 'featured': featured},
				dataType: 'JSON',
				success: function(msg) { 
					if(msg == 1){
						// alert('Status changed!');
						swal("Success!", "", "success");
						$this.val(featured);
					}else{
						// alert('Something went wrong, please try again!');
						swal("Something went wrong.", "Please try again!", "error");
						if(prevStatus == 0){
							$this.prop('checked', false);
						}else{
							$this.prop('checked', true);
						}
					}
				}
			});
		}else{
			e.preventDefault();
		}
	});
});