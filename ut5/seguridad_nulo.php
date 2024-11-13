<?php
class Dado{
    public function tirarUnDado(){
        return mt_rand(1,6);
    }
}

$dado1 = new Dado();
$dado1 = null;
$resultado = $dado1?->tirarUnDado();
echo $resultado == null ? "No hay nada" : $resultado;