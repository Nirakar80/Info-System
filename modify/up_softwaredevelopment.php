<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
    $ptitle = $_POST['stitle'];
    $pyearsubmitted = $_POST['yearCompleted'];
    $pacademicyear = $_POST['ayear'];
    $presearchtype = $_POST['research'];
	$poptions = $_POST['options'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE SoftwareDevelopment
                    SET 
                        SoftwareTitle = '$ptitle',
                        YearCompleted = '$pyearsubmitted',  
                        AcademicYear = '$pacademicyear',  
                        ResearchType = '$presearchtype',
                        Options = '$poptions'
                    WHERE SWDID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:1; url=../Lists/i_softwaredevelopment.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
