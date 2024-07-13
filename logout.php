<?php
session_start();

$_SESSION['userLogin'] = [];
session_unset();
session_destroy();

setcookie('key', '', time() - 3600);
setcookie('id', '', time() - 3600);

header('Location: index.php');
