<?php

class AuthService {

    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function logIn($email, $password, $rol) {
        // Obtener el usuario de la base de datos
        $user = $this->userService->findByEmail($email);

        // Imprime los valores para verificar
        echo "Correo electrónico recibido: " . $email . "<br>";
        echo "Rol recibido: " . $rol . "<br>";
        echo "Contraseña Recibida: " . $password . "<br>";
        echo "Usuario encontrado en la base de datos: " . print_r($user, true) . "<br>";

        // Verificar si se encontró el usuario y si la contraseña coincide
        if ($user && $password === $user->getPassword() && $user->getRol() === $rol) {
            // Usuario autenticado correctamente
            return $user;
        } else {
            echo "Credenciales incorrectas o usuario no encontrado";
            return null;
        }
    }
}


?>
