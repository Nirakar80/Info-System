<?php

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

session_start();
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	echo "total failure";
	exit();
} else {
	$pid = $_POST['ID'];
   	 $pcategory = $_POST['category'];
	$ptitle = $_POST['title'];	
   	$pstatus = $_POST['status'];	
	$pyearcontracted = $_POST['yearContracted'];	
	$pacademicyear = $_POST['AcademicYear'];	
	$presearchtype = $_POST['researchType'];	
    	$prefereed = $_POST['refereed'];	
	$pdescription = $_POST['description'];	

echo $pdescription;
echo $pacademicyear;

    $insEvent_sql = "UPDATE Books SET Category = '$pcategory', Title  = '$ptitle', sStatus = '$pstatus', 
	YearContracted = '$pyearcontracted', AcademicYear = '$pacademicyear', ResearchType = '$presearchtype',
	Refereed = '$prefereed', sDescription = '$pdescription'  where ID = '$pid'";


	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
	   	echo "Thank you for providng your response.";
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
