<?php
session_start();
$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$ptitle = $_POST['title'];
    $pactivity = $_POST['activity'];
    $pyearsubmitted = $_POST['yearSubmitted'];
    $payear = $_POST['ayear'];
    $presearch = $_POST['research'];
    $pdesc = $_POST['desc'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "INSERT INTO OtherResearch (Title, ActivityType, YearSubmitted, AcademicYear, ResearchType, Description, FacultyID) 
	VALUES ('$ptitle', '$pactivity','$pyearsubmitted', '$payear', '$presearch', '$pdesc', '$username') ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
	   	echo "Thank you for providng your response.";
		header("Refresh:1; url=../Lists/i_otherresearch.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>