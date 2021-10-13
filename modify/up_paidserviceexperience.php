<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {	
	$pactivity = $_POST['activity'];
	$pcompany = $_POST['company'];
	$pfromYear = $_POST['fromYear'];
    $ptoYear = $_POST['toYear'];
    $plocation = $_POST['location'];
	$pdesc = $_POST['desc'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE PaidServiceExperience
                    SET  
                        Activity = '$pactivity', 
                        Company = '$pcompany',
                        FromYear = '$pfromYear', 
                        ToYear = '$ptoYear', 
                        Location = '$plocation', 
                        Description = '$pdesc'
                    WHERE PSEID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/i_paidserviceexperience.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>
