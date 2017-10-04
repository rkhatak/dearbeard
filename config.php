<?php
require_once('vendor/autoload.php');
$stripe = array(
  "secret_key"      => "sk_test_BlfB7XmW8MwiFlNNkjHQXfNV",
  "publishable_key" => "pk_test_phdcO15JgKj8bzJqXc53rRQE"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>