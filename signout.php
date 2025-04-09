<?php
session_start();
unset($_SESSION['var1']);
session_destroy();
header("Location: account.php");


?>