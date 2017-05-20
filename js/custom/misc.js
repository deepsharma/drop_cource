$(function() {
			  $('a[href*="#"]:not([href="#"])').click(function() {
				$('#fh5co-page').trigger("click");
				setTimeout(function() { 
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
					  var target = $(this.hash);
					  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
					  if (target.length) {
						$('html, body').animate({
						  scrollTop: target.offset().top
						}, 3000);
						return false;
					  }
					}
				}, 2000);
			  });
			});
			
			
			//////////////////////
			$('#enterprise_submit').on("click", function(){
				var enterprise = $('#enterprise').val();
				if(enterprise == ""){
					$('#enterprise_error').html("Enter enterprise name.");
					return false;
				} else {
					$.ajax({
						url: 'https://api.capabiliti.co/utility/api/enterprise_url_check.php',
						type: 'GET',
						async: false,
						data: {
							url: enterprise
						},
						success : function(response) {
						  response = JSON.parse(response);
						  if(response.status == "OK"){
							window.location = "http://"+enterprise+".capabiliti.co/index.php?manage=true";
						  } else {
							$('#enterprise_error').html("Enter valid enterprise name.");
						  }
						  
						},
						error: function() {
						   //alert("error");
						}
					 });
				}
				return false;
			});
			//////////////////////
			
			
			jQuery(document).ready(function(){
	// tel plugin
	var telInput = jQuery("input[type='tel']");
	var countryData = jQuery.fn.intlTelInput.getCountryData();
	telInput.intlTelInput({
		//allowExtensions: true,
		//autoFormat: false,
		//autoHideDialCode: false,
		//autoPlaceholder: false,
		defaultCountry: "auto",
		geoIpLookup: function(callback) {
			jQuery.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
				var countryCode = (resp && resp.country) ? resp.country : "";
				callback(countryCode);
			});
		},
		nationalMode: false,
		//numberType: "MOBILE",
		//onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
		//preferredCountries: ['cn', 'jp'],
		utilsScript: "/includes/telinput/lib/libphonenumber/build/utils.js"
	});

	var phone_valid = false;
	// on blur: validate
	telInput.blur(function() {
		
		console.log('Onblur');
		
		if (jQuery.trim($(this).val())) {
		
			console.log($(this).val());
			
			if (telInput.intlTelInput("isValidNumber")) {
				jQuery('#error-phone').html("");
				phone_valid = true;
			} else {
				// jQuery.parents(telInput).append('<div class="help-block" />');
				// console.log(jQuery(telInput).parents().html());
				console.log('Validation Failed');
				
				if(jQuery(telInput).find("#help-block")) {
					jQuery('#help-block').html("<ul role=\"alert\"><li>Invalid Phone No.</li></ul>");
				} else {
					jQuery(telInput).parents().append('<div class="help-block"><ul role="alert"><li>Invalid Phone No.</li></ul></div>');
				}
				
				jQuery('#error-phone').html("Invalid Phone No.");
				phone_valid = false;
			}
		}
	});

	// on keyup / change flag: reset
	telInput.on("keyup change", function() {
		jQuery('#error-phone').html("");
		country = telInput.intlTelInput("getSelectedCountryData").name;
		country = encodeURIComponent(country);
	});
// tel plugin ends
});