<?php

session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");


$input = $_SESSION['facultyid'];

$sql=mysql_query("select * from SoftwareDevelopment where FacultyID = '$input'");


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
        <a href="../forms/f_softwaredevelopment.html"><button class="button">+ Add New Software Development</button></a>
        <a href="l_softwaredevelopment.php" style="float: right;"><button class="button">Table View</button></a>
        </div>
        <!--End Buttons Area  -->


        <!-- Menu panel -->
        <div class="panel">
            
          <?php 
          while($row=mysql_fetch_assoc($sql)){?>

          <div class="card">
            <div class="container">
              <h2><?php echo $row['SoftwareTitle'] ?></h2>
              <p>Year Completed : <?php echo $row['YearCompleted'] ?></p>
              <p>Academic Year : <?php echo $row['AcademicYear'] ?></p>
              <p>Research Type : <?php echo $row['ResearchType'] ?></p>
              <p>Options : <?php echo $row['Options'] ?></p>
              <?php echo "<p><a href='u_softwaredevelopment.php?id=".$row['SWDID']."'>Edit</a>&nbsp;&nbsp;&nbsp;
              <a href='../modify/d_softwaredevelopment.php?id=".$row['SWDID']."'>Delete</a></p></p>" ?>
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

