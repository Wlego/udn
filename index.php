<!--Doctype HTML-->

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head> 
<body>
    <div class="clear"><br/></div>
<div class="container">
	<div class="col-sm-8">  
		<form  action="" method="post">
			<input type="text" class="form-control" id="Search" name="Search" placeholder="введите строку для поиска">
			<div class="clear"><br/></div>
			<input type="submit" class="btn btn-primary" role="button" value="Найти" id="send" name="send" />
		</form>
	<div class="clear"><br/></div>
    <textarea rows="30" cols="100" id="result" name="result" class="form-control" rows="3" placeholder="результат поиска">
	
	<?	
	$search=$_POST['Search'];
	if (strlen($search)>2){
		$CONNECT = mysqli_connect('localhost', 'root', '', 'udn1');
		$postId=mysqli_query($CONNECT, "SELECT `postId`,`body` FROM comments WHERE `body` LIKE '%$search%'");	
		while (($row=mysqli_fetch_assoc($postId))!=false){	
			$title=mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `title` FROM posts WHERE `id` = '".$row['postId']."'"));			
			echo 'запись: \n "'.$title["title"].'" \n\n комментарий: \n "'.$row["body"].'" \n\n\n\n ';	
		}
	}
	else {echo 'Запрос на поиск не может быть меньше 3-х символов!';}
	?>
	
	</textarea>   	
	</div>
</div>
</body>

</html>


