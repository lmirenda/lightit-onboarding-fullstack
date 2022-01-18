<?php
    $a = strtolower(readline('Enter a DNA Strand (G, C, T, A): '));

    $DNA = array("g", "c", "t", "a");
    $RNA = array("C", "G", "A", "U");
    
    $b = str_replace($DNA, $RNA, $a);

    echo $b;
?>