
<html>
<body>
<head><title>Registration Form</title></head>
<style type="text/css">
			  body {
			   background-image : url(images/back.png);
			position:fixed;
			   background-position: fixed;
			   
			 }
			 	h1 {text-align:center;
					color:#FF4566;
					font-family:slant;
					text-indent: 20px;
					font-size: 100px;
					position:static}
				h3	{	text-align:left;
							font-style: oblique;}
					
					p  {	  text-align:left;
					text-indent:50px;
						line-height:150%;
					color: BLACK; 
					font-family:comic sans;
					font-size:50px;
					
					} 
				
			td{
			font-family:Tahoma;
			font-size:18px;
			
			}
				table  {
						position:fixed;
						left:580px;
						top:200px;
							font-family:comic sans;
								}
				img.log	
						{		
						position:fixed;
						left:500px;
						top:20px;
						} 
					img.inf
					{
						
						position:fixed;
						//left:600px;
						left:900px;
						top:100px;
						
					
				}
				
</style>

<?php
 require 'connect.inc.php';
$username=htmlentities($_POST['name']);
$userpass=md5(htmlentities($_POST['pass']));
$usererr=htmlentities($_POST['num']);
$chk="SELECT `id` FROM `users` WHERE `username` LIKE $usererr";
$data_enter = "INSERT INTO `hangman`.`users` (`id`, `username`, `password`, `name`) VALUES (NULL,'$usererr','$userpass', '$username')";

if($username==NULL || $usererr==NULL ||$userpass==NULL)
			{
				echo 'PLEASE FILL ALL THE DETAILS.....';
				
			}
else
{			
		if(mysql_query($chk))
		{
			$sql_run=mysql_query($chk);
					if(mysql_fetch_assoc($sql_run))
							{
									echo'<p>THIS ENROLLMENT NUMBER IS ALREADY REGISTERED</p>';
							}
					else
						{						
							if(mysql_query($data_enter))
									echo'Thank you for registering.......please login into your account from <a href="login.html">here</a>';
								else
									echo mysql_error();
						
						}
				
		}
			else
				{
					if(mysql_query($data_enter))
									echo'Thank you for registering.......please login into your account from <a href="login.html">here</a>';
								else
									echo mysql_error();
				
				}
	
	
}

	
?>

</body>
</html>