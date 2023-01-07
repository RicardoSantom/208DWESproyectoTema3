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
                define("N_MINIMO_CARACTERES", 1);
                define("N_MAXIMO_CARACTERES", 255);
                define("FECHA_MINIMA", '01/01/1900');
                define("FECHA_MAXIMA", '01/01/2200');
                //La siguiente variable comprueba si se han producido errores o no en los input.
                $entradaOk = true;
                //El siguiente array inicia dos campos, uno por cada input a registrar.
                $aErrores = [
                    'alfabeticoObligatorio' => null,
                    'alfabeticoOpcional' => null,
                    'enteroObligatorio' => null,
                    'enteroOpcional' => null,
                    'fechaObligatoria' => null,
                    'fechaOpcional' => null,
                    'fechaOpcionalLocal' => null,
                    'telefonoObligatorio' => null,
                    'telefonoOpcional' => null,
                    'floatObligatorio' => null,
                    'floatOpcional' => null,
                    'areaTextoObligatorio' => null,
                    'areaTextoOpcional' => null,
                    'alfanumericoObligatorio' => null,
                    'alfanumericoOpcional' => null,
                    'dniObligatorio' => null,
                    'dniOpcional' => null,
                    'codigoPostalObligatorio' => null,
                    'codigoPostalOpcional' => null,
                    'urlObligatorio' => null,
                    'urlOpcional' => null,
                    'emailObligatorio' => null,
                    'emailOpcional' => null,
                ];
                //y el array de respuestas con los mismos campos;
                $aRespuestas = [
                    'alfabeticoObligatorio' => null,
                    'alfabeticoOpcional' => null,
                    'enteroObligatorio' => null,
                    'enteroOpcional' => null,
                    'fechaObligatoria' => null,
                    'fechaOpcional' => null,
                    'fechaOpcionalLocal' => null,
                    'telefonoObligatorio' => null,
                    'telefonoOpcional' => null,
                    'floatObligatorio' => null,
                    'floatOpcional' => null,
                    'areaTextoObligatorio' => null,
                    'areaTextoOpcional' => null,
                    'alfanumericoObligatorio' => null,
                    'alfanumericoOpcional' => null,
                    'dniObligatorio' => null,
                    'dniOpcional' => null,
                    'codigoPostalObligatorio' => null,
                    'codigoPostalOpcional' => null,
                    'urlObligatorio' => null,
                    'urlOpcional' => null,
                    'emailObligatorio' => null,
                    'emailOpcional' => null,
                ];
                //En el siguiente bloque de código. se comprueba si se ha pulsado el botón Enviar.
                //Si se ha pulsado, se rellena
                if (!empty($_REQUEST['Enviar'])) {
                    //Validacion de campos obligatorios
                    //Alfabéticos
                    $aErrores['alfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], N_MAXIMO_CARACTERES, N_MINIMO_CARACTERES, OBLIGATORIO);
                    $aErrores['alfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional'], N_MAXIMO_CARACTERES, N_MINIMO_CARACTERES, OPCIONAL);
                    //Numéricos enteros
                    $aErrores['enteroObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], PHP_INT_MAX, PHP_INT_MIN, OBLIGATORIO);
                    $aErrores['enteroOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['enteroOpcional'], PHP_INT_MAX, PHP_INT_MIN, OPCIONAL);
                    //Fechas
                    $aErrores['fechaObligatoria'] = validacionFormularios::validarFecha($_REQUEST['fechaObligatoria'], FECHA_MAXIMA, FECHA_MINIMA, OBLIGATORIO);
                    $aErrores['fechaOpcional'] = validacionFormularios::validarFecha($_REQUEST['fechaOpcional'], FECHA_MAXIMA, FECHA_MINIMA, OPCIONAL);
                    $aErrores['fechaOpcionalLocal'] = validacionFormularios::validarFecha($_REQUEST['fechaOpcionalLocal'], FECHA_MAXIMA, FECHA_MINIMA, OPCIONAL);
                    //Teléfonos
                    $aErrores['telefonoObligatorio'] = validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], OBLIGATORIO);
                    $aErrores['telefonoOpcional'] = validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional'], OPCIONAL);
                    //Numéricos decimales
                    $aErrores['floatObligatorio'] = validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, OBLIGATORIO);
                    $aErrores['floatOpcional'] = validacionFormularios::comprobarFloat($_REQUEST['floatOpcional'], PHP_FLOAT_MAX, PHP_FLOAT_MIN, OPCIONAL);
                    /*
                     * A continuación, en el elemento obligatorio compruebo que cumpla con el tamaño máximo establecido y
                     * en el elemento opcional compruebo el tamaño mínimo establecido. Porque la librería de validación no da opción a
                     * comprobar los dos en un mismo campo.
                     */
                    $aErrores['areaTextoObligatorio'] = validacionFormularios::comprobarMaxTamanio($_REQUEST['areaTextoObligatorio'], N_MAXIMO_CARACTERES, OBLIGATORIO);
                    $aErrores['areaTextoOpcional'] = validacionFormularios::comprobarMinTamanio($_REQUEST['areaTextoOpcional'], N_MINIMO_CARACTERES, OPCIONAL);
                    //Alfanuméricos
                    $aErrores['alfanumericoObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObligatorio'], N_MAXIMO_CARACTERES, N_MINIMO_CARACTERES, OBLIGATORIO);
                    $aErrores['alfanumericoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoOpcional'], N_MAXIMO_CARACTERES, N_MINIMO_CARACTERES, OPCIONAL);
                    //DNI
                    $aErrores['dniObligatorio'] = validacionFormularios::validarDni($_REQUEST['dniObligatorio'], OBLIGATORIO);
                    $aErrores['dniOpcional'] = validacionFormularios::validarDni($_REQUEST['dniOpcional'], OPCIONAL);
                    //Codigos postales
                    $aErrores['codigoPostalObligatorio'] = validacionFormularios::validarCp($_REQUEST['codigoPostalObligatorio'], OBLIGATORIO);
                    $aErrores['codigoPostalOpcional'] = validacionFormularios::validarCp($_REQUEST['codigoPostalOpcional'], OPCIONAL);
                    //URLS
                    $aErrores['urlObligatorio'] = validacionFormularios::validarURL($_REQUEST['urlObligatorio'], OBLIGATORIO);
                    $aErrores['urlOpcional'] = validacionFormularios::validarURL($_REQUEST['urlOpcional'], OPCIONAL);
                    //e-mail
                    $aErrores['emailObligatorio'] = validacionFormularios::validarEmail($_REQUEST['emailObligatorio'], OBLIGATORIO);
                    $aErrores['emailOpcional'] = validacionFormularios::validarEmail($_REQUEST['emailOpcional'], OPCIONAL);
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
                    $aRespuestas['fechaOpcionalLocal'] = $_REQUEST['fechaOpcionalLocal'];
                    $aRespuestas['telefonoObligatorio'] = $_REQUEST['telefonoObligatorio'];
                    $aRespuestas['telefonoOpcional'] = $_REQUEST['telefonoOpcional'];
                    $aRespuestas['floatObligatorio'] = $_REQUEST['floatObligatorio'];
                    $aRespuestas['floatOpcional'] = $_REQUEST['floatOpcional'];
                    $aRespuestas['areaTextoObligatorio'] = $_REQUEST['areaTextoObligatorio'];
                    $aRespuestas['areaTextoOpcional'] = $_REQUEST['areaTextoOpcional'];
                    $aRespuestas['alfanumericoObligatorio'] = $_REQUEST['alfanumericoObligatorio'];
                    $aRespuestas['alfanumericoOpcional'] = $_REQUEST['alfanumericoOpcional'];
                    $aRespuestas['dniObligatorio'] = $_REQUEST['dniObligatorio'];
                    $aRespuestas['dniOpcional'] = $_REQUEST['dniOpcional'];
                    $aRespuestas['codigoPostalObligatorio'] = $_REQUEST['codigoPostalObligatorio'];
                    $aRespuestas['codigoPostalOpcional'] = $_REQUEST['codigoPostalOpcional'];
                    $aRespuestas['urlObligatorio'] = $_REQUEST['urlObligatorio'];
                    $aRespuestas['urlOpcional'] = $_REQUEST['urlOpcional'];
                    $aRespuestas['emailObligatorio'] = $_REQUEST['emailObligatorio'];
                    $aRespuestas['emailOpcional'] = $_REQUEST['emailOpcional'];
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
                            <!-- Alfabéticos input tipo text -->
                            <label for="alfabeticoObligatorio">Alfabetico obligatorio:*</label>
                            <input type="text" id="alfabeticoObligatorio" name="alfabeticoObligatorio" class="obligatorios" value="<?php echo $_REQUEST['alfabeticoObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['alfabeticoObligatorio'] . '</span>'; ?></p><br>
                            <label for="alfabeticoOpcional">Alfabetico opcional:</label>
                            <input type="text" id="alfabeticoOpcional" name="alfabeticoOpcional" value="<?php echo $_REQUEST['alfabeticoOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['alfabeticoOpcional'] . '</span>'; ?></p><br>
                            <!-- Numéricos enteros input tipo number -->
                            <label for="enteroObligatorio">Entero obligatorio:*</label>
                            <input type = "number" id="enteroObligatorio" name = "enteroObligatorio" class="obligatorios" value ="<?php echo $_REQUEST['enteroObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['enteroObligatorio'] . '</span>'; ?></p><br>
                            <label for="enteroOpcional">Entero opcional</label>
                            <input type = "number" id="enteroOpcional"  name = "enteroOpcional" min="1" max="10" value ="<?php echo $_REQUEST['enteroOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['enteroOpcional'] . '</span>'; ?></p><br>
                            <!-- Fechas input tipo date -->
                            <label for="fechaObligatoria">Introduzca fecha obligatoria*:</label>
                            <input type = "date" id=fechaObligatoria name = fechaObligatoria class="obligatorios" value ="<?php echo $_REQUEST['fechaObligatoria'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['fechaObligatoria'] . '</span>'; ?></p><br>
                            <!--Fecha input tipo datetime-->
                            <label for="fechaOpcional">Introduzca fecha opcional:</label>
                            <input type = "datetime" id="fechaOpcional" name = "fechaOpcional"  value ="<?php echo $_REQUEST['fechaOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['fechaOpcional'] . '</span>'; ?></p><br>
                            <!--Fecha input tipo datetime-local-->
                            <label for="fechaOpcionalLocal">Introduzca fecha opcional local:</label>
                            <input type = "datetime-local" id="fechaOpcionalLocal" name = "fechaOpcionalLocal"  value ="<?php echo $_REQUEST['fechaOpcionalLocal'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['fechaOpcionalLocal'] . '</span>'; ?></p><br>
                            <!-- Teléfonos input tipo tel -->
                            <label for="telefonoObligatorio">Teléfono obligatorio:*</label>
                            <input type="tel" id=telefonoObligatorio name=telefonoObligatorio placeholder="(Código de área) Número" class="obligatorios" value="<?php echo $_REQUEST['telefonoObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['telefonoObligatorio'] . '</span>'; ?></p><br>
                            <label for="telefonoOpcional">Teléfono opcional:</label>
                            <input type="tel" id=telefonoOpcional name=telefonoOpcional placeholder="(Código de área) Número" value="<?php echo $_REQUEST['telefonoOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['telefonoOpcional'] . '</span>'; ?></p><br>
                            <!-- Numérico decimal tipo tex -->
                            <label for="floatObligatorio">Float obligatorio:*</label>
                            <input type = "text" id="floatObligatorio" name = "floatObligatorio" class="obligatorios" min="0" max="10" value ="<?php echo $_REQUEST['floatObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['floatObligatorio'] . '</span>'; ?></p><br>
                            <!-- Numérico decimal tipo number -->
                            <label for="floatOpcional">Float opcional</label>
                            <input type = "number" id="floatOpcional" name="floatOpcional" step="0.01" name = "floatOpcional" min="0.01" max="1000000.01" value ="<?php echo $_REQUEST['floatOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['floatOpcional'] . '</span>'; ?></p><br>
                            <!--Tamaño textarea-->
                            <label for="areaTextoObligatorio">Tamaño máximo area texto*</label>
                            <textarea  id="areaTextoObligatorio" name="areaTextoObligatorio" rows="4" cols="29" class="obligatorios" placeholder="AreaTexto Obligatoria + tamaño máximo"></textarea>
                            <p><?php echo '<span style="color:red;">' . $aErrores['areaTextoObligatorio'] . '</span>'; ?></p><br>
                            <label for="areaTextoOpcional">Tamaño mínimo area texto</label>
                            <textarea name="areaTextoOpcional" rows="4" cols="29" placeholder="AreaTexto Opcional + tamaño mínimo"></textarea>
                            <p><?php echo '<span style="color:red;">' . $aErrores['areaTextoOpcional'] . '</span>'; ?></p><br>
                            <!--Alfanumérico tipo text-->
                            <label for="alfanumericoObligatorio">Alfanumérico obligatorio:*</label>
                            <input type="text" id="alfanumericoObligatorio" name="alfanumericoObligatorio" class="obligatorios" value="<?php echo $_REQUEST['alfanumericoObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['alfanumericoObligatorio'] . '</span>'; ?></p><br>
                            <!--Alfanumérico textarea-->
                            <label for="alfanumericoOpcional">Alfanumerico Opcional Textarea:</label>
                            <textarea name="alfanumericoOpcional" rows="4" cols="29" placeholder="Alfanumérico en areaTexto Opcional"></textarea>
                            <p><?php echo '<span style="color:red;">' . $aErrores['alfanumericoOpcional'] . '</span>'; ?></p><br>
                            <!--DNI input tipo text-->
                            <label for="dniObligatorio">DNI obligatorio*</label>
                            <input type="text" id="dniObligatorio" name="dniObligatorio" class="obligatorios" value="<?php echo $_REQUEST['dniObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['dniObligatorio'] . '</span>'; ?></p><br>
                            <label for="dniOpcional">DNI opcional</label>
                            <input type="text" id="dniOpcional" name="dniOpcional" value="<?php echo $_REQUEST['dniOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['dniOpcional'] . '</span>'; ?></p><br>
                            <!--Código postal input tipo text-->
                            <label for="codigoPostalObligatorio">Código postal obligatorio*</label>
                            <input id="codigoPostalObligatorio" type="text" name="codigoPostalObligatorio" class="obligatorios" value="<?php echo $_REQUEST['codigoPostalObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['codigoPostalObligatorio'] . '</span>'; ?></p><br>
                            <label for="codigopostalOpcional">Código postal opcional</label>
                            <input id="codigoPostalOpcional" type="text" name="codigoPostalOpcional" value="<?php echo $_REQUEST['codigoPostalOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['codigoPostalOpcional'] . '</span>'; ?></p><br>
                            <!--URL input tipo text. Comprobación de formato únicamente en el lado del servidor-->
                            <label for="urlObligatorio">URL obligatoria:*</label>
                            <input class="obligatorios" id="urlObligatorio" type="text" name="urlObligatorio" value="<?php echo $_REQUEST['urlObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['urlObligatorio'] . '</span>'; ?></p><br>
                            <!--URL input tipo url. Añade comprobación de formato en el lado del cliente-->
                            <label for="urlOpcional">URL opcional:</label>
                            <input id="urlOpcional" type="url" name="urlOpcional" value="<?php echo $_REQUEST['urlOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['urlOpcional'] . '</span>'; ?></p><br> 
                            <!--Email input tipo text. Comprobación de formato únicamente en el lado del servidor-->
                            <label for="emailObligatorio">E-mail obligatorio:*</label>
                            <input id="emailObligatorio" type="text" class="obligatorios" name="emailObligatorio" value="<?php echo $_REQUEST['emailObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['emailObligatorio'] . '</span>'; ?></p><br>
                            <!--Email input tipo email. Añade comprobación en el lado del cliente-->
                            <label for="emailOpcional">E-mail opcional:</label>
                            <input id="emailOpcional" type="email" name="emailOpcional" value="<?php echo $_REQUEST['emailOpcional'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['emailOpcional'] . '</span>'; ?></p><br> 



                            <input type="submit" name="Enviar" value="Enviar" id="botonEnviar"/>


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
            <a href="https://daw208.ieslossauces.es/doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="https://daw208.ieslossauces.es/208DWESproyectoTema3/indexProyectoTema3.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema3">Index Proyecto Tema3</a>
        </footer>
    </body>
</html>