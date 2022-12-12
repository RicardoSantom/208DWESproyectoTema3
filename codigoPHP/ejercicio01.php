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
        <title>Ejercicio 01.php</title>
        <!-- Última actualización 13/11/2022 -->
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 01.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Inicializar variables de los distintintos tipos de datos básicos.</h3>
                <?php
                /**
                 * @param int $primerEntero  Entero para operar e imprimir en diferentes formatos y con diferentes funciones de impresión.
                 * @param int $segundoEntero Entero para operar e imprimir en diferentes formatos y con diferentes funciones de impresión.
                 * @param string $cadena Cadena de caracteres para imprimir en diferentes formatos y con diferentes funciones de impresión.
                 * @param boolean $booleano Variable que solo admite valores de true(1) o false(0)
                 */
                $primerEntero = 10;
                $segundoEntero = 11;
                $cadena = "Hola Mundo";
                $booleano = true;
                $decimal = 1.25;
                $doble = 2.5005252588;
                define("CONSTANTE", "Inmutable");
                ?>
                <h4><?php echo 'Ejemplos de salidas impresas con echo'; ?></h4>
                <!--echo no es una función, por lo tanto, no son necesarios los paréntesis para aplicarla.-->
                <p><?php
                    echo "La variable \$entero tiene un valor de $primerEntero y su tipo es " . gettype($primerEntero) . ".\n" . "<br>";
                    echo "La variable \$cadena tiene un valor de $cadena y su tipo es " . gettype($cadena) . ".\n" . "<br>";
                    echo "La variable \$booleano tiene un valor de $booleano y su tipo es " . gettype($booleano) . ".\n" . "<br>";
                    echo "La variable \$decimal tiene un valor de $decimal y su tipo es " . gettype($decimal) . ".\n" . "<br>";
                    echo "La variable \$doble tiene un valor de $doble y su tipo es " . gettype($doble) . ".\n" . "<br>";
                    echo "CONSTANTE tiene un valor de " . CONSTANTE . ", es de tipo " . gettype(CONSTANTE) . " y es una constante, no una variable";
                    ?></p>
                <h4><?php
                    echo 'Ejemplos de salidas impresas con print';
                    //print no es una función, por lo tanto, no son necesarios los paréntesis para aplicarla
                    ?></h4>
                <p><?php
                    print("La variable \$entero tiene un valor de $primerEntero y su tipo es " . gettype($primerEntero) . ".<br>");
                    print ("La variable \$cadena tien un valor de $cadena y su tipo es " . gettype($cadena) . ".<br>");
                    print ("La variable \$booleano tien un valor de $booleano y su tipo es " . gettype($booleano) . ".<br>");
                    print ("La variable \$decimal tien un valor de $decimal y su tipo es " . gettype($decimal) . ".<br>");
                    print ("La variable \$doble tien un valor de $doble y su tipo es " . gettype($doble) . ".<br>");
                    print ("CONSTANTE tiene un valor de " . CONSTANTE . " y su tipo es " . gettype(CONSTANTE) . ", además , es una constante, no una variable.<br>");
                    ?></p>
                <h4><?php
                    echo 'Ejemplos de salidas impresas con printf';
                    /* printf es una función, para su uso hay que pasarle entre paréntesis los siguientes parámetros:
                      Una cadena principal entre comillas, en ella haremos referencia a donde se han de insertar
                      los siguientes parámetros de la función con el carácter % seguido de una letra. Después de esta cadena
                      principal y separados por comas, pasaremos tanto cadenas de texto, como variables, llamada a funciones
                      y otros tipos de datos como enteros, decimales, etc. */
                    ?></h4>
                <p><?php
                    printf("La variable %s es una variable con valor %s y tipo %s , también es la número %d de la lista de variables.", '$primerEntero', $primerEntero, gettype($primerEntero), 1);
                    printf("<br>La variable %s es una variable con valor %s y tipo %s , también es la número %d de la lista de variables.", '$segundoEntero', $segundoEntero, gettype($segundoEntero), 2);
                    printf("<br>" . "La variable %s es una variable con valor %s y tipo %s", 'cadena', $cadena, gettype($cadena) . "<br>");
                    printf("La variable %s es una variable con valor %s y tipo %s", 'booleano', $booleano, gettype($booleano) . "<br>");
                    printf("La variable %s es una variable con valor %s y tipo %s", 'decimal', $decimal, gettype($decimal) . "<br>");
                    printf("La variable %s es una variable con valor %s y tipo %s", 'doble', $doble, gettype($doble) . "<br>");
                    printf("%s es una constante con valor %s y tipo %s", 'CONSTANTE', CONSTANTE, gettype(CONSTANTE) . "<br>");
                    ?></p>
                <h5>Operaciones matemáticas con printf</h5>
                <p bgcolor="<?php printf("#%X%X%X", 150, 150, 0); ?>">Texto con formato</p>
                <p><?php
                    printf("<br>La suma de %s con valor de %s más 2 es igual a %s", '$primerEntero', $primerEntero, $primerEntero + 2);
                    printf("<br>El resto de la división entre 2 de %s con valor de %s  es igual a %s", '$primerEntero', $primerEntero, $primerEntero % 2);
                    printf("<br>El resto de la división entre 2 de %s con valor de %s  es igual a %s", '$segundoEntero', $segundoEntero, $segundoEntero % 2);
                    printf("<br>La resta entre  %s y %s con valores de %s  y %s es igual a %s", '$primerEntero', '$segundoEntero', $primerEntero, $segundoEntero, $primerEntero - $segundoEntero);
                    printf("<br>El resultado de la división entre  %s y %s con valor de %s  y %s es igual a %s", '$segundoEntero', '$decimal', $segundoEntero, $decimal, $segundoEntero / $decimal);
                    printf("<br>El resultado sin formatear número de decimales de la división entre  %s y %s con valor de %s  y %s es igual a %s", '$primerEntero', '$doble', $primerEntero, $doble, $primerEntero / $doble);
                    printf("<br>El resultado de la división formateando la salida para limitarla a dos decimaes entre  %s y %s con valor de %s  y %s es igual a %0.2f", '$primerEntero', '$doble', $primerEntero, $doble, $primerEntero / $doble);
                    printf("<br>Antes de formato %s, de tipo %s y valor %s . Después de formato= %0.2f", '$double', gettype($doble), $doble, $doble);
                    printf("<br>Antes de formato %s, de tipo %s y valor %s . Después de formato= %0.4f", '$double', gettype($doble), $doble, $doble);
                    ?></p>
                <h4><?php echo 'Ejemplos de salidas impresas con print_r'; ?></h4>
                <p><?php
                    echo 'El valor de primerEntero es = ';
                    print_r($primerEntero, $retornado = false);
                    echo ' y su tipo es ';
                    print_r(gettype($primerEntero), $retornad = false);
                    echo '<br>El valor de decimal es = ';
                    print_r($decimal, $return = false) . "y su tipo es" . gettype($decimal);
                    echo ' y su tipo es ';
                    print_r(gettype($primerEntero), $retorna = false);
                    echo '<br>El valor de cadena es = ';
                    print_r($cadena, $retur = false) . "y su tipo es" . gettype($cadena);
                    echo ' y su tipo es ';
                    print_r(gettype($cadena), $retorn = false);
                    ?></p>
                <h4><?php echo 'Ejemplos de salidas impresas con var_dump'; ?></h4>
                <br/>
                <?php
                echo "Tipo, longitud y valor de la variable \$cadena ";
                var_dump($cadena . '');
                echo "<br/>El tipo, longitud y valor de la variable \$primerEntero convertida en cadena con var_dump= ";
                var_dump($primerEntero . '');
                echo "<br>El tipo y valor de la variable \$primerEntero con su tipo original impresa con var_dump= ";
                var_dump("<br/>" . $primerEntero);
                var_dump("<br/>" . $decimal . ' ');
                var_dump("<br/>" . $doble);
                var_dump("<br/>" . $booleano);
                var_dump("<br/>" . CONSTANTE);
                #var_dump($cadena . ' ')."<br/>";
                #var_dump($primerEntero . ' '."<br/>");
                #var_dump($decimal . ' '."<br/>");
                #var_dump($doble,"<br/>");
                #var_dump($booleano."<br/>");
                #var_dump(CONSTANTE)."<br/>";
                ?>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="../../../index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom/208DWESproyectoTema3" target="blank" id="github" title="RicardoSantom en GitHub">
            </a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="../indexProyectoTema3.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema3">Index Proyecto Tema3</a>
        </footer>
    </body>
</html>