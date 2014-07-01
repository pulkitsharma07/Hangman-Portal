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
				img
						{		
						position:fixed;
						left:600px;
						top:160px;
						} 
						
						img.s
						{		
						position:fixed;
						left:600px;
						top:460px;
						} 
					img.header
					{
					
							position:relative;
							left: 400px;
							top:10px;
					
					}
					
				
</style>
<head><title>Welcome..!!</title></head>
<img class="header" src="images/header.png">
<a href="register.html"><img src="images/new_user.png" height="150" width="200"></a>
<?php
//include "sess_start.inc.php";
echo "<p>".$_session['start']."</p>";

?>
<a href="login.html"><img class="s" src="images/exist_user.png" height="150" width="200"></a>
</body>
</html>