<?php 
//Take inventory in the bank
$directory1j = "stripe/bank/jpgs/1s/";
$directory5j = "stripe/bank/jpgs/5s/";
$directory25j = "stripe/bank/jpgs/25s/";
$directory100j = "stripe/bank/jpgs/100s/";
$directory250j = "stripe/bank/jpgs/250s/";

$directory1s = "stripe/bank/stacks/1s/";
$directory5s = "stripe/bank/stacks/5s/";
$directory25s = "stripe/bank/stacks/25s/";
$directory100s = "stripe/bank/stacks/100s/";
$directory250s = "stripe/bank/stacks/250s/";

$filecount1j = 0;
$filecount5j = 0;
$filecount25j = 0;
$filecount100j = 0;
$filecount250j = 0;

$filecount1s = 0;
$filecount5s = 0;
$filecount25s = 0;
$filecount100s = 0;
$filecount250s = 0;



$files1j = glob( $directory1j . "*");
$files5j = glob( $directory5j . "*");
$files25j = glob( $directory25j . "*");
$files100j = glob( $directory100j . "*");
$files250j = glob( $directory250j . "*");

$files1s = glob( $directory1s . "*");
$files5s = glob( $directory5s . "*");
$files25s = glob( $directory25s . "*");
$files100s = glob( $directory100s . "*");
$files250s = glob( $directory250s . "*");

if ($files1j)  {   $filecount1j =   count($files1j);}
if ($files5j)  {   $filecount5j =   count($files5j);}
if ($files25j) {   $filecount25j =  count($files25j);}
if ($files100j){   $filecount100j = count($files100j);}
if ($files250j){   $filecount250j = count($files250j);}

if ($files1s)  {   $filecount1s =   count($files1s);}
if ($files5s)  {   $filecount5s =   count($files5s);}
if ($files25s) {   $filecount25s =  count($files25s);}
if ($files100s){   $filecount100s = count($files100s);}
if ($files250s){   $filecount250s = count($files250s);}


?>

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy CloudCoins</title>

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css"><link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
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
    </style>
  </head>
  <body>
 <div class="top-bar"
  style=" font-family: &#39;Roboto&#39;, sans-serif; font-size: 1.6vw; font-weight: bold; text-size-adjust:800;">

    <div class="row">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu="" style=" font-family: &#39;Roboto&#39;, sans-serif; background-color:white;">
          <li class="menu-text">
<a href="index.html">
<img src="img/cloudcointop.png" alt="CloudCoin logo" width="200"></a>
</li>
           <li>
            <a href="learn.html">Learn</a>
          </li>          
          <li>
            <a href="use.html">Use</a>
          </li>
          <li>
            Buy
          </li>
           <li>
            <a href="/news/">News</a>
          </li>

        </ul>
      </div>
      <div class="top-bar-right">
        <ul class="menu" style=" font-family: &#39;Roboto&#39;, sans-serif; background-color:white;">
          <li>
       
            <li>
            <form action="//www.findberry.com/search/" method="get" id="sr_newpage"  style="display:inline">
                 <input type="hidden" name="wid" value="5222" />
                 <input id="sr_searchbox" type="text" name="query" value="" size="35" style="display:inline"/>
                 <input id="sr_searchbutton" type="submit" class="button" value="Search" />
            </form>
			</li>
		  
        </ul>
      </div>
    </div>
  </div>
<br>
  
  
  
    <div class="row">
      <div class="large-12 columns">
       <h1 style=" font-size: 3.2vw; color:white; font-weight:  bold; text-shadow: 10px 10px 25px #333333; text-size-adjust:1005" class="white text-center">Todays Rate: $.01 per CloudCoin</h1>
        
        
          
          <ol>
          
           <li>These CloudCoins are sold embedded in jpegs or in text files (.stack). The jpegs contain one note per image and the stack files contain many CloudCoins. Jpeg images are bigger than the stack files but the jpeg images may be easier to think about as money.</li>

             <li>CloudCoins come in different denominations (1,5,25,100 and 250).</li>
 
          </ol>
           </div>
    </div>
          
          <div class="row">
      <div class="large-6 medium-8 medium-centered large-centered columns">
    
         
           <form action="stripe/code/checkout.php" method="POST">   
          <table>
          
            <tr>
	    <th colspan="4">  
	    What format do you want your CloudCoins in?<br>
	    <input type="radio" id="r1" name="format" value="jpg" onclick="setInputs(this.value);" checked="checked" >.jpg
	    <input type="radio" id="r2" name="format" value="stack" onclick="setInputs(this.value);" required>.stack
	    </th>
  </tr>
          
          
              <tr>
    <th id="tableMessage" colspan="4">How many CloudCoins notes do you want to buy?</th>
   
  </tr>
  <tr>
  <td><a href="http://cloudcoinconsortium.org/img/jpeg1.jpg" target="_blank"  class="thumbnail" ><img alt="1 CloudCoin" src="//cloudcoinconsortium.org/img/jpeg1.jpg" width="150"></a></td>
    <th>1s</th>
    <td><input type="number" name="in1" id="in1" placeholder="0"  onchange="add1(this.value)"  min="0" disabled></td>
    <td id="total1">Out of Stock</td>
  </tr>
  <tr>
  <td><a href="http://cloudcoinconsortium.org/img/jpeg5.jpg" target="_blank"  class="thumbnail" ><img alt="5 CloudCoin"  src="//cloudcoinconsortium.org/img/jpeg5.jpg" width="150"></a></td>
    <th>5s</th>
    <td><input type="number" name="in5"  id="in5" placeholder="0"  onchange="add5(this.value)" min="0"  disabled></td>
    <td id="total5">Out of Stock</td>
  </tr>
  <tr>
  <td><a href="http://cloudcoinconsortium.org/img/jpeg25.jpg" target="_blank"  class="thumbnail" ><img alt="25 CloudCoin"  src="//cloudcoinconsortium.org/img/jpeg25.jpg" width="150"></a></td>
    <th>25s</th>
    <td><input type="number" name="in25"  id="in25" placeholder="0"  onchange="add25(this.value)"  min="0" disabled></td>
    <td id="total25">Out of Stock</td>
  </tr>
  <tr>
  <td><a href="http://cloudcoinconsortium.org/img/jpeg100.jpg" target="_blank"  class="thumbnail" ><img alt="100 CloudCoin"  src="//cloudcoinconsortium.org/img/jpeg100.jpg" width="150"></a></td>
    <th>100s</th>
    <td><input type="number" name="in100"  id="in100" placeholder="0"  onchange="add100(this.value)" min="0"  disabled></td>
    <td id="total100">Out of Stock</td>
  </tr>
  <tr>
  <td><a href="http://cloudcoinconsortium.org/img/jpeg250.jpg" target="_blank"  class="thumbnail" ><img alt="250 CloudCoin"  src="//cloudcoinconsortium.org/img/jpeg250.jpg" width="150"></a></td>
    <th>250s</th>
    <td><input type="number" name="in250"  id="in250" placeholder="0" onchange="add250(this.value)" required min="0" ></td>
    <td id="total250">0</td>
  </tr>
    <tr>
    <th id="grandTotal" colspan="4">Grand Total: $0</th>
   
  </tr>

  
     <tr>
    <th colspan="4">  <input type="submit" value="Check out" class="button"></th>
   
  </tr>
</table>
     </form>
              
          
 <script>    
 
 var j1 = <?=$filecount1j?>;
  var j5 = <?=$filecount5j?>;
   var j25 = <?=$filecount25j?>;
    var j100 = <?=$filecount100j?>;
     var j250 = <?=$filecount250j?>;

 var s1 = <?=$filecount1s?>;
  var s5 = <?=$filecount5s?>;
   var s25 = <?=$filecount25s?>;
    var s100 = <?=$filecount100s?>;
     var s250 = <?=$filecount250s?>;
	 
	 mode="jpg";
     setInputs("jpg");
	 var in1 = document.getElementById("in1");
	 var in5 = document.getElementById("in5");
	 var in25 = document.getElementById("in25");
	 var in100 = document.getElementById("in100");
	 var in250 = document.getElementById("in250");
 
 /* If no inventory, deactivate input control */
 
 function setInputs( format ){

 
 if( format == "jpg"){
 //reset everything
 in1.value = 0;
  in5.value = 0;
   in25.value = 0;
    in100.value = 0;
     in250.value = 0;
     changeTotal();
 
 if( j1 == 0 ){ total1.innerHTML = "Out of stock"; in1.disabled = true; }else{ in1.disabled = false; total1.innerHTML = j1 + " in stock"; in1.max = j1;  }
 if( j5 == 0 ){ total5.innerHTML = "Out of stock"; in5.disabled = true; }else{ in5.disabled = false; total5.innerHTML = j5 + " in stock"; in5.max = j5;  }
 if( j25 == 0 ){ total25.innerHTML = "Out of stock"; in25.disabled = true; }else{ in25.disabled = false; total25.innerHTML = j25 + " in stock"; in25.max = j25;  }
 if( j100 == 0 ){ total100.innerHTML = "Out of stock"; in100.disabled = true; }else{ in100.disabled = false; total100.innerHTML = j100 + " in stock"; in100.max = j100;  }
 if( j250 == 0 ){ total250.innerHTML = "Out of stock"; in250.disabled = true; }else{ in250.disabled = false; total250.innerHTML = j250 + " in stock"; in250.max = j250;  }
 

 }else{//format is stack
 
  //reset everything
 in1.value = 0;
  in5.value = 0;
   in25.value = 0;
    in100.value = 0;
     in250.value = 0;
     changeTotal();
  if( s1 == 0 ){ total1.innerHTML = "Out of stock"; in1.disabled = true; }else{ in1.disabled = false; total1.innerHTML = s1 + " in stock"; in1.max = s1;  }
  if( s5 == 0 ){ total5.innerHTML = "Out of stock"; in5.disabled = true; }else{ in5.disabled = false; total5.innerHTML = s5 + " in stock"; in5.max = s5;  }
  if( s25 == 0 ){ total25.innerHTML = "Out of stock"; in25.disabled = true; }else{ in25.disabled = false; total25.innerHTML = s25 + " in stock"; in25.max = s25;  }
  if( s100 == 0 ){ total100.innerHTML = "Out of stock"; in100.disabled = true; }else{ in100.disabled = false; total100.innerHTML = s100 + " in stock"; in100.max = s100;  }
  if( s250 == 0 ){ total250.innerHTML = "Out of stock"; in250.disabled = true; }else{ in250.disabled = false; total250.innerHTML = s250 + " in stock"; in250.max = s250;  }
 
 }//end if jpeg or stack
 
 
 }//end set inputs
 

 
 
 var total = 0;    
  function add1( CloudCoin )
   {
  
     if( r1.checked ){
      total1.innerHTML =  (j1 - CloudCoin) + " in stock"; 
      }else
      {
      total1.innerHTML =  (s1 - CloudCoin) + " in stock"; 
      }
      changeTotal();
   }//end change total
    
	
   function add5( CloudCoin )
   {
      if( r1.checked ){
      total5.innerHTML =  (j5 - CloudCoin) + " in stock"; 
      }else
      {
      total5.innerHTML =  (s5 - CloudCoin) + " in stock"; 
      }
      changeTotal();
   }//end change total
 
   function add25( CloudCoin )
   {
      if( r1.checked ){
      total25.innerHTML =  (j25 - CloudCoin) + " in stock"; 
      }else
      {
      total25.innerHTML =  (s25 - CloudCoin) + " in stock"; 
      }
      changeTotal();
   }//end change total
 
   function add100( CloudCoin )
   {
      if( r1.checked ){
      total100.innerHTML =  (j100 - CloudCoin) + " in stock"; 
      }else
      {
      total100.innerHTML =  (s100 - CloudCoin) + " in stock"; 
      }
      changeTotal();
   }//end change total
 
   function add250( CloudCoin )
   {
      if( r1.checked ){
      total250.innerHTML =  (j250 - CloudCoin) + " in stock"; 
      }else
      {
      total250.innerHTML =  (s250 - CloudCoin) + " in stock"; 
      }
      changeTotal();
   }//end change total
 
 
   function changeTotal()
   {
      
      total = (in1.value * 1) +  (in5.value * 5) + (in25.value * 25) + (in100.value * 100) + (in250.value * 250) ;
      grandTotal.innerHTML = "Check Out Total: $" + (total * .01).toFixed(2); 	
   }//end change total
 </script> 
          

          
           </div>
            </div>
          

<br>
<br>
<br>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
