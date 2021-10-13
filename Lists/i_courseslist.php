<?php

session_start();

mysql_connect("localhost","webuser","d0nkey5");
mysql_select_db("facinfo");




$input = $_SESSION['facultyid'];


$sql=mysql_query("select * from CoursesList");


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
              <li><a href="../MenuPages/facultymenu.html">Menu</a></li>
            </ul>
        </div>
        <!-- Navbar End -->


        <!-- Buttons Area  -->
        <div class="button-area">
        <a href="../forms/f_courseslist.html"><button class="button">+ Add New Course</button></a>
        </div>
        <!--End Buttons Area  -->


        <!-- Menu panel -->
        <div class="panel">
            
          <?php 
          while($row=mysql_fetch_assoc($sql)){?>
            <div class="card">
                <div class="container">
                    <table>
                        <tr><td> Department :<?php echo $row['Department'] ?></td></tr>
                        <tr><td>CourseNumber :<?php echo $row['CourseNumber'] ?></td></tr>
                        <tr><td>CourseTitle :<?php echo $row['CourseTitle'] ?></td></tr>
                        <b><p>Description :</p></b>
                        <p><?php echo $row['Description'] ?></p>
                        <?php echo "<tr><td><a href='u_courseslist.php?id=".$row['courseID']."'>Edit</a></td></tr>" ?>
                    </table>
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