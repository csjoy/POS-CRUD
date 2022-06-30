<?php
include "functions/company.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $deleted = deleteUser($id);
}
