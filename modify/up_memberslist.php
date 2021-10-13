<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];


if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
	$pmemberID = $_POST['memberID'];	
	$pfname = $_POST['fname'];
	$pmname = $_POST['mname'];
    $plname = $_POST['lname'];
    $pcemail = $_POST['cemail'];
    $phireTerm = $_POST['hireTerm'];
    $pmstatus = $_POST['mstatus'];
    $pinvolve = $_POST['involve'];
    $pqualf = $_POST['qualf'];
    $phighDegree = $_POST['highDegree'];
    $pyearAwarded = $_POST['yearAwarded'];
    $pcollege = $_POST['college'];
    $prank = $_POST['rank'];
   

	$insEvent_sql = "UPDATE MembersList 
                     SET 
                        MemberID = '$pmemberID',
                        FirstName = '$pfname', 
                        LastName = '$plname',  
                        MiddleName = '$pmname', 
                        Email = '$pcemail',  
                        Status = '$pmstatus', 
                        HighDegree = '$phighDegree',
                        YearAwarded= '$pyearAwarded',  
                        College = '$pcollege', 
                        HireTerm = '$phireTerm',
                        Involvement = '$pinvolve',
                        Qualification = '$pqualf',
                        Rank = '$prank'  
                    WHERE ID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/l_memberslist.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
