<?php
		$mysql_host="localhost";
		$mysql_pass="";
		$mysql_user="root";
		$mysql_err="<p>Could not connect...try again later...</p>";
		$mysql_db="hangman";
		if(!(@mysql_connect($mysql_host,$mysql_user,$mysql_pass)) || !(@mysql_select_db($mysql_db)))
			{ 
				die(mysql_error());
			
			}
		
	
	
		?>