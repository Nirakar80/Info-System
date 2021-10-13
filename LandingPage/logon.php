<?php

session_start();
// connect to database
$mysqli = mysqli_connect("localhost", "webuser", "d0nkey5", "facinfo");


// while connect failed
if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
}
// while connection established
else {

        // fetch data from forms
        $myusername = $_POST['logonID'];
        $mypassword = $_POST['password'];
        
        // retrieve data from database
        $sql = "SELECT * FROM logon as log WHERE log.logonID = $myusername and log.password = $mypassword";
        $result = mysqli_query($mysqli,$sql);
         
        $count = mysqli_num_rows($result);

        // when only one row is present
        if($count == 1) {
            $logged_in_user = mysqli_fetch_assoc($result);
			if ($logged_in_user['isAdmin'] == 1) {
                session_register("myusername");
                $_SESSION['facultyid'] = $myusername;
                header("location: ../MenuPages/adminmenu.html");
            }
            else{
                session_register("myusername");
                $_SESSION['facultyid'] = $myusername;
                header("location: ../MenuPages/facultymenu.html");
            }
     }
     else {
        $error = "Your Login Name or Password is invalid";
        echo $error;
     }//end if-else


     mysqli_close($mysqli);
  }


