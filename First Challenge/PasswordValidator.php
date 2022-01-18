<?php

    $a = trim((string)readline('Enter a password: '));

    function checkLength($str){
        return (strlen($str) > 1) ? true : false;
       
    }

    function checkDigits($str){
        return (preg_match('/[0-9]/', $str)) ? true : false;
    }

    function checkUpper($str){
        return (preg_match('/[A-Z]/', $str)) ? true : false;
    }

    function checkLower($str){
        return (preg_match('/[a-z]/', $str)) ? true : false;
    }

    function checkSpecial($str){
        return (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $str)) ? true : false;
    }


    if (!checkDigits($a) || !checkUpper($a) || !checkLower($a)){
        echo "Password must contain at least one upper case, one lower case and one number";
    } elseif (!checkLength($a)){
        echo "Password length must be at least 2 characters long.";
    } elseif (checkSpecial($a)){
        echo "Password length must not contain special characters.";
    } else {
        echo "Password accepted!";
    }

?>