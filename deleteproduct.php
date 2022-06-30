<?php
include "functions/product.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $deleted = deleteUser($id);
}
