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
        <title>Ejercicio 016 Tema3</title>
        <!-- Última actualización 13/11/2022 -->
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 016.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Recorrer el array anterior utilizando funciones para obtener el mismo resultado.</h3>
                <?php
                /**
                 * @author Ricardo Santiago Tomé RicardoSantom en Github <https://github.com/RicardoSantom>
                 * @version 1.0
                 * @since __/10/2022
                 * El siguiente fichero php crea un array asociativo entre días de la semana y sueldos percibidos
                 * cada día, acumula ese valor y para finalizar imprime por pantalla el array previamente declarado
                 * e inicializado y el total acumulado de los valores de dicho array.
                 * @param array $aSueldoSemana Array asociativo en el que la clave es el nombre del día y el valor
                 * el sueldo percibido en ese día.
                 * @param int $iSueldoTotal Variable de tipo entero inicializada a 0 y que guardará el acumulado 
                 * de la suma de los valores de la variable $aSueldoSemana.
                 * Fuente de información de funciones <https://www.php.net/manual/es/language.functions.php>
                 */
                $aSueldoSemana = [
                    "lunes" => 70,
                    "martes" => 70,
                    "miercoles" => 70,
                    "jueves" => 70,
                    "viernes" => 70,
                    "sabado" => 100,
                    "domingo" => 120];
                $iSueldoTotal = 0;
                /*
                 * La funcion reset() rebobina el puntero interno de un array
                 *  al primer elemento y devuelve el valor del primer elemento del array.
                 */
                reset($aSueldoSemana);
                /*
                 * Bucle while en el que mientras el valor recogido del array asociativoen cada vuelta del bucle
                 *  sea un valor numérico, seguirá ejecutándose e e imprimento una cadena en la que infoma 
                 * del valor de cada asociación de clave-valor del array $aSueldoSemana.
                 * Comprueba si es numérico con la función is_numeric() pasándole como parámetro el valor
                 * actual del $aSueldoSemana.
                 * Establece el elemento actual con la función current() y su parámetro $aSueldoSemana.
                 * Esto lo repite para evaluar la condición del bucle while y para imprimir el contenido de cada valor
                 * presente en el array.
                 */
                while (is_numeric(current($aSueldoSemana))) {
                    /*
                     * Impresión de una cadena que informa del sueldo percibido en cada dia de la semana.
                     * La función key() con el array $aSueldoSemana devuelve la clave del array.
                     * La función current(a$SueldoSemana) devuelve el contenido del valor de cada pareja asociada,
                     * es decir, el sueldo diario.
                     */
                    print "El sueldo percibido el " . key($aSueldoSemana) . " es " . current($aSueldoSemana) . "€ <br/>";
                    /*
                     * Acumulación del valor en cada vuelta del bucle en variable de tipo entero $iSueldoTotal
                     * lo realiza utilizando la anteriormente comentada función current().
                     */
                   $iSueldoTotal += current($aSueldoSemana);
                   /*
                    * La función next con parámetro del array $aSueldoSemana avanza el puntero interno del array
                    * para que el valor a evaluar en la siguiente iteración del bucle sea el siguiente y no el actual.
                    * "Devuelve el valor del array en el siguiente lugar que está apuntado por el puntero interno o false si no hay más elementos."
                    * Fuente https://www.php.net/manual/es/function.next.php
                    */
                    next($aSueldoSemana);
                }
                /*
                 * Impresión informativa en formato cadena del valor acumulado del array $aSueldoSemana.
                 */
                print("El sueldo total de la semana es: $iSueldoTotal €");
                ?>
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