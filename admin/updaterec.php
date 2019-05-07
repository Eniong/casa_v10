<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	
</head>
<body>

		<?php

	    include('dbconnect.php');

	    $lot_no = $_GET['lot_no'];

	    $query = "SELECT * FROM tblots WHERE lot_no = '$lot_no'";

	    $result = mysqli_query($conn, $query);

	  ?>

	  <div class="container">
	  	<form class="form-horizontal" method="GET" action="update.php">
	  		<?php

		      while($row = mysqli_fetch_assoc($result))
		      {
		    
		      ?>

		       <input type="hidden" class="form-control" name="lot_no" value="<?php echo $row['lot_no']; ?>">


		      <div class="form-group">
		      	<label class="control-label col-sm-2 text-white" for="status">Status</label>
		      	<div class="col-sm-6">
		      		<select class="form-control" name="status">
		      			<option><?php echo $row['status']; ?></option>
		      			<option>Available</option>
		      			<option>Sold-Fully Paid</option>
		      			<option>Sold Installment</option>
		      			<option>Reserved with Downpayment</option>
		      			<option>Reserved</option>
		      			<option>Available with Housing Component</option>
		      		</select>
		      	</div>
		      </div>

		      <div class="form-group">
		      	<div class="col-sm-offset-2 col-sm-10">
		      		<button type="submit" class="btn btn-success">Save Changes</button>
		      	</div>
		      </div>

		      <?php

			      }

			      mysqli_close($conn);

			  ?>
	  	</form>
	  </div>
</body>
</html>