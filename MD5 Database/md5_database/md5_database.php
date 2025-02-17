<?php



require_once("db_connect.php");
?>




<style type="text/css">


div {

position: absolute;
width: 650px;
height:150px;




}







div#d2{	

background-color:#00008B;
height:215px;
left:10px;
top: 50px;
z-index:0;
}





div#d3{	
background-color:#B0C4DE;
height:215px;
left: 360px;
top: 50px;
z-index:1;
}


div#d4{
height:25px;

background-color:black;
color:white;

z-index:2;
}

div#d5{
color:red;

}


</style>










<head><title>Search</title></head>
<body>


<h1>MD5 Database</h1>


<?php
 $db_link = db_connect("md5_db");
    $self = $_SERVER['PHP_SELF'];


?>


<div id="d2">
<table>
<form action= "<?php echo $self ?>"method="post" >

<textarea rows="4" cols="40" wrap="physical" name="comments" type="text" id = "form-textarea">
</textarea>

<tr><td><input type="submit" name="Submit" value="Submit MD5"> <input type="submit" name="a href="Database.php" value="Refresh"> </td></tr>


</table>
</div>



<br><br><br><br><br><br><br><br><br><br><br><br>
   <div id="d3">
 <div id="d4">
	 Number <input name="File" type="text">
                
 Classification
<input type="checkbox" name="Det" value="good.jpeg" >Good
<input type="checkbox" name="Det" value="bad.jpeg" >Bad
<input type="checkbox" name="Det" value="unknown.jpeg" >Unknown
 <input type="submit" name="Update" value="Update" />
	</div>

<br><br>










  <table>
	<tr> <td>MD5 </td> <td><input name="MD5" type="text"><td><tr>

	<tr> <td>MalwareType </td> <td><input name="MalwareType" type="text"><td><tr>
	<tr><td>FileName </td> <td><input name="FileName" type="text" /><td><tr>
	<tr><td>Size </td> <td><input name="Size" type="text" /><tr><td>
	 <tr><td>Date </td> <td><input name="Date" type="text" /><tr><td>
                
	<tr><td><input type="submit" name="Insert" value="Insert" /><tr><td>
	</table>



</div>







</form>



<?php


// Connect to server and select a database --- Call the function db_connect() in db_connect(External File)

   
	if (isset($_POST['Submit']))
	{
		

	   
	 
                $comments = trim(isset($_REQUEST['comments'])) ? $_REQUEST['comments'] : '';

		$query = "SELECT * FROM md5_database WHERE MD5 = '$comments'";
		
		    
		// echo $query. "<p>";

		$result = mysql_query($query);



// If a match exists (my_sql_num rows function > 0,
	if (mysql_num_rows($result) > 0)
		{
	

echo "<table align = 'left' border = '1' cellpadding = '3'>";












// Fetch and print all the records in HTML table format, if records exist

		while ($row = mysql_fetch_assoc($result))
			{
			echo "<tr>\n";
   			
 			 $id = $row['File'];
  			 $first = $row['MD5'];
  			 $second = $row['MalwareType'];
   			  $third = $row['FileName'];
   			 $fourth = $row['Size'];
  			 $fifth = $row['Det'];
                         $sixth = $row['Date'];

   
  			echo "<td> $id</td>";
 			echo "<td> $first</td>";
			 echo "<td> $second</td>";
 			echo "<td> $third</td>";
 			echo "<td> $fourth</td>";

  			 echo "<td> <img src = 'images/$fifth'></td>";
                        echo "<td> $sixth</td>";


 
   			echo "</tr>\n";
			}
	  echo "</table>\n";
		}
// Else -- State there are no records

		else
		{
			echo 'No matching record found for the details entered';
		}
		mysql_close();
	}
else // if have not clicked on submit button
	{





$fields = mysql_list_fields("md5_db", "md5_database");
$num_columns = mysql_num_fields($fields);

// Make a simple database query to select all columns and rows

$query = "SELECT * FROM md5_database";
$result = mysql_query($query) or die("SQL query failed");


// Display results as an HTML table. Note how mysql_field name
// uses the $fields object to extract the column names

echo '<table border="1" cellpadding = "5" >', "\n";

// Display the column names

echo "<tr>\n";
for ($i = 0; $i < $num_columns; $i++)
{
   echo "<th>", mysql_field_name($fields, $i), "</th>\n";
}

echo "</tr>\n";

// Loop over the rows of the table.
// $row containsthe the information for each row
// Refer to the names of the fields in the table
// Must ahow the path where the image files are held






while ($row = mysql_fetch_assoc($result))
{


  echo "<tr>\n";
   			

   $id = $row['File'];
   $first = $row['MD5'];
   $second = $row['MalwareType'];
   $third = $row['FileName'];
   $fourth = $row['Size'];
   $fifth = $row['Det'];
   $sixth = $row['Date'];

   
  echo "<td> $id</td>";
 echo "<td> $first</td>";
 echo "<td> $second</td>";
 echo "<td> $third</td>";
 echo "<td> $fourth</td>";

   echo "<td> <img src = 'images/$fifth'></td>";
 
echo "<td> $sixth</td>";

echo "</tr>\n";


}
echo "</table>\n";






if (isset($_REQUEST['Insert']))
{
		$first =  $_REQUEST['MD5'];
		$second =  $_REQUEST['MalwareType'];
		$third =  $_REQUEST['FileName'];
		$fourth =  $_REQUEST['Size'];
		$fifth =  $_REQUEST['Det'];
                $sixth =  $_REQUEST['Date'];

// INSERT command enters a new row in the md5_databade table

		$query1 = "INSERT INTO md5_database(MD5, MalwareType, FileName, Size, Det, Date) VALUES ('$first', '$second', '$third ', '$fourth' , '$fifth', '$sixth')";

        echo "<p>". $query1;

// Run the query

		$result1 = mysql_query($query1) or die("<br>Insertion failed");

// If the query ran OK - Print a message
       if ($result1)
        {
        echo "<p>Thank you user for submitting your information <br>";
		echo "<p>You are now registered in the database";
		}
		else
		{
		 $error .=
       "<span class= 'error'><br>You could not be registered due to a system error </span></br>";
		 echo $error;
		 }

// Close the database connection
		mysql_close();

}






if (isset($_POST['Update']))
	{



		
 		$id = $_REQUEST['File'];
		
		$fifth =  $_REQUEST['Det'];

// INSERT command enters a new row in the md5_database table

		



 $query2 = "UPDATE md5_database SET Det = '$fifth' WHERE File = '$id'";


        echo "<p>". $query2;

// Run the query

		$result2 = mysql_query($query2) or die("<br>Insertion failed");

// If the query ran OK - Print a message
       if ($result2)
        {
        echo "<p>Thank you ". $MD5 . " for submitting your information <br>";
		echo "<p>You are now registered in the database";
		}
		else
		{
		 $error .=
       "<span class= 'error'><br>You could not be registered due to a system error </span></br>";
		 echo $error;
		 }
// Close the database connection
		mysql_close();





}



?>



<?php
	}
?>




