<?php

session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");




$input = $_SESSION['facultyid'];


$sql=mysql_query("select * from PaidServiceExperience where FacultyID = '$input'");


$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html>
<head>
   <title> Faculty Entry </title>
   <link rel="stylesheet" href="rlist.css">
 </head>
    <body>



        <!-- Navbar -->
        <div class="navbar">
            <ul>
              <li><a href="../MenuPages/facultymenu.html">Menu</a></li>
            </ul>
        </div>
        <!-- Navbar End -->


        <!-- Buttons Area  -->
        <div class="button-area">
        <a href="../forms/f_paidserviceexperience.html"><button class="button">+ Add New Paid Service Experience</button></a>
        <a href="l_paidserviceexperience.php" style="float: right;"><button class="button">Table View</button></a>
        </div>
        <!--End Buttons Area  -->


        <!-- Menu panel -->
        <div class="panel">
            
          <?php 
          while($row=mysql_fetch_assoc($sql)){?>

            <div class="card">
                <div class="container">
                    <h2><?php echo $row['Activity'] ?></h2>
                    <p><?php echo $row['Company'] . ", " . $row['Location'] ?></p>
                    <i><p><?php echo "(" .$row['FromYear'] . " - " . $row['ToYear'] . ")" ?></p></i>
                    <p><?php echo $row['Description'] ?></p>
                    <?php echo "<a href='u_paidserviceexperience.php?id=".$row['PSEID']."'>Edit</a>&nbsp;&nbsp;&nbsp;
                    <a href='../modify/d_paideserviceexperience.php?id=".$row['PSEID']."'>Delete</a></p>" ?>
                </div>
            </div>

          <?php 
          }

          //echo $output;		
          ?>


          <?php
          mysql_close();
          ?>

</div>
</body>
</html>