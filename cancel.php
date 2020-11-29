<!DOCTYPE html>



<html>



<body> 

<?php
$user='root';
$pass='';
$db='borrow';
$con= new mysqli('localhost:3306',$user,$pass,$db) or die( "Could not connect to database " );
$id = $_POST["borrowid"];
$q = " SELECT * FROM borrowing where borrowid ='$id'";

if (! mysqli_query($con,$q))
{
print( "<p>Could not execute query!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}

print( "<p>Thank you $id is canceled successfully !</p>" );
mysqli_close( $con );

?>

  
</body>

</html>