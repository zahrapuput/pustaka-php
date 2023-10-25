<?php
// akhir session alert
session_start();
session_unset();

header("location: index.php");
