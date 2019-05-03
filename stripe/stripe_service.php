<?php
include_once 'config.php';
/**
*CLOUDCOIN CONSORITIUM
*stripe_service.php
 *	Charge a Customer Card Via Stripe
 *By Sean H Worthington
 *3/12/2017
 *Open Source. Free of charge. MIT Licence
 *Provided as is with no garantees 
 */
//Disable HTTP Cache
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Pragma: no-cache'); // HTTP 1.0.
header('Expires: 0'); // Proxies.
//Respond with JSON content
header('Content-Type: application/json');
// Authenticate to the Stripe API
\Stripe\Stripe::setApiKey($st_test_secret_key);
// Data to return
$return_data            = array();
// Success or failure
$return_data["success"] = false;
// Create the charge on Stripe's servers - this will charge the user's card
try {
    // Create a Stripe\Charge OOP object
    $charge                 = \Stripe\Charge::create(array(
        "amount" => $_POST['amount'] * 100, // Convert to cents
        "currency" => "usd",
        "source" => $_POST['stripeToken'],
        "receipt_email" => $_POST['receipt_email'],
        "statement_descriptor" => substr(strtoupper($_POST['statement_descriptor']), 0, 22),
        "description" => $_POST['quantity'] . ' ' . $_POST['description']
    ));
    $return_data["success"] = true;
    
    //$return_data[]= $charge;
    
    //HAND OUT CLOUDCOINS HERE
    
    
    
    $return_data["id"]          = $charge->id;
    $return_data["status"]      = $charge->status;
    $return_data["created"]     = $charge->created;
    $return_data["description"] = $charge->description;
    $return_data["amount"]      = $charge->amount;
    $return_data["last4"]       = $charge->source->last4;
    
    /* Do they want jpgs or stack files? */
    $description = $charge->description;
    
    //PARSE FROM DESCRIPTION ALL THE NOTES THAT ARE WANTED
    $denominationArray = explode(" ", $description);
    
    $Wanted1s   = substr($denominationArray[1], 2);
    $Wanted5s   = substr($denominationArray[2], 2);
    $Wanted25s  = substr($denominationArray[3], 3);
    $Wanted100s = substr($denominationArray[4], 4);
    $Wanted250s = substr($denominationArray[5], 4);
   // error_log('Stripe: 1s ' . $Wanted1s." 5s ". $Wanted5s .", 25s ". $Wanted25s .", 100s ". $Wanted100s .", 250S ". $Wanted250s );
 
    $folderName = strval($charge->created);
    $folderName .= $charge->source->last4;
	
   
   //Make folder for to move the jpgs or stack files into into
        mkdir("../orders/" . $folderName, 0700);
   
    if (strpos($description, 'jpg') !== false) { //if the description contain the word "jpg"?
        $format = "jpgs";
            } else {
				 $format = "stacks";
    } //end if jpg or stack
        
        $return_data["format"] = $format;
		
        //If they want ones 
        if ( intval( $Wanted1s ) > 0) {
            $Names1s = scandir("../bank/$format/1s", 1);
 
            for ($i = 0; $i < intval( $Wanted1s ); $i++) {
                //move file to order folder
                rename("../bank/$format/1s/" . $Names1s[$i], "../orders/" . $folderName . "/" . $Names1s[$i]);
            } //end for each one wanted
        } //end if they want ones
		
		//If they want fivs 
        if ( intval( $Wanted5s ) > 0) {
            $Names5s = scandir("../bank/$format/5s", 1);
 
            for ($i = 0; $i < intval( $Wanted5s ); $i++) {
                //move file to order folder
                rename("../bank/$format/5s/" . $Names5s[$i], "../orders/" . $folderName . "/" . $Names5s[$i]);
            } //end for each five wanted
        } //end if they want fives
		
		//If they want twentyfivs 
        if ( intval( $Wanted25s ) > 0) {
            $Names25s = scandir("../bank/$format/25s", 1);
 
            for ($i = 0; $i < intval( $Wanted25s ); $i++) {
                //move file to order folder
                rename("../bank/$format/25s/" . $Names25s[$i], "../orders/" . $folderName . "/" . $Names25s[$i]);
            } //end for each 2five wanted
        } //end if they want 2fives
		
		//If they want 100s 
        if ( intval( $Wanted100s ) > 0) {
            $Names100s = scandir("../bank/$format/100s", 1);
 
            for ($i = 0; $i < intval( $Wanted100s ); $i++) {
                //move file to order folder
                rename("../bank/$format/100s/" . $Names100s[$i], "../orders/" . $folderName . "/" . $Names100s[$i]);
            } //end for each 100 wanted
        } //end if they want 100
		
		//If they want 250
        if ( intval( $Wanted250s ) > 0) {
            $Names250s = scandir("../bank/$format/250s", 1);
 
            for ($i = 0; $i < intval( $Wanted250s ); $i++) {
                //move file to order folder
                rename("../bank/$format/250s/" . $Names250s[$i], "../orders/" . $folderName . "/" . $Names250s[$i]);
            } //end for each 250 wanted
        } //end if they want 250
		
    
    $allFiles  = scandir("../orders/" . $folderName, 1);
	$fileNames = array_diff($allFiles , array('.', '..'));
    $linkStrings = "";
    $json = "";
	
	
	for ($j = 0; $j < count($fileNames); $j++) { //Minus 2 because this scandir includes .. and .
       
	   if($format == "jpgs"){
		 if($j!=0){ $linkStrings .= "|"; }
		  $linkStrings .= $folderName. DIRECTORY_SEPARATOR . $fileNames[$j] ;
	   }else{
		   if($j==0){ $json .= "{
	                                     \"cloudcoin\": ["; }
		   else{ $json .= ","; }
		 //1.Open file and add string
		   $file = file_get_contents( "../orders/" . $folderName . DIRECTORY_SEPARATOR . $fileNames[$j] , true);
		   $pos1 = strposX($file, "{", 2);
		   $pos2 = strpos( $file, "}") + 1;
		   $oneCoin = substr( $file, $pos1, $pos2-$pos1);
		   //Strip out any owner comments
		   $pos1 = strposX($oneCoin, "[", 2);
		   $pos2 = strposX($oneCoin, "]", 2);
		   $begining = substr($oneCoin, 0,($pos1+1));
		   $end = substr($oneCoin, ($pos2));
		   $json .= $begining.$end;
		   
		   
		    if($j== (count($fileNames) - 1)){ $json .= "]
			
			}" ;}
	   }//end if format jpg or stack
	} //end for each jpg to be linked to page
    
	
	if($format == "jpgs"){ 
      $return_data["linkStrings"] = $linkStrings;
	}else{
		$totalCoins = intval($Wanted1s) + intval($Wanted5s)*5 + intval($Wanted25s)*25 + intval($Wanted100s)*100 + intval($Wanted250s)*250 ;
		$rand = rand();
		$filename = "$totalCoins.cloudcoin.$rand.stack";
      $myfile = fopen( "../orders/" .  $folderName. DIRECTORY_SEPARATOR . $filename , "w") or die("Unable to open file!");
	  fwrite($myfile, $json);
	  fclose($myfile);
	  $return_data["linkStrings"] = $folderName. DIRECTORY_SEPARATOR . $filename;
    }//end if format jpg or stack
    //Invalid request errors arise when your request has invalid parameters.
}
catch (\Stripe\Error\InvalidRequest $e) {
    error_log("CRITICAL ERROR: Stripe InvalidRequest");
    error_log('Stripe InvalidRequest - httpStatus:' . $e->getHttpStatus());
    $body       = $e->getJsonBody();
    $error_info = $body['error'];
    if (isset($error_info['message'])) {
        error_log('Stripe InvalidRequest - message:' . $error_info['message']);
        $return_data["error"] = 'Stripe InvalidRequest - message:' . $error_info['message'];
    }
}
echo json_encode($return_data);


/**
 * Find the position of the Xth occurrence of a substring in a string
 * @param $haystack
 * @param $needle
 * @param $number integer > 0
 * @return int
 */
function strposX($haystack, $needle, $number){
    if($number == '1'){
        return strpos($haystack, $needle);
    }elseif($number > '1'){
        return strpos($haystack, $needle, strposX($haystack, $needle, $number - 1) + strlen($needle));
    }else{
        return error_log('Error: Value for parameter $number is out of range');
    }
}
?>
