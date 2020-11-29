<!DOCTYPE html>



<html>



<body> 

<?php

$user='root';
$pass='';
$db='borrow';
$id = $_POST["borrowid"];
$con= new mysqli('localhost:3306',$user,$pass,$db) or die( "Could not connect to database " );
$id = $_POST["borrowid"];
$q = " SELECT * from borrowing where borrowid ='$id'";
$result1 = mysqli_query($con,$q);
if (!$result1)
{
print( "<p>Could not execute query!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}

if (mysqli_num_rows($result1) > 0) {
    print("<table border = '1'><thead><th>borrowid</th><th>borrowername</th><th> bookname</th><th>bookID</th><th>borrowingDate</th><th>ReturningDate</th></thead>");
    
while($row = mysqli_fetch_assoc($result1)) {
   print("<tr> <td>".$row['borrowid']. "</td><td>" .$row['Borrowername']. "</td><td>" .$row['bookname']. "</td><td>" .$row['bookID']. "</td><td>" .$row['BorrowingDate']. "</td><td>" .$row['ReturningDate']. "</td>" );
   

}
print("</table>");
    
} else {
   
 print("0 results");
}

mysqli_close( $con );

?>

  
</body>

</html>