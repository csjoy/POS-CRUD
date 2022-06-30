<?php
include "db.php";

$con = dbconnect();
session_start();

function userLogin($email, $pass)
{
  global $con;
  $com = "SELECT * FROM tbl_employee WHERE emEmail='$email' AND pass='$pass' AND status=1";
  $result = $con->query($com);

  if ($result->num_rows > 0) {
    while ($data = $result->fetch_assoc()) {
      $_SESSION['name'] = $data["emName"];
      $_SESSION['email'] = $data["emEmail"];
      $_SESSION['designation'] = $data["emDesignation"];
      header("location:dashboard.php");
    }
  } else {
    $_SESSION['title'] = "Error Message";
    $_SESSION['text'] = "Data Not Found";
    $_SESSION['icon'] = "error";
  }
}
