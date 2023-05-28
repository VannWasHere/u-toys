<?php
// Purn Session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// Purn Cookies
setcookie('secret', '', time() - 3600, '/', '', true, true);
setcookie('secret1', '', time() - 3600, '/', '', true, true);

header('Location: ../index.php');