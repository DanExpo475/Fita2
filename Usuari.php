<?php

class Usuario {
    private $usuarios;

    public function __construct() {
        $this->usuarios = [];
    }

    public function agregarUsuario($nombreUsuario, $contrasena) {
        if ($this->esUsuarioValido($nombreUsuario)) {
            return false; 
        }
        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT); 
        $this->usuarios[$nombreUsuario] = $contrasenaHash;
        return true; 
    }

    public function esUsuarioValido($nombreUsuario) {
        return array_key_exists($nombreUsuario, $this->usuarios);
    }

    public function esContrasenaValida($nombreUsuario, $contrasena) {
        if ($this->esUsuarioValido($nombreUsuario)) {
            $contrasenaHash = $this->usuarios[$nombreUsuario];
            return password_verify($contrasena, $contrasenaHash);
        }

        return false; 
    }
}

?>

