// JavaScript Document

/*---------------menu---------------*/

jQuery.noConflict();


var host = location.host;

function check_email() {
	if ($('#email_id2').is(':checked'))
		$('#email_check').show();
	else
		$('#email_check').hide();
}


function myfun(a) {
	if (a == "others") {
		$('#add_st').show();
	} else {
		$('#add_st').hide();
	}
}

(function($) {
	$(function() {
		var bb = window.location.hostname;
		if (host == 'localhost') {
			var l = window.location;
			var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
			ajax_url = base_url + "/admin/autocomplete";
		} else {
			ajax_url = "/admin/autocomplete";
		}

		if ($('#email_id2').is(':checked')) {
			$('#email_check').show();
		}

		a = $('#status_idd').val();
		if (a == "others") {
			$('#add_st').show();
		}
		
		$(".inputboxp").bind("paste cut paste", function(e) {
			e.preventDefault();
			return false;
		});

		$(".menutoggle").click(function() {
			$(".navigation").slideToggle();
		});

		$("#download_arrow_file").click(function() {
			// // hope the server sets Content-Disposition: attachment!
			window.location = 'download_arrow_file';
		});

		$("#download_arrow_main_doc_file").click(function() {
			// // hope the server sets Content-Disposition: attachment!
			window.location = 'download_arrow_main_doc_file';
		});


		$("#download_arrow_main_xlsx_file").click(function() {
			// // hope the server sets Content-Disposition: attachment!
			window.location = 'download_arrow_main_xlsx_file';
		});

		$('#login').validate({
			errorPlacement: function(label, element) {
				$('<div class="status1-error"></div>').insertAfter(element).append(label)
			},
			rules: {
				username: {
					required: true,
					maxlength: 16,
					alphanumeric1: true,
				},
				password: {
					required: true,
					maxlength: 16,
					alphanumeric1: true,
				},
			},
			messages: {
				username: {
					required: "Please Enter User Name",
					maxlength: "Only 16 character allowed.",
				},
				password: {
					required: "Please Enter Password",
					maxlength: "Only 16 character allowed.",
				},
			},
			submitHandler: function(form) {
				form.submit();
			}
		});


		$('#registration').validate({
			errorPlacement: function(label, element) {
				$('<div class="status1-error"></div>').insertAfter(element).append(label)
			},
			rules: {
				username: {
					required: true,
					maxlength: 16,
					alphanumeric1: true,
				},
				password: {
					required: true,
					maxlength: 16,
					alphanumeric1: true,
				},
				email_value: {
					required: true,
					email: true,
				},
			},
			messages: {
				username: {
					required: "Please Enter User Name",
					maxlength: "Only 16 character allowed.",
				},
				password: {
					required: "Please Enter Password",
					maxlength: "Only 16 character allowed.",
				},
				email_value: {
					required: "Please Enter Email Address",
					email: "Please Enter Valid email Address",
				},
			},
			submitHandler: function(form) {
				form.submit();
			}
		});


		/*Othere validation type*/
		$('#email_notify').validate({
			errorPlacement: function(label, element) {
							$('<div class="status1-error"></div>').insertAfter(element).append(label)
			},
			rules: {
				email_address: {
					required: true,
					email: true,
				},
				re_email_address: {
					required: true,
					email: true,
					equalTo: "#emailadd",
				},
				search_term: {
					required: true,
				},
				field: {
					required: true,
					extension: "xls|csv|xlsx",
				},
			},
			messages: {
				email_address: {
					required: "Please Enter Email Address",
					email: "Please Enter Valid email Address",
				},
				re_email_address: {
					required: "Please Enter Re Email Address",
					email: "Please Enter Valid Re Email Address",
					equalTo: "Must be same as above email address",
				},
				search_term: {
					required: "Please Select Your Term",
				},
				field: {
					required: "Please upload file",
					extension: "Please upload xls or csv file",
				},
			},
			submitHandler: function(form) {
				$("#email_notify_iddd").attr("disabled", true);
				$("#search_pro_number_id").attr("disabled", true);
				$("#search_pro_number_id1").attr("disabled", true);
				form.submit();
			}
		});
	

		// validation for forget password page http://example.com/forget_password
		$('#forget_password').validate({
			errorPlacement: function(label, element) {
				$('<div class="status1-error"></div>').insertAfter(element).append(label)
			},
			rules: {
				email_id: {
					required: true,
					email: true,
				},
			},
			messages: {
				email_id: {
					required: "Please Enter Email Id",
					email: "Please Enter Valid Email Id",
				},
			},
			submitHandler: function(form) {
				$("#forget_password_id").attr("disabled", true);
				form.submit();
			}
		});

		// jquery browser not validate code starts
		var matched, browser;
		jQuery.uaMatch = function(ua) {
			ua = ua.toLowerCase();

			var match = /(chrome)[ \/]([\w.]+)/.exec(ua) ||
						/(webkit)[ \/]([\w.]+)/.exec(ua) ||
						/(opera)(?:.*version|)[ \/]([\w.]+)/.exec(ua) ||
						/(msie) ([\w.]+)/.exec(ua) ||
						ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec(ua) || [];

			return {
				browser: match[1] || "",
				version: match[2] || "0"
			};
		};

		matched = jQuery.uaMatch(navigator.userAgent);
		browser = {};

		if (matched.browser) {
			browser[matched.browser] = true;
			browser.version = matched.version;
		}

		// Chrome is Webkit, but Webkit is also Safari.
		if (browser.chrome) {
			browser.webkit = true;
		} else if (browser.webkit) {
			browser.safari = true;
		}

		jQuery.browser = browser;
		// jquery browser not validate code ends
	});
})(jQuery);




jQuery.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^\s*[a-zA-Z0-9,\s]+\s*$/i.test(value);
}, "Please do not enter special character");

jQuery.validator.addMethod("alphanumeric1", function(value, element) {
	return this.optional(element) || /^\s*[a-zA-Z0-9\d=!\-._,\s]+\s*$/i.test(value);
}, "Please do not enter special character");







jQuery.validator.addMethod("noSpace", function(value, element) {
	return this.optional(element) || value.indexOf(" ") < 0 && value != "";
}, "No space please");