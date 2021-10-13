<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

// $facid = $_COOKIE['facid'];
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {

    $upinput = $_SESSION['objID'];

	$pactivity = $_POST['activity'];	
	$porg = $_POST['org'];
    $payear = $_POST['ayear'];
    $pscope = $_POST['scope'];
	$pdesc = $_POST['desc'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE CommunityService 
                    SET Activity = '$pactivity',
                        Organization = '$porg', 
                        AcademicYear = '$payear', 
                        Scope = '$pscope', 
                        Description = '$pdesc'
                    WHERE csID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/i_communityservice.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
