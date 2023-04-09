<!DOCTYPE html>
<html>
<head>
	<title>Prayer Website</title>
</head>
<body>
	<header>
		<h1>Prayer Website</h1>
	</header>
	<main>
		<p>READ PAGE</p>
	</main>
	
	

		<?php
		$link = mysqli_connect("localhost", "milehigh_prayers", "1234userPRAYERS", "milehigh_prayers"); 
		  
		if ($link == false) { 
			die("ERROR: Could not connect. "
						.mysqli_connect_error()); 
		} 

		$sql = "
		SELECT p.* 
		FROM prayers p
		WHERE 1=1
		"; 

		if ($res = mysqli_query($link, $sql)) { 
			if (mysqli_num_rows($res) > 0) { 
				echo "<table bgcolor=white valign=top>"; 
				while ($row = mysqli_fetch_array($res)) { 
					echo "<tr><td>";
					echo "<a idprayers=".$row['idprayers'].">";
					echo $row['prayerText'].",".$row['prayerEntryDate']." (".$row['prayerReadCount'].")";
					echo "</a></td></tr>"; 
				} 
				echo "</table>"; 
			} 
			else { 
				echo "No matching records are found."; 
			} 
		} 
		else { 
			echo "ERROR: Could not able to execute $sql. "
										.mysqli_error($link); 
		} 
		 
		?>

	
	
	<footer>
		<p>&copy; 2023 Prayers Website. All rights reserved.</p>
	</footer>
	</body>
</html>
