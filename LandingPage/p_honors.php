<?php
session_start();
$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

//$facid = $_COOKIE['facid'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$ptitle = $_POST['title'];	
	$porg = $_POST['org'];
	$payear = $_POST['ayear'];
    $ptype = $_POST['type'];
    $pcategory = $_POST['category'];
    $pstatus = $_POST['status'];
	$pdesc = $_POST['desc'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "INSERT INTO Honors (Title, Organization, AcademicYear, Type, Category, Status, Description, FacultyID) VALUES ('$ptitle', '$porg','$payear', '$ptype', '$pcategory', '$pstatus', '$pdesc', '$username') ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
	   	echo "Thank you for providng your response.";
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
