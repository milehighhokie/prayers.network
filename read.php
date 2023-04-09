<!DOCTYPE html>
<html>
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Delicious+Handrawn&display=swap" rel="stylesheet">

	<title>Prayer Website</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #F5F5F5;
		}
		header {
			font-family: 'Pacifico', cursive;
			background-color: #10846f;
			color: #ffffff;
			padding: 20px;
			font-size: 20px;
			display: flex;
			display: flex;
  			align-items: center;
		}

		h1 {
			margin: 0;
		}

		header a {
			margin-left: 50px;
			font-family: 'Delicious Handrawn', cursive;
			color: #ffffff;
			font-size: 30px;
		}

		header a:hover {
			color:#09344c;
		}

		main {
			margin: 50px auto;
			max-width: 800px;
			padding: 20px;
			background-color: #fff;
			border: 1px solid #ccc;
		}
		table {
			width: 100%;
			border-collapse: collapse;
		}
		th {
			background-color: #5a8057;
			color: #fff;
			padding: 10px;
			text-align: left;
			border: 1px solid #ccc;
		}
		td {
			border: 1px solid #ccc;
			padding: 10px;
			text-align: left;
		}
		td a {
			color: #333;
			text-decoration: none;
			word-wrap: break-word;
		}
		td a:hover {
			text-decoration: underline;
		}
		footer {
			background-color: #333;
			color: #fff;
			padding: 10px;
			text-align: center;
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
		}
	</style>
</head>
<body>
	<header>
		<h1>Prayer Website</h1>
		<a href="index.html">Home</a>
		<a href="write.html">Write Prayer</a>
	</header>
	<main>
		<?php
			$link = mysqli_connect("localhost", "milehigh_prayers", "1234userPRAYERS", "milehigh_prayers"); 
			if ($link == false) { 
				die("ERROR: Could not connect. " . mysqli_connect_error()); 
			}
			
			$sql = "SELECT p.* FROM prayers p WHERE 1=1"; 

			if ($res = mysqli_query($link, $sql)) { 
				if (mysqli_num_rows($res) > 0) { 
					echo "<table>"; 
					echo "<tr>";
					echo "<th>Prayer</th>";
					echo "<th>Entry Date</th>";
					echo "<th>Number of times read</th>";
					echo "</tr>";
					while ($row = mysqli_fetch_array($res)) {
					    $res2 = mysqli_query($link, "UPDATE prayers SET prayersReadCount = prayersReadCount + 1 WHERE idprayers=".$row['idprayers']);
						echo "<tr>";
						echo "<td>";
						echo "<a idprayers=".$row['idprayers'].">";
						echo $row['prayersText'];
						echo "</a>";
						echo "</td>";
						echo "<td>".date('M j, Y', strtotime($row['prayersEntryDate']))."</td>";
						echo "<td>".$row['prayersReadCount']."</td>";
						echo "</tr>";
					} 
					echo "</table>"; 
				} 
				else { 
					echo "No matching records are found."; 
				} 
			} 
			else { 
				echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
			} 
		?>
	</main>
	<footer>
		<p>&copy; 2023 The Prayers Network. All rights reserved.</p>
	</footer>
</body>
</html>