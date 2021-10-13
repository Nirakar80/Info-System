<?php
session_start();
$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$ptitleofpaper = $_POST['titleOfPaper'];	
	$pconference = $_POST['conference'];
    $pstatus = $_POST['status'];	
	$pyearaccepted = $_POST['yearAccepted'];	
	$pacademicyear = $_POST['academicYear'];	
	$presearchtype = $_POST['researchType'];
    $pscope = $_POST['scope'];	
	$ptype = $_POST['type'];	
    $prefereed = $_POST['refereed'];
    $pinclusion = $_POST['inclusion'];	
	$ppaperdescription = $_POST['paperDescription'];
	$username = $_SESSION['facultyid'];	

    $insEvent_sql = "INSERT INTO ArticlesinProceedings (TitleofPaper, Conference, Status, YearAccepted, AcademicYear, ResearchType, Scope, Type,
     Refereed, Inclusion, PaperDescription, FacultyID) VALUES ('$ptitleofpaper  ', '$pconference', '$pstatus', '$pyearaccepted', '$pacademicyear', 
     '$presearchtype', '$pscope', '$ptype', '$prefereed', '$pinclusion', '$ppaperdescription', '$username') ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
	   	echo "Thank you for providng your response.";
		header("Refresh:1; url=../Lists/i_articlesinproceedings.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
