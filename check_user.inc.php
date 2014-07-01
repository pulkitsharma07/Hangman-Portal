<?php

		require 'connect.inc.php';
		
		
		

$user=0;
if(isset($_POST['name']) &&  $_POST['pass'])
{
	$username=htmlentities($_POST['name']);
$userpass=htmlentities($_POST['pass']);

	if($username!=NULL  && $userpass!=NULL)
{	
		$sql = "SELECT `password`, `name` , `current`, `id` FROM `users` WHERE  `username`=$username";
		if(ctype_digit($username) && mysql_query($sql)) // run the query will check if the the username is present in table
				{$sql_run=mysql_query($sql);
					
							if($query_row=mysql_fetch_assoc($sql_run))//if user name is present check  if any ouput is given....assign that outputed array to a new array
								{$pass=$query_row['password']; //assign the value of the text in passowrd field to a new varaible
								$naam=$query_row['name'];
									$curr=$query_row['current'];
								$id=$query_row['id'];
								
								
																	
									if($pass==md5($userpass)) //if the password from the form is same as the text in password  field from the result
											{
											
													$user=1;
													
											}
									else
										echo '<p> incorrect password </p>';
								}
							else
							echo '<p>NO such user in databse!!  try again</p>';
				}
		else
			echo '<p>NO such user in databse!!  try again</p>';

}

}
else
				{
					echo"<p>please fill the entries</p>";
					//echo '<FORM><INPUT Type="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>';
				}

if($user==0)die('<a href="login.html">Retry</a>');			
?>