<html>
<head>
<title>Results</title>
<link rel="stylesheet" type="text/css" href="babynamestyle.css">
</head>

<body>
<div id = "result">

<h1>Results for Your Search</h1>

<?php

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");

//$option = "name";
$input = 71268;

//$input = 119;

$sql=mysql_query("select * from Books where FacultyID = '$input'" );

//$sql=mysql_query("select * from Books where ID = '$input'" );

$result = mysqli_query($connect, $sql);
echo "So far, so good";


echo "<div>";
echo "<table class='result'><tr>
<td width='60px'>Title</td>
<td width='5px'>Year</td>
<td width='8px'>FacultyID</td>";
echo "<tr>";
echo "<td>";
echo "</td></tr>";



while($row=mysql_fetch_assoc($sql)){
echo "<tr>
	<td>".$row['Title']."</td>
	<td><a href='https://www.w3schools.com'>".$row['YearContracted']."</td>
	<td>".$row['FacultyID']."</td>
	</tr>";
}




echo "</table>"; 
mysql_close();

?>
</div>
</body>
</html>
