<?php
class Usuaris {
    private $usuaris;

    public function __construct() {
        $this->usuaris = [];
    }

    public function agregarUsuario($nombreUsuario, $contrasena) {
        if ($this->esUsuarioValido($nombreUsuario)) {
            return false; 
        }
        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT); 
        $this->usuaris[$nombreUsuario] = $contrasenaHash;
        return true; 
    }

    public function esUsuarioValido($nombreUsuario) {
        return array_key_exists($nombreUsuario, $this->usuaris);
    }

    public function esContrasenaValida($nombreUsuario, $contrasena) {
        if ($this->esUsuarioValido($nombreUsuario)) {
            $contrasenaHash = $this->usuaris[$nombreUsuario];
            return password_verify($contrasena, $contrasenaHash);
        }

        return false; 
    }
}



