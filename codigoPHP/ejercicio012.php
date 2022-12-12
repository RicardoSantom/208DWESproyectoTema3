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
        <title>Ejercicio 012</title>
        <!-- Última actualización 13/11/2022 -->
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
            form p{
                display: inline-flex;
            }
            hr{margin: 0 auto;}
        </style>
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 012.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Mostrar el contenido de las variables superglobales (utilizando print_r() y foreach()).</h3>
                <?php
                /**
                 * @author Ricardo Santiago Tomé - RicardoSantom en Github https://github.com/RicardoSantom
                 * @version 1.0
                 * @since 28/10/2022
                 */
                //Inicio sesión para registrar visitas a la página y poder mostrar valor en la variable superglobal $_SESSION
                session_start();
                /* si el contador está vacío lo inicializa a 1, sino, incrementa el contador.
                 */
                if (empty($_SESSION['contador'])) {
                    $_SESSION['contador'] = 1;
                } else {
                    $_SESSION['contador']++;
                }

                /**
                 * Esta función recibe dos parámetros, con ellos construye una tabla, evalua si el primer parámetro recibido
                 * es null o está vacío; en caso de que así sea, devuelve un mensaje impreso por pantalla declarando que
                 * no hay nada que mostrar de esta variable superglobal, si no, construye una fila por cada pareja de variable - valor 
                 * imprimiendo el valor de cada una de ellas en una celda diferente.
                 *  Esta impresión la realiza con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                 * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                 * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                 * @author Ricardo Santiago Tomé - RicardoSantom en Github https://github.com/RicardoSantom
                 * @version 1.0
                 * @since 05/11/2022
                 * @param array $aVariableSuperglobal array que contiene datos de la variable superglobal. Como parámetro la pasamos con el 
                 *  identificador de dicha variable superglobal.
                 * @param string $sNombreVariableSuperGlobal nombre de la variable superglobal abriendo comillas seguidas por la secuencia
                 * de escape \ y a continuación el identificador de la variable supeglobal y para finalizar, cerramos con comillas.
                 */
                function imprimirTablaVariablesSuperGlobales($aVariableSuperglobal, $sNombreVariableSuperGlobal) {

                    printf('<table class="tablaGlobales"><caption>%s</caption>', $sNombreVariableSuperGlobal);
                    if (is_null($aVariableSuperglobal) || empty($aVariableSuperglobal)) {
                        printf('<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal %s está vacía</th></thead>', $sNombreVariableSuperGlobal);
                    } else {
                        foreach ($aVariableSuperglobal as $nombreSuperglobal => $valorSuperglobal) {
                            if ($nombreSuperglobal == '_SESSION') {
                                echo '<h3>_SESSION</h3>';
                                echo "<h3 style='color:red';>La variable \$_SESSION esta vacía.</h3>";
                            } else {
                                if ($nombreSuperglobal == '_SERVER') {
                                    print("<tr>");
                                    print '<td>';
                                    print($sNombreVariableSuperGlobal);
                                    print '</td>';
                                    print '<td>';
                                    echo '<table>';
                                    foreach ($_SERVER as $claveServer => $valorServer) {
                                        echo '<tr>';
                                        print '<td>';
                                        print_r($claveServer);
                                        print '</td>';
                                        print '<td>';
                                        print_r($valorServer);
                                        print '</td>';
                                        echo '</tr>';
                                    }
                                    echo '</table>';
                                    print '</td>';
                                } else {
                                    echo "<tr><th>";
                                    print_r($nombreSuperglobal, $booleanoSuperglobal = false) . "</th>";
                                    echo "<td>";
                                    print_r($valorSuperglobal, $booleanoSuperglobal2 = false) . "</td>";
                                    print "</tr>";
                                }
                            }
                        }
                        echo "</table>";
                    }
                }

                if (!empty($_SESSION)) {
                    imprimirTablaVariablesSuperGlobales($_SESSION, "\$_SESSION");
                } else {
                    printf('<h3>La variable superglobal $_SESSION está vacía</h3>');
                }
                imprimirTablaVariablesSuperGlobales($_COOKIE, "\$_COOKIE");
                imprimirTablaVariablesSuperGlobales($_SERVER, "\$_SERVER");
                imprimirTablaVariablesSuperGlobales($_REQUEST, "\$_REQUEST");
                imprimirTablaVariablesSuperGlobales($GLOBALS, "\$_GLOBALS");
                imprimirTablaVariablesSuperGlobales($_FILES, "\$_FILES");
                imprimirTablaVariablesSuperGlobales($_ENV, "\$_ENV");
                imprimirTablaVariablesSuperGlobales($_POST, "\$_POST");
                imprimirTablaVariablesSuperGlobales($_GET, "\$_GET");
                ?>
                <?php phpinfo();
                ?>
            </article>
            <!-- La finalidad de incluir el siguiente formulario en este ejercicio es dotar
                de valor a las variables $_POST (la que le paso como atributo al método del form)
                y a la variable $_REQUEST.-->
            <article>
                <form action="<?php
                #Al tratarse de mostrar estas variables, dejo para volverse a mostrar el form, en un futuro, una vez que sea
                #rellenado este form, haré que no se muestre.
                echo $_SERVER['PHP_SELF'];
                ?>" method="post">
                    <fieldset>
                        <legend>Formulario para probar variables superglobales</legend>
                        <fieldset>
                            <legend>Nombre y apellidos</legend>
                            <label for="nombreApellidosUsuario">Nombre,apellido1,apellido2:</label><br>
                            <input type="text" id="nombreApellidosUsuario" name="nombreApellidosUsuario"><br>
                        </fieldset>
                        <fieldset>
                            <legend>¿Cuánto pesa?</legend>
                            <label for="pesoUsuario">Introduzca su peso en gramos:</label><br>
                            <input type="number" id="pesoUusario" name="pesoUsuario"><br>
                        </fieldset>
                        <fieldset id="botones">
                            <div  id="botonEnviarBotonReset">
                                <input type="submit" value="Enviar" id="botonEnviar"/>
                                <!--<input type="reset" value="Resetear formulario" id="botonReset"/>-->
                            </div>
                        </fieldset>
                    </fieldset>
                </form>
            </article>
        </main>
        <?php
        /*
         * Cierre de sesión.
         */
        session_write_close();
        ?>
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
