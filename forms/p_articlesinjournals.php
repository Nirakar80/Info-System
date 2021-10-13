<?php

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} else {
	$ptitleofarticle = $_POST['titleOfArticle'];	
	$pperiodical = $_POST['periodical'];
    $pstatus = $_POST['status'];	
	$pyearaccepted = $_POST['yearAccepted'];	
	$pacademicyear = $_POST['academicYear'];	
	$presearchtype = $_POST['researchType'];	
    $ptypeofactivity = $_POST['typeOfActivity'];	
    $prefereed = $_POST['refereed'];	
	$particledescription = $_POST['articleDescription'];	

    $insEvent_sql = "INSERT INTO ArticlesinJournal (TitleofArticle, Periodical, sStatus, YearAccepted, AcademicYear, ResearchType, TypeofActivity,
	 Refereed, ArticleDescription) VALUES ('$ptitleofarticle', '$pperiodical', '$pstatus','$pyearaccepted', '$pacademicyear', '$presearchtype', 
	 '$ptypeofactivity', '$prefereed', '$particledescription' ) ";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
	   	echo "Thank you for providng your response.";
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
