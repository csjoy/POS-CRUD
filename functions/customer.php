<?php
include "db.php";

$con = dbconnect();

function customerInput($br_id, $cusName, $cusAdd, $cusEmail, $cusPhoneNumber)
{
  global $con;
  $status = 1;
  $com = "INSERT INTO tbl_customer(br_id, cusName, cusAdd, cusEmail, cusPhoneNumber) VALUES('$br_id', '$cusName', '$cusAdd', '$cusEmail', '$cusPhoneNumber')";
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
  $com = "SELECT * FROM tbl_customer";
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
  $com = "SELECT * FROM tbl_customer WHERE cus_id='$id'";
  $result = $con->query($com);
  return $result;
}

function editCustomer($br_id, $cusName, $cusAdd, $cusEmail, $cusPhoneNumber, $id)
{
  global $con;
  $com = "UPDATE tbl_customer SET br_id='$br_id', cusName='$cusName', cusAdd='$cusAdd', cusEmail='$cusEmail', cusPhoneNumber='$cusPhoneNumber' WHERE cus_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: managecustomer.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Data not saved!' . $con->error . '</div>';
  }
}

function deleteUser($id)
{
  global $con;
  $com = "DELETE FROM tbl_customer WHERE cus_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: managecustomer.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Failed to Delete!' . $con->error . '</div>';
  }
}
