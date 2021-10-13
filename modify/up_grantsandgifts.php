<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
    $ptitle = $_POST['grantOrGiftTitle'];
	$pgrantorgifttype = $_POST['grantOrGiftType'];
    $pstatus = $_POST['status'];
    $pyearaccepted = $_POST['yearAccepted'];
    $pacademicyear = $_POST['academicYear'];
    $pneworcontinuing = $_POST['newOrContinuing'];
    $psource = $_POST['source'];
    $presearchtype = $_POST['researchType'];
    $pfundingagency = $_POST['fundingAgency'];
    $prole = $_POST['role'];
	$pdescription = $_POST['description'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE GrantsandGifts
                    SET 
                        GrantorGiftTitle = '$ptitle',
                        GrantorGiftType = '$pgrantorgifttype',
                        sStatus = '$pstatus',
                        YearAccepted = '$pyearaccepted',  
                        AcademicYear = '$pacademicyear',  
                        NeworContinuing = '$pneworcontinuing',
                        Source = '$psource',
                        ResearchType = '$presearchtype', 
                        FundingAgency = '$pfundingagency',
                        sRole = '$prole',
                        sDescription = '$pdescription'
                    WHERE ID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:1; url=../Lists/i_grantsandgifts.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
