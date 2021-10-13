<?php

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
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

	$insEvent_sql = "INSERT INTO MembersList (MemberID, FirstName, MiddleName, LastName, Email, HireTerm, Status, Involvement, Qualification, HighDegree, YearAwarded, College, Rank) VALUES ('$pmemberID', '$pfname','$pmname', '$plname', '$pcemail', '$phireTerm', '$pmstatus','$pinvolve','$pqualf','$phighDegree','$pyearAwarded','$pcollege','$prank') ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:1; url=../Lists/l_memberslist.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>