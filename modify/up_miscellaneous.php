<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
	$pactivity = $_POST['activity'];	
	$payear = $_POST['ayear'];
	$pdesc = $_POST['desc'];
	$username = $_SESSION['facultyid'];


	$insEvent_sql = "UPDATE Miscellaneous
    SET Activity = '$pactivity', 
        AcademicYear = '$payear', 
        Description = '$pdesc'
    WHERE MiscID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/i_miscellaneous.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>