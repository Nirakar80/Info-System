<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
    $ptitle = $_POST['title'];
	$pactivitytype = $_POST['activity'];
    $pyearsubmitted = $_POST['yearSubmitted'];
    $pacademicyear = $_POST['ayear'];
    $presearchtype = $_POST['research'];
	$pdescription = $_POST['desc'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE OtherResearch
                    SET 
                        Title = '$ptitle',
						ActivityType = '$pactivitytype',
                        YearSubmitted = '$pyearsubmitted',  
                        AcademicYear = '$pacademicyear',  
                        ResearchType = '$presearchtype',
                        Description = '$pdescription'
                    WHERE ORID = $upinput";

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
