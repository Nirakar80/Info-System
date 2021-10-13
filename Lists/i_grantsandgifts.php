<?php

session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");


$input = $_SESSION['facultyid'];

$sql=mysql_query("select * from GrantsandGifts where FacultyID = '$input'");


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
        <a href="../forms/f_grantsandgifts.html"><button class="button">+ Add Grants and Gifts</button></a>
        <a href="l_grantsandgifts.php" style="float: right;"><button class="button">Table View</button></a>
        </div>
        <!--End Buttons Area  -->


        <!-- Menu panel -->
        <div class="panel">
            
          <?php 
          while($row=mysql_fetch_assoc($sql)){?>

          <div class="card">
            <div class="container">
              <h2><?php echo $row['GrantorGiftTitle'] ?></h2>
              <p><?php echo $row['GrantofGiftType'] ?></p>
              <p>Status : <?php echo $row['sStatus'] ?></p>
              <p>Year Accepted : <?php echo $row['YearAccepted'] ?></p>
              <p>Academic Year : <?php echo $row['AcademicYear'] ?></p>
              <p>New or Continuing : <?php echo $row['NeworContinuing'] ?></p> 
              <p>Source : <?php echo $row['Source'] ?></p>
              <p>Research Type : <?php echo $row['ResearchType'] ?></p>
              <p>Funding Agency : <?php echo $row['FundingAgency'] ?></p>
              <p>Role : <?php echo $row['sRole'] ?></p>
              <b><p>Description :</p></b>
              <p><?php echo $row['sDescription'] ?></p>
              <?php echo "<p><a href='u_grantsandgifts.php?id=".$row['ID']."'>Edit</a>&nbsp;&nbsp;&nbsp;
              <a href='../modify/d_grantsandgifts.php?id=".$row['ID']."'>Delete</a></p></p>" ?>
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

