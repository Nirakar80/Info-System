<?php
session_start();
$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$ptitleofpaper = $_POST['titleOfPaper'];	
	$pacademicyear = $_POST['academicYear'];	
	$presearchtype = $_POST['researchType'];
    $ptypeofactivity = $_POST['typeOfActivity'];	
    $ppaperdescription = $_POST['paperDescription'];
	$username = $_SESSION['facultyid'];	

    $insEvent_sql = "INSERT INTO ArticlesinProgress (TitleofPaper, AcademicYear, ResearchType, TypeofActivity, PaperDescription, FacultyID) VALUES
     ('$ptitleofpaper','$pacademicyear', '$presearchtype', '$ptypeofactivity', '$ppaperdescription', '$username') ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
	   	echo "Thank you for providng your response.";
		header("Refresh:1; url=../Lists/i_articlesinprogress.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
