<?php
class Usuario{
    private string $nombre;
    private string $apellido;
    private string $email;
    
    public function setDatos(string $nombre, string $apellido, string $email){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
    }
    public function __toString(){
        return "{nombre: $this->nombre, apellido: $this->apellido, email: $this->email}";
    }
}