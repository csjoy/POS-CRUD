<?php
include "db.php";

$con = dbconnect();

function employeeInput($br_id, $emDesignation, $emName, $emAdd, $emNid, $emPhone, $emEmail, $emJoiningDate, $emSalary, $pass)
{
  global $con;
  $status = 1;
  $com = "INSERT INTO tbl_employee(br_id, emDesignation, emName, emAdd, emNid, emPhone, emEmail, emJoiningDate, emSalary, pass, status) VALUES('$br_id', '$emDesignation', '$emName', '$emAdd', '$emNid', '$emPhone', '$emEmail', '$emJoiningDate', '$emSalary', '$pass', '$status')";
  $result = $con->query($com);

  if ($result) {
    echo '<div class="alert alert-success" role="alert">Data saved successfully!</div>';
  } else {
    echo '<div class="alert alert-danger" role="alert">Data not saved!' . $con->error . '</div>';
  }
}

function extractData()
{
  global $con;
  $com = "SELECT * FROM tbl_employee";
  $result = $con->query($com);
  return $result;
}

function branchData()
{
  global $con;
  $com = "SELECT * FROM tbl_branch";
  $result = $con->query($com);
  return $result;
}

function getDataById($id)
{
  global $con;
  $com = "SELECT * FROM tbl_employee WHERE em_id='$id'";
  $result = $con->query($com);
  return $result;
}

function editEmployee($br_id, $emDesignation, $emName, $emAdd, $emNid, $emPhone, $emEmail, $emJoiningDate, $emSalary, $pass, $id)
{
  global $con;
  $com = "UPDATE tbl_employee SET br_id='$br_id', emDesignation='$emDesignation', emName='$emName', emAdd='$emAdd', emNid='$emNid', emPhone='$emPhone', emEmail='$emEmail', emJoiningDate='$emJoiningDate', emSalary='$emSalary', pass='$pass' WHERE em_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: manageemployee.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Data not saved!' . $con->error . '</div>';
  }
}

function deleteUser($id)
{
  global $con;
  $com = "DELETE FROM tbl_employee WHERE em_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: manageemployee.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Failed to Delete!' . $con->error . '</div>';
  }
}
