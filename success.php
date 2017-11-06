        <?php
        require_once('config.php');
        require_once('header.php');
        require_once('session.php');
        $sql_addcart = "delete FROM cart WHERE session_id='$session_id'";
        $run_addcart = mysqli_query($con,$sql_addcart) or die(mysqli_error($con));        
        ?>
        <div>Thanks you for your order</div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
            $('.quantity').html('0');
            $('.quantity').parent().next().next().html('Thanks you for payment. Please select product to make another shopping.')
        });
        </script>
        <?php
        require('footer.php');
        ?>