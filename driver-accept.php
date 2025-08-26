<?php
if (isset($_GET['stb_driver_accept'], $_GET['order_id'], $_GET['driver_id'])) {
    $order_id = intval($_GET['order_id']);
    $driver_id = intval($_GET['driver_id']);

    update_post_meta($order_id, '_driver_accepted', 'yes');

    // Send customer notification
    $order = wc_get_order($order_id);
    $customer_email = $order->get_billing_email();

    $driver_name = "Your driver";
    $message = "Your ride has been assigned. Driver ID: $driver_id";

    wp_mail($customer_email, "Driver Assigned", $message);

    echo "Driver accepted successfully.";
    exit;
}

require_once dirname(__FILE__) . '/includes/class-sms-email.php';

$driver_info = [
    'Driver ID' => $driver_id,
    'Vehicle No' => 'ABC-1234' // placeholder, extend later
];

STB_SMS_Email::send_customer_driver_info($customer_email, $driver_info);
