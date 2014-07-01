<html>	
<body>

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

<head><title>HOME</title></head>	
<?php
include "check_user.inc.php";
session_start();
$_SESSION['name']=$naam;
$_SESSION['id']=$id;




if($curr==NULL) // if current is not set... i.e this will execute only one time in the history of mankind...
	{  
				$read=file("data/words.txt");
$num=trim($read[0]);
$loc=mt_rand(1,$num-1);
$word=trim($read[$loc]);
$temp=$word;
$len=strlen($temp);
$_SESSION['name']=$naam;
if($len%2==0)
		$times=$len/2;
	else
		$times=(int)($len/2)+1;

	$times=$len-$times;
	$i=0;
	while($i!=$times)
				{
						$b=mt_rand(0,$len-1); if($temp[$b]=='_')continue;

						$temp[$b]='_'; $i++;

				}
	$sql = "UPDATE `hangman`.`users` SET `current`= '$temp' WHERE `users`.`id` = $id";
		mysql_query($sql)or die(mysql_error());
	$sql = "UPDATE `hangman`.`users` SET `word`= '$word' WHERE `users`.`id` = $id";
		mysql_query($sql)or die(mysql_error());
	$sql = "UPDATE `hangman`.`users` SET `loc`= $loc WHERE `users`.`id` = $id";
	mysql_query($sql)or die(mysql_error());
	$curr=$temp; // now the current is set
	}
$_SESSION['ques']=$curr;	
	
?>

<form name="test" action="game.php" method="post">
<a href="game.php">START NOW</a>

</body>
</html>