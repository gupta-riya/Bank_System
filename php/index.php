

<html>
<head>
	<title>Customer Details</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href="php_style.css?v=<?php echo time(); ?>">
</head>
<body>


<?php

	
	$host = "localhost";
	$dbname = 'bank';
	$username = 'root';
	$password = '';

	$conn = mysqli_connect($host, $username, $password, $dbname);

	$result = mysqli_query($conn, "SELECT * FROM customer");

	


?>
		<div class="header">
			<span class="icon">
			  <a href ="index.html"><i class="fas fa-home"></i></a>
			</span>
			<h1>CUSTOMERS</h1>
			<div class="button_cont" align="center"><a class="example_b" href="http://localhost/Bank_System/trans_history.php" rel="nofollow noopener">TRANSACTION HISTORY</a></div>
		</div>

		<div class = "main">
			<table>
				
				<thead class="table-head">
					<th>CUSTOMER ID</th>
					<th>CUSTOMER NAME</th>
					<th>EMAIL</th>
					<th>ACCOUNT NUMBER</th>
					<th>CURRENT BALANCE</th>
					<th>TRANSFER FROM</th>
				</thead>

				<?php

				while($res = mysqli_fetch_array($result)) {         
	            echo "<tr class='body-row'>";
	            echo "<td>".$res['Customer_Id']."</td>";
	            echo "<td>".$res['Customer_Name']."</td>";
	            echo "<td>".$res['Email']."</td>";
	            echo "<td>".$res['Account_No']."</td>";
	            echo "<td>".$res['Current_Balance']."</td>";
	            echo '<td><form method = "POST" action = "http://localhost/Bank_System/transfer.php"><button type="submit" class="btn btn-primary btn-sm" name='.$res["Customer_Id"].'>TRANSFER</button></form></td>'; 
	            echo "</tr>";
	      		  }

				?>

			</table>
		</div>

	</body>
	</html>