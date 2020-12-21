
<html>
<head>
	<title>Customer Details</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="transfer_style.css?v=<?php echo time(); ?>">
</head>
<body>


<?php

	session_start();

	$host = "localhost";
	$dbname = 'bank';
	$username = 'root';
	$password = '';


	$_SESSION["custId"] = 1;

	for ($x = 1; $x <= 10; $x++) {
	 
	 if(isset($_POST[$x]))
	 {
	 	$_SESSION["custId"] = $x;
	 	break;
	 }
	}

	$conn = mysqli_connect($host, $username, $password, $dbname);

	$cust = $_SESSION['custId'];

	$result = mysqli_query($conn, "SELECT * FROM customer where Customer_Id = $cust");

	$row = mysqli_fetch_row($result);

	$result2 = mysqli_query($conn, "SELECT * FROM customer");

	
	$conn->close();

?>


	<div class = "welcome">

		<h1 class="wel_msg">Welcome <?php echo $row[1]?>...</h1>
		<p class = "wel_body">ACCOUNT NUMBER - <?php echo $row[3]?></p>
		<p class = "wel_body">CURRENT BALANCE - <?php echo $row[4]?></p>

	</div>

	<div class="transfer_to">
		
		<form method="POST" action="http://localhost/Bank_System/transfer_to.php">

			<div >
			<span>Transfer To:</span>
			<select class="select" name = "reciever">
				<?php

					while($row2= mysqli_fetch_array($result2))
					{
						echo '<option value = '.$row2["Customer_Id"].'>'.$row2["Customer_Name"].'</option>';
					}
				?>
			</select>
			</div>
			<br>
			<div>
			<span>Enter Amount To Be Transfer:</span>
			<input class="amount" type = "NUMBER" name = 'amount'>
			</div>
			<br><br>
			<button class="button" type = 'submit'> TRANSFER</button>

		</form>
	</div>



</body>
</html>