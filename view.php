<?php
$con=mysqli_connect("localhost","root","","blog1");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM blog_posts");
//$mysqli->begin_transaction(MYSQLI_TRANS_START_READ_ONLY);
while($row = $result->fetch_assoc() )
{
 //if(isset($_POST['id_post'])
 $id=$row['id_post'];

    if(isset($_POST[$id])){
        echo "TRUE";
    $sql="UPDATE blog_posts SET public=1 WHERE id_post=$id";
    mysqli_query($con,$sql);
    }else{
        echo "FALSE";
        $sql="UPDATE blog_posts SET public=0 WHERE id_post=$id";
        mysqli_query($con,$sql);
    }
    
    //echo $_POST[$id];
    echo $id;
} 
$con->close();
//$mysqli->commit();
//echo $_POST['7'];
//mysqli_stmt_close($con);
header("location: tableview.php");
?>