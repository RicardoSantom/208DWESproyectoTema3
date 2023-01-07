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
        <title>Ejercicio 015 Tema3</title>
        <!-- Última actualización 13/11/2022 -->
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 015.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Crear un array con sueldo de lunes a domingo.Recorrer array para calcular sueldo semanal.<br>
                    (Array asociativo con nombres de la semana)</h3>
                <p><?php
                    /**
                     * @author Ricardo Santiago Tomé RicardoSantom en Github <https://github.com/RicardoSantom>
                     * @version 1.0
                     * @since __/10/2022
                     * El siguiente fichero php crea un array asociativo entre días de la semana y sueldos percibidos
                     * cada día, acumula ese valor y para finalizar imprime por pantalla el array previamente declarado
                     * e inicializado y el total acumulado de los valores de dicho array.
                     * @param array $aSueldoSemana Array asociativo en el que la clave es el nombre del día y el valor
                     * el sueldo percibido en ese día.
                     * @param int $iSueldoTotal Variable de tipo entero inicializada a 0 y que guardará el acumulado de la suma de los valores
                     * de la variable $aSueldoSemana
                     * @param string $sDiaSemana Cadena de caracteres que guarda el nombre de los días de la semana en el array asociativo $aSueldoSemana
                     * @param int $iSueldoDiario Variable de tipo entero que guarda el valor del array asociativo $aSueldoSemana.
                     */
                    /*
                     * Declaración e inicialización de array asociativo en el que la clave guarda el día de la semana
                     * y  el valor, guarda el sueldo percibido ese día.
                     */
                    $aSueldoSemana = [
                        "lunes" => 70,
                        "martes" => 70,
                        "miercoles" => 70,
                        "jueves" => 70,
                        "viernes" => 70,
                        "sabado" => 100,
                        "domingo" => 120];
                    //Variable de tipo entero inicializada a 0 y que guardará el acumulado de la suma de los valores del array anterior.
                    $iSueldoTotal = 0;
                    foreach ($aSueldoSemana as $sDiaSemana => $iSueldoDiario) {
                        //En cada vuelta del bucle, iremos acumulando el valor del sueldo diario en la variable
                        //de tipo entero $iSueldoTotal
                        $iSueldoTotal += $iSueldoDiario;
                        /*
                         * Impresión en cada vuelta del bucle de un string con los valores de la clave ($diaSemana)
                         * y
                         */
                        print("El $sDiaSemana has cobrado $iSueldoDiario € <br/>");
                    }
                    //Impresión del valor acumulado de $sueldoDiario en $iSueldoTotal
                    print("El sueldo total de la semana es: $iSueldoTotal €");
                    ?></p>
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

