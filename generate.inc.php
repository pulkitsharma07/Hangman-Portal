<?php
$read=file("data/words.txt"); $tr=0;
$num=trim($read[0]);
$loc=mt_rand(1,$num-1);
$word=trim($read[$loc]);
$temp=$word;
$len=strlen($temp);

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
	?>