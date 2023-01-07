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
        <title>Ejercicio 014</title>
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 014.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Comprobar librerías utilizadas. Crear librería de funciones.<br>
                    Estudiar como usarla en desarrollo y explotación</h3>
                <?php
                echo "<h4>Prueba de librería de funciones matemáticas</h4>";
                #la instrucción include con argumento igual a la ruta del archivo donde está nuestra libreria
                #hará que podamos ejecutar sus funciones en el archivo en el que se declara el include.
                #Basta con llamarlo una vez dentro de uno de los bloques de código php para que el resto de
                #bloques de código puedan utilizarlo.
                include '../core/libreriaCalculadora.php';
                //declaración e inicialización de variables para probar libreriaCalculadora.php
                //esta libreria contiene funciones con las operaciones matemáticas básicas.
                $entero1 = 3;
                $entero2 = 15;
                $entero3 = 7;
                $entero4 = 115;
                $entero5 = 92;
                echo "<p> sumar $entero1 + $entero2 = " . sumar($entero1, $entero2) . "</p>";
                echo "<p> restar $entero1 - $entero2 = " . restar($entero1, $entero2) . "</p>";
                echo "<p> restar $entero2 - $entero1 = " . restar($entero2, $entero1) . "</p>";
                echo "<p> dividir $entero1 / $entero2 = " . dividir($entero1, $entero2) . "</p>";
                echo "<p> dividir $entero2 / $entero1 = " . dividir($entero2, $entero1) . "</p>";
                echo "<p> multiplicar $entero1 * $entero2 = " . multiplicar($entero1, $entero2) . "</p>";
                echo "<p> El resto dela división de  $entero2 % $entero1 = " . modulo($entero2, $entero1) . "</p>";
                echo "<p> El resto dela división de  $entero3 % $entero1 = " . modulo($entero3, $entero1) . "</p>";
                echo "<p>$entero2 elevado a $entero1 = " . potenciar($entero2, $entero1) . "</p>";
                echo "<p>$entero1 elevado a $entero2 = " . potenciar($entero1, $entero2) . "</p>";
                echo "<p>El máximo común divisor de $entero1 y $entero2 = " . maximoComunDivisor($entero2, $entero1) . "</p>";
                echo "<p>El mínimo común múltiplo de $entero1 y $entero2 = " . minimoComunMultiplo($entero2, $entero1) . "</p>";
                echo "<p>El máximo común divisor de $entero4 y $entero5 = " . maximoComunDivisor($entero4, $entero5) . "</p>";
                echo "<p>El mínimo común múltiplo de $entero5 y $entero4 = " . minimoComunMultiplo($entero5, $entero4) . "</p>";
                ?>
                <?php
                include '../core/libreriaFormatoCastellano.php';
                $fechaActualCastellana = new DateTime("now");
                echo "<p>La fecha actual impresa en castellano gracias a la función formatoCastellanoActual= " . formatoCastellanoFechaActual() . "</p>";
                $sFechaFuturaCastellana = parametrosCastellanosFechaDistinta($fechaActualCastellana, 0, 0, 120, 0, 0, 0);
                echo "<p>La \$sFechaFuturaCastellana es igual a $sFechaFuturaCastellana</p>";
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