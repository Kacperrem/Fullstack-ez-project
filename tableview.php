<?php
require_once 'connection.php';
// Initialize the session
session_start();
 
// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
 
  <title>Table View</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
 </head>
 <body>
 <div class="navbar-header">
    
    </div>
 <nav class="navbar navbar-inverse">
  <ul class="nav navbar-nav">
    <center>
     <ul class="nav navbar-nav navbar-right">
    
    <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Home</a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
     </ul>
    </center>
  </ul>
  </nav>
             
 
  <div class="page-header">

  <h2 align="center">Hi, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b>. Welcome to our site.</a></h2>
  </div>
  <h3 align="center">Add new post.</a></h3>
 
  
  <div class="container">
    <form action="add_script.php" method="post">
            
            <input type="text" name="title" class="form-control" placeholder="Enter Title" />           
            
            <textarea name="post" class="form-control" placeholder="Enter Post" rows="5"></textarea>
            
            <input type="hidden" name="comment_id" id="comment_id" value="0" />
            
            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" />
            
            <div class="page-header">
            </div>
    
    </form>

   
    <form action="view.php" method="post">

        <?php
        $con=mysqli_connect("localhost","root","","blog1");
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($con,"SELECT * FROM blog_posts");
        ?>
   
   <div class="container" style="margin:10px auto">
        
    <table id="mytable" class="table table-bordered table-striped ">
            <thead>
                <h2 align="center">Table View</h2>
                <tr>
                    <th>ID</th>
                    <th>Title</th>                    
                    <th>CheckBox</th>
                 </tr></center>
        <?php
        while($row = $result->fetch_assoc() )
        {
        ?>
        <tr>
            <td> <?php echo $row['id_post'] ?>  </td>
            <td><?php echo $row['title'] ?></td>
            <td><input type="checkbox"  name="<?php echo $row['id_post'] ?>" <?php $check=$row['public'];  if($check==1) echo "checked"; ?> value=1></td>
            </tr>
            <?php } ?>
            
        </thead>
        </table>
            <?php mysqli_close($con);  ?>
            <input type="submit" name="change" id="change" class="btn btn-primary" value="Change" />
            <div class="page-header">
            </div>
        </form>
    </div>
<h3 align="center">Add image</a></h3>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <center><p>Select image to upload:</p>
    <input type="file" name="image"/>
    <input type="submit" class="btn btn-primary" name="submit" value="UPLOAD"/>
    </center>
    </form>


<center><h1>Chose image to display</h1></center>

<form action="view_image.php"  method="post">
<?php
$con=mysqli_connect("localhost","root","","blog1");
$result= mysqli_query($con,"SELECT * FROM images");
?>
            <center><table border='1' class='table table-bordered table-striped'>
            <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Show</th>
            </tr></center>
            <?php
while($row = $result->fetch_assoc() )
{
?>
<tr>
<td> <?php echo $row['id'] ?>  </td>
<td><?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'" width="50" height="50"/>'; ?> </td>
<td><input type="checkbox" name="<?php echo $row['id'] ?>" <?php $check=$row['public'];  if($check==1) echo "checked"; ?> value=1></td>
</tr>
<?php } ?>
</table>
<input type="submit" class="btn btn-primary" value="Save"/> 
<div class="page-header">
</div>          
</form>




   
            
   <span id="comment_message"></span>
   <br />
   <div id="display_comment"></div>
  </div>
 </body>
</html>