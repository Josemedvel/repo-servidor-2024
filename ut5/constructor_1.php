<?php
class Usuario{
    public int $id;
    public ?string $name;

    public function __construct(int $id, ?string $name){
        $this->name = $name;
        $this->id = $id;
    }
}
$usuario_1 = new Usuario(1, null);
var_dump($usuario_1->name);
echo $usuario_1->id;