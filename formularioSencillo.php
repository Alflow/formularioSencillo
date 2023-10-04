<?php
require_once 'AppException.inc';
require_once 'Usuario.inc';
include("rutinas.inc");

$datos = array(
    'datosPersonales' => array('nombre','apellido'),
    'direccion' => array('ciudad','cp'),
    'genero' => array('genero')
);




// Verificamos si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Almacenar todos los datos POST en la variable $datos
    $datos = $_POST;
    // Inicializar un array vacío para almacenar los datos saneados
    $datosSaneados = [];

    // Primer bucle: recorrer cada fila en $datos
    foreach ($datos as $claveFila => $fila) {


        // Verificar si $fila es un array
        if (is_array($fila)) {

            // Segundo bucle: recorrer cada elemento en la fila actual
            foreach ($fila as $claveColumna => $elemento) {
                // Verificar si $elemento es una cadena
                if (is_string($elemento)) {
                    // Sanea el elemento y guárdalo en $datosSaneados
                    $datosSaneados[$claveFila][$claveColumna] = sanea($elemento);
                } else {
                    // Si $elemento no es una cadena, guárdalo tal cual en $datosSaneados
                    $datosSaneados[$claveFila][$claveColumna] = $elemento;
                }
            }
        } else {
            
            // Verificar si $fila es una cadena
            if (is_string($fila)) {
                // Sanea la fila y guárdala en $datosSaneados
                $datosSaneados[$claveFila] = sanea($fila);
            } else {
                // Si $fila no es una cadena, guárdala tal cual en $datosSaneados
                $datosSaneados[$claveFila] = $fila;
            }
        }
    }

    // Mostrar el array $datosSaneados
    var_dump($datosSaneados);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="post">
        <?php if (isset($_POST)) : ?>
            
            <fieldset>
                <legend>Datos personales</legend>
                <label>Nombre
                    <input type="text" name="datos[datosPersonales][nombre]"><br>
                </label>
                <label>Apellido
                    <input type="text" name="datos[datosPersonales][apellido]"><br>
                </label>
            </fieldset>
            <fieldset>
                <legend>Direccion</legend>
                <label>Ciudad
                    <input type="text" name="ciudad"><br>
                </label>
                <label>Codigo Postal
                    <input type="text" name="cp"><br>
                </label>
            </fieldset>
            <fieldset>
                <legend>Sexo</legend>
                <label>Hombre
                    <input type="radio" name="genero" value="h">
                </label>
                <label>Mujer
                    <input type="radio" name="genero" value="m"><br>
                </label>
            </fieldset>
        <?php else : ?>
            <fieldset>
                <legend>Datos personales</legend>
                <label>Nombre
                    <input type="text" name="datos[datosPersonales][nombre]"><br>
                </label>
                <label>Apellido
                    <input type="text" name="datos[datosPersonales][apellido]"><br>
                </label>
            </fieldset>
            <fieldset>
                <legend>Direccion</legend>
                <label>Ciudad
                    <input type="text" name="ciudad"><br>
                </label>
                <label>Codigo Postal
                    <input type="text" name="cp"><br>
                </label>
            </fieldset>
            <fieldset>
                <legend>Sexo</legend>
                <label>Hombre
                    <input type="radio" name="genero" value="h">
                </label>
                <label>Mujer
                    <input type="radio" name="genero" value="m"><br>
                </label>
            </fieldset>
        <?php endif; ?>
        <button type="submit" name="ok"> Enviar</button>
    </form>



</body>

</html>