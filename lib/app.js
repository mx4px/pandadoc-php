$(document).ready(function(){
	var respOut = "Working on that...";
	
	var valRules = {

		nameFirst: "required",
		nameLast: "required",
		emailAddress: {required: true, email: true},
		streetAddress: "required",
		loanAmount: {required: true, number: true}

	};

	$('#theForm').validate({
                	
		rules: valRules,
		messages: {
			nameFirst: "We need your first name.",
			nameLast: "We need your last name.",
			emailAddress: "A valid email address is required.",
			streetAddress: "Please include your street address.",
			loanAmount: "Please enter the loan amount, just as a number (no commas, currency marks, etc)"
		},
		submitHandler: function(form) {
			event.preventDefault();
			$('#subBtn').prop('disabled',true);
			$('#respMsg').html('<h4 style="text-align:center;color:red" class="center-block">Please do not refresh your browser!</h4><br><img src="img/block.gif" class="center-block" />');
			$.ajaxSetup({
				timeout: 120000,
					error: function(xhr,status,error){
					var errorMessage = xhr.status + ': ' + xhr.statusText;
					var respOut = "<p class=\"center-block\" style=\"color:red;\">We haven't received the reply we expected from the loan processor. What we did get was \""+errorMessage+"\". If you're not sure what that means, or if you have questions, please contact us, and we can confirm if the application went through.  <strong>Please don't refresh the page or try again</strong></p>";                   
					$('#respMsg').html(respOut);
				}
			});
			
			var mData = { 
							nameFirst: $("#nameFirst").val(),
							nameLast: $("#nameLast").val(),
							emailAddress: $("#emailAddress").val(),
							streetAddress: $("#streetAddress").val(),
							loanAmount: $("#loanAmount").val(),
							payDay: $("#payDay").val()
						}
			$.ajax({
			    url: 'app.php',
			    type: 'post',
			    data: mData,
			    dataType: 'json'
			
			}).done(function( data ) {

				var resp = JSON.stringify(data);
				var jres = JSON.parse(resp);

				if(jres.status=="document.uploaded") {

					var docID = jres.id;
					var respOut = "<br><p class=\"center-block\" style=\"color:red;\">Great! Your document has been uploaded. Please check the \"" + mData.emailAddress + "\" Inbox (and/or SPAM folder) after a few seconds.";
					$('#respMsg').html(respOut);
					
				} else {
					
					var respOut = "<br><p class='center-block' style='color:red;'>Sorry - that didn't work out. The server said: '"+resp+"', if that helps at all.";
					$('#respMsg').html(respOut);
			
				}
						
			}); //done
			

			
		} //submit
	}); //validate

});