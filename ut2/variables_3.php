<?php
    $a = 5;
    function imprimeA(){
        $a = 10;
        echo $a ."<br>";
    }
    imprimeA(); //imprime 10

    function imprimeA2(){
        $a = 10;
        echo $GLOBALS["a"];
    }
    
    imprimeA2(); // imprime 5

