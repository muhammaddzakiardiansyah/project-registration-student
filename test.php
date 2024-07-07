<?php

$random = rand(1, 10000);

echo 21 . $random;

$key = hash('sha256', 'abimantra');


var_dump($key === hash('sha256', 'abimantra'));