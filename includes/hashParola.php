<?php
// $sensitiveData = "Ceva";
// $salt = bin2hex(random_bytes(16));
// $pepper = "ASecretPepperString";

// echo "<br>" . $salt;

// $dataToHash = $sensitiveData . $salt . $pepper;
// $hash = hash("sha256", $dataToHash);

// echo "<br>" . $hash;

// $sensitiveData = "Ceva1";
// $storedSalt = $salt;
// $storedHash = $hash;
// $pepper = "ASecretPepperString";
// $dataToHash = $sensitiveData . $salt . $pepper;
// $verificationHash = hash("sha256", $dataToHash);

// if($storedHash == $verificationHash){
//     echo "<br>" . "variabilele sunt egale";
// }else{
//     echo "<br>" . "variabilele NU sunt egale";
// }
$pwdInregistrare = "antrenor";
$optiune = ['cost'=>12];
$hashedParola = password_hash($pwdInregistrare, PASSWORD_BCRYPT, $optiune);

$pwdLogin = "antrenor1";
if(password_verify($pwdLogin, $hashedParola)){
    echo "Sunt egale";
}else{
    echo "NU sunt egale";
}
