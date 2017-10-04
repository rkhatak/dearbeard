<?php 
		require_once('header.php');
		require_once('session.php');
		$UserEmail = $_SESSION['UserEmail'];
		$UserID = $_SESSION['UserID'];
  $UserEmail = $_SESSION['UserEmail'];
  
  if(isset($_POST['pay']))
			{
			if(!empty($_POST['amount']) && $_POST['amount'] != 0 )
			{
				$amount =  $_POST['amount'];
				$order_tax =  $_POST['tax'];
				$product_id =  $_POST['product_id'];
			
			 $_SESSION['amount']  = $amount;
// Show All data Of User   
$user_data = userinfo($con,$UserEmail) ;
$custmer_info = mysqli_fetch_array($user_data);

$custmer_id =  $custmer_info['UserID'];
$custmer_name =  $custmer_info['UserFirstName']." ".$custmer_info['UserLastName'];
$custmer_email = $custmer_info['UserEmail'];
$custmer_phone = $custmer_info['UserPhone'];
$custmer_city = $custmer_info['UserCity'];
$custmer_state = $custmer_info['UserState'];
$custmer_zip = $custmer_info['UserZip'];
$custmer_country = $custmer_info['UserCountry'];
$custmer_add = $custmer_info['UserAddress'];


// Show All data Of Order Product


echo $sql_quick = "SELECT *FROM product WHERE product_id = '$product_id'";
$order_data = mysqli_query($con,$sql_quick) or die(mysqli_error($con));


while($order_info = mysqli_fetch_array($order_data))
{	
$order_name = $order_info['product_name'];
$order_proid = $order_info['product_id'];
$order_shipping = $order_info['product_shipping'];
$order_price = $order_info['product_price'];
$order_quantity = 1;
$order_type = 'card';
$order_amount = $order_price*$order_quantity;


$order_array = array(
					'session_id' => $session_id,
					'order_name' => $order_name,
					'order_proid' => $order_proid,
					'order_quantity' => $order_quantity,
					'custemer_id' => $custmer_id,
					'custemer_name' => $custmer_name,
					'customer_email' => $custmer_email,
					'customer_phone' => $custmer_phone,
					'custemer_city' => $custmer_city,
					'custemer_state' => $custmer_state,
					'custemer_zip' => $custmer_zip,
					'custemer_country' => $custmer_country,
					'Order_shipping' => $order_shipping,
					'order_tax' => $order_tax,
					'Billing_add' => $custmer_add,
					'shiping_add' => $custmer_add,
					'total_amount' => $order_amount,
					'payment_type' => $order_type
					); 
					
$order_result = insert_order($con,$order_array);
if($order_result == true)
{
	//header('Location:charge.php');
	echo '<script type="text/javascript">';
        echo 'window.location.href="charge.php";';
        echo '</script>';
}
					


}
}
else
{
echo "<h5>Please Select Product</h5>";
}
}
?>

	
	<!--footer-->
		<?php
		require('footer.php');
		?>