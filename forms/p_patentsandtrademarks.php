<?php
session_start();
$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$ppatenttitle = $_POST['patentTitle'];	
    $pstatus = $_POST['status'];	
	$pyearsubmitted = $_POST['yearSubmitted'];	
	$pacademicyear = $_POST['academicYear'];	
	$presearchtype = $_POST['researchType'];	
	$pdescription = $_POST['description'];
	$username = $_SESSION['facultyid'];

    $insEvent_sql = "INSERT INTO PatentsandTrademarks (PatentTitle, sStatus, YearSubmitted, AcademicYear, ResearchType, sDescription, FacultyID)
     VALUES ('$ppatenttitle', '$pstatus','$pyearsubmitted', '$pacademicyear', '$presearchtype', '$pdescription', '$username') ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
	   	echo "Thank you for providng your response.";
		header("Refresh:1; url=../Lists/i_patentsandtrademarks.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
