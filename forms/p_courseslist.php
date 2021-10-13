<?php

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$pbucs = $_POST['bucs'];
	$pcnumber = $_POST['cnumber'];
	$pctitle = $_POST['ctitle'];
	$pdesc = $_POST['cdesc'];
	$plearnObj = $_POST['learnObj'];

	$insEvent_sql = "INSERT INTO CoursesList (Department, CourseNumber, CourseTitle, CourseDescription, LearningObjectives) VALUES ('$pbucs','$pcnumber', '$pctitle','$pdesc', '$plearnObj') ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:1; url=../Lists/i_courseslist.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>