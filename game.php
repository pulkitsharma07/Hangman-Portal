<html>	
<body>

<style type="text/css">
			  body {
			   background-image : url(images/back.png);
			position:fixed;
			   background-position: fixed;
			   
			 }
			 	h1 {
					color:#FF4566;
					font-family:tahoma;
					text-indent: 20px;
					font-size: 30px;					
					position:absolute;
							left: 0px;
							top:100px;
							
							}
							
				h3	{	text-align:left;
							font-style: oblique;}
					
					p  {	  text-align:left;
						text-indent:50px;
						line-height:150%;
						color: BLACK; 
						font-family:comic sans;
						font-size:80px;
						position: absolute;
						left: 100px;
						top: 200px;
					
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
				img.header
					{
					
							position:relative;
							left: 400px;
							top:10px;
					
					}
					
					img.hanger
					{
					
							position:absolute;
							left: 450px;
							top:10px;
					
					}
					h3
					{

					}
				
				
</style>
<head><title>PLAY!!</title></head>
<?php 
	//include "check_user.inc.php";
	/*
	get and display the current question... done
	
	get the user's input ..done
	
	check the user's input
	if character is present
		change the current question
	if character is not present
		displa
	*/
	session_start();
	require 'connect.inc.php';
	
if(!isset($_SESSION['name']))	{echo 'You must be logged in ...'; }



$id=$_SESSION['id'];
$sql = "SELECT `current` FROM `users` WHERE `id` =$id LIMIT 0, 30 ";
if($sql_run=mysql_query($sql))
	{	if($query_row=mysql_fetch_assoc($sql_run))
			{
			$curr=$query_row['current'];																									// the current question
			}
		else
			echo 'ptani kya' ;
	}
else
	echo mysql_error();
$xmen=0;
if(isset($_POST['ans']))
$chr=$_POST['ans']; 	
else
		$chr=NULL;
		
							
		$sql = "SELECT  `points` FROM `users` WHERE `id` = $id";	
					if(mysql_query($sql))
					{		$sql_run=mysql_query($sql);
						
						if($query_row=mysql_fetch_assoc($sql_run))
								{
								
										$p=$query_row['points'];
								
									}
								else
									echo 'blabla'.mysql_error();
									//echo '<p>'.$query_row['username'].'</p>';
							}
						else
							echo 'fail';
							
if($chr!=NULL)
{																															// the user's inputted character	
$sql = "SELECT `word` FROM `users` WHERE `id` =$id LIMIT 0, 30 ";
if($sql_run=mysql_query($sql))
	{	if($query_row=mysql_fetch_assoc($sql_run))
			{
			$word=$query_row['word'];																									// the answer to the question
			}
		else
			echo 'ptani kya' ;
	}
else
	echo mysql_error();

for($i=0;$i<strlen($word);$i++)
	{
		if($curr[$i]=='_' &&  $word[$i]==$chr)
			{
				$curr[$i]=$chr;	
				//echo ' found';
				break;
			}
		
	}
	$sql = "UPDATE `hangman`.`users` SET `current`= '$curr' WHERE `users`.`id` = $id";
		mysql_query($sql)or die(mysql_error());
		$sql = "SELECT `current_trials` FROM `users` WHERE `id` =$id"; 
		
				if(mysql_query($sql))
					{		$sql_run=mysql_query($sql);
						
						if($query_row=mysql_fetch_assoc($sql_run))
								{
								
										$tr=$query_row['current_trials'];
								
									}
								else
									echo 'blabla'.mysql_error();
									//echo '<p>'.$query_row['username'].'</p>';
							}
						else
							echo 'fail';
		
	if($i==strlen($word))																																	//if word is not found
			{	
					
				

					
				$tr++;
				//	echo 'increasesd to '.$tr;
				$sql = "UPDATE `hangman`.`users` SET `current_trials`=$tr WHERE `users`.`id` = $id";
				mysql_query($sql)or die(mysql_error());
			}
		
if(strcmp($curr,$word)==0) // correct answer is found
			{echo 'Correct answer!!!';			
			require 'generate.inc.php';
			$sql = "UPDATE `hangman`.`users` SET `current_trials`=0 WHERE `users`.`id` = $id";	
		mysql_query($sql)or die(mysql_error());
		
		
					$xmen=1;
					
				$p++;
				//	echo 'increasesd to '.$tr;
				$sql = "UPDATE `hangman`.`users` SET `points`=$p WHERE `users`.`id` = $id";
				mysql_query($sql)or die(mysql_error());
			}
	if($tr==7)
	{	echo ' YOu failed!!';
		echo '<img class="hanger" src="images/hangman/7.png">';
	
		require 'generate.inc.php';
		
		$sql = "UPDATE `hangman`.`users` SET `current_trials`=0 WHERE `users`.`id` = $id";	
		mysql_query($sql)or die(mysql_error());
		$xmen=1;
	}
		
$time=1;


if($tr==1)echo '<img class="hanger" src="images/hangman/1.png">';
if($tr==2)echo '<img class="hanger" src="images/hangman/2.png">';
if($tr==3)echo '<img class="hanger" src="images/hangman/3.png">';
if($tr==4)echo '<img class="hanger" src="images/hangman/4.png">';
if($tr==5)echo '<img class="hanger" src="images/hangman/5.png">';
if($tr==6)echo '<img class="hanger" src="images/hangman/6.png">';

}
//else echo '<p class="points"> Questions you have solved.....'.$p.' </p>';
echo '<h1>Questions you have solved.....'.$p.' </h1>';
echo "<form action='index.html'><input type='submit' value='Logout'></form>";
  ?>
<?php echo'<p>'.$curr.'</p>';?>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
   <input type="text" name="ans" size="1" style="position: absolute;
						left: 250px;
						top: 400px;"><br>
   <input type="submit" name="submit" value="<?php if($xmen==1)echo 'Next Problem'; else echo'Submit'; ?>"  style="position: absolute;
						left: 250px;
						top: 450px;"><br>
</form>


</body>
</html>