<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];


if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
    $pbucs = $_POST['bucs'];
	$pcnumber = $_POST['cnumber'];
	$pctitle = $_POST['ctitle'];
	$pdesc = $_POST['cdesc'];
	$plearnObj = $_POST['learnObj'];


	$insEvent_sql = "UPDATE CoursesList
                    SET 
                        Department = '$pbucs', 
                        CourseNumber = '$pcnumber',  
                        CourseTitle = '$pctitle', 
                        CourseDescription = '$pdesc',
                        LearningObjectives = '$plearnObj'
                    WHERE courseID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/l_courseslist.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
