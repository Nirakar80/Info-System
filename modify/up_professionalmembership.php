<?php

session_start();

$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");

$upinput = $_SESSION['objID'];

if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
} 
else {
	$pproMember = $_POST['proMember'];	
	$payear = $_POST['ayear'];
    $pscope = $_POST['scope'];
	$pdesc = $_POST['desc'];
	$username = $_SESSION['facultyid'];

	$insEvent_sql = "UPDATE ProfessionalMemberships 
                    SET ProfessionalMembership = '$pproMember', 
                        Years = '$payear' , 
                        Scope = '$pscope', 
                        Description = '$pdesc'
                    WHERE PMID = $upinput";

	$res = mysqli_query($mysqli, $insEvent_sql);

	if ($res === TRUE) {
		   echo "Thank you for providng your response.";
		   header("Refresh:2; url=../Lists/i_professionalmembership.php");
	} else {
		printf("Could not insert record: %s\n", mysqli_error($mysqli));
	}

	mysqli_close($mysqli);
}

?>