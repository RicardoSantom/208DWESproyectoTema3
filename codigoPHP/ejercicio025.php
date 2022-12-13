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
        <title>Ejercicio 025 Tema3</title>
        <!--Fecha última modificación 12/12/2022 -->
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 025.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Trabajar en PlantillaFormulario.php mi plantilla para hacer formularios como churros.</h3>
                <?php
                /**
                 * @author Ricardo Santiago Tomé Ricardo Santom en GitHub <https://github.com/RicardoSantom>
                 * @version 2.0
                 * @since 27/11/2022
                 * description Formulario con todos los tipos de input trabajados en clase, su utilidad será como plantilla
                 * para hacer formularios como churros.
                 */
                //Incluir libreria de validacion
                require_once '../core/validacionFormularios.php';
                /*
                 * La siguiente lista de constantes sirve para validar que los valores ingresados por el usuario en los input se
                 * encuentre dentro de estos márgenes. */
                //Constante obligatorio inicializada a 1
                define("OBLIGATORIO", 1);
                //Constante opcional inicializaca a 0
                define("OPCIONAL", 0);
                //Variables de maximos y minimos inicializadas a valores 'racionales'
                define("TAMANYO_MINIMO_ALFABETICO", 1);
                define("TAMANYO_MAXIMO_ALFABETICO", 255);
                define("TAMANYO_MINIMO_ALFANUMERICO", 1);
                define("TAMANYO_MAXIMO_ALFANUMERICO", 255);
                define("TAMANYO_MINIMO_ENTERO", 1);
                define("TAMANYO_MAXIMO_ENTERO", 1000000);
                define("TAMANYO_MINIMO_FLOAT", 0.01);
                define("TAMANYO_MAXIMO_FLOAT", 300);
                define("FECHA_MINIMA", '01/01/1900');
                define("FECHA_MAXIMA", '01/01/2200');
                define("TAMANYO_MAXIMO_AREATEXTO", 255);
                //La siguiente variable comprueba si se han producido errores o no en los input.
                $entradaOk = true;
                //El siguiente array inicia dos campos, uno por cada input a registrar.
                $aErrores = [
                    'alfabeticoObligatorio' => '',
                    'alfabeticoOpcional' => '',
                    'enteroObligatorio' => '',
                    'enteroOpcional' => '',
                    'fechaObligatoria' => '',
                    'fechaOpcional' => '',
                    'telefonoObligatorio' => '',
                    'telefonoOpcional' => '',
                    'floatObligatorio' => null,
                    'floatOpcional' => null,
                ];
                //y el array de respuestas con los mismos campos;
                $aRespuestas = [
                    'alfabeticoObligatorio' => '',
                    'alfabeticoOpcional' => '',
                    'enteroObligatorio' => '',
                    'enteroOpcional' => '',
                    'fechaObligatoria' => null,
                    'fechaOpcional' => null,
                    'telefonoObligatorio' => '',
                    'telefonoOpcional' => '',
                    'floatObligatorio' => null,
                    'floatOpcional' => null,
                ];
                //En el siguiente bloque de código. se comprueba si se ha pulsado el botón Enviar.
                //Si se ha pulsado, se rellena
                if (!empty($_REQUEST['Enviar'])) {
                    //Validacion de campos obligatorios
                    $aErrores['alfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], 1000, 1, 1);
                    $aErrores['alfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional'], 1000, 1, 0);
                    $aErrores['enteroObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], 280, 0, 1);
                    $aErrores['enteroOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['enteroOpcional'], 280, 0, 0);
                    $aErrores['fechaObligatoria'] = validacionFormularios::validarFecha($_REQUEST['fechaObligatoria'], '01/01/2200', '01/01/1900', 1);
                    $aErrores['fechaOpcional'] = validacionFormularios::validarFecha($_REQUEST['fechaOpcional'], '01/01/2200', '01/01/1900', 0);
                    $aErrores['telefonoObligatorio'] = validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], 1);
                    $aErrores['telefonoOpcional'] = validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional'], 0);
                    $aErrores['floatObligatorio'] = validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], TAMANYO_MAXIMO_FLOAT, TAMANYO_MINIMO_FLOAT, OBLIGATORIO);
                    $aErrores['floatOpcional'] = validacionFormularios::comprobarFloat($_REQUEST['floatOpcional'], TAMANYO_MAXIMO_FLOAT, TAMANYO_MINIMO_FLOAT, OPCIONAL);
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
                    $aRespuestas['alfabeticoObligatorio'] = $_REQUEST['alfabeticoObligatorio'];
                    $aRespuestas['alfabeticoOpcional'] = $_REQUEST['alfabeticoOpcional'];
                    $aRespuestas['enteroObligatorio'] = $_REQUEST['enteroObligatorio'];
                    $aRespuestas['enteroOpcional'] = $_REQUEST['enteroOpcional'];
                    $aRespuestas['fechaObligatoria'] = $_REQUEST['fechaObligatoria'];
                    $aRespuestas['fechaOpcional'] = $_REQUEST['fechaOpcional'];
                    $aRespuestas['telefonoObligatorio'] = $_REQUEST['telefonoObligatorio'];
                    $aRespuestas['telefonoOpcional'] = $_REQUEST['telefonoOpcional'];
                    $aRespuestas['floatObligatorio'] = $_REQUEST['floatObligatorio'];
                    $aRespuestas['floatOpcional'] = $_REQUEST['floatOpcional'];
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
                            <label for="alfabeticoObligatorio">Alfabetico obligatorio:*</label>
                            <input type="text" id="alfabeticoObligatorio" name="alfabeticoObligatorio" class="obligatorios" value="<?php echo $_REQUEST['alfabeticoObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['alfabeticoObligatorio'] . '</span>'; ?></p><br>
                            <label for="alfabeticoOpcional">Alfabetico opcional:</label>
                            <input type="text" id="alfabeticoOpcional" name="alfabeticoOpcional" value="<?php echo $_REQUEST['alfabeticoOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['alfabeticoOpcional'] . '</span>'; ?></p><br>
                            <label for="enteroObligatorio">Entero obligatorio:*</label>
                            <input type = "number" id="enteroObligatorio" name = "enteroObligatorio" class="obligatorios" min="0" max="10" value ="<?php echo $_REQUEST['enteroObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['enteroObligatorio'] . '</span>'; ?></p><br>
                            <label for="enteroOpcional">Entero opcional</label>
                            <input type = "number" id="enteroOpcional"  name = "enteroOpcional" min="1" max="10" value ="<?php echo $_REQUEST['enteroOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['enteroOpcional'] . '</span>'; ?></p><br>
                            <label for=fechaObligatoria>Introduzca su fecha de nacimiento:</label>
                            <input type = "date" id=fechaObligatoria name = fechaObligatoria class="obligatorios" value ="<?php echo $_REQUEST['fechaObligatoria'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['fechaObligatoria'] . '</span>'; ?></p><br>
                            <label for="fechaOpcional">Introduzca la fecha de matrícula</label>
                            <input type = "date" id="fechaOpcional" name = "fechaOpcional"  value ="<?php echo $_REQUEST['fechaOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['fechaOpcional'] . '</span>'; ?></p><br>
                            <label for=telefonoObligatorio>Teléfono obligatorio:*</label>
                            <input type="tel" id=telefonoObligatorio name=telefonoObligatorio placeholder="(Código de área) Número" class="obligatorios" value="<?php echo $_REQUEST['telefonoObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['telefonoObligatorio'] . '</span>'; ?></p><br>
                            <label for=telefonoOpcional>Introduzca su número de teléfono fijo:</label>
                            <input type="tel" id=telefonoOpcional name=telefonoOpcional placeholder="(Código de área) Número" value="<?php echo $_REQUEST['telefonoOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['telefonoOpcional'] . '</span>'; ?></p><br>
                            <label for="floatObligatorio">Float obligatorio:*</label>
                            <input type = "text" id="floatObligatorio" name = "floatObligatorio" class="obligatorios" min="0" max="10" value ="<?php echo $_REQUEST['floatObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['floatObligatorio'] . '</span>'; ?></p><br>
                            <label for="floatOpcional">Float opcional</label>
                            <input type = "number" id="floatOpcional" step="0.01" name = "floatOpcional" min="0.01" max="1000000.01" value ="<?php echo $_REQUEST['floatOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['floatOpcional'] . '</span>'; ?></p><br>
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