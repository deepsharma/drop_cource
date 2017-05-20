$(".btn").click(function(){
	$("form").show();
	$(".success-msg").remove();
	$(".new_contact_crm").removeClass("clicked-btn");
});	  
	  
$(function(){$("input,select,textarea").not("[type=submit]").jqBootstrapValidation({
						preventSubmit: true,
						submitError: function($form, event, errors) {
							// the error messages to the user, log, etc.
							console.log("form validation error");
							$form.find(".new_contact_crm").removeClass("clicked-btn");
						},
						submitSuccess: function($form, event) {
							event.preventDefault();
							$form.find(".new_contact_crm").removeClass("clicked-btn");
							$form.find(".new_contact_crm").addClass("clicked-btn"); 
							
							var form_data = $form.serialize();
							console.log(form_data);
							console.log("form validation success");
							var res = submit_data(form_data);
							// if(res=="success"){
								$form.after('<p class="success-msg label-success mb-0" style="/* margin-left: 16%; */color: #fff;border-radius: 0.3em;padding: .5em 1em;">Thanks for submitting the details. We will get back to you in 24 hours.<br></p>');
								$form.hide();
							// }else{
								// $(".success-msg").remove();
								// $form.show();
								
							// }
							
						return false;
						}
			});});
			function submit_data(form_data){
				  $.post('https://capabiliti.co/ajax/forms_submit.php', form_data, function(res){
					return res;
				  })
			}
			