
<html>
<head>
<title>Results</title>
</head>
<link rel="stylesheet" type="text/css" href="babynamestyle.css">
<body>
<div id = "result">

<h1>Faculty Books</h1>

<?php

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");
//$input = 71268;
// $sql=mysql_query("select * from facinfo where FacultyID  = '$input'" );

$sql=mysql_query("select * from Books" );
$result = mysqli_query($connect, $sql);
echo "test";

echo "<div class="result">";

echo "<table><tr>
 <td width='4px'>Year</td>
 <td width='65px'>Title</td>
 <td width='15px'>Status</td>
 <td width='10px'>FacultyID</td>"
//echo "<td>000</td>";
echo "<tr>";
echo "</table>";

/*
while($row=mysql_fetch_assoc($sql)){
echo "<tr>
	<td>".$row['YearContacted']."</td>
	<td>".$row['Title']."</td>
	<td>".$row['sStatus']."</td>
	<td>".$row['FacultyID']."</td>
	</tr>";
}
echo "</table>"; 

*/
echo "</div>";
echo "</body>";
echo "</html>";

mysql_close();

?>
