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


$sql=mysql_query("select * from Honors");


$result = mysqli_query($connect, $sql);

?>

<table>
  <tr>
    <th>ID</td>
    <th>Title</th>
    <th>Company</th>
    <th>Acadamic Year</th>
    <th>Type</th>
    <th>Category</th>
    <th>Status</th>
  </tr>
  
<?php 
while($row=mysql_fetch_assoc($sql)){?>

<tr>
    <td><?php echo $row['HonorsID'] ?></td>
    <td><?php echo $row['Title'] ?></td>
    <td><?php echo $row['Ogranization'] ?></td>
    <td><?php echo $row['AcadamicYear'] ?></td>
    <td><?php echo $row['Type'] ?></td>
    <td><?php echo $row['Categotry'] ?></td>
    <td><?php echo $row['Status'] ?></td>
    <td><a href="uhonors.php?id=$row['HonorsID']">Edit</a></td>
</tr>
<?php 
}

//echo $output;		
?>
</table>

<?php
mysql_close();
?>

</div>
</body>
</html>

