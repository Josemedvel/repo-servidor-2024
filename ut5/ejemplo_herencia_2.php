<?php

class Person
{
    public $name;
    protected $age;
    private $phone;

    public function talk(){
        echo "<p>Hola buenas</p>";
    }

    protected function walk(){
        echo "<p>Camino como una persona normal</p>";
    }

    private function swim(){
        echo "<p>Nadando</p>";
    }
}

class Tom extends Person
{
    /*
        Como Tom extiende a la clase Person, tendrá todos los miembros públicos y 
        protegidos de Person, lo que quiere decir que no tendrá el método swim.
    */
     // Además, como Tom siempre tiene prisa, podemos modificar el comportamiento del método walk
     protected function walk(){
        echo "<p>Camino a la velocidad de la luz</p>";
     }
    }
$persona = new Person();
$tom = new Tom();
$persona->talk();
//si intento llamar a los métodos privados o protegidos desde fuera de la clase tendré un error
//$persona->swim();
//$persona->walk();
//$tom->walk();
//Si además intento llamar a swim, ni siquiera existe en la clase Tom
//$tom->swim();