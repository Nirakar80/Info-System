<?php

session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");


$input = $_SESSION['facultyid'];

$sql=mysql_query("select * from ArticlesinProceedings where FacultyID = '$input'");


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
        <a href="../forms/f_articlesinproceedings.html"><button class="button">+ Add New Articles in Proceedings</button></a>
        <a href="l_articlesinproceedings.php" style="float: right;"><button class="button">Table View</button></a>
        </div>
        <!--End Buttons Area  -->


        <!-- Menu panel -->
        <div class="panel">
            
          <?php 
          while($row=mysql_fetch_assoc($sql)){?>

          <div class="card">
            <div class="container">
              <h2><?php echo $row['TitleofPaper'] ?></h2>
              <p><?php echo $row['Conference'] ?></p>
              <p>Status : <?php echo $row['Status'] ?></p>
              <p>Year Accepted : <?php echo $row['YearAccepted'] ?></p>
              <p>Academic Year : <?php echo $row['AcademicYear'] ?></p>
              <p>Research Type : <?php echo $row['ResearchType'] ?></p>
              <p>Scope : <?php echo $row['Scope'] ?></p>
              <p>Type : <?php echo $row['Type'] ?></p>
              <p>Refereed : <?php echo $row['Refereed'] ?></p>
              <p>Inclusion : <?php echo $row['Inclusion'] ?></p>
              <b><p>Description :</p></b>
              <p><?php echo $row['PaperDescription'] ?></p>
              <?php echo "<p><a href='u_articlesinproceedings.php?id=".$row['paperID']."'>Edit</a>&nbsp;&nbsp;&nbsp;
              <a href='../modify/d_articlesinproceedings.php?id=".$row['paperID']."'>Delete</a></p></p>" ?>
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

