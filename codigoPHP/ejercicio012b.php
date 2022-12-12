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
                if (empty($_SESSION['count'])) {
                    $_SESSION['count'] = 1;
                } else {
                    $_SESSION['count']++;
                }
                ?>
                <!--Creo una tabla por cada variable superglobal-->
                <table>
                    <caption>$_SERVER</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $_SERVER que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($_SERVER) || empty($_SERVER)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_SERVER está vacía</th></thead>';
                    } else {
                        foreach ($_SERVER as $variableServer => $valorServer) {
                            echo "<tr><th>";
                            print_r($variableServer, $booleanoServer = false) . "</th>";
                            echo "<td>";
                            print_r($valorServer, $booleanoServer2 = false) . "</td>";
                            print "</tr>";
                        }
                    }
                    ?>
                </table>
                <table>
                    <caption>$GLOBALS</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $GLOBALS que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($GLOBALS) || empty($GLOBALS)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $GLOBALS está vacía</th></thead>';
                    } else {
                        foreach ($GLOBALS as $variableGlobals => $valorGlobals) {
                            echo "<tr><th>";
                            print_r($variableGlobals, $booleanoGlobals = false) . "</th>";
                            echo "<td>";
                            print_r($valorGlobals, $booleanoGlobals2 = false) . "</td>";
                            print "</tr>";
                        }
                    }
                    ?>
                </table>
                <table>
                    <caption>$_SESSION</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $_SESSION que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($_SESSION) || empty($_SESSION)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_SESSION está vacía</th></thead>';
                    } else {
                        foreach ($_SESSION as $variableSession => $valorSession) {
                            echo "<th>";
                            print_r($variableSession, $booleanoSession = false) . "</th>";
                            echo "<td>Ha visitado esta página ";
                            print_r($valorSession, $booleanoSession2 = false);
                            print " veces.</td></tr>";
                        }
                    }
                    ?>
                </table>
                <table>
                    <caption>$_FILES</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $_FILES que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($_FILES) || empty($_FILES)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_FILES está vacía</th></thead>';
                    } else {
                        foreach ($_FILES as $variableFiles => $valorFiles) {
                            echo "<th>";
                            print_r($variableFiles, $booleanoFiles = false) . "</th>";
                            echo "<td>";
                            print_r($valorFiles, $booleanoFiles2 = false) . "</td>";
                            print "</tr>";
                        }
                    }
                    ?>
                </table>
                <table>
                    <caption>$_COOKIE</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $_COOKIE que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($_COOKIE) || empty($_COOKIE)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_COOKIE está vacía</th></thead>';
                    } else {
                        foreach ($_COOKIE as $variableCookie => $valorCookie) {
                            echo "<th>";
                            print_r($variableCookie, $booleanoCookie = false) . "</th>";
                            echo "<td>";
                            print_r($valorCookie, $booleanoCookie2 = false) . "</td>";
                            print "</tr>";
                        }
                    }
                    ?>
                </table>
                <table>
                    <caption>$_REQUEST</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $_REQUEST que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($_POST) || empty($_POST)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_REQUEST está vacía</th></thead>';
                    } else {
                        foreach ($_POST as $variableRequest => $valorRequest) {
                            echo "<th>";
                            print_r($variableRequest, $booleanoRequest = false) . "</th>";
                            echo "<td>";
                            print_r($valorRequest, $booleanoRequest2 = false) . "</td>";
                            print "</tr>";
                        }
                    }
                    ?>
                </table>
                <table>
                    <caption>$_ENV</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $_ENV que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($_ENV) || empty($_ENV)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_ENV está vacía</th></thead>';
                    } else {
                        foreach ($_ENV as $variableEnv => $valorEnv) {
                            echo "<th>";
                            print_r($variableEnv, $booleanoEnv = false) . "</th>";
                            echo "<td>";
                            print_r($valorEnv, $booleanoEnv2 = false) . "</td>";
                            print "</tr>";
                        }
                    }
                    ?>
                </table>
                <table>
                    <caption>$_POST</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $_POST que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($_POST) || empty($_POST)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_POST está vacía</th></thead>';
                    } else {
                        foreach ($_POST as $variablePost => $valorPost) {
                            echo "<th>";
                            print_r($variablePost, $booleanoPost = false) . "</th>";
                            echo "<td>";
                            print_r($valorPost, $booleanoPost2 = false) . "</td>";
                            print "</tr>";
                        }
                    }
                    ?>
                </table>
                <table>
                    <caption>$_GET</caption><?php
                    /* Si es null la variable o si está vacía de contenido, imprimo mensaje informándolo.
                     * Sino, un bucle foreach recorre la variable $_GET que es un array asociativo en el que el primer elemento de cada
                     * asociación es el nombre de la variable y el segundo elemento de cada asociación es su correspondiente valor.
                     *  Escribiendo una línea en la tabla por cada pareja variable - valor imprimiendo el valor de cada una de ellas
                     *  en una celda diferente.
                     *  Esta impresión la realizo con print_r pasándole como primer parámetro en una ocasión el nombre de la variable 
                     * y en otra el valor de esta, y como segundo parámetro un valor booleano que si está establecido a true no mostrará
                     * el primer parámetro, por contra, si está establecido a false si lo mostrará.
                     */
                    if (is_null($_GET) || empty($_GET)) {
                        print '<thead><th  style="border:none;color:red;text-align:center;">La variable superglobal $_GET está vacía</th></thead>';
                    } else {
                        foreach ($_GET as $variableGet => $valorGet) {
                            echo "<th>";
                            print_r($variableGet, $booleanoGet = false) . "</th>";
                            echo "<td>";
                            print_r($valorGet, $booleanoGet2 = false) . "</td>";
                            print "</tr>";
                        }
                    }
                    session_write_close();
                    ?>
                </table>
                <!-- La finalidad de incluir el siguiente formulario en este ejercicio es dotar
                de valor a las variables $_POST (la que le paso como atributo al método del form)
                y a la variable $_REQUEST.-->
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
