<div class="modal fade" id="interested_in_content" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 850px;">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                   Please tell us a bit more about your requirement:
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <form class="form-horizontal" role="form" novalidate>
					<div class="col-md-6">
						  <div class="control-group">
							<label class="control-label">Your name <small> optional</small></label>
							<div class="controls">
							  <input class="form-control"  type="text" name="contact_name" id="contact_name" />
							  <p class="help-block"></p>
							</div>
						  </div>
						  
						  <div class="control-group">
							<label class="control-label">Your official email ID*</label>
							<div class="controls">
							  <input class="form-control" type="email" name="contact_email" id="contact_email" required  data-validation-required-message="Please enter your email ID" data-validation-email-message="A valid email ID is required" />
							  <p class="help-block"></p>
							</div>
						  </div>
						  
						  <div class="control-group">
							<label class="control-label">Your direct contact number*</label>
							<div class="controls">
							  <input class="form-control" type="tel" name="contact_number" id="contact_number" required data-validation-required-message="Please enter your contact number" data-validation-number-message="A valid contact number is required" />
							  <p class="help-block"></p>
							</div>
						  </div>
					</div>
					<div class="col-md-6">
						  <div class="control-group">
							<label class="control-label">How many people are you looking at this for? <small> optional</small></label>
							<div class="controls">
							  <input class="form-control" type="number" name="contact_people" id="contact_people"  data-validation-number-message="A valid number is required" />
							  <p class="help-block"></p>
							</div>
						  </div>
						  
						  <div class="control-group">
							<label class="control-label">Anything else you want us to know? <small> optional</small></label>
							<div class="controls">
							  <textarea class="form-control" rows="6" name="contact_message" id="contact_message"></textarea>
							  <p class="help-block"></p>
							</div>
						  </div>
					</div>
					<div class="col-md-12">
						  <div class="control-group">
							<label class="control-label">Areas of interest: <small> optional</small></label>
							<div class="controls">
								<div class="checkbox">
								  <label class="col-md-3"><input type="checkbox" value="Sales" name="contact_area_of_interest[]">Sales</label>
								  <label class="col-md-3"><input type="checkbox" value="Marketing" name="contact_area_of_interest[]">Marketing</label>
								  <label class="col-md-3"><input type="checkbox" value="Finance" name="contact_area_of_interest[]">Finance</label>
								  <label class="col-md-3"><input type="checkbox" value="Human Resources" name="contact_area_of_interest[]">Human Resources</label>
								  <label class="col-md-3"><input type="checkbox" value="Technology" name="contact_area_of_interest[]">Technology</label>
								  <label class="col-md-3"><input type="checkbox" value="Communication" name="contact_area_of_interest[]">Communication</label>
								  <label class="col-md-3"><input type="checkbox" value="Leadership" name="contact_area_of_interest[]">Leadership</label>
								  <label class="col-md-3"><input type="checkbox" value="Personality Development" name="contact_area_of_interest[]">Personality Development</label>
								  <label class="col-md-3"><input type="checkbox" value="Customer Service" name="contact_area_of_interest[]">Customer Service</label>
								  <label class="col-md-3"><input type="checkbox" value="Compliance" name="contact_area_of_interest[]">Compliance</label>
								  
								</div>
							</div>
						  </div>
						  <div class="form-group">
							<div class="col-sm-12 text-center"><br>
							<input type="hidden" value="Interested in content form" name="form_type">
							  <button type="submit" class="btn btn-info new_contact_crm btn-blue btn-signin">Submit</button><br> 
							  <small><label>
								By submitting the form you agree to Capabiliti's '<a style="text-decoration:underline;color:#636363!important;" href="terms-of-service.php" target="_blank">Terms of use</a>' &amp; '<a style="text-decoration:underline;color:#636363!important;" href="privacy-policy.php" target="_blank">Privacy Policy</a>'
							</label></small>
							</div>
						  </div>
					  </div>
                </form>
                
                
                
                
            </div>
        </div>
    </div>
</div>