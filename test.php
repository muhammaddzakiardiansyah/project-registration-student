<?php

$random = rand(1, 10000);

echo 21 . $random;

$key = hash('sha256', 'abimantra');


// var_dump($key === hash('sha256', 'abimantra'));

$token_csrf = base64_encode(openssl_random_pseudo_bytes(32));
echo $token_csrf;
$array = $_SESSION['array'] ?? [];
var_dump($array === []);