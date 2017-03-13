# CloudCoinStripePayments
Allows users to buy CloudCoins using the Stripe Payment System and receive CloudCoins automatically.
CLOUDCOIN CONSORITIUM
 By Sean H Worthington
 3/12/2017
 Open Source. Free of charge. MIT Licence
 Provided as is with no garantees 

You must have three folders within a folder called "stripe": Bank (to hold your CloudCoins, Orders (to hold customer orders) and Code to hold the php scripts.

It starts with a buy.php page that is part of your website but outside your "stripe" folder.  buy.php inspects your inventory and creates an order form that does not allow your customers to buy things that are out of stock.

The buy.php sends data to a checkout.php page. The checkout.php page creates a form that will be sent to Stripe.com and then your server.
On the Checkoutpage, the user reviews what they are buying and then presses checkout. This is the only thing they can do on this page. 
When the checkout.php page's checkout button is pressed, the page sends an ajax request to stripe.com to create a customer tokken. The customer tokken is sent back to checkout.php. Then checkout.php sends all the information and information you specify to the stripe_service.php page via ajax. Stripe_service.php contacts Stripe.com directly and confirms the purchase. then stripe_service.php sends data back to the checkout.php page including links to the CloudCoin files. 






