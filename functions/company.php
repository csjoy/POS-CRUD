<?php
include "db.php";

$con = dbconnect();

function companyInput($br_id, $comName, $comAdd, $comPhone, $comEmail, $comManagerName)
{
  global $con;
  $status = 1;
  $com = "INSERT INTO tbl_company(br_id, comName, comAdd, comPhone, comEmail, comManagerName) VALUES('$br_id', '$comName', '$comAdd', '$comPhone', '$comEmail', '$comManagerName')";
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
  $com = "SELECT * FROM tbl_company";
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
  $com = "SELECT * FROM tbl_company WHERE com_id='$id'";
  $result = $con->query($com);
  return $result;
}

function editCompany($br_id, $comName, $comAdd, $comPhone, $comEmail, $comManagerName, $id)
{
  global $con;
  $com = "UPDATE tbl_company SET br_id='$br_id', comName='$comName', comAdd='$comAdd', comPhone='$comPhone', comEmail='$comEmail', comManagerName='$comManagerName' WHERE com_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: managecompany.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Data not saved!' . $con->error . '</div>';
  }
}

function deleteUser($id)
{
  global $con;
  $com = "DELETE FROM tbl_company WHERE com_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: managecompany.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Failed to Delete!' . $con->error . '</div>';
  }
}
