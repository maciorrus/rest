<?php

$password = 'koko';
$hash = password_hash($password, PASSWORD_ARGON2I);
var_dump($hash);
