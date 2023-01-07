<!DOCTYPE html>
<html lang="en">
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
        <title>Ejercicio 023.php</title>
        <style>
            *{
                text-align: center;
            }
            form{
                width: 50%;
                vertical-align: middle;
                margin-left: auto;
                margin-right: auto;
                margin-top: 3em;
            }
            #divMostrarDatos{
                padding-top: 3em;
            }
            #campoFechaNacimiento{
                height: 5em;

            }
            #fechaNacimiento{
                margin-top: 1em;
            }
            #botones{
                background-color: #CCB3AF;
            }
            #botonEnviar,#botonReset{
                width:150px;
                height:50px;
                margin: 1em 1em 1em 0;
            }
            #botonEnviar{
                background-color:lightsteelblue;
            }
            #botonReset{
                background-color:lightgreen;
            }
            form p{
                display: inline-flex;
            }
        </style>
    </head>
    <body>
        <!-- Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas
        recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente -->
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 023.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Construir un formulario para recoger un cuestionario realizado a una persona y mostrar en la misma página las preguntas y las respuestas<br>
                    recogidas; en el caso de que alguna respuesta esté vacía o errónea volverá a salir el formulario con el mensaje correspondiente</h3>
                <?php
                //Incluir libreria de validacion
                require_once '../core/validacionFormularios.php';
                //La siguiente variable comprueba si se han producido errores o no en los input.
                $entradaOk = true;
                //El siguiente array inicia dos campos, uno por cada input a registrar.
                $aErrores = [
                    "Nombre" => "",
                    "Peso" => ""
                ];
                //En el siguiente bloque de código. se comprueba si se ha pulsado el botón Enviar.
                //Si se ha pulsado, se rellena
                if (isset($_POST['Enviar'])) {
                    //Validación del nombre
                    $aErrores["Nombre"] = validacionFormularios::comprobarAlfabetico($_POST['nombreApellidosUsuario'], 1000, 1, 1);
                    //Validación del peso
                    $aErrores["Peso"] = validacionFormularios::comprobarEntero($_POST['pesoUsuario'], 280, 0, 1);
                    //Bucle para comprobar si ha habido errores
                    foreach ($aErrores as $clave => $valor) {
                        if ($valor != null) {
                            $entradaOk = false;
                        }
                    };
                } else {
                    $entradaOk = false;
                }
                if ($entradaOk) {
                    $inputNombreApellidosUsuario = $_POST['nombreApellidosUsuario'];
                    $inputPesoUsuario = $_POST['pesoUsuario'];
                    $aRespuestas = [$inputNombreApellidosUsuario => $inputPesoUsuario];
                    foreach ($aRespuestas as $nombre => $peso) {
                        printf("Nombre: %s %s", $inputNombreApellidosUsuario, "<br>");
                        printf("Su peso es: %s %s", $inputPesoUsuario, " kilogramos");
                    }
                } else {
                    ?>
                    <form name="ejercicio023.php" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <fieldset id="primerFieldset">
                            <legend>Nombre y apellidos</legend>
                            <label for="nombreApellidosUsuario">Nombre,apellido1,apellido2:</label><br>
                            <input type="text" id="nombreApellidosUsuario" name="nombreApellidosUsuario" placeholder="<?php
                            if (count($aErrores) > 0 && $aErrores["Nombre"] != "") {
                                // Mostrar los errores:
                                printf('%s', $aErrores["Nombre"]);
                            }
                            ?>
                                   "/>
                            <p>
                                <?php
                                if (count($aErrores) > 0 && $aErrores["Nombre"] != "") {
                                    // Mostrar los errores:
                                    printf('<p style="color:red">Error en la entrada %s %s', $aErrores["Nombre"], "</p>");
                                }
                                ?>
                            </p>
                        </fieldset>
                        <fieldset>
                            <legend>¿Cuánto pesa?</legend>
                            <label for="pesoUsuario">Introduzca su peso en gramos:</label><br>
                            <input type="number" id="pesoUusario" name="pesoUsuario" placeholder="<?php
                            if (count($aErrores) > 0 && $aErrores["Peso"] != "") {
                                // Mostrar los errores:
                                printf('%s', $aErrores["Peso"]);
                            }
                            ?>
                                   "/>
                            <p>
                                <?php
                                if (count($aErrores) > 0 && $aErrores["Peso"] != "") {
                                    // Mostrar los errores:
                                    printf('<p style="color:red">Error en la entrada %s %s', $aErrores["Peso"], "</p>");
                                }
                                ?>
                            </p>
                        </fieldset>
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