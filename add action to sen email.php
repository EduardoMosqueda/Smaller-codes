// enviar correo al administrador al pedir orden sin cambiar a procesando
add_action( 'woocommerce_checkout_order_processed', 'pending_new_order_notification', 20, 1 );
function pending_new_order_notification( $order_id ) {
    $order = wc_get_order( $order_id );

    // Only for "pending" order status
    if( ! $order->has_status( 'pending' ) ) return;

    // Send "New Email" notification (to admin)
    WC()->mailer()->get_emails()['WC_Email_New_Order']->trigger( $order_id );
}
