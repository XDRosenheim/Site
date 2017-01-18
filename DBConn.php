<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $daba = "seatmapDB";
  $DBConn = new mysqli($host, $user, $pass, $daba);
  unset($host, $user, $pass, $daba);
