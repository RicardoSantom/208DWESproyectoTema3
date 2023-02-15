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
        <!--Fecha última modificación 07/01/2023 -->
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
                    'passwordObligatorio' => null,
                    'passwordOpcionalAlfabetico' => null,
                    'passwordOpcionalAlfanumerico' => null,
                    'rangoObligatorio' => null,
                    'rangoOpcional' => null,
                    'color' => null,
                    'semana' => null,
                    'mes' => null,
                    'hora' => null,
                    'busqueda' => null,
                    'fichero' => null,
                    'radioButtonLista' => null,
                    'listaDesplegable' => null,
                    'radioButtonParrafo' => null,
                    'procesar' => null,
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
                    'passwordObligatorio' => null,
                    'passwordOpcionalAlfabetico' => null,
                    'passwordOpcionalAlfanumerico' => null,
                    'rangoObligatorio' => null,
                    'rangoOpcional' => null,
                    'color' => null,
                    'semana' => null,
                    'mes' => null,
                    'hora' => null,
                    'busqueda' => null,
                    'fichero' => null,
                    'radioButtonLista' => null,
                    'listaDesplegable' => null,
                    'radioButtonParrafo' => null,
                    'procesar' => null,
                ];
                //Array para recoger la opción checked del radio button
                $aOpcionesRadioButtonLista = [
                    'Opcion1',
                    'Opcion2',
                    'Opcion3',
                ];
                //Array para recoger la opción de la lista desplegable
                $aOpcionesListaDesplegable = [
                    'null',
                    'Opcion1',
                    'Opcion2',
                    'Opcion3',
                ];
                //Array para recoger la opción checked del radio button
                $aOpcionesRadioButtonParrafo = [
                    'Opcion4',
                    'Opcion5',
                    'Opcion6',
                ];
                //En el siguiente bloque de código. se comprueba si se ha pulsado el botón Enviar.
                //Si se ha pulsado, se rellena
                if (!empty($_REQUEST['Enviar']) && empty($_REQUEST['Resetear'])) {
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
                    $aErrores['areaTextoObligatorio'] = validacionFormularios::comprobarMaxTamanio($_REQUEST['areaTextoObligatorio'], N_MAXIMO_CARACTERES);
                    $aErrores['areaTextoOpcional'] = validacionFormularios::comprobarMinTamanio($_REQUEST['areaTextoOpcional'], N_MINIMO_CARACTERES);
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
                    /*
                     * PASSWORD
                     */
                    //password comprobando longitud máxima, mínima, que coincida con patrón de la librería de validación de formularios y obligatorio
                    $aErrores['passwordObligatorio'] = validacionFormularios::validarPassword($_REQUEST['passwordObligatorio'], 16, 2, 3, OBLIGATORIO);
                    //password opcional comprobando únicamente que sea alfabético
                    $aErrores['passwordOpcionalAlfabetico'] = validacionFormularios::validarPassword($_REQUEST['passwordOpcionalAlfabetico'], 16, 2, 1, OPCIONAL);
                    $aErrores['passwordOpcionalAlfanumerico'] = validacionFormularios::validarPassword($_REQUEST['passwordOpcionalAlfanumerico'], 16, 2, 2, OPCIONAL);
                    //RANGO
                    $aErrores['rangoObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['rangoObligatorio'], 10, 0, OBLIGATORIO);
                    $aErrores['rangoOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['rangoOpcional'], 10, 0, OPCIONAL);
                    /*
                     * Inputs sin validación específica en la libreriaValidacionFormularios
                     */
                    //COLOR Pendiente implementación de método en librería validación formularios para valor hexadecimal que envía el input específico
                    $aErrores['color'] = validacionFormularios::comprobarNoVacio($_REQUEST['color']);
                    //Fechas
                    $aErrores['semana'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['semana']);
                    $aErrores['mes'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['mes']);
                    $aErrores['hora'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['hora']);
                    //Busqueda
                    $aErrores['busqueda'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['busqueda'], 50, N_MINIMO_CARACTERES, OPCIONAL);
                    //File
                    $aErrores['fichero'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['fichero'], 50, N_MINIMO_CARACTERES, OPCIONAL);
                    //Radio Buttom selección única
                    if (isset($_REQUEST['radioButtonLista'])) {
                        $aErrores['radioButtonLista'] = validacionFormularios::validarElementoEnLista($_REQUEST['radioButtonLista'], $aOpcionesRadioButtonLista);
                    } else {
                        $aErrores['radioButtonLista'] = validacionFormularios::validarElementoEnLista(null, $aOpcionesRadioButtonLista);
                    }
                    //Lista desplegable
                    $aErrores['listaDesplegable'] = validacionFormularios::validarElementoEnLista($_REQUEST['listaDesplegable'], $aOpcionesListaDesplegable);
                    //Radio Buttom selección múltiple
                    if (isset($_REQUEST['radioButtonParrafo'])) {
                        $aErrores['radioButtonParrafo'] = validacionFormularios::validarElementoEnLista($_REQUEST['radioButtonParrafo'], $aOpcionesRadioButtonParrafo);
                    } else {
                        $aErrores['radioButtonParrafo'] = validacionFormularios::validarElementoEnLista(null, $aOpcionesRadioButtonParrafo);
                    }
                    //Botón con imagen, envía coordenadas x e y de su posición
                    $aErrores['procesar'] = $_REQUEST['procesar'];
                    //Bucle para comprobar si ha habido errores.Si los ha habido, pone la variable $entradaOk a false
                    foreach ($aErrores as $clave => $valor) {
                        if ($valor != null) {
                            $_REQUEST[$clave] = '';
                            $entradaOk = false;
                        }
                    }
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
                    $aRespuestas['passwordObligatorio'] = $_REQUEST['passwordObligatorio'];
                    $aRespuestas['passwordOpcionalAlfabetico'] = $_REQUEST['passwordOpcionalAlfabetico'];
                    $aRespuestas['passwordOpcionalAlfanumerico'] = $_REQUEST['passwordOpcionalAlfanumerico'];
                    $aRespuestas['rangoObligatorio'] = $_REQUEST['rangoObligatorio'];
                    $aRespuestas['rangoOpcional'] = $_REQUEST['rangoOpcional'];
                    $aRespuestas['color'] = $_REQUEST['color'];
                    $aRespuestas['semana'] = $_REQUEST['semana'];
                    $aRespuestas['mes'] = $_REQUEST['mes'];
                    $aRespuestas['hora'] = $_REQUEST['hora'];
                    $aRespuestas['busqueda'] = $_REQUEST['busqueda'];
                    $aRespuestas['fichero'] = $_REQUEST['fichero'];
                    $aRespuestas['radioButtonLista'] = $_REQUEST['radioButtonLista'];
                    $aRespuestas['listaDesplegable'] = $_REQUEST['listaDesplegable'];
                    $aRespuestas['radioButtonParrafo'] = $_REQUEST['radioButtonParrafo'];
                    $aRespuestas['procesar'] = $_REQUEST['procesar'];
                    //Impresión de tabla asociando clave y valor
                    echo "<table><tbody><caption>Tabla de datos</caption><tr>";
                    foreach ($aRespuestas as $clave => $valor) {
                        printf('<td>%s</td><td>%s %s', $clave, $valor, '</td>');
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                } else {
                    ?>
                    <form name="ejercicio024" autocomplete="on" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
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
                            <!--Fechas-->
                            <!-- Fecha input tipo date -->
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
                            <textarea  id="areaTextoObligatorio" name="areaTextoObligatorio" rows="4" cols="29" placeholder="Tamaño máximo área de texto"></textarea>
                            <p><?php echo '<span style="color:red;">' . $aErrores['areaTextoObligatorio'] . '</span>'; ?></p><br>
                            <label for="areaTextoOpcional">Tamaño mínimo area texto</label>
                            <textarea name="areaTextoOpcional" rows="4" cols="29" placeholder="Tamaño mínimo área de texto"></textarea>
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
                            <!-- PASSWORD -->
                            <label for="passwordObligatorio">Password obligatorio con patrón:*</label>
                            <input id="passwordObligatorio" type="password" name="passwordObligatorio" class="obligatorios" value="<?php echo $_REQUEST['passwordObligatorio'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['passwordObligatorio'] . '</span>'; ?></p><br> 
                            <label for="passwordOpcional">Password opcional alfabético:</label>
                            <input id="passwordOpcionalAlfabetico" type="password" name="passwordOpcionalAlfabetico" value="<?php echo $_REQUEST['passwordOpcionalAlfabetico'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['passwordOpcionalAlfabetico'] . '</span>'; ?></p><br>
                            <label for="passwordOpcionalAlfanumerico">Password opcional alfanumérico:</label>
                            <input id="passwordOpcionalAlfanumerico" type="password" name="passwordOpcionalAlfanumerico" value="<?php echo $_REQUEST['passwordOpcionalAlfanumerico'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['passwordOpcionalAlfanumerico'] . '</span>'; ?></p><br> 
                            <!--RANGE-->
                            <!--rangoObligatorio no tiene establecidos atributos max, min ni step, por lo tanto, no tiene validación en el lado cliente.
                            La validación la realiza exclusívamente la función de comprobar entero de la librería de validación de formularios-->
                            <label for="rangoObligatorio">Rango obligatorio:*</label>
                            Puntos 0<input type="range" name="rangoObligatorio" id="rangoPObligatorio" class="obligatorios" value ="<?php echo $_REQUEST['rangoObligatorio'] ?? '' ?>"/>10
                            <p><?php echo '<span style="color: red;">' . $aErrores['rangoObligatorio'] . '</span>'; ?></p><br>
                            <!--rangoOpcional si tiene establecidos atributos max, min ni step, por lo tanto, si tiene validación en el lado cliente.
                            La validación la realiza conjúntamente con la función de comprobar entero de la librería de validación de formularios-->
                            <label for="rangoOpcional">Rango opcional:</label>
                            Puntos 0<input type="range" name="rangoOpcional" id="rangoOpcional" min="0" max="10" step="1"  value ="<?php echo $_REQUEST['rangoOpcional'] ?? '' ?>"/>10
                            <p><?php echo '<span style="color: red;">' . $aErrores['rangoOpcional'] . '</span>'; ?></p><br>

                            <!--Input sin validación específica en la librería de validación de formularios-->
                            <!--Input tipo color.-->
                            <label for="color">Seleccione un color:</label>
                            <input type="color" name="color" id="color" value ="<?php echo $_REQUEST['color'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['color'] . '</span>'; ?></p><br>
                            <!--Fecha input tipo week-->
                            <label for="semana">Semana:</label>
                            <input type="week" name="semana" id="semana" value ="<?php echo $_REQUEST['semana'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['semana'] . '</span>'; ?></p><br>
                            <!--Fecha input tipo month-->
                            <label for="mes">Mes:</label>
                            <input type="month" name="mes" id="mes" value ="<?php echo $_REQUEST['mes'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['mes'] . '</span>'; ?></p><br>
                            <!--Hora input tipo time-->
                            <label for="hora">Hora:</label>
                            <input type="time" name="hora" id="hora" value ="<?php echo $_REQUEST['hora'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['hora'] . '</span>'; ?></p><br>
                            <!--SEARCH-->
                            <label for="busqueda">Busqueda:</label>
                            <input type="search" name="busqueda" id="busqueda"  value ="<?php echo $_REQUEST['busqueda'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['busqueda'] . '</span>'; ?></p><br>
                            <!--FILE-->
                            <label for="fichero">Busqueda de fichero:</label>
                            <input type="file" name="fichero" id="fichero"  value ="<?php echo $_REQUEST['fichero'] ?? '' ?>"/>
                            <p><?php echo '<span style="color: red;">' . $aErrores['fichero'] . '</span>'; ?></p><br>
                            <!--RADIO BUTTON - CHECKBOX - LISTA DESPLEGABLE-->
                            <!-- Radio button tipo lista -->
                            <fieldset>
                                <legend style="margin-right:auto;color: #00006a;text-shadow: 2px 2px 2px white;">Radio button lista</legend>
                                <ul>
                                    <li><!--Si los label se colocan detrás del input, en la página se visualizan los elementos más alejados uno del otro-->
                                        <input class="radioButtonLista" id="opcionRadio1" type="radio" name="radioButtonLista" value="Opcion1"
                                        <?php
                                        if (isset($_REQUEST['radioButtonLista']) && $_REQUEST['radioButtonLista'] == 'Opcion1') {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="Opcion1">Opcion1</label>
                                    </li>
                                    <li>
                                        <input class="radioButtonLista" id="opcionRadio2" type="radio" name="radioButtonLista" value="Opcion2"
                                        <?php
                                        if (isset($_REQUEST['radioButtonLista']) && $_REQUEST['radioButtonLista'] == 'Opcion2') {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="Opcion2">Opcion2</label>
                                    </li>
                                    <li>
                                        <input class="radioButtonLista" id="opcionRadio3" type="radio" name="radioButtonLista" value="Opcion3"
                                        <?php
                                        if (isset($_REQUEST['radioButtonLista']) && $_REQUEST['radioButtonLista'] == 'Opcion3') {
                                            echo "checked";
                                        }
                                        ?>>
                                        <label for="Opcion3">Opcion3</label>
                                    </li>
                                    <p><?php echo '<span style="color: red;">' . $aErrores['radioButtonLista'] . '</span>'; ?></p><br>
                                </ul>
                            </fieldset>
                            <!--Lista desplegable-->
                            <fieldset>
                                <legend style="margin-right:auto;color: #00006a;text-shadow: 2px 2px 2px white;">Selección lista desplegable</legend>
                                <label for="listaDesplegable">Lista Desplegable :</label>
                                <select name="listaDesplegable" value="<?php
                                if (isset($_REQUEST['listaDesplegable'])) {
                                    echo $_REQUEST['listaDesplegable'];
                                }
                                ?>">
                                    <option value="null">Elija una opcion :</option>
                                    <option value="Opcion1">Opcion1</option>
                                    <option value="Opcion2">Opcion2</option>
                                    <option value="Opcion3">Opcion3</option>
                                </select>
                                <p><?php echo '<span style="color: red;">' . $aErrores['listaDesplegable'] . '</span>'; ?></p><br>
                            </fieldset>
                            <!--Radio button en línea-->
                            <fieldset>
                                <legend style="margin-right:auto;color: #00006a;text-shadow: 2px 2px 2px white;">Radio button parrafo</legend>
                                <!--Si los label envuelven a los input, en la página se visualizan más 'pegados' un elemento al otro-->
                                <p><label for="Opcion4"><input type="radio" name="radioButtonParrafo" id="Opcion4" value="Opcion4" <?php
                                        if (isset($_REQUEST['radioButtonParrafo"']) && $_REQUEST['radioButtonParrafo"'] == 'Opcion4') {
                                            echo "checked";
                                        }
                                        ?>>Opción 4</label>
                                </p>
                                <p><label for="Opcion5"><input type="radio" name="radioButtonParrafo" id="Opcion5" value="Opcion5" <?php
                                        if (isset($_REQUEST['radioButtonParrafo"']) && $_REQUEST['radioButtonParrafo"'] == 'Opcion5') {
                                            echo "checked";
                                        }
                                        ?>>Opción 5</label>
                                </p>
                                <p><label for="Opcion6"><input type="radio" name="radioButtonParrafo" id="Opcion6" value="Opcion6" <?php
                                        if (isset($_REQUEST['radioButtonParrafo']) && $_REQUEST['radioButtonParrafo'] == 'Opcion6') {
                                            echo "checked";
                                        }
                                        ?>>Opción 6</label>
                                </p>
                                <p><?php echo '<span style="color: red;">' . $aErrores['radioButtonParrafo'] . '</span>'; ?></p><br>
                            </fieldset>
                            <!--BOTONES-->
                            <!--Botón con imagen-->
                            <label for="imagen">Botón con imagen:</label>
                            <input type="hidden" name="procesar" value="<?php echo $_REQUEST['imagen'] ?? '' ?>"/>
                            <input type="image" name="imagen" id="imagen" src="../webroot/images/envia.gif" alt="Submit" width="48" height="48"><br>
                            <!--Botones type reset y type submit-->
                            <input type="reset" name="Resetear" value="Resetear" id="botonReset"/>
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