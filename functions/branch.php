<?php
include "db.php";

$con = dbconnect();

function branchInput($brName, $brLocation, $brManager, $brPhone, $brEmail)
{
  global $con;
  $com = "INSERT INTO tbl_branch(brName, brLocation, brManager, brPhone, brEmail) VALUES('$brName', '$brLocation', '$brManager', '$brPhone', '$brEmail')";
  $result = $con->query($com);

  if ($result) {
    echo '<div class="alert alert-success" role="alert">Data saved successfully!' . $con->error . '</div>';
  } else {
    echo '<div class="alert alert-danger" role="alert">Data not saved!' . $con->error . '</div>';
  }
}

function extractData()
{
  global $con;
  $com = "SELECT * FROM tbl_branch";
  $result = $con->query($com);
  return $result;
}

function getDataById($id)
{
  global $con;
  $com = "SELECT * FROM tbl_branch WHERE br_id='$id'";
  $result = $con->query($com);
  return $result;
}

function editBranch($brName, $brLocation, $brManager, $brPhone, $brEmail, $id)
{
  global $con;
  $com = "UPDATE tbl_branch SET brName='$brName', brLocation='$brLocation', brManager='$brManager', brPhone='$brPhone', brEmail='$brEmail' WHERE br_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: managebranch.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Data not saved!' . $con->error . '</div>';
  }
}

function deleteUser($id)
{
  global $con;
  $com = "DELETE FROM tbl_branch WHERE br_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: managebranch.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Failed to Delete!' . $con->error . '</div>';
  }
}
