<?php
function passwordcheck($passworda)
{
$r1='/[A-Z]/';  //Uppercase
    $r2='/[a-z]/';  //lowercase
    $r3='/[!@#$%^&*()-_=+{};:,<.>]/';
    $r4='/[0-9]/';  //numbers

if (!preg_match($r4, $passworda)) {
    return false;
}

if (!preg_match($r2, $passworda)) {
    return false;
}
if (!preg_match($r1,$passworda)) {
    return false;
}
return true;
}
?>