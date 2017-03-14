// JQ shorthand for $(document).ready()
$(function() {
	console.log("Checking Stripe");
	$('#checkout-loading-message').hide();
	$('#checkout-btn-container').show();
	/**
	*	Create a Stripe configuration object
	*/
	var stripeConfig = {
		key:$('#stripe-pk').val(),
		image:"https://CloudCoinConsortium.com/img/CloudCoinLogoRound.png",
		description:$('#quantity').val() + ' ' + $('#description').val(),
		//panelLabel:'Order total',
		name :$("#company-name").val(),
		//allowRememberMe:false,
		token:function(token){
			console.log("token", token);
			dataSend = {};
			dataSend.stripeToken = token.id;
			dataSend.amount = $('#amount').val();
			dataSend.quantity = $('#quantity').val();
			dataSend.statement_descriptor = $('#statement-descriptor').val();
			dataSend.description = $("#description").val();
			dataSend.receipt_email = token.email;
			console.log("dataSend", dataSend);
			$('#checkout-btn').hide()
			$('#checkout-processing-message').show();
			$.ajax({
					type:"post",
					url:'stripe_service.php',
					data:dataSend,
					dataType:'json',
				})
				.done(function(data, status){
					console.log("$.ajax.done");
					console.log("data: ", data);
					console.log("status: ", status);
					$('#checkout-processing-message').hide();
					if (data.success){
						if( data.linkStrings.includes("jpg")){
							   //Charge worked dispense cloudcoin
							$('#checkout-success-message').show();
							
							var linkArray = data.linkStrings.split("|");
							
							var html ="";
							for( var i = 0; i < linkArray.length; i++){
							
							html += "<img src='../orders/" + linkArray[i] + "'><br>";

							}//end for eachlink
							
							document.getElementById("checkout-success-message").innerHTML +=  "<br> " + html;
						}else{ 
						 //Charge worked dispense cloudcoin
						$('#checkout-success-message-stack').show();
							document.getElementById("stackbutton").href =  "../orders/" +  data.linkStrings;
						}
					}else{
						$('#checkout-fail-message').show();
						document.getElementById("checkout-fail-message").innerHTML = "Error: " + data.error;
						document.getElementById("checkout-fail-message").innerHTML += "Full Error: " + data;
					}
				})
				.fail(function(data, status, error){
					console.log("$.ajax.fail");
					console.log("data: ", data);
					console.log("status: ", status);
					console.log("error: ", error);
					$('#checkout-processing-message').hide();
					
					$('#checkout-fail-message').show();
					document.getElementById("checkout-fail-message").innerHTML = "Error: " + data.responseText;
				}); 
		}
	};
	/**
	*	Create a Stripe form handler object
	*/
	var stripeFormHandler = StripeCheckout.configure(stripeConfig);
	/**
	*	Click event for checkout
	*/
	$('#checkout-btn').click(function(e){
		console.log("$('#checkout-btn')");
		// Open Stripe checkout form
		stripeFormHandler.open({
			amount:$('#amount').val() * 100
		});
		e.preventDefault();
	});
	/**
	*	Close Checkout on page navigation
	*/
	$(window).on('popstate', function() {
		stripeFormHandler.close();
	});
});
