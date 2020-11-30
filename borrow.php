<!DOCTYPE html>



<html>



<body> 

<?php




$BorrowerName = $_POST["name1"];
$email = $_POST["name2"];
$phonenumber= $_POST["name3"];
$bookname= $_POST["name4"];
$booktype = $_POST["name5"];
$bookID = $_POST["name6"];
$BorrowingDate = $_POST["name7"];
$ReturningDate = $_POST["name8"];
$qborrowed = $_POST["name10"];
$time = $_POST["name9"];


$user='root';
$pass='';
$db='borrow';
$con= new mysqli('localhost:3306',$user,$pass,$db) or die( "Could not connect to database " );

$q = " INSERT INTO  borrowing (Borrowername ,bookname ,
bookID 	,borrowingDate ,ReturningDate ,quantitiyborrowed)
 VALUES ('$BorrowerName' ,'$bookname' ,'$bookID'
 ,'$BorrowingDate' ,'$ReturningDate' ,'$qborrowed')";

$q3 = "SELECT itemstatus from items where itemid='$bookID'";
$q1 = "SELECT quantity from items where itemid='$bookID'";
$q2 = "SELECT borrowingprice from items where itemid='$bookID'";

$rd = mysqli_query($con,$q3);
$r = mysqli_fetch_assoc($rd); 
$sf = $r['itemstatus'];
if($sf == 'Unavailable')
{
  print( "<p>Item is unavailable!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}

if (! mysqli_query($con,$q))
{
print( "<p>Could not execute query!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}

$res = mysqli_query($con,$q1);
$row = mysqli_fetch_assoc($res); 
$qu = $row['quantity'];
if($qborrowed > $qu){
  print( "<p>This much quantity cannot be borrowed.!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}
$qu = $qu - $qborrowed;

if (!$res )
{
print( "<p>Could not execute query!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}

$q3 = " UPDATE items SET quantity = '$qu' WHERE itemid = '$bookID'";

if (! mysqli_query($con,$q3))
{
print( "<p>Could not execute query!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}

$res = mysqli_query($con,$q2);
$row = mysqli_fetch_assoc($res); 
$price = $row['borrowingprice'];
$price = $price * $qborrowed;

print( "<p>Thank you  the query successfully inserted! Your borrowing price is '$price' and Remaining Quantity for '$bookID' is '$qu'</p>" );

if (!preg_match("/\b(^IT[0-9]{3})\b/",$bookID)) {
    print("<p> invalid ID </p>");//return
die("</body></html>");
}

print( "<p>List of Items borrowed uptill now </p>" );
 $q1= "SELECT * FROM borrowing  ";
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
mysqli_close( $con );
   
?>

  
 </body>

</html>

