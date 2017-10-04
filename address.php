		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
		$("select#state").change(function(){

		var selectedState = $("#state option:selected").val();

		$.ajax({

		type: "POST",

		url: "address.php",

		data: { state : selectedState } 

		}).done(function(data){

		$("#cityresponse").html(data);

		});

		});
		});
		</script>

		<?php
		require('function.php');
		if(isset($_POST["country"])){

		// Capture selected country

		$country = $_POST["country"];
		$sql_country = "SELECT *FROM states WHERE country_id = '$country' ";
		$run_country = mysqli_query($con,$sql_country) or die(mysqli_error($con));
		?>
		<select name="state" id ="state" class="form-control down">
		<?php
		while($data_state= mysqli_fetch_array($run_country))
		{
		?>


		<option value="<?php echo $data_state['id'];?>"><?php echo $data_state['name'] ;?></option>
		<?php
		}
		}

		// City

		if(isset($_POST["state"])){



		$state = $_POST["state"];
		$sql_state = "SELECT *FROM cities WHERE state_id = '$state' ";
		$run_state = mysqli_query($con,$sql_state) or die(mysqli_error($con));
		?>
		<select name="city" id ="city" class="form-control down">
		<?php
		while($data_city= mysqli_fetch_array($run_state))
		{
		?>


		<option value="<?php echo $data_city['name'];?>"><?php echo $data_city['name'] ;?></option>
		<?php
		}
		}
		?>

