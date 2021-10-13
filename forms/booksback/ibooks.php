<?php

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
    $pcategory = $_POST['category'];
	$ptitle = $_POST['title'];	
    $pstatus = $_POST['status'];	
	$pyearcontracted = $_POST['yearContracted'];	
	$pacademicyear = $_POST['academicYear'];	
	$presearchtype = $_POST['researchType'];	
    $prefereed = $_POST['refereed'];	
	$pdescription = $_POST['description'];	

    $insEvent_sql = "INSERT INTO Books (Category, Title, sStatus, YearContracted, AcademicYear, ResearchType, Refereed, sDescription)
     VALUES ('$pcategory', '$ptitle', '$pstatus','$pyearcontracted', '$pacademicyear', '$presearchtype', '$prefereed', '$pdescription' ) ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
	   	echo "Thank you for providng your response.";
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
