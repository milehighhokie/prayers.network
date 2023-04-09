<?php
        $messageText = isset($_POST['messageText']) ? $_POST['messageText'] :"";

        if (empty($messageText)) {
          echo 'Error: Please fill in all the required fields.';
        } else {
            $isql ='INSERT INTO prayers (
                prayerText
                ,prayerEntryDate
                ,prayerReadCount
                ) VALUES ("'
                . $_POST['messageText'] .'","'
                .date("Ymd").'",0)';
            }

    		$link = mysqli_connect("localhost", "milehigh_prayers", "1234userPRAYERS", "milehigh_prayers"); 
    		  
    		if ($link == false) { 
    			die("ERROR: Could not connect. "
    						.mysqli_connect_error()); 
    		} 
    		
            if($link->query($isql) === TRUE)
            {
            	echo "<br> New prayer created successfully";
            } else {
            	echo "<br> Error: ".$isql."<br>".$link->error;
}    
            
            
            
            
            
          echo 'Thank you for your prayer.';
        
    //}
?>