<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
    $ptitle = $_POST['researchReportTitle'];
    $pinstitutionsubmitted = $_POST['institutionSubmitted'];
    $pyearsubmitted = $_POST['yearSubmitted'];
    $pacademicyear = $_POST['academicYear'];
    $presearchtype = $_POST['researchType'];
	$pdescription = $_POST['description'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE ResearchReports
                    SET 
                        ResearchandReportTitle = '$ptitle',
                        InstitutionSubmitted = '$pinstitutionsubmitted',
                        YearSubmitted = '$pyearsubmitted',  
                        AcademicYear = '$pacademicyear',  
                        ResearchType = '$presearchtype',
                        sDescription = '$pdescription'
                    WHERE ID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:1; url=../Lists/i_researchreports.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
