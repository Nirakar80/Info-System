<?php

session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");




$input = $_SESSION['facultyid'];


$sql=mysql_query("select * from ProfessionalStaff");


$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html>
<head>
   <title> Faculty Entry </title>
   <link rel="stylesheet" href="alist.css">
 </head>
    <body>



        <!-- Navbar -->
        <div class="navbar">
            <ul>
              <li><a href="../MenuPages/menu.html">Menu</a></li>
            </ul>
        </div>
        <!-- Navbar End -->


        <!-- Buttons Area  -->
        <div class="button-area">
        <a href="../forms/f_professionalstaff.html"><button class="button">+ Add New Staff</button></a>
        </div>
        <!--End Buttons Area  -->


        <!-- Menu panel -->
        <div class="panel">
            
          <?php 
          while($row=mysql_fetch_assoc($sql)){?>
            <div class="card">
                <div class="logo">
                    <img src="user.png">
                </div>
                <div class="container">
                    <table>
                        <tr><td>StaffID : </td><td><?php echo $row['StaffID'] ?></td></tr>
                        <tr><td>First Name : </td><td><?php echo $row['FirstName'] ?></td></tr>
                        <tr><td>Last Name : </td><td><?php echo $row['LastName'] ?></td></tr>
                        <tr><td>Status : </td><td><?php echo $row['Status'] ?></td></tr>
                        <tr><td>High Degree : </td><td> <?php echo $row['HighDegree'] ?></td></tr>
                        <tr><td>Year Awarded : </td><td><?php echo $row['YearAwarded'] ?></td></tr>
                        <tr><td>College : </td><td><?php echo $row['College'] ?></td></tr>
                        <tr><td>Hire Term : </td><td><?php echo $row['HireTerm'] ?></td></tr>
                        <tr><td>Rank : </td><td><?php echo $row['Rank'] ?></td></tr>
                    </table>
                    <?php echo "<a href='u_professionalstaff.php?id=".$row['PSID']."'>Edit</a>&nbsp;&nbsp;&nbsp;<a>Delete</a></p>" ?>
                </div>
            </div>

          <?php 
          }

          //echo $output;		
          ?>
          </table>

          <?php
          mysql_close();
          ?>

</div>
</body>
</html>