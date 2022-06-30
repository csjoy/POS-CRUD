<?php
include "functions/employee.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $deleted = deleteUser($id);
}
