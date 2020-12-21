
<html>
<head>
	<title>success</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="transfer_style.css?v=<?php echo time(); ?>"
</head>
<body>



<?php

session_start();
	


	$host = "localhost";
	$dbname = 'bank';
	$username = 'root';
	$password = '';


	$reciever_id = $_POST['reciever'];
	$amount = $_POST['amount'];

	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	$conn = mysqli_connect($host, $username, $password, $dbname);

	$cust = $_SESSION['custId'];

	$sender = mysqli_query($conn,"SELECT Customer_Name FROM customer where Customer_Id = $cust");
	$sender = mysqli_fetch_row($sender);
	$sender = $sender[0];
	$receiver = mysqli_query($conn,"SELECT Customer_Name FROM customer where Customer_Id = $reciever_id");
	$receiver = mysqli_fetch_row($receiver);
	$receiver = $receiver[0];
	$result = mysqli_query($conn, "UPDATE customer SET Current_Balance = Current_Balance - $amount WHERE Customer_Id = $cust");
	$result2 = mysqli_query($conn, "UPDATE customer SET Current_Balance = Current_Balance + $amount WHERE Customer_Id = $reciever_id");
	$result3 = mysqli_query($conn,"INSERT INTO transact (sender,receiver,amount,date,time) VALUES ('$sender','$receiver',$amount,NOW(),NOW())");


	
	


	$conn->close();


?>

	
	
	<?php echo file_get_contents("http://localhost/Bank_System/index.php"); ?>
	<?php echo '<script>alert("Successfully Transfered....")</script>';?>

	


</body>
</html>
