<?php

session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");




$input = $_SESSION['facultyid'];


$sql=mysql_query("select * from EmploymentExperience where FacultyID = '$input'");


$result = mysqli_query($connect, $sql);

?>

<!DOCTYPE html>
<html>
<head>
   <title> Faculty Entry </title>
   <link rel="stylesheet" href="list.css">
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
        <a href="../forms/f_employmentexperience.html"><button class="button">+ Add New Employment Experience</button></a>
        </div>
        <!--End Buttons Area  -->


        <!-- Menu panel -->
        <div class="panel">
            
          <?php 
          while($row=mysql_fetch_assoc($sql)){?>

            <div class="card">
                <div class="container">
                    <p><?php echo $row['Position'] ?></p>
                    <h4><?php echo $row['Company'], $row['Location'] ?></h4>
                    <td><?php echo $row['FromYear'] - $row['ToYear']?></td>
                    <h6> Responsibilities </h6>
                    <td><?php echo $row['Description'] ?></td>
                    <?php echo "<td><a href='u_employmentexperience.php?id=".$row['EEID']."'>Edit</a></td>" ?>
                    </tr>
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