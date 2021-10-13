<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

include 'ccook.php';
##include 'ccookr.php';

$facid = $_COOKIE['facid'];
## echo $facid;
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$pcompany = $_POST['company'];	
	$pposition = $_POST['position'];
	$pfromYear = $_POST['fromYear'];
    $ptoYear = $_POST['toYear'];
    $plocation = $_POST['location'];
	$pdesc = $_POST['desc'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "INSERT INTO EmploymentExperience (Company, Position, FromYear, ToYear, Location, Description, FacultyID) VALUES ('$pcompany', '$pposition','$pfromYear', '$ptoYear', '$plocation', '$pdesc', '$username') ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/i_employmentexperience.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
