<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for snap popup:
// https://docs.midtrans.com/en/snap/integration-guide?id=integration-steps-overview

namespace Midtrans;

use mysqli;

require_once dirname(__FILE__) . '/../../Midtrans.php';
require '../../../php/1_conn.php';
// Set Your server key
// can find in Merchant Portal -> Settings -> Access keys
Config::$serverKey = 'SB-Mid-server-mGoXp20E0tHl4gUeCVgD-L0P';
Config::$clientKey = 'SB-Mid-client-KrbReCvzdmYc2q9y';

// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

// Uncomment for production environment
// Config::$isProduction = true;
Config::$isSanitized = Config::$is3ds = true;

$inv_id = $_GET['order_id'];

$queries = mysqli_query($conn, "SELECT * FROM invoice JOIN order_table ON invoice.order_id = order_table.order_id JOIN product ON invoice.product_id = product.product_id JOIN user ON invoice.user_id = user.user_id JOIN user_address ON invoice.address_id = user_address.address_id WHERE invoice_id = '$_GET[order_id]'");
$row = mysqli_fetch_assoc($queries);

// Required
$transaction_details = array(
    'order_id' => $row['invoice_id'],
    'gross_amount' => $row['subtotal'],
);
// Optional
$item_details = array (
    array(
        'id' => 'a1',
        'price' => $row['subtotal'],
        'quantity' => 1,
        'name' => $row['product_name'],
    ),
  );
// Optional
$customer_details = array(
    'first_name'    => $row['username'],
    'last_name'     => "",
    'email'         => $row['email_address'],
    'phone'         => "0812939457",
    'billing_address'  => $row['email_address'],
    'shipping_address' => $row['email_address']
);
// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

$snap_token = '';
try {
    $snap_token = Snap::getSnapToken($transaction);
}
catch (\Exception $e) {
    echo $e->getMessage();
}

function printExampleWarningMessage() {
    if (strpos(Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'SB-Mid-server-mGoXp20E0tHl4gUeCVgD-L0P\';');
        die();
    } 
}

?>

<!DOCTYPE html>
<html>
    <body>
        <button id="pay-button">Pay Now</button>
        <!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
        <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo Config::$clientKey;?>"></script>
        <script type="text/javascript">
            document.getElementById('pay-button').onclick = function(){
                // SnapToken acquired from previous step
                snap.pay('<?php echo $snap_token?>');
            };
        </script>
    </body>
</html>
