<?php
$con=new mysqli('localhost','root','','ApartmentSalesSystem');
if($con)
{
    echo"connection suceesful";

}
else
{
    die(mysqli_error($con));

}

?>