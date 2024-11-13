<?php
    
    $arr = ["jose", "maría", "alberto", "marta", "pepa", "lucio"];
    array_splice($arr,1,1);
    print_r($arr);
    function barajar($array){
        $barajada = [];
        while(count($array) > 0){
            $idx = mt_rand(0, count($array) - 1); 
            $barajada[] = $array[$idx];
            array_splice($array, $idx, 1);
        }
        return $barajada;
    }
    echo "<br>";
    print_r(barajar($arr));
    shuffle($arr);
    echo "<br>";
    print_r($arr);



    function aHexadecimal($num){
        if($num < 16){
            return match($num){
                1,2,3,4,5,6,7,8,9,0 => $num,
                10 => "A",
                11 => "B",
                12 => "C",
                13 => "D",
                14 => "E",
                15 => "F"
            };
        }
        return aHexadecimal((int)($num/16)) . aHexadecimal($num % 16);
    }
    
    echo "<br>";
    echo aHexadecimal(65029);

    $parentesis = ["(","a","b","(",")","(","(",")",")",")"];
    function balanceado($parentesis, $izq=0, $der=0){
        if(count($parentesis) == 0 && $izq == $der){
            return True;
        }else if(count($parentesis) == 0 && $izq != $der){
            return False;
        }
        else{
            $num_izq = 0;
            $num_der = 0;
            $next = array_pop($parentesis);
            switch($next){
                case "(":
                    $num_izq++;
                    break;
                case ")":
                    $num_der++;
                    break;
                default:
                    break;
            }
            return balanceado($parentesis, $izq+$num_izq, $der+$num_der);
        }
    }
    echo "<br>";
    echo balanceado($parentesis) ? "VERDADERO" : "FALSO";


?>
