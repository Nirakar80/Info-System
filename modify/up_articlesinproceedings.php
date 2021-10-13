<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
	$ptitle = $_POST['titleOfPaper'];	
	$pconference = $_POST['conference'];
	$pstatus = $_POST['status'];
    $pyearaccepted = $_POST['yearAccepted'];
    $pacademicyear = $_POST['academicYear'];
    $presearchtype = $_POST['researchType'];
    $pscope = $_POST['scope'];
    $ptype = $_POST['type'];
    $prefereed = $_POST['refereed'];
    $pinclusion = $_POST['inclusion'];
	$pdescription = $_POST['paperDescription'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE ArticlesinProceedings
                    SET 
                        TitleofPaper = '$ptitle',
                        Conference = '$pconference', 
                        Status = '$pstatus',
                        YearAccepted = '$pyearaccepted',  
                        AcademicYear = '$pacademicyear',  
                        ResearchType = '$presearchtype', 
                        Scope = '$pscope', 
                        Type = '$ptype',  
                        Refereed = '$prefereed', 
                        Inclusion = '$pinclusion', 
                        PaperDescription = '$pdescription'
                    WHERE paperID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:1; url=../Lists/i_articlesinproceedings.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
