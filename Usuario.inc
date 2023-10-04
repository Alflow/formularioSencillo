<?php 

require_once 'AppException.inc';

class Usuario
{
    private string $nombre;
    private string $apellido;
    private int $edad;
    private string $email;

    public function __construct(string $nombre, string $apellido, int $edad, string $email)
    {
        $error = [];

        if (empty($nombre)) {
            $error['nombre'] = 'El campo nombre es obligatorio';
        }
        if (empty($apellido)) {
            $error['apellido'] = 'El campo apellido es obligatorio';
        }
        if ($edad < 0 || $edad > 120) {
            $error['edad'] = 'La edad debe estar entre 0 y 120';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = 'El email no es válido';
        }

        if (!empty($error)) {
            throw new AppException($error, 'Hay errores en el objeto Usuario');
        }

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->email = $email;
    }

    // Métodos accesores (getters) aquí si los necesitas
}

?>