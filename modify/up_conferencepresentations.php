<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
    $ptitle = $_POST['titleOfPresentation'];
	$pconference = $_POST['conference'];	
	$ptype = $_POST['type'];
    $pstatus = $_POST['status'];
    $pyearaccepted = $_POST['yearAccepted'];
    $pacademicyear = $_POST['academicYear'];
    $presearchtype = $_POST['researchType'];
    $pscope = $_POST['scope'];
    $prefereed = $_POST['refereed'];
    $ppresentationtype = $_POST['presentationType'];
	$pdescription = $_POST['description'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE ConferencePresentations
                    SET 
                        TitleofPresentation = '$ptitle',
                        Conference = '$pconference',
                        sType = '$ptype',
                        sStatus = '$pstatus',
                        YearAccepted = '$pyearaccepted',  
                        AcademicYear = '$pacademicyear',  
                        ResearchType = '$presearchtype', 
                        Scope = '$pscope',
                        Refereed = '$prefereed', 
                        PresentationType = '$ppresentationtype',
                        sDescription = '$pdescription'
                    WHERE ID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:1; url=../Lists/i_conferencepresentations.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
