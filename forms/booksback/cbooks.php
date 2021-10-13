<html>
<head>
<title>Results</title>
<link rel="stylesheet" type="text/css" href="sbooks.css">
</head>

<body>
<div id = "result">

<h1>Results for Your Search</h1>

<?php
session_start();
mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");




$input = $_SESSION['facultyid'];


$sql=mysql_query("select * from Books where FacultyID = '$input'" );


$result = mysqli_query($connect, $sql);


echo "<div>";
echo "<table class='result'><tr>
<td width='5px'>Book</td>
<td width='60px'>Title</td>
<td width='5px'>Year</td>
<td width='8px'>FacultyID</td>
<td width='5px'>Edit</td>";
echo "<tr>";
echo "<td>";
echo "</td></tr>";



while($row=mysql_fetch_assoc($sql)){
echo "<tr>
	<td>".$row['ID']."</td>
	<td>".$row['Title']."</td>
	<td>".$row['YearContracted']."</td>
	<td>".$row['FacultyID']."</td>
	<td><a href='ubooks.php?id=".$row['ID']."'>Edit</a></td>
	</tr>";
}

//echo $output;		
echo "</table>"; 
mysql_close();

?>
</div>
</body>
</html>
