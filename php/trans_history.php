<html>
<head>
	<title>Customer Details</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
		<link rel="stylesheet" href="history_style.css?v=<?php echo time(); ?>">
</head>
<body>


<?php

	
	$host = "localhost";
	$dbname = 'bank';
	$username = 'root';
	$password = '';

	$conn = mysqli_connect($host, $username, $password, $dbname);

	$result = mysqli_query($conn, "SELECT * FROM transact order by transaction_id desc");

	


?>
		<div class="header">
			<span class="icon">
			  <a href ="index.html"><i class="fas fa-home"></i></a>
			</span>
			<h1>TRANSACTION HISTORY</h1>
		</div>

		<div class = "main">
			<table>
				
				<thead class="table-head">
					<th>SENDER</th>
					<th>RECEIVER</th>
					<th>AMOUNT TRANSFERED</th>
					<th>DATE</th>
					<th>TIME</th>
				</thead>

				<?php

				while($res = mysqli_fetch_array($result)) {         
	            echo "<tr class='body-row'>";
	            echo "<td>".$res['sender']."</td>";
	            echo "<td>".$res['receiver']."</td>";
	            echo "<td>".$res['amount']."</td>";
	            echo "<td>".$res['date']."</td>";
	            echo "<td>".$res['time']."</td>";
	            echo "</tr>";
	      		  }

				?>

			</table>
		</div>

	</body>
	</html>