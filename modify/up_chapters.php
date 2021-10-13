<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
	$pcategory = $_POST['category'];
    $ptitle = $_POST['title'];	
	$pstatus = $_POST['status'];
    $pyearcontracted = $_POST['yearContracted'];
    $pacademicyear = $_POST['academicYear'];
    $presearchtype = $_POST['researchType'];
    $prefereed = $_POST['refereed'];
	$pdescription = $_POST['description'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE Chapters
                    SET 
                        Category = '$pcategory', 
                        Title = '$ptitle',
                        sStatus = '$pstatus',
                        YearContracted = '$pyearcontracted',  
                        AcademicYear = '$pacademicyear',  
                        ResearchType = '$presearchtype', 
                        Refereed = '$prefereed', 
                        sDescription = '$pdescription'
                    WHERE ID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:1; url=../Lists/i_chapters.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
