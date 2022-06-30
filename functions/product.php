<?php
include "db.php";

$con = dbconnect();

function productInput($br_id, $proBarcode, $proName, $proDes, $proType, $proSize, $proCostPrice, $proSalePrice, $quantity)
{
  global $con;
  $status = 1;
  $com = "INSERT INTO tbl_product(br_id, proBarcode, proName, proDes, proType, proSize, proCostPrice, proSalePrice, quantity) VALUES('$br_id', '$proBarcode', '$proName', '$proDes', '$proType', '$proSize', '$proCostPrice', '$proSalePrice', '$quantity')";
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
  $com = "SELECT * FROM tbl_product";
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
  $com = "SELECT * FROM tbl_product WHERE pro_id='$id'";
  $result = $con->query($com);
  return $result;
}

function editproduct($br_id, $proBarcode, $proName, $proDes, $proType, $proSize, $proCostPrice, $proSalePrice, $quantity, $id)
{
  global $con;
  $com = "UPDATE tbl_product SET br_id='$br_id', proBarcode='$proBarcode', proName='$proName', proDes='$proDes', proType='$proType', proSize='$proSize', proCostPrice='$proCostPrice', proSalePrice='$proSalePrice', quantity='$quantity' WHERE pro_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: manageproduct.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Data not saved!' . $con->error . '</div>';
  }
}

function deleteUser($id)
{
  global $con;
  $com = "DELETE FROM tbl_product WHERE pro_id='$id'";
  $result = $con->query($com);

  if ($result) {
    header("location: manageproduct.php");
  } else {
    echo '<div class="alert alert-danger" role="alert"> Failed to Delete!' . $con->error . '</div>';
  }
}
