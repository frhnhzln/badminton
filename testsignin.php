<?php
$password_hashed = '$2y$10$2pRhJTki3.dt5';
$pass = 'test';

$testpassword = password_hash($pass,PASSWORD_BCRYPT); 
echo $password_hashed;
echo "   ";
echo $pass;
echo " password valid:  ";
$password_valid2 = password_verify($pass, $password_hashed);
$password_valid3 = password_verify($pass, $testpassword);

if($password_valid2){
echo 'valid';

}else{
    echo 'invalid';
}

if($password_valid3){
    echo 'valid';
    echo $testpassword;
    
    }else{
        echo 'invalid';
    }



