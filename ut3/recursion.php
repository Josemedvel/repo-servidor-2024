<?php
function suma($numeros){
	if(count($numeros) == 1){
		return array_pop($numeros);
	}
	return array_pop($numeros) + suma($numeros);
}
$numeros = [1,2,3,4,5,6,7,8,9,10];
echo suma($numeros);