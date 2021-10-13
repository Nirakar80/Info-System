<html>
<head>
<title>Results</title>
<link rel="stylesheet" type="text/css" href="NSstyle.css">
</head>

<body>
<div id = "result">

<h1>Results for Your Search</h1>


<?php
session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");

$upinput = $_GET['id'];
$upsql=mysql_query("select * from Books where ID = '$upinput'" );

$result = mysqli_query($connect, $upsql);


echo "<table class='result'>";

while($row=mysql_fetch_assoc($upsql)){


echo "<tr>
	<td>".$row['ID']."</td></tr><tr>
	<td>".$row['Category']."</td></tr><tr>
        <td>".$row['Title']."</td></tr><tr>
	<td>".$row['sStatus']."</td></tr><tr>
        <td>".$row['YearContracted']."</td></tr><tr>
        <td>".$row['AcademicYear']."</td></tr><tr>
	<td>".$row['ResearchType']."</td></tr><tr>
	<td>".$row['Refereed']."</td></tr><tr>
	<td>".$row['sDescription']."</td></tr><tr>
	<td>".$row['FacultyID']."</td></tr><tr>
        <td>".$row['Revision']."</td>
        </tr>";


	$vid = $row['ID'];
	$vcategory = $row['Category'];
	$vtitle = $row['Title'];
	$vstatus = $row['sStatus'];
	$vyearcontracted = $row['YearContracted'];
	$vacademicyear = $row['AcademicYear'];
	$vresearchtype = $row['ResearchType'];
	$vrefereed = $row['Refereed'];
	$vdescription = $row['sDescription'];
}
//	$vcategory = $row['Category'];
echo "</table>";

echo $vacademicyear;
echo $vdescription;


echo " 
     <form action='upbooks.php' method='post'>
        
        <label> Record ID:</label>
        <input type='text' name='ID' size='5' value= '$vid'/><br><br>
        <label> Category:</label>
        <select name='category' id='category' >
          <option value='book' selected>Book</option>
          <option value='monograph'>Monograph</option>
          <option value='compilation'>Compilation</option>
          <option value='manual'>Manual/Guide</option>
        </select><br><br>

        <label> Title:</label>
        <input type='text' name='title' maxlength='100' size='15' value= '$vtitle'/><br><br>
        <label>Status:</label>
        <select name='status' id='status' value = '$vstatus' >
          <option value='draft'>Draft</option>
          <option value='proposed'>Proposed</option>
          <option value='underContract'>Under Contract</option>
          <option value='underReview'>Under Review</option>
          <option value='accepted' selected>Accepted</option>
          <option value='inPress'>In Press</option>
          <option value='published'>Published</option>
          <option value='ebook'>E-Book</option>
        </select><br><br>
        <label> Year Contracted:</label>
        <input type='text' name='yearContracted' maxlength='4' size='15' value='$vyearcontracted'/><br><br>
        <label> Academic Year:</label>
        <input type='text' name='AcademicYear' maxlength='11' size='15' value ='$vacademicyear' /><br><br>
        <label>Research Type:</label>
        <select name='researchType' id='researchType' >
            <option value='sd'>Scholarship of Discovery</option>
            <option value='sa'>Scholarship of Application</option>
            <option value='st' selected>Scholarship of Teaching</option>
            <option value='si'>Scholarship of Integration</option>
            <option value='nic'>Not counted as Separate Intellectual Contribution</option>
          </select><br><br>
        <label> Refereed: </label>
        <select name='refereed' id='refereed' value ='$vrefereed' >
          <option value='yes'>Yes</option>
          <option value='no' selected>No</option>
        </select><br><br>
        <label> Description: </label><br>
        <input type='textarea' rows='10' cols ='80' name='description' maxlength='250' value = '$vdescription' /><br><br>
        <input type='submit' name='submit' value='Submit'/> 
      </form> ";

echo "
<a href='cbooks.php'>Return to List</a>
    </div>
    </body>
    </html>";
$mysql_close();

?>
