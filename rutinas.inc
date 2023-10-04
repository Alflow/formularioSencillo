<?php



function sanea(string $cad): string
{
    return htmlspecialchars(stripslashes(trim($cad)));
}


// FUNCION IMPUTS NO VACIOS

function todosInputsRellenos($inputs)
{
    foreach ($inputs as $input) {
        if (!isset($_POST[$input]) || empty($_POST[$input])) {
            return false; // Si algún input no está relleno, devuelve false.
        }
    }
    return true; // Todos los inputs están rellenos.
}



// En este código, hemos agregado el formulario HTML y luego aplicamos la misma lógica de verificación con la función todosInputsRellenos($inputs) antes de procesar los datos. Si todos los campos están rellenos, realizamos una operación (en este caso, sumamos los números), pero puedes adaptar esta parte según tus necesidades. Si falta algún campo, se muestra un mensaje de error.

// -----------------------------------------------------------


function revisaValor($valorEntrada)
{
    if ($valorEntrada < 0) {
        echo  $valorEntrada . ' es negativo' . '<br>';
    } elseif ($valorEntrada == 0) {
        echo $valorEntrada . ' es de valor igual a 0' . '<br>';
    } elseif ($valorEntrada > 0) {
        echo $valorEntrada . ' es de valor positivo' . '<br>';
    }
}




function posNegCero(float|int|string $valor): string
{
    if ($valor > 0) {
        return "Positivo";
    } elseif ($valor < 0) {
        return "Negativo";
    } else {
        return "Cero";
    }
}



function compruebaAnagrama(string $palabraInput1, string $palabraInput2): string
{
    $longitudLetras1 = strlen($palabraInput1);
    $longitudLetras2 = strlen($palabraInput2);

    if ($longitudLetras1 != $longitudLetras2) {
        return 'LAS PALABRAS TIENEN DIFERENTE LONGITUD, POR LO QUE No es un anagrama';
    } else {
        if ($longitudLetras1 % 2 == 0) {
            $iguales = true;

            for ($i = 0; $i < $longitudLetras1; $i += 2) {
                $subcadena1 = substr($palabraInput1, $i, 2);
                $subcadena2 = substr($palabraInput2, -$i - 2, 2);

                if ($subcadena1 !== $subcadena2) {
                    $iguales = false;
                    break; // Si encuentra una diferencia, no es necesario seguir comparando.
                }
            }

            if ($iguales) {
                return 'SI ES UN ANAGRAMA';
            } else {
                return 'NO ES UN ANAGRAMA';
            }
        }
    }
}

// Ejercicio 3
function compruebaPotencia(int $base, int $potencia): int
{

    $resultado = pow($base, $potencia);
    return $resultado;
}

//Ejercicio 4
