<?php
$CONNECT = mysqli_connect('localhost', 'root', '');

$sql = 'CREATE DATABASE IF NOT EXISTS udn1';
mysqli_query($CONNECT,$sql);        

$posts = "CREATE TABLE posts (
userId INT(6) NOT NULL,
id INT(6) NOT NULL,
title text(300) NOT NULL,
body text(5000)
)";

$comments = "CREATE TABLE comments (
postId INT(6) NOT NULL,
id INT(6) NOT NULL,
name text(300) NOT NULL,
body text(5000)
)";

$CONNECT1 = mysqli_connect('localhost', 'root', '', 'udn1');
mysqli_query($CONNECT1,$posts);
mysqli_query($CONNECT1,$comments);
echo 'База данных успешно создана.';
?>


