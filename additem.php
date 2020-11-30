<!DOCTYPE html>



<html>



<body> 

<?php




$ItemName = $_POST["name1"];
$ItemID= $_POST["name2"];
$BorrowingPrice= $_POST["name3"];
$ItemCategory= $_POST["name4"];
$Quantity= $_POST["name5"];
$ItemStatus = $_POST["name6"];
$AuthorName = $_POST["name7"];
$Publication = $_POST["name8"];
//$time = $_POST["name9"];


$user='root';
$pass='';
$db='borrow';
$con= new mysqli('localhost:3306',$user,$pass,$db) or die( "Could not connect to database " );

$q = " INSERT INTO  items (itemname ,itemid ,
borrowingprice 	,itemcategory ,quantity, itemstatus, authorname, publication )
 VALUES ('$ItemName' ,'$ItemID' ,'$BorrowingPrice'
 ,'$ItemCategory','$Quantity' ,'$ItemStatus' , '$AuthorName','$Publication')";


if (! mysqli_query($con,$q))
{
print( "<p>Could not execute query!</p>" ); 
die( mysqli_error($con) . "</body></html>" );
}

print( "<p>Thank you  the query successfully inserted!</p>" );

//if (!preg_match("/\b(^IT[0-9]{3})\b/",$bookID)) {
//    print("<p> invalid ID </p>");//return
//die("</body></html>");
//}


 $q1= "SELECT * FROM items";
 $result1 = mysqli_query($con, $q1);
 $totalborrower; 
 if (mysqli_num_rows($result1) > 0) {
	  print("<table border = '1'><thead><th>ItemName</th><th>ItemID</th><th>BorrowingPrice</th><th>ItemCategory</th><th>Quantity</th><th>ItemStatus</th><th>AuthorName</th><th>Publication</thead>");
	  
 while($row = mysqli_fetch_assoc($result1)) {
	 print("<tr><td>" .$row['itemname']. "</td><td>" .$row['itemid']. "</td><td>" .$row['borrowingprice']. "</td><td>" .$row['itemcategory']. "</td><td>" .$row['quantity']. "</td><td>".$row['itemstatus']. "</td><td>".$row['authorname']."</td><td>".$row['publication']."</td>" );
	 

 }
  print("</table>");
  
  
       
	  
		  
 } else {
	 
   print("0 results");
 }
mysqli_close( $con );
   
?>

  
 </body>

</html>