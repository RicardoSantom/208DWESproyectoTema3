<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <link rel="stylesheet" href="../webroot/css/estilosPlantilla.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Ejercicio 024 Tema3</title>
        <style>
            *{
                margin: 0 auto;
                box-sizing: border-box;
            }
            form{
                width: 70%;
                margin: 0 auto;
            }
            fieldset{
                width: 100%;
                position: relative;
                padding: 0.5rem ;
                margin: 0 auto;
                display: inline-block;
                height: 4rem;
                background-color: #f4f1ed ;
                color: firebrick;
                border-color: darkgoldenrod;
                border: 9px groove (internal value);
                border-radius: 7px;
            }
            input{
                position: absolute;
                left: 5%;
                top: 40%;
            }
            form p{
                display: inline-flex;
                font-size: 12px;
                position: absolute;
                left: 30%;
                bottom: 10px;
            }
            #divMostrarDatos{
                padding-top: 3em;
            }
            legend{
                color: darkblue;
                font-weight: bold;
                text-align:right;
            }
            #botones{
                background-color: #CCB3AF;
                width: 100%;
                height: 5rem;
            }
            #botonEnviar,#botonReset{
                width:150px;
                height:50px;
                margin: 1em 1em 1em 0;
            }
            #botonEnviar{
                background-color:lightgreen;
                position: absolute;
                left: 42.5%;
                top: 5%;
            }
            #botonReset{
                background-color:red;
            }
            .fieldsetInternos{
                background-color: #f6f7f8;
            }
            td{
                width: 50%;
            }
            td:first-child{
                text-align: center;
                color: #00006A;
            }
            .inputOpcionales{
                background-color: #ffffcc;
            }
        </style>
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
                    'FechaNacimiento' => '',
                    'Telefono' => '',
                    'Apellidos' => '',
                    'NumeroAsignaturas' => '',
                    'FechaMatricula' => '',
                    'TelefonoFijo' => ''
                ];
                //En el siguiente bloque de código. se comprueba si se ha pulsado el botón Enviar.
                //Si se ha pulsado, se rellena
                if (!empty($_REQUEST['Enviar'])) {
                    //Campos obligatorios
                    //Validación del nombre como cadena de caracteres,
                    $aErrores['Nombre'] = validacionFormularios::comprobarAlfabetico($_REQUEST['Nombre'], 1000, 1, 1);
                    //Validación de la nota media como entero
                    $aErrores['NotaMedia'] = validacionFormularios::comprobarEntero($_REQUEST['NotaMedia'], 280, 0, 1);
                    //Validación de fecha
                    $aErrores['FechaNacimiento'] = validacionFormularios::validarFecha($_REQUEST['FechaNacimiento'], '01/01/2200', '01/01/1900', 1);
                    //Validación de campo telefono
                    $aErrores['Telefono'] = validacionFormularios::validarTelefono($_REQUEST['Telefono'], 1);

                    //Campos opcionales
                    //Validación de apellidos como cadena de caracteres,
                    $aErrores['Apellidos'] = validacionFormularios::comprobarAlfabetico($_REQUEST['Apellidos'], 1000, 1, 0);
                    //Validación del numero de asignaturas como entero
                    $aErrores['NumeroAsignaturas'] = validacionFormularios::comprobarEntero($_REQUEST['NumeroAsignaturas'], 280, 0, 0);
                    //Validación de fecha
                    $aErrores['FechaMatricula'] = validacionFormularios::validarFecha($_REQUEST['FechaMatricula'], '01/01/2200', '01/01/1900', 0);
                    //Validación de campo telefono
                    $aErrores['TelefonoFijo'] = validacionFormularios::validarTelefono($_REQUEST['TelefonoFijo'], 0);
                    /*
                     * Bucle para comprobar si ha habido errores.Si los ha habido, pone la variable $entradaOk a false
                     * 
                     */
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
                    $aRespuestas['NumeroAsignaturas'] = $_REQUEST['NumeroAsignaturas'];
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
                        <!--<fieldset id='obligatorio'>
                            <legend>Campos obligatorios</legend>-->
                        <fieldset class="fieldsetInternos" id="primerFieldset">
                            <legend>Nombre usuario:</legend>
                            <label for="Nombre"></label><br>
                            <input type="text" id="Nombre" name="Nombre" value="<?php echo $_REQUEST['Nombre'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['Nombre'] . '</span>'; ?></p>
                        </fieldset>            
                        <fieldset class="fieldsetInternos" >
                            <legend>Introduzca su nota como entero:</legend>
                            <label for="NotaMedia"></label><br>
                            <input type = "number" id="NotaMedia" name = "NotaMedia" min="0" max="10" value ="<?php echo $_REQUEST['NotaMedia'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['NotaMedia'] . '</span>'; ?></p>
                        </fieldset>
                        <fieldset class="fieldsetInternos" >
                            <legend>Introduzca su fecha de nacimiento:</legend>
                            <label for="FechaNacimiento"></label><br>
                            <input type = "date" id="FechaNacimiento" name = "FechaNacimiento"  value ="<?php echo $_REQUEST['FechaNacimiento'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['FechaNacimiento'] . '</span>'; ?></p>
                        </fieldset>    
                        <fieldset class="fieldsetInternos" >
                            <legend>Introduzca su número de teléfono:</legend>
                            <label for="Telefono"></label><br>
                            <input type="tel" id="Telefono" name="Telefono" placeholder="(Código de área) Número" value="<?php echo $_REQUEST['Telefono'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['Telefono'] . '</span>'; ?></p>
                        </fieldset>
                        <!--</fieldset>
                         <fieldset id='opcional'>
                             <legend>Campos opcionales</legend>-->
                        <fieldset class="fieldsetInternos" >
                            <legend>Apellidos usuario:</legend>
                            <label for="Apellidos"></label><br>
                            <input type="text" class="inputOpcionales" id="Apellidos" name="Apellidos" value="<?php echo $_REQUEST['Apellidos'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['Apellidos'] . '</span>'; ?></p>
                        </fieldset>            
                        <fieldset class="fieldsetInternos" >
                            <legend>Introduzca número de asignaturas</legend>
                            <label for="NumeroAsignaturas"></label><br>
                            <input type = "number" id="NumeroAsignaturas"  class="inputOpcionales" name = "NumeroAsignaturas" min="0" max="10" value ="5" disabled/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['NumeroAsignaturas'] . '</span>'; ?></p>
                        </fieldset>
                        <fieldset class="fieldsetInternos" >
                            <legend>Introduzca la fecha de matrícula</legend>
                            <label for="FechaMatricula"></label><br>
                            <input type = "date" id="FechaMatricula" class="inputOpcionales" name = "FechaMatricula"  value ="<?php echo $_REQUEST['FechaMatricula'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['FechaMatricula'] . '</span>'; ?></p>
                        </fieldset>    
                        <fieldset class="fieldsetInternos" >
                            <legend>Introduzca su número de teléfono fijo:</legend>
                            <label for="TelefonoFijo"></label><br>
                            <input type="tel" id="TelefonoFijo" class="inputOpcionales" name="TelefonoFijo" placeholder="(Código de área) Número" value="<?php echo $_REQUEST['TelefonoFijo'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['TelefonoFijo'] . '</span>'; ?></p>
                        </fieldset>
                        <!--</fieldset>-->
                        <fieldset id="botones">
                            <div  id="botonEnviarBotonReset">
                                <input type="submit" name="Enviar" value="Enviar" id="botonEnviar"/>
                            </div>
                        </fieldset>
                    </form>
                <?php } ?>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="https://daw208.ieslossauces.es/index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom/208DWESproyectoTema3" target="blank"  class="enlaces" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="https://daw208.ieslossauces.es/doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">&#xE87C;</span></a>
            <a href="https://daw208.ieslossauces.es/208DWESproyectoTema3/indexProyectoTema3.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema3">Index Proyecto Tema3</a>
        </footer>
    </body>
</html>