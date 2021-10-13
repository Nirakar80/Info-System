<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];


if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
    $pstaffID = $_POST['staffID'];	
	$pfname = $_POST['fname'];
    $pmname = $_POST['mname'];
    $plname = $_POST['lname'];
    $pcemail = $_POST['cemail'];
    $pstatus = $_POST['status'];
    $phighDegree = $_POST['highDegree'];
    $pyearAwarded = $_POST['yearAwarded'];
    $pcollege = $_POST['college'];
    $phireTerm = $_POST['hireTerm'];
    $prank = $_POST['rank'];

	$insEvent_sql = "UPDATE ProfessionalStaff
                    SET 
                        StaffID  = '$pstaffID',
                        FirstName = '$pfname', 
                        LastName = '$plname',  
                        MiddleName = '$pmname', 
                        Email = '$pcemail',  
                        Status = '$pstatus', 
                        HighDegree = '$phighDegree',
                        YearAwarded= '$pyearAwarded',  
                        College = '$pcollege', 
                        HireTerm = '$phireTerm',
                        Rank = '$prank'
                    WHERE PSID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/l_professionalstaff.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
