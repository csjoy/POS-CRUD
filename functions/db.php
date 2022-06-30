<?php

function dbconnect()
{
  $con = new mysqli("localhost", "root", "root", "adminlte");
  return $con;
}
