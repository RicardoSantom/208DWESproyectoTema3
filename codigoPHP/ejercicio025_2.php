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
                define("TAMANYO_MINIMO_ALFANUMERICO", 1);
                define("TAMANYO_MAXIMO_ALFANUMERICO", 255);
                define("MINIMO_ENTERO", 1);
                define("MAXIMO_ENTERO", 1000000);
                define("MINIMO_FLOAT", 1);
                define("MAXIMO_FLOAT", 300);
                define("FECHA_MINIMA", '01/01/1900');
                define("FECHA_MAXIMA", '01/01/2200');
                define("TAMANO_MAXIMO_AREATEXTO", 255);
                //Variable de entrada correcta inicializada a true
                $entradaOK = true;

                //Creo el array con las opciones de la lista de idiomas
                $aListaOpciones = [
                    'null',
                    'OpcionLista1',
                    'OpcionLista2'
                ];

                //Creo el array con las opciones del checkbox
                $aCheckboxOpciones = [
                    'OpcionCheckbox1',
                    'OpcionCheckbox2'
                ];

                //Creo el array con las opciones del RadioButton
                $aRadioOpciones = [
                    'OpcionRadio1',
                    'OpcionRadio2',
                    'OpcionRadio3'
                ];

                //Creo el array de errores y lo inicializo a null
                $aErrores = [
                    'alfabeticoObligatorio' => '',
                    'alfabeticoOpcional' => null,
                    'alfanumericoObligatorio' => null,
                    'alfanumericoOpcional' => null,
                    'enteroObligatorio' => null,
                    'enteroOpcional' => null,
                    'floatObligatorio' => null,
                    'floatOpcional' => null,
                    'fechaObligatorio' => null,
                    'fechaOpcional' => null,
                    'areaTextoObligatorio' => null,
                    'areaTextoOpcional' => null,
                    'urlObligatorio' => null,
                    'urlOpcional' => null,
                    'dniObligatorio' => null,
                    'dniOpcional' => null,
                    'codigoPostalObligatorio' => null,
                    'codigoPostalOpcional' => null,
                    'telefonoObligatorio' => null,
                    'telefonoOpcional' => null,
                    'radiobuttonObligatorio' => null,
                    'checkboxObligatorio' => null,
                    'listaDesplegableObligatorio' => null
                ];
                //Creo el array de respuestas y lo incializo a null
                $aRespuestas = [
                    'alfabeticoObligatorio' => null,
                    'alfabeticoOpcional' => null,
                    'alfanumericoObligatorio' => null,
                    'alfanumericoOpcional' => null,
                    'enteroObligatorio' => null,
                    'enteroOpcional' => null,
                    'floatObligatorio' => null,
                    'floatOpcional' => null,
                    'fechaObligatorio' => null,
                    'fechaOpcional' => null,
                    'areaTextoObligatorio' => null,
                    'areaTextoOpcional' => null,
                    'urlObligatorio' => null,
                    'urlOpcional' => null,
                    'dniObligatorio' => null,
                    'dniOpcional' => null,
                    'codigoPostalObligatorio' => null,
                    'codigoPostalOpcional' => null,
                    'telefonoObligatorio' => null,
                    'telefonoOpcional' => null,
                    'radiobuttonObligatorio' => null,
                    'checkboxObligatorio' => null,
                    'listaDesplegableObligatorio' => null
                ];

                //Comprobar si se ha pulsado el boton enviar en el formulario
                if (!empty($_REQUEST['enviar'])) {
                    //Comprobar si el campo alfabetico esta bien rellenado
                    $aErrores['alfabeticoObligatorio'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoObligatorio'], N_MAXIMO_CARACTERES, N_MINIMO_CARACTERES, OBLIGATORIO);
                    $aErrores['alfabeticoOpcional'] = validacionFormularios::comprobarAlfabetico($_REQUEST['alfabeticoOpcional'], N_MAXIMO_CARACTERES, N_MINIMO_CARACTERES, OPCIONAL);
                    //Comprobar si el campo alfanumerico esta bien rellenado
                    $aErrores['alfanumericoObligatorio'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoObligatorio'], TAMANYO_MAXIMO_ALFANUMERICO, TAMANYO_MINIMO_ALFANUMERICO, OBLIGATORIO);
                    $aErrores['alfanumericoOpcional'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['alfanumericoOpcional'], TAMANYO_MAXIMO_ALFANUMERICO, TAMANYO_MINIMO_ALFANUMERICO, OPCIONAL);
                    //Comprobar si el campo entero esta bien rellenado
                    $aErrores['enteroObligatorio'] = validacionFormularios::comprobarEntero($_REQUEST['enteroObligatorio'], MAXIMO_ENTERO, MINIMO_ENTERO, OBLIGATORIO);
                    $aErrores['enteroOpcional'] = validacionFormularios::comprobarEntero($_REQUEST['enteroOpcional'], MAXIMO_ENTERO, MINIMO_ENTERO, OPCIONAL);
                    //Comprobar si el campo float esta bien rellenado
                    $aErrores['floatObligatorio'] = validacionFormularios::comprobarFloat($_REQUEST['floatObligatorio'], MAXIMO_FLOAT, MINIMO_FLOAT, OBLIGATORIO);
                    $aErrores['floatOpcional'] = validacionFormularios::comprobarFloat($_REQUEST['floatOpcional'], MAXIMO_FLOAT, MINIMO_FLOAT, OPCIONAL);
                    //Comprobar si el campo fecha esta bien rellenado
                    $aErrores['fechaObligatorio'] = validacionFormularios::validarFecha($_REQUEST['fechaObligatorio'], FECHA_MAXIMA, FECHA_MINIMA, OBLIGATORIO);
                    $aErrores['fechaOpcional'] = validacionFormularios::validarFecha($_REQUEST['fechaOpcional'], FECHA_MAXIMA, FECHA_MINIMA, OPCIONAL);
                    //Comprobar si el campo areaTexto esta bien rellenado
                    $aErrores['areaTextoObligatorio'] = validacionFormularios::comprobarMaxTamanio($_REQUEST['areaTextoObligatorio'], TAMANO_MAXIMO_AREATEXTO);
                    $aErrores['areaTextoOpcional'] = validacionFormularios::comprobarMaxTamanio($_REQUEST['areaTextoOpcional'], TAMANO_MAXIMO_AREATEXTO);
                    //Comprobar si el campo url esta bien rellenado
                    $aErrores['urlObligatorio'] = validacionFormularios::validarURL($_REQUEST['urlObligatorio'], OBLIGATORIO);
                    $aErrores['urlOpcional'] = validacionFormularios::validarURL($_REQUEST['urlOpcional'], OPCIONAL);
                    //Comprobar si el campo dni esta bien rellenado
                    $aErrores['dniObligatorio'] = validacionFormularios::validarDni($_REQUEST['dniObligatorio'], OBLIGATORIO);
                    $aErrores['dniOpcional'] = validacionFormularios::validarDni($_REQUEST['dniOpcional'], OPCIONAL);
                    //Comprobar si el campo codigoPostal esta bien rellenado
                    $aErrores['codigoPostalObligatorio'] = validacionFormularios::validarCp($_REQUEST['codigoPostalObligatorio'], OBLIGATORIO);
                    $aErrores['codigoPostalOpcional'] = validacionFormularios::validarCp($_REQUEST['codigoPostalOpcional'], OPCIONAL);
                    //Comprobar si el campo telefono esta bien rellenado
                    $aErrores['telefonoObligatorio'] = validacionFormularios::validarTelefono($_REQUEST['telefonoObligatorio'], OBLIGATORIO);
                    $aErrores['telefonoOpcional'] = validacionFormularios::validarTelefono($_REQUEST['telefonoOpcional'], OPCIONAL);
                    //Comprobar si el campo radiobutton esta bien rellenado
                    if (isset($_REQUEST['radiobuttonObligatorio'])) {
                        $aErrores['radiobuttonObligatorio'] = validacionFormularios::validarElementoEnLista($_REQUEST['radiobuttonObligatorio'], $aRadioOpciones);
                    } else {
                        $aErrores['radiobuttonObligatorio'] = validacionFormularios::validarElementoEnLista(null, $aRadioOpciones);
                    }
                    //Comprobar si el campo checkbox esta bien rellenado
                    if (isset($_REQUEST['checkboxObligatorio'])) {
                        $aErrores['checkboxObligatorio'] = validacionFormularios::validarArrayPorArray($_REQUEST['checkboxObligatorio'], $aCheckboxOpciones);
                    } else {
                        $aErrores['checkboxObligatorio'] = "Debes selecionar un valor";
                    }
                    //Comprobar si el campo listaDesplegable esta bien rellenado
                    $aErrores['listaDesplegableObligatorio'] = validacionFormularios::validarElementoEnLista($_REQUEST['listaDesplegableObligatorio'], $aListaOpciones);

                    //Comprobar si algun campo del array de errores ha sido rellenado
                    foreach ($aErrores as $campo => $error) {
                        if ($error != null) {
                            //Limpio el campo
                            $_REQUEST[$campo] = '';
                            $entradaOK = false;
                        }
                    }
                } else {
                    $entradaOK = false;
                }

                //Si los datos han sido introducidos correctamente, los mostramos 
                if ($entradaOK) {
                    //Código que se ejecuta cuando se envía el formulario
                    //Recojo los valores introducidos en el formulario del array respuestas
                    $aRespuestas = [
                        'alfabeticoObligatorio' => $_REQUEST['alfabeticoObligatorio'],
                        'alfabeticoOpcional' => $_REQUEST['alfabeticoOpcional'],
                        'alfanumericoObligatorio' => $_REQUEST['alfanumericoObligatorio'],
                        'alfanumericoOpcional' => $_REQUEST['alfanumericoOpcional'],
                        'enteroObligatorio' => $_REQUEST['enteroObligatorio'],
                        'enteroOpcional' => $_REQUEST['enteroOpcional'],
                        'floatObligatorio' => $_REQUEST['floatObligatorio'],
                        'floatOpcional' => $_REQUEST['floatOpcional'],
                        'fechaObligatorio' => $_REQUEST['fechaObligatorio'],
                        'fechaOpcional' => $_REQUEST['fechaOpcional'],
                        'areaTextoObligatorio' => $_REQUEST['areaTextoObligatorio'],
                        'areaTextoOpcional' => $_REQUEST['areaTextoOpcional'],
                        'urlObligatorio' => $_REQUEST['urlObligatorio'],
                        'urlOpcional' => $_REQUEST['urlOpcional'],
                        'dniObligatorio' => $_REQUEST['dniObligatorio'],
                        'dniOpcional' => $_REQUEST['dniOpcional'],
                        'codigoPostalObligatorio' => $_REQUEST['codigoPostalObligatorio'],
                        'codigoPostalOpcional' => $_REQUEST['codigoPostalOpcional'],
                        'telefonoObligatorio' => $_REQUEST['telefonoObligatorio'],
                        'telefonoOpcional' => $_REQUEST['telefonoOpcional'],
                        'radiobuttonObligatorio' => $_REQUEST['radiobuttonObligatorio'],
                        'checkboxObligatorio' => $_REQUEST['checkboxObligatorio'],
                        'listaDesplegableObligatorio' => $_REQUEST['listaDesplegableObligatorio']
                    ];

                    //Muestro el contenido de las variables almacenadas en el array Respuestas
                    echo 'El alfabetico obligatorio es: ' . $aRespuestas['alfabeticoObligatorio'] . '<br>';
                    echo 'El alfabetico opcional es: ' . $aRespuestas['alfabeticoOpcional'] . '<br>';
                    echo 'El alfanumerico obligatorio es: ' . $aRespuestas['alfanumericoObligatorio'] . '<br>';
                    echo 'El alfanumerico opcional es: ' . $aRespuestas['alfanumericoOpcional'] . '<br>';
                    echo 'El entero obligatorio es: ' . $aRespuestas['enteroObligatorio'] . '<br>';
                    echo 'El entero opcional es: ' . $aRespuestas['enteroOpcional'] . '<br>';
                    echo 'El float obligatorio es: ' . $aRespuestas['floatObligatorio'] . '<br>';
                    echo 'El float opcional es: ' . $aRespuestas['floatOpcional'] . '<br>';
                    echo 'La fecha obligatoria es: ' . $aRespuestas['fechaObligatorio'] . '<br>';
                    echo 'La fecha opcional es: ' . $aRespuestas['fechaOpcional'] . '<br>';
                    echo 'El area de texto obligatoria es: ' . $aRespuestas['areaTextoObligatorio'] . '<br>';
                    echo 'El area de texto opcional es: ' . $aRespuestas['areaTextoOpcional'] . '<br>';
                    echo 'La URL obligatoria es: ' . $aRespuestas['urlObligatorio'] . '</br>';
                    echo 'La URL opcional es: ' . $aRespuestas['urlOpcional'] . '</br>';
                    echo 'El dni obligatorio es: ' . $aRespuestas['dniObligatorio'] . '<br>';
                    echo 'El dni opcional es: ' . $aRespuestas['dniOpcional'] . '<br>';
                    echo 'El codigo postal obligatorio es: ' . $aRespuestas['codigoPostalObligatorio'] . '<br>';
                    echo 'El codigo postal opcional es: ' . $aRespuestas['codigoPostalOpcional'] . '<br>';
                    echo 'El telefono obligatorio es: ' . $aRespuestas['telefonoObligatorio'] . '<br>';
                    echo 'El telefono opcional es: ' . $aRespuestas['telefonoOpcional'] . '<br>';
                    echo 'El radiobutton obligatorio es: ' . $aRespuestas['radiobuttonObligatorio'] . '<br>';
                    echo 'El checkbox obligatorio es: ';
                    foreach ($aRespuestas['checkboxObligatorio'] as $value) {
                        echo $value . '<br>';
                    }
                    echo 'La lista desplegable obligatoria es: ' . $aRespuestas['listaDesplegableObligatorio'] . '<br>';
                    echo '<br>';

                    //Muestro con print_r el contenido de la variable $_REQUEST
                    echo '<p>El contenido de $_REQUEST es:</p>';
                    echo '<pre>';
                    print_r($_REQUEST);
                    echo '</pre>';
                    //Muestro con print_r el contenido de la variable $_GET
                    echo '<p>El contenido de $_GET es:</p>';
                    echo '<pre>';
                    print_r($_GET);
                    echo '</pre>';
                    //Muestro con print_r el contenido de la variable $_POST
                    echo '<p>El contenido de $_POST es:</p>';
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';
                    echo '<br>';
                    echo '<br>';
                    echo '<br>';
                } else {
                    //Código que se ejecuta antes de rellenar el formulario
                    ?> 
                    <form name="formulario" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form">
                        <fieldset>
                            <legend>Plantilla Formulario</legend>
                            <ul>
                                <!--Campo Alfabetico Obligatorio -->
                                <li>
                                    <div>
                                        <label for="alfabeticoObligatorio">Alfabetico Obligatorio*</label>
                                        <input name="alfabeticoObligatorio" id="alfabeticoObligatorio" type="text"  class="obligatorios" placeholder="Introduzca alfabetico obligatorio" value="<?php echo $_REQUEST['alfabeticoObligatorio'] ?? '' ?>"/>
                                        <?php echo '<span>' . $aErrores['alfabeticoObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Alfabetico Opcional -->
                                <li>
                                    <div>
                                        <label for="alfabeticoOpcional">Alfabetico Opcional</label>
                                        <input name="alfabeticoOpcional" id="alfabeticoOpcional" type="text" value="<?php echo isset($_REQUEST['alfabeticoOpcional']) ? $_REQUEST['alfabeticoOpcional'] : ''; ?>" placeholder="Introduzca alfabetico opcional">
                                        <?php echo '<span>' . $aErrores['alfabeticoOpcional'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Alfanumerico Obligatorio -->
                                <li>
                                    <div>
                                        <label for="alfanumericoObligatorio">Alfanumerico Obligatorio*</label>
                                        <input name="alfanumericoObligatorio" id="alfanumericoObligatorio" type="text"  class="obligatorios"  value="<?php echo isset($_REQUEST['alfanumericoObligatorio']) ? $_REQUEST['alfanumericoObligatorio'] : '' ?>" placeholder="Introduzca alfanumerico obligatorio">
                                        <?php echo '<span>' . $aErrores['alfanumericoObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Alfanumerico Opcional -->
                                <li>
                                    <div>
                                        <label for="alfanumericoOpcional">Alfanumerico Opcional</label>
                                        <input name="alfanumericoOpcional" id="alfanumericoOpcional" type="text" value="<?php echo isset($_REQUEST['alfanumericoOpcional']) ? $_REQUEST['alfanumericoOpcional'] : '' ?>" placeholder="Introduzca alfanumerico obligatorio">
                                        <?php echo '<span>' . $aErrores['alfanumericoOpcional'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Entero Obligatorio-->
                                <li>
                                    <div>
                                        <label for="enteroObligatorio">Entero Obligatorio*</label>
                                        <input name="enteroObligatorio" id="enteroObligatorio" type="text" class="obligatorios"  value="<?php echo isset($_REQUEST['enteroObligatorio']) ? $_REQUEST['enteroObligatorio'] : '' ?>" placeholder="Introduzca entero obligatorio">
                                        <p><?php echo '<span>' . $aErrores['enteroObligatorio'] . '</span>' ?></p>
                                    </div>
                                </li>
                                <!--Campo Entero Opcional-->
                                <li>
                                    <div>
                                        <label for="enteroOpcional">Entero Opcional</label>
                                        <input name="enteroOpcional" id="enteroOpcional" type="text" value="<?php echo isset($_REQUEST['enteroOpcional']) ? $_REQUEST['enteroOpcional'] : '' ?>" placeholder="Introduzca entero opcional">
                                        <?php echo '<span>' . $aErrores['enteroOpcional'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Float Obligatorio-->
                                <li>
                                    <div>
                                        <label for="floatObligatorio">Float Obligatorio*</label>
                                        <input name="floatObligatorio" id="floatObligatorio" class="obligatorios"  type="text" value="<?php echo isset($_REQUEST['floatObligatorio']) ? $_REQUEST['floatObligatorio'] : '' ?>" placeholder="Introduzca Float Obligatorio">
                                        <?php echo '<span>' . $aErrores['floatObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Float Opcional-->
                                <li>
                                    <div>
                                        <label for="floatOpcional">Float Opcional</label>
                                        <input name="floatOpcional" id="floatOpcional" type="text" value="<?php echo isset($_REQUEST['floatOpcional']) ? $_REQUEST['floatOpcional'] : '' ?>" placeholder="Introduzca Float Opcional">
                                        <?php echo '<span>' . $aErrores['floatOpcional'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Fecha Obligatorio-->
                                <li>
                                    <div>
                                        <label for="fechaObligatorio">Fecha Obligatoria*</label>
                                        <input name="fechaObligatorio" id="fechaObligatorio" class="obligatorios"  type="text" value="<?php echo isset($_REQUEST['fechaObligatorio']) ? $_REQUEST['fechaObligatorio'] : '' ?>" placeholder="Introduzca Fecha Obligatoria">
                                        <?php echo '<span>' . $aErrores['fechaObligatorio'] . '</span>' ?>
                                        <p class="ayuda">El formato debe ser DD/MM/AAAA<p>
                                    </div>
                                </li>
                                <!--Campo Fecha Opcional-->
                                <li>
                                    <div>
                                        <label for="fechaOpcional">Fecha Opcional</label>
                                        <input name="fechaOpcional" id="fechaOpcional" type="text" value="<?php echo isset($_REQUEST['fechaOpcional']) ? $_REQUEST['fechaOpcional'] : '' ?>" placeholder="Introduzca Fecha Opcional">
                                        <?php echo '<span>' . $aErrores['fechaOpcional'] . '</span>' ?>
                                        <p class="ayuda">El formato debe ser DD/MM/AAAA<p>
                                    </div>
                                </li>
                                <!--Campo AreaTexto Obligatorio-->
                                <li>
                                    <div>
                                        <label for="areaTextoObligatorio">AreaTexto Obligatoria*</label>
                                        <textarea name="areaTextoObligatorio" rows="4" cols="29" class="obligatorios" >AreaTexto Obligatoria</textarea>
                                        <?php echo '<span>' . $aErrores['areaTextoObligatorio'] . '</span>' ?>
                                        <p class="ayuda">Los caracteres maximos son 255.<p>
                                    </div>
                                </li>
                                <!--Campo AreaTexto Opcional-->
                                <li>
                                    <div>
                                        <label for="areaTextoOpcional">AreaTexto Opcional</label>
                                        <textarea name="areaTextoOpcional" rows="4" cols="29">AreaTexto Opcional</textarea>
                                        <?php echo '<span>' . $aErrores['areaTextoOpcional'] . '</span>' ?>
                                        <p class="ayuda">Los caracteres maximos son 255.<p>
                                    </div>
                                </li>
                                <!--Campo URL Obligatorio-->
                                <li>
                                    <div>
                                        <label for="urlObligatorio">URL Obligatorio*</label>
                                        <input name="urlObligatorio" id="urlObligatorio" type="text" class="obligatorios" placeholder="El formato debe ser https://www.URLObligatorio.com"  value="<?php echo isset($_REQUEST['urlObligatorio']) ? $_REQUEST['urlObligatorio'] : '' ?>" placeholder="URL Obligatorio">
                                        <p><?php echo '<span style="color: red;">' . $aErrores['urlObligatorio'] . '</span>' ?></p>
                                        <p class="ayuda">El formato debe ser https://www.URLObligatorio.com<p>
                                    </div>
                                </li>
                                <!--Campo URL Opcional-->
                                <li>
                                    <div>
                                        <label for="urlOpcional">URL Opcional</label>
                                        <input name="urlOpcional" id="urlOpcional" type="text" value="<?php echo isset($_REQUEST['urlOpcional']) ? $_REQUEST['urlOpcional'] : '' ?>" placeholder="URL Opcional">
                                        <?php echo '<span>' . $aErrores['urlOpcional'] . '</span>' ?>
                                        <p class="ayuda">El formato debe ser https://www.URLOpcional.com<p>
                                    </div>
                                </li>
                                <!--Campo DNI Obligatorio-->
                                <li>
                                    <div>
                                        <label for="dniObligatorio">DNI Obligatorio*</label>
                                        <input name="dniObligatorio" type="text" class="obligatorios"  value="<?php echo isset($_REQUEST['dniObligatorio']) ? $_REQUEST['dniObligatorio'] : '' ?>" placeholder="DNI Obligatorio">
                                        <?php echo '<span>' . $aErrores['dniObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo DNI Opcional-->
                                <li>
                                    <div>
                                        <label for="dniOpcional">DNI Opcional</label>
                                        <input name="dniOpcional" type="text" value="<?php echo isset($_REQUEST['dniOpcional']) ? $_REQUEST['dniOpcional'] : '' ?>" placeholder="DNI Opcional">
                                        <?php echo '<span>' . $aErrores['dniOpcional'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo CodigoPostal Obligatorio-->
                                <li>
                                    <div>
                                        <label for="codigoPostalObligatorio">Codigo Postal Obligatorio*</label>
                                        <input name="codigoPostalObligatorio" type="text" class="obligatorios"  value="<?php echo isset($_REQUEST['codigoPostalObligatorio']) ? $_REQUEST['codigoPostalObligatorio'] : '' ?>" placeholder="Codigo Postal Obligatorio">
                                        <?php echo '<span>' . $aErrores['codigoPostalObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo CodigoPostal Opcional-->
                                <li>
                                    <div>
                                        <label for="codigoPostalOpcional">Codigo Postal Opcional</label>
                                        <input name="codigoPostalOpcional" type="text" value="<?php echo isset($_REQUEST['codigoPostalOpcional']) ? $_REQUEST['codigoPostalOpcional'] : '' ?>" placeholder="Codigo Postal Opcional">
                                        <?php echo '<span>' . $aErrores['codigoPostalOpcional'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Telefono Obligatorio-->
                                <li>
                                    <div>
                                        <label for="telefonoObligatorio">Telefono Obligatorio*</label>
                                        <input name="telefonoObligatorio" id="telefonoObligatorio" class="obligatorios"  type="text" value="<?php echo isset($_REQUEST['telefonoObligatorio']) ? $_REQUEST['telefonoObligatorio'] : '' ?>" placeholder="Telefono Obligatorio">
                                        <?php echo '<span>' . $aErrores['telefonoObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Telefono Opcional-->
                                <li>
                                    <div>
                                        <label for="telefonoOpcional">Telefono Opcional</label>
                                        <input name="telefonoOpcional" id="telefonoOpcional" type="text" value="<?php echo isset($_REQUEST['telefonoOpcional']) ? $_REQUEST['telefonoOpcional'] : '' ?>" placeholder="Telefono Opcional">
                                        <?php echo '<span>' . $aErrores['telefonoOpcional'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Radiobutton Obligatorio-->
                                <li>
                                    <div>
                                        <label for="radiobuttonObligatorio">Radiobutton Obligatorio*</label>
                                        <label for="OpcionRadio1">
                                            <input class="radiobuttonObligatorio" id="opcionRadio1" type="radio" class="obligatorios"  name="radiobuttonObligatorio" value="OpcionRadio1"
                                            <?php
                                            if (isset($_REQUEST['radiobuttonObligatorio']) && $_REQUEST['radiobuttonObligatorio'] == 'OpcionRadio1') {
                                                echo "checked";
                                            }
                                            ?>>OpcionRadio1</label>
                                        <label for="OpcionRadio2">
                                            <input class="radiobuttonObligatorio" id="opcionRadio2" class="obligatorios"  type="radio" name="radiobuttonObligatorio" value="OpcionRadio2"
                                            <?php
                                            if (isset($_REQUEST['radiobuttonObligatorio']) && $_REQUEST['radiobuttonObligatorio'] == 'OpcionRadio2') {
                                                echo "checked";
                                            }
                                            ?>>OpcionRadio2</label>
                                        <label for="OpcionRadio3">
                                            <input class="radiobuttonObligatorio" id="opcionRadio3" class="obligatorios"  type="radio" name="radiobuttonObligatorio" value="OpcionRadio3"
                                            <?php
                                            if (isset($_REQUEST['radiobuttonObligatorio']) && $_REQUEST['radiobuttonObligatorio'] == 'OpcionRadio3') {
                                                echo "checked";
                                            }
                                            ?>>OpcionRadio3</label>
                                            <?php echo '<span>' . $aErrores['radiobuttonObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Checkbox Obligatorio-->
                                <li>
                                    <div>
                                        <label for="checkboxObligatorio">Checkbox Obligatorio</label>

                                        <input class="checkboxObligatorio" id="OpcionCheckbox1" type="checkbox" class="obligatorios"  name="checkboxObligatorio[]"  value="OpcionCheckbox1" 
                                        <?php
                                        if (!empty($_REQUEST['checkboxObligatorio'])) {
                                            if (in_array('OpcionCheckbox1', $_REQUEST['checkboxObligatorio'])) {
                                                echo "checked";
                                            }
                                        }
                                        ?>><label for="OpcionCheckbox1">OpcionCheckbox1</label>

                                        <input class="checkboxObligatorio" id="OpcionCheckbox2" type="checkbox" name="checkboxObligatorio[]"  value="OpcionCheckbox2">
                                        <?php
                                        if (!empty($_REQUEST['checkboxObligatorio'])) {
                                            if (in_array('OpcionCheckbox2', $_REQUEST['checkboxObligatorio'])) {
                                                echo "checked";
                                            }
                                        }
                                        ?><label for="OpcionCheckbox2">OpcionCheckbox2</label>

                                        <?php echo '<span>' . $aErrores['checkboxObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo ListaDesplegable Obligatorio-->
                                <li>
                                    <div>
                                        <label for="listaDesplegableObligatorio">Lista Desplegable Obligatoria*</label>
                                        <select name="listaDesplegableObligatorio" value="<?php
                                        if (isset($_REQUEST['listaDesplegableObligatorio'])) {
                                            echo $_REQUEST['listaDesplegableObligatorio'];
                                        }
                                        ?>">
                                            <option value="null">Elija una opcion</option>
                                            <option value="OpcionLista1">OpcionLista1</option>
                                            <option value="OpcionLista2">OpcionLista2</option>
                                        </select>
                                        <?php echo '<span>' . $aErrores['listaDesplegableObligatorio'] . '</span>' ?>
                                    </div>
                                </li>
                                <!--Campo Boton Enviar-->
                                <li>
                                    <input type="submit" name="Enviar" value="Enviar" id="botonEnviar"/>
                                </li>
                            </ul>
                        </fieldset>
                    </form>
                    <?php
                }
                ?>
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