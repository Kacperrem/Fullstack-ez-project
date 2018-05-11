<?php
require_once 'connection.php';
$title = $_POST['title'];
$post = $_POST['post'];
$query = "INSERT INTO `blog_posts`(`title`, `post`) VALUES ('$title','$post')";
$run = mysqli_query($link, $query);
header("location: tableview.php");
?>