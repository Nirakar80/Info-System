
<?php

session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");


$input = $_SESSION['facultyid'];


$sql=mysql_query("select * from ProfessionalMemberships where FacultyID = '$input'");


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
            <a href="../forms/f_professionalmembership.html"><button class="button">+ Add New Professional Membership</button></a>
            <a href="l_professionalmembership.php" style="float: right;"><button class="button">Table View</button></a>
        </div>
        <!--End Buttons Area  -->


        <!-- Menu panel -->
        <div class="panel">

            
          <?php 
          while($row=mysql_fetch_assoc($sql)){
            ?>

            <div class="card">  
                <div class="container">
                    <h2><?php echo $row['ProfessionalMembership'] ?></h2>
                    <p>Years : <?php echo $row['Years'] ?></p>
                    <p>Scope : <?php echo $row['Scope'] ?></p>
                    <p>Active : <?php echo $row['active'] ?></p>
                    <b><p>Description :</p></b>
                    <p><?php echo $row['Description'] ?></p>
                    <?php echo "<p><a href='../modify/d_professionalmembership.php?id=".$row['PMID']."'>Edit</a>&nbsp;&nbsp;&nbsp;
                    <a href='u_professionalmembership.php?id=".$row['PMID']."'>Delete</a></p></p>" ?>
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

