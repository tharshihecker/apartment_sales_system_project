<?php
include 'connect.php';
if(isset($_GET['deleteid']))
{
    $id=$_GET['deleteid'];
    $sql="delete from feedback where ID=$id";
    $result=mysqli_query($con,$sql);
    if($result)
    {
        //echo"deleted successfullt";
        header('locatio:display.php');
    }
    else
    {
        die(mysqli_query($con));

    }
}

?>