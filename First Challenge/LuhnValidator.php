<?php
    // recieve input as a string
    $a = trim((string)readline('Enter a number: '));
    checkLuhn($a);
    /* function inputs:
        x: number (credit card number)
        y: verification number (security code)
        returns true if verification number checks Luhn's Algorithm
    */
    function checkLuhn($str){
        $length = strlen($str);
        $lastDigit = $str[$length-1];
        $i = 0;
        $sum = 0;

        // Check digits
        if (ctype_digit($str)) {
            //echo "Valid input. \n";

            // 
            while($i<($length-1)){
                if($i%2 == 0) {
                    $sum += intval($str[$i]);
                } else {
                    if(2*intval($str[$i])>9) {
                        $sum+=2*intval($str[$i])-9;
                    } else {
                        $sum += 2*intval($str[$i]);
                    }
                }
                $i++;
            }
        
            $luhnDigit = ($sum*9)%10;
            if(intval($lastDigit) == $luhnDigit){
                echo $str, " verifies the Luhn algorithm.";
            } else {
                echo $str, " does not verify the Luhn algorithm. \n", "Change the last digit to: ", $luhnDigit;
            }

        } else {
            echo "Invalid input. Contains non-digit characters. \n";
        }
    }


?>