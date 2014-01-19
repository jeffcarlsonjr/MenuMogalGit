<?php
session_start();
session_unset();

session_destroy();
//::KP Logged out, return home.
Header("Location: index.php");
?>