<?php

class USUARIS {
    private const USUARIS = [
        // Aquí podrías tener una base de datos o cualquier otra forma de almacenar usuarios
        // Este es solo un ejemplo con usuarios predefinidos en un array
        [
            'usuari' => 'usuario1',
            'contrasenya' => '$2y$10$qGvXkz9MlJysMphVQxSoZOoqAMaz/nqDm98kH9MpsUOqqzHDb3Rc6', // Contraseña: miprimacarlaestonta
        ],
        [
            'usuari' => 'usuario2',
            'contrasenya' => '$2y$10$BqXb2Xtto6w8Hz6FGFYIWO.sJt0R7SRe1Qz/9JiICUDphvZ6.C/WK', // Contraseña: carlaaprendeaprogramar
        ],
        // Agrega más usuarios según sea necesario
    ];

    /**
     * Añade un nuevo usuario al sistema.
     *
     * @param string $usuari Nombre de usuario.
     * @param string $contrasenya Contraseña del usuario.
     * @return void
     */
    public function addUser($usuari, $contrasenya) {
        // Aquí deberías implementar la lógica para añadir un usuario a tu sistema
        // En este ejemplo, simplemente lo añadimos al array en memoria
        $hashedPassword = password_hash($contrasenya, PASSWORD_DEFAULT);
        self::USUARIS[] = ['usuari' => $usuari, 'contrasenya' => $hashedPassword];
    }

    /**
     * Verifica si la contraseña proporcionada es válida para el usuario dado.
     *
     * @param string $usuari Nombre de usuario.
     * @param string $contrasenya Contraseña a verificar.
     * @return bool True si la contraseña es válida, false en caso contrario.
     */
    public function isValidPasswd($usuari, $contrasenya) {
        // Aquí deberías implementar la lógica para verificar si la contraseña es válida
        // En este ejemplo, comparamos la contraseña proporcionada con la almacenada en el array
        foreach (self::USUARIS as $u) {
            if ($u['usuari'] === $usuari && password_verify($contrasenya, $u['contrasenya'])) {
                return true;
            }
        }
        return false;
    }

    /**
     * Verifica si el usuario proporcionado es válido.
     *
     * @param string $usuari Nombre de usuario.
     * @return bool True si el usuario es válido, false en caso contrario.
     */
    public function isValidUser($usuari) {
        // Aquí deberías implementar la lógica para verificar si el usuario es válido
        // En este ejemplo, simplemente verificamos si el usuario existe en el array
        foreach (self::USUARIS as $u) {
            if ($u['usuari'] === $usuari) {
                return true;
            }
        }
        return false;
    }
}

?>



