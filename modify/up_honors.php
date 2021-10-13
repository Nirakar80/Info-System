<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
	$ptitle = $_POST['title'];	
	$porg = $_POST['org'];
	$payear = $_POST['ayear'];
    $ptype = $_POST['type'];
    $pcategory = $_POST['category'];
    $pstatus = $_POST['status'];
	$pdesc = $_POST['desc'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE Honors
                    SET 
                        Title = '$ptitle', 
                        Organization = '$porg', 
                        AcademicYear = '$payear',  
                        Type = '$ptype',  
                        Category = '$pcategory', 
                        Status = '$pstatus', 
                        Description = '$pdesc'
                    WHERE HonorsID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/i_honors.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
