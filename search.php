<!DOCTYPE html>



<html>



<body> 

<?php
$user='root';
$pass='';
$db='borrow';
$con= new mysqli('localhost:3306',$user,$pass,$db) or die( "Could not connect to database " );
$id = $_POST["borrowsearchid"];
$q = " SELECT * FROM borrowing where borrowid ='$id'";

if (!preg_match("/^[1-9][0-9]*$/",$id)) {
    print("<p> invalid ID </p>");//return
die("</body></html>");
}
//$result = mysqli_query($con,$q);

//if (!$result)
//{
//print( "<p>Could not execute query!</p>" ); 
//die( mysqli_error($con) . "</body></html>" );
//}

 $q1= "SELECT * FROM borrowing where borrowid ='$id'";
 $result1 = mysqli_query($con, $q1);
 $totalborrower; 
 if (mysqli_num_rows($result1) > 0) {
	  print("<table border = '1'><thead><th>borrowid</th><th>borrowername</th><th> bookname</th><th>bookID</th><th>borrowingDate</th><th>ReturningDate</th><th>QuantityBorrowed</th></thead>");
	  
 while($row = mysqli_fetch_assoc($result1)) {
	 print("<tr> <td>".$row['borrowid']. "</td><td>" .$row['Borrowername']. "</td><td>" .$row['bookname']. "</td><td>" .$row['bookID']. "</td><td>" .$row['BorrowingDate']. "</td><td>" .$row['ReturningDate']. "</td><td>".$row['quantitiyborrowed']."</td>");
	 
 }
  print("</table>");
  
  
       
	  
		  
 } else {
	 
   print("0 results '$id'");
 }

  mysqli_close( $con );

?>

  
</body>

</html>