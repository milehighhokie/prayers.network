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
      background-color: #f5f5f5;
      margin: 0;
			padding: 0;
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
      margin: 20px;
      font-size: 100px;
      text-align:center;
      margin-top:-20px;
      color:#0f557b;
      font-family: 'Delicious Handrawn', cursive;
    }

    form {
      display: flex;
      flex-direction: column;
      align-items: center;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    input[type="submit"] {
      background-color: #10846f;
      color: #ffffff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 24px;
      cursor: pointer;
      transition: all 0.2s ease;
    }

    input[type="submit"]:hover {
      background-color: #09344c;
    }

    label {
      font-size: 24px;
      margin-bottom: 10px;
    }

    textarea {
      font-size: 24px;
      padding: 10px;
      border-radius: 5px;
      border: none;
      resize: vertical;
      min-height: 200px;
      margin-bottom: 20px;
    }

    .error {
      color: red;
      font-size: 18px;
      margin-bottom: 10px;
    }

    .success {
      color: #10846f;
      font-size: 24px;
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 40px;
    }

    th, td {
      border: 1px solid #cccccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #10846f;
      color: #ffffff;
    }

    tr:nth-child(even) {
      background-color: #f5f5f5;
    }
  </style>
</head>

<body>
  <header>
    <h1>Prayer Website</h1>
		<a href="index.html">Home</a>
		<a href="write.html">Write Prayer</a>
    <a href="read.php">Read Prayer</a>
  </header>
</body>

<main>
  <?php
          $messageText = isset($_POST['messageText']) ? $_POST['messageText'] :"";

          if (empty($messageText)) {
            echo 'Error: Please fill in all the required fields.';
          } else {
              $isql ='INSERT INTO prayers (
                  prayersText
                  ,prayersEntryDate
                  ,prayersReadCount
                  ) VALUES ("'
                  . $_POST['messageText'] .'","'
                  .date("Ymd").'",1)';
              

              $link = mysqli_connect("localhost", "milehigh_prayers", "1234userPRAYERS", "milehigh_prayers"); 
                
              if ($link == false) { 
                die("ERROR: Could not connect. "
                      .mysqli_connect_error()); 
              } 
          
              if($link->query($isql) === TRUE)
              {
                echo "<br> New prayer created successfully. ";
                echo '<br> Thank you for your prayer!!';
              } else {
                echo "<br> Error: ".$isql."<br>".$link->error;
              }
          }    

  ?>
</main>

</html>