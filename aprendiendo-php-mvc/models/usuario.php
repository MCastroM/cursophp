<?php

class Usuario{
    public $nombre;
    public $apellidos;
    public $email;
    public $password;

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellidos;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setNombre() {
        return $this->nombre;
    }

    public function setApellido() {
        return $this->apellidos;
    }
    
    public function setEmail() {
        return $this->email;
    }

    public function setPassword() {
        return $this->password;
    }

    public function conseguirTodos(){
        return "Sacando todos los usuarios";
    }

}