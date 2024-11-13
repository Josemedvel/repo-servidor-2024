<?php
class Foo{
    public function printItem($string){
        echo 'Foo: ' . $string . "<br>";
    }
    public function printPHP(){
        echo 'PHP es estupendo.' . "<br>";
    }
}

class Bar extends Foo{

    #[\Override]
    public function printItem($string){
        echo 'Bar: ' . $string ."<br>"; 
    }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem('baz'); // imprime "Foo: baz"
$foo->printPHP(); // imprime "PHP es estupendo"
$bar->printItem('baz'); // imprime "Bar: baz"
$bar->printPHP(); // imprime "PHP es estupendo"
?>