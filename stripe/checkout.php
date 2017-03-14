<?php 

include_once 'config.php';
// General website data
$company_name = "CloudCoin Consortium";
$bank_statement_descripton = "CLOUDCOIN CONSORTIUM";
// Order Data


       
       $in1 = 0;
       $in5 = 0;
       $in25 = 0;
       $in100 = 0;
       $in250 = 0;
       
       $num1 = 0;
       $num5 = 0;
       $num25 = 0;
       $num100 = 0;
       $num250 = 0;
      
       
       if (isset($_POST["in1"])){   $in1 = $_POST['in1']; $num1 = (int)$in1; }
       if (isset($_POST["in5"])){   $in5 = $_POST['in5']; $num5 = (int)$in5; }
       if (isset($_POST["in25"])){  $in25 = $_POST['in25']; $num25 = (int)$in25; }
       if (isset($_POST["in100"])){ $in100 = $_POST['in100']; $num100 = (int)$in100; }
       if (isset($_POST["in250"])){ $in250 = $_POST['in250']; $num250 = (int)$in250; }
       
  $amount = 0;
  $description = "";
  $billOfSale = "";
      if( is_numeric($in1) && $in1 > 0 ){ 
      $amount1 = $in1 * .01;
      $billOfSale .= "<tr><td>1</td><td>$in1</td><td>$.01</td><td>$". $amount1 ."</td><tr>";
      $amount += ($num1 * 1); }
      $description .= "1x".$in1;
      
      if( is_numeric($in5) && $in5 > 0 ){ 
       $amount5= $in5 * .05;
      $billOfSale .= "<tr><td>5</td><td>$in5</td><td>$.05</td><td>$". $amount5 ."</td><tr>";
       $amount += ($num5 * 5);}
      $description .= " 5x".$in5;
      
      if( is_numeric($in25) && $in25 > 0 ){ 
       $amount25 = $in25 * .25;
      $billOfSale .= "<tr><td>25</td><td>$in25</td><td>$.25</td><td>$". $amount25 ."</td><tr>";
       $amount += ($num25 * 25);}
      $description .= " 25x".$in25;
      
      if( is_numeric($in100) && $in100 > 0 ){ 
       $amount100 = $in100 * 1;
      $billOfSale .= "<tr><td>100</td><td>$in100</td><td>$1.00</td><td>$". $amount100 ."</td><tr>";
       $amount += ($num100 * 100);}
      $description .= " 100x".$in100;
      
      if( is_numeric($in250) && $in250 > 0 ){ 
       $amount250 = $in250 * 2.5;
      $billOfSale .= "<tr class='firstLine'><td>250</td><td>$in250</td><td>$2.50</td><td>$". $amount250 ."</td><tr>";
      
       $amount += ($num250 * 250);}
      $description .= " 250x".$in250;
      
      if( $_POST["format"] =="jpg" ){ $description .=" jpg";}else{ $description .=" stack";}
      
      $amount = $amount;
      
      $dollars = $amount * .01;
      
     $quantity = "\$" . money_format( '%i', $dollars ) ;
      
     // $quantity = $amount  ;
      $strAmount = number_format( $amount );
    
      $statement_descriptor = $bank_statement_descripton . ' ' . $description;
     // $billOfSale .= "<tr><td colspan='4'><hr></td><tr>";
      $billOfSale .= "<tr><th colspan='3'>Total:</th><th>".$quantity ."</th><tr>";
       ?>


<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

    <link rel="stylesheet" href="../../css/foundation.css">
    <link rel="stylesheet" href="../../css/app.css"><link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <style>
    h1, h2, h3, h4, h5, h6 {
    font-family: 'Roboto', sans-serif;

    color: #252c34;
}
.button{

background-color:#338FFF;
}
a{
color:#338FFF;
font-family: 'Roboto', sans-serif;
font-weight:  bold;
}
body{

background-color:#338FFF;
}


/*--
	Universal selector and psuedo selectors for inserting content before or after any element.
	1. Use border-box over default content-box for box model.	
--*/
*, *:before, *:after{
	-moz-box-sizing:border-box;			/*1*/
	-webkit-box-sizing:border-box;		/*1*/
	box-sizing:border-box;				/*1*/
}
/*--
	1. 16px
	2. 1.6 x font-size
--*/
html, body{
	
	height:100%;
	font-family:Helvetica, Arial, sans-serif;
	font-size:1em;			/*1*/
	line-height:1.6; 		/*2*/
}
/*--
Page wrapper 
	1. 1200px / 16px;
--*/
#page-container{
	background:#ffffff;
	height:100%;
	max-width:75em;			/*1*/
	padding:.25em 1em;
	overflow:auto;
}
/*--
	1. 28px;
--*/
h1 {
	font-size:1.75em;		/*1*/
}
/*--
	Centering content containers
--*/
.center-container{
	margin-left:auto;
	margin-right:auto;
}
/*--
	Centering page container
--*/
.center-text{
	text-align:center;
}
/*--
	1. 400px / 16px;
--*/
.form-container{
	background:#fff;
	border:solid #000 2px;
	max-width:25em;			/*1*/
	padding:.1em 1em;
}
/*--
	Container for the checkout button
--*/
#checkout-btn-container{
	display:none;
}
/*--
	Checkout loading message container
--*/
#checkout-loading-message{
	display:block;
}
/*--
	Form message containers
--*/
.checkout-message{
	display:none;
	font-weight:bold;
}
/*--
	Text style for error messages
--*/
.error-message-text{
	color:#f00;
}
/*--
	http://www.bestcssbuttongenerator.com
--*/
.pay-btn{
	-moz-box-shadow: 0px 1px 0px 0px #fff6af;
	-webkit-box-shadow: 0px 1px 0px 0px #fff6af;
	box-shadow: 0px 1px 0px 0px #fff6af;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffec64), color-stop(1, #ffab23));
	background:-moz-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-webkit-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-o-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:-ms-linear-gradient(top, #ffec64 5%, #ffab23 100%);
	background:linear-gradient(to bottom, #ffec64 5%, #ffab23 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffec64', endColorstr='#ffab23',GradientType=0);
	background-color:#ffec64;
	-moz-border-radius:6px;
	-webkit-border-radius:6px;
	border-radius:6px;
	border:1px solid #ffaa22;
	display:inline-block;
	cursor:pointer;
	color:#333333;
	font-family:arial;
	font-size:15px;
	font-weight:bold;
	padding:6px 24px;
	text-decoration:none;
	text-shadow:0px 1px 0px #ffee66;
}
.pay-btn:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #ffab23), color-stop(1, #ffec64));
	background:-moz-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-webkit-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-o-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:-ms-linear-gradient(top, #ffab23 5%, #ffec64 100%);
	background:linear-gradient(to bottom, #ffab23 5%, #ffec64 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffab23', endColorstr='#ffec64',GradientType=0);
	background-color:#ffab23;
}
.pay-btn:active{
	position:relative;
	top:1px;
}


table {
    width: 100%;
}
table, td {
     text-align: right;
  margin-right: 1em;
}
table.menu {
    width: auto;
    margin-right: 0px;
    margin-left: auto;
}
.firstLine td{
    border-bottom: 2px solid black;
}

    </style>
  </head>
  <body>
 

  
  
    <div class="row">
      <div class="large-6 medium-8 medium-centered large-centered columns">
     
		<div id="page-container" class="center-container">
	<header>
	  
       <img src="//cloudcoinconsortium.com/img/logo.svg" alt="CloudCoin logo"  style="background-color:white">
   
  
       
	
	</header>
	<div class="form-container center-container">
	<h2 style="text-align: center">Checkout</h2>
                
                <p>Amount of CloudCoins: <?=$strAmount?></p>
		
		<table class="hover">
		<tr><th>Denomination</th><th>Qty</th><th>UnitPrice</th><th>Total</th><tr>
		<?=$billOfSale ?>
		
		</table>
		
		<input type="hidden" id="stripe-pk" value="<?=$st_test_public_key?>"/>
		<input type="hidden" id="company-name" value="<?=$company_name?>"/>
		<input type="hidden" id="quantity" value="<?=$quantity?>">
		<input type="hidden" id="amount" value="<?=$dollars?>">
		<input type="hidden" id="description" value="<?=$description?>">
		<input type="hidden" id="statement-descriptor" value="<?=$statement_descriptor?>">
		<p id="checkout-loading-message" class="checkout-message center-text">
			Loading ...
		</p>
		<script src="https://checkout.stripe.com/checkout.js"></script>
		<p id="checkout-btn-container" class="center-text">
			<a id="checkout-btn" href="#" class="pay-btn">Checkout</a>
		</p>
		<p id="checkout-processing-message" class="checkout-message center-text">
			Processing ...
		</p>
		<p id="checkout-success-message" class="checkout-message center-text">
			Thank you for your order.<br>
			Your cloudcoins are displayed. You must download all your CloudCoins from this page. You will need
			to run them through a <a target="_blank" href="https://cloudcoinconsortium.com/use.html">program</a> to take ownership of them. 
			<button class="button" onclick="downloadAll('jpg','10000')">Download All CloudCoins</button>
		</p>
		<p id="checkout-success-message-stack" class="checkout-message center-text">
			Thank you for your order.<br>
			Click the button below to download your CloudCoins. You will need
			to run them through a <a target="_blank" href="https://cloudcoinconsortium.com/use.html">program</a> to take ownership of them. 
			<a id="stackbutton" class="button" download >Download your stack file of CloudCoins</a>
		</p>
		
		<p id="checkout-fail-message" class="checkout-message center-text error-message-text">
			Something Went Horribly Wrong!
		</p>

	</div>
		<br>
		<br>
		<br>
  
</div>

        	
          
           </div>
    </div>
          
   <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>      
<script src="checkout.js"></script>


<script>

/* Download an img */
function download(img) {
    var link = document.createElement("a");
    link.href = img.src;
	var name = img.src.substring( 46  );//cut the file name down so it is not so big
    link.download = img.src;
    link.style.display = "none";
    var evt = new MouseEvent("click", {
        "view": window,
        "bubbles": true,
        "cancelable": true
    });

    document.body.appendChild(link);
    link.dispatchEvent(evt);
    document.body.removeChild(link);
    console.log("Downloading...");
}

/* Download all images in 'imgs'. 
 * Optionaly filter them by extension (e.g. "jpg") and/or 
 * download the 'limit' first only  */
function downloadAll( ext, limit) {
var imgs = document.querySelectorAll("img");
    /* If specified, filter images by extension */
    if (ext) {
        ext = "." + ext;
        imgs = [].slice.call(imgs).filter(function(img) {
            var src = img.src;
            return (src && (src.indexOf(ext, src.length - ext.length) !== -1));
        });
    }

    /* Determine the number of images to download */
    limit = (limit && (0 <= limit) && (limit <= imgs.length))
            ? limit : imgs.length;

    /* (Try to) download the images */
    for (var i = 0; i < limit; i++) {
        var img = imgs[i];
        console.log("IMG: " + img.src + " (", img, ")");
        download(img);
    }
}
</script>


  </body>
</html>
