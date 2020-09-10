<?php

$user = "root";
$pass = "";
$server = 'localhost';
$db = 'test';
    // 

$con = mysqli_connect($server,$user,$pass,$db);

if($con)
{
  ?>
  <script> alert("Connected to db"); </script>
  <?php
}
else
{
    ?>
  <script> alert("Not Connected to db"); </script>
  <?php
}


?>
