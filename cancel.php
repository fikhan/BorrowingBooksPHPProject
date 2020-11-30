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

if (!preg_match("/^[1-9][0-9]*$/",$id)) {
    print("<p> invalid ID </p>");//return
die("</body></html>");
}
$rew = mysqli_query($con,$q);
$rw = mysqli_fetch_assoc($rew);
$date = $rw['ReturningDate'];
$todaydate = date("Y-m-d");
$e = $rw['bookID'];
$bookID = $rw['bookID'];
if (!$rew )
{
print( "<p>Could not execute query!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}
$q2 = "SELECT borrowingprice from items where itemid='$bookID'";
$q3 = "SELECT quantitiyborrowed from borrowing where bookID='$bookID'";
$re = mysqli_query($con,$q2);
$row = mysqli_fetch_assoc($re); 
$re1 = mysqli_query($con,$q3);
$row1 = mysqli_fetch_assoc($re1);
$price = $row['borrowingprice'];
$bq = $row1['quantitiyborrowed'];
$price = $price * $bq;

$q4 = "DELETE FROM borrowing where borrowID='$id'";
if (! mysqli_query($con,$q4))
{
print( "<p>Could not execute query!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}

$q1= "SELECT * FROM borrowing ";
 $result1 = mysqli_query($con, $q1);
 $totalborrower; 
 if (mysqli_num_rows($result1) > 0) {
	  print("<table border = '1'><thead><th>borrowid</th><th>borrowername</th><th> bookname</th><th>bookID</th><th>borrowingDate</th><th>ReturningDate</th><th>QuantityBorrowed</th></thead>");
	  
 while($row = mysqli_fetch_assoc($result1)) {
	 print("<tr> <td>".$row['borrowid']. "</td><td>" .$row['Borrowername']. "</td><td>" .$row['bookname']. "</td><td>" .$row['bookID']. "</td><td>" .$row['BorrowingDate']. "</td><td>" .$row['ReturningDate']. "</td><td>".$row['quantitiyborrowed']."</td>");
	 
 }
  print("</table>");
  
  
       
	  
		  
 } else {
	 
   print("0 results");
 }

if($date > $todaydate)
{
print( "<p>Thank you $id is canceled successfully ! Fee returned is '$price'</p>" );
}
else
{
    print( "<p>Thank you $id is canceled successfully ! </p>" );
}
mysqli_close( $con );

?>

  
</body>

</html>