<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <link rel="stylesheet" href="../webroot/css/estilosPlantilla024.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Ejercicio 024 Tema3</title>
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 024.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
                    recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente, pero las
                    respuestas que habíamos tecleado correctamente aparecerán en el formulario y no tendremos que volver a teclearlas.</h3>
                <?php
                //Incluir libreria de validacion
                require_once '../core/validacionFormularios.php';
                //La siguiente variable comprueba si se han producido errores o no en los input.
                $entradaOk = true;
                //El siguiente array inicia dos campos, uno por cada input a registrar.
                $aErrores = [
                    'Nombre' => '',
                    'NotaMedia' => '',
                    'FechaNacimiento' => '',
                    'Telefono' => '',
                    'Apellidos' => '',
                    'NumeroAsignaturas' => '',
                    'FechaMatricula' => '',
                    'TelefonoFijo' => ''
                ];
                //y el array de respuestas con los mismos campos;
                $aRespuestas = [
                    'Nombre' => '',
                    'NotaMedia' => '',
                    'FechaNacimiento' => null,
                    'Telefono' => '',
                    'Apellidos' => '',
                    'NumeroAsignaturas' => '',
                    'FechaMatricula' => null,
                    'TelefonoFijo' => ''
                ];
                //En el siguiente bloque de código. se comprueba si se ha pulsado el botón Enviar.
                //Si se ha pulsado, se rellena
                if (!empty($_REQUEST['Enviar'])) {
                    //Validacion de campos obligatorios
                    $aErrores['Nombre'] = validacionFormularios::comprobarAlfabetico($_REQUEST['Nombre'], 1000, 1, 1);
                    $aErrores['NotaMedia'] = validacionFormularios::comprobarEntero($_REQUEST['NotaMedia'], 280, 0, 1);
                    $aErrores['FechaNacimiento'] = validacionFormularios::validarFecha($_REQUEST['FechaNacimiento'], '01/01/2200', '01/01/1900', 1);
                    $aErrores['Telefono'] = validacionFormularios::validarTelefono($_REQUEST['Telefono'], 1);

                    //Campos opcionales
                    $aErrores['Apellidos'] = validacionFormularios::comprobarAlfabetico($_REQUEST['Apellidos'], 1000, 1, 0);
                    $aErrores['NumeroAsignaturas'] = validacionFormularios::comprobarEntero(5, 280, 0, 0);
                    $aErrores['FechaMatricula'] = validacionFormularios::validarFecha($_REQUEST['FechaMatricula'], '01/01/2200', '01/01/1900', 0);
                    $aErrores['TelefonoFijo'] = validacionFormularios::validarTelefono($_REQUEST['TelefonoFijo'], 0);
                    //Bucle para comprobar si ha habido errores.Si los ha habido, pone la variable $entradaOk a false
                    foreach ($aErrores as $clave => $valor) {
                        if ($valor != null) {
                            $_REQUEST[$clave] = '';
                            $entradaOk = false;
                        }
                    };
                } else {
                    $entradaOk = false;
                }
                if ($entradaOk) {
                    $aRespuestas['Nombre'] = $_REQUEST['Nombre'];
                    $aRespuestas['NotaMedia'] = $_REQUEST['NotaMedia'];
                    $aRespuestas['FechaNacimiento'] = $_REQUEST['FechaNacimiento'];
                    $aRespuestas['Telefono'] = $_REQUEST['Telefono'];
                    $aRespuestas['Apellidos'] = $_REQUEST['Apellidos'];
                    $aRespuestas['NumeroAsignaturas'] = 5;
                    $aRespuestas['FechaMatricula'] = $_REQUEST['FechaMatricula'];
                    $aRespuestas['TelefonoFijo'] = $_REQUEST['TelefonoFijo'];
                    echo "<table><tbody><caption>Tabla de datos</caption><tr>";
                    foreach ($aRespuestas as $clave => $valor) {
                        printf('<td>%s</td><td>%s %s', $clave, $valor, '</td>');
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    ?>
                    <form name="ejercicio024" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <fieldset id='obligatorio'>
                            <legend>Formulario informacion personal</legend>
                            <label for="Nombre">Nombre usuario:</label>
                            <input type="text" id="Nombre" name="Nombre" class="obligatorios" value="<?php echo $_REQUEST['Nombre'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['Nombre'] . '</span>'; ?></p><br>
                            <label for="NotaMedia">Introduzca su nota como entero:</label>
                            <input type = "number" id="NotaMedia" name = "NotaMedia" class="obligatorios" min="0" max="10" value ="<?php echo $_REQUEST['NotaMedia'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['NotaMedia'] . '</span>'; ?></p><br>
                            <label for="FechaNacimiento">Introduzca su fecha de nacimiento:</label>
                            <input type = "date" id="FechaNacimiento" name = "FechaNacimiento" class="obligatorios" value ="<?php echo $_REQUEST['FechaNacimiento'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['FechaNacimiento'] . '</span>'; ?></p><br>
                            <label for="Telefono">Introduzca su número de teléfono:</label>
                            <input type="tel" id="Telefono" name="Telefono" placeholder="(Código de área) Número" class="obligatorios" value="<?php echo $_REQUEST['Telefono'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['Telefono'] . '</span>'; ?></p><br>
                            <label for="Apellidos">Apellidos usuario:</label>
                            <input type="text" id="Apellidos" name="Apellidos" value="<?php echo $_REQUEST['Apellidos'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['Apellidos'] . '</span>'; ?></p><br>
                            <label for="NumeroAsignaturas">Introduzca número de asignaturas</label>
                            <input type = "number" id="NumeroAsignaturas"  name = "NumeroAsignaturas" min="1" max="10" disabled value="5" />
                            <p><?php echo '<span style="color: red;">' . $aErrores['NumeroAsignaturas'] . '</span>'; ?></p><br>
                            <label for="FechaMatricula">Introduzca la fecha de matrícula</label>
                            <input type = "date" id="FechaMatricula" name = "FechaMatricula"  value ="<?php echo $_REQUEST['FechaMatricula'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['FechaMatricula'] . '</span>'; ?></p><br>
                            <label for="TelefonoFijo">Introduzca su número de teléfono fijo:</label>
                            <input type="tel" id="TelefonoFijo" name="TelefonoFijo" placeholder="(Código de área) Número" value="<?php echo $_REQUEST['TelefonoFijo'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['TelefonoFijo'] . '</span>'; ?></p><br>
                            <input type="submit" name="Enviar" value="Enviar" id="botonEnviar"/>
                        </fieldset>

                    </form>
                <?php } ?>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="../../../index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom/208DWESproyectoTema3" target="blank"  class="enlaces" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="../indexProyectoTema3.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema3">Index Proyecto Tema3</a>
        </footer>
    </body>
</html>