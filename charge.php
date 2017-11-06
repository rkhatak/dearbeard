        <?php
        require_once('config.php');
        require_once('header.php');
        require_once('session.php');
        require_once('vendor/autoload.php');
        $UserEmail = $_SESSION['UserEmail'];
        $UserID = $_SESSION['UserID'];
        $amount = $_SESSION['amount'];
        $stripe = array(
        "secret_key"      => "sk_test_BlfB7XmW8MwiFlNNkjHQXfNV",
        "publishable_key" => "pk_test_phdcO15JgKj8bzJqXc53rRQE"
        );
        
        \Stripe\Stripe::setApiKey($stripe['secret_key']);
        //\Stripe\Stripe::$apiBase = "https://api-tls12.stripe.com";
        
        
        
        if(isset($_POST['stripeToken']))
        {
        $token = $_POST['stripeToken'];  
        $stripeEmail = $_POST['email'];  
        $amount = $_POST['amount'];  // Chargeble amount
        
        echo $amount;
        
        $customer = \Stripe\Customer::create(array(
        'email' => $stripeEmail,
        'source'  => $token
        ));
        
        $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $amount,
        'currency' => 'usd'
        ));
        
        
        
        if($charge->status == "succeeded" )
        {
        
        $transactions = array(
        
        'transactions_id' => $charge->id,
        'customer_email' => $stripeEmail,
        'total_amount ' => $charge->amount,
        'transactions_status' => $charge->status
        );
        $trans_insert = trans_insert($con,$transactions);
        
        // Update Orders Status
        $sql = "UPDATE orders SET order_status = 'Complete'  WHERE session_id = '$session_id' ";
        $run = mysqli_query($con,$sql) or die(mysqli_error($con));
        if($run == true)
        {
        $msg =  "<h5 style='color:green;'>Thanks For Payment</h5>";
        echo "<script>window.location ='success.php';</script>";
        }
        }else{
        
        $msg = "<h5 style='color:red;'>Payment Fail Please Try Again</h5>";
        }
        }
        ?>
        <!--sticky div-->    
        <div id="checkout">
        <div class="container">
        <div class="row">
        <!--payment-form--> 
        <div class="payment-form">
        <?php
        if(isset($msg))
        {
        echo $msg;	
        }
        ?>
        <h3>Payment form</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="payment-form">
        <span class="payment-errors"></span>
        <div class="form-group">
        <label for="cardnumber">Card Number</label>
        <ul class="credit_cards unstyled">
                      <li class="visa" data-type="visa"></li>
                      <li class="master_card" data-type="master"></li>
                      <li class="amex" data-type="amex"></li>
                      <li class="ddiscover" data-type="disc"></li>
                      <li class="diners" data-type="dinn"></li>
                      <li class="jcb" data-type="jcb"></li>
                    </ul>
        <input type="text" size="20" name="card_number" class="form-control" data-stripe="number" onblur="validateCardNumber()" onkeyup="detectCardType(event)">
        </div>
        <div class="form-group">
        <div class="row">
        <div class="col-xs-6">
        <div class="form-group">
        <label for="month">Month</label>
        <input type="text" size="2" maxlength="2" data-stripe="exp_month" class="form-control">
        </div>
        </div>
        <div class="col-xs-6">
        <label for="month">Year</label>
        <input type="text" size="4" maxlength="4" data-stripe="exp_year" class="form-control">
        </div>
        </div>
        </div>
        <div class="form-group">
        <label for="cvv">CVC</label>
        <input type="password" id="r_cvc" maxlength="4" size="4" data-stripe="cvc" class="form-control">
        </div>
        <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $_SESSION['UserEmail']; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
        <label for="amount">Amount</label>
        <input type="text" name="amount" id="r_amount" value="<?php echo $_SESSION['amount']; ?>" class="form-control" readonly>
        </div>
        <div class="form-group">
        <input type="submit" class="submit" value="Submit Payment">
        </div>
        </form>
        </div><!--payment-form--> 
        </div><!--row-->
        </div>
        </div>
        <div class="clearfix"></div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript">
        Stripe.setPublishableKey('pk_test_phdcO15JgKj8bzJqXc53rRQE');
        
        $(function() {
        var $form = $('#payment-form');
        $form.submit(function(event) {
          var amt=$.trim($('#r_amount').val());  
          if(amt<=50){
              alert('Order amount should be greator than 50');
              return false;
          }
            
        // Disable the submit button to prevent repeated clicks:
        $form.find('.submit').prop('disabled', true);
        
        // Request a token from Stripe:
        Stripe.card.createToken($form, stripeResponseHandler);
        
        // Prevent the form from being submitted:
        return false;
        });
        });
        
        function stripeResponseHandler(status, response) {
        // Grab the form:
        var $form = $('#payment-form');
        if (response.error) { // Problem!
        
        // Show the errors on the form:
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.submit').prop('disabled', false); // Re-enable submission
        var top = $(".payment-errors").offset().top - 200;
            $("html,body").stop().animate({ scrollTop: top });
        
        } else { // Token was created!

        if($('#r_cvc').val()==''){
                $form.find('.payment-errors').text('CVC number is required');
                $form.find('.submit').prop('disabled', false); // Re-enable submission
                var top = $(".payment-errors").offset().top - 200;
            $("html,body").stop().animate({ scrollTop: top });
                return false;      
        }
        // Get the token ID:
        var token = response.id;
        
        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));
        
        // Submit the form:
        $form.get(0).submit();
        }
        };
        </script>
        <!--footer-->
        <?php
        require('footer.php');
        ?>