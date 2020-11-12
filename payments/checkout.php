<?php 

session_start();
// Redirect to the home page if id parameter not found in URL
if(empty($_GET['amnt'])){
    header("Location: /Home");
}

// Include and initialize database class

// Include and initialize paypal class
include 'PaypalExpress.class.php';
$paypal = new PaypalExpress();

// Get product ID from URL
$price = $_GET['amnt'];
$productData = unserialize($_COOKIE['ordatrrs']);

// Redirect to the home page if product not found
if(empty($productData)){
    header("Location: /Home/?err=no product data");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Add Money to your Wallet | Essay Perfect</title>
</head>

<body>

<div class="item">
    <!-- Product details -->

    
    <!-- Checkout button -->
    <div id="paypal-button"></div>
<!--
JavaScript code to render PayPal checkout button
and execute payment
-->
<script>
paypal.Button.render({
    // Configure environment
    env: '<?php echo $paypal->paypalEnv; ?>',
    client: {
        sandbox: '<?php echo $paypal->paypalClientID; ?>',
        production: '<?php echo $paypal->paypalClientID; ?>'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
        size: 'small',
        color: 'gold',
        shape: 'pill',
    },
    // Set up a payment
    payment: function (data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: '<?php echo $productData['price']; ?>',
                    currency: 'USD'
                }
            }]
      });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
        return actions.payment.execute()
        .then(function () {
            // Show a confirmation message to the buyer
            //window.alert('Thank you for your purchase!');
            
            // Redirect to the payment process page
            window.location = "process.php?paymentID="+data.paymentID+"&token="+data.paymentToken+"&payerID="+data.payerID+"&pid=<?php echo $productData['id']; ?>";
        });
    }
}, '#paypal-button');
</script>
</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</body>
</html>