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
        <title>Ejercicio 06</title>
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 06.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Operar con fechas: calcular la fecha y el día de la semana de dentro de 60 días</h3>
                <?php
                //Estableciendo parámetros locales.
                setlocale(LC_ALL, "es_ES.utf8");
                //Construyendo objeto DateTime.
                $fechaActual = new DateTime('now');
                //Guardando en variable string el objeto DateTime con formato.
                $sFechaActual = $fechaActual->format("l j F Y");
                //Guardando en variable el añadido con "add" de un intervalo de tiempo co "DateInterval".
                $oFechaMasSesentaDias = $fechaActual->add(new DateInterval('P60D'));
                $sFechaMasSesentaDias = $oFechaMasSesentaDias->format("l j F Y");
                //Nueva variable para guardar cada parametro por separado.
                $oHoraSesentaDias = $oFechaMasSesentaDias->format('H');
                $oMinutoSesentaDias = $oFechaMasSesentaDias->format('i');
                $oSegundoSesentaDias = $oFechaMasSesentaDias->format('s');
                $oMesSesentaDias = $oFechaMasSesentaDias->format('m');
                $oDiaSesentaDias = $oFechaMasSesentaDias->format('d');
                $oAnyoSesentaDias = $oFechaMasSesentaDias->format('o');
                print("<p>La fecha actual es: $sFechaActual</p>");
                print("<p>La fecha dentro de 60 días será: " . $sFechaMasSesentaDias . "</p>");
                //Guardando en variable cadena el objeto DateTime $fechaActual con formato castellano.
                $sFechaActualCastellano = strftime("%A, %d de %B de %G %T");
                printf("<p>La fecha actual en castellano es : %s %s", $sFechaActualCastellano, "</p>");
                //Guardando en variable cadena el objeto DateTime $fechaMasSesentaDias con formato castellano.
                $sFechaMasSesentaDiasCastellano = strftime("%A, %d de %B de %G %T"
                        , mktime($oHoraSesentaDias, $oMinutoSesentaDias, $oSegundoSesentaDias, $oMesSesentaDias, $oDiaSesentaDias, $oAnyoSesentaDias));
                printf("<p>La fecha dentro de 60 días en castellano es : %s %s", $sFechaMasSesentaDiasCastellano, "</p>");
                include '../core/libreriaFormatoCastellano.php';
                $fechaActualPrueba = new DateTime('now');
                echo "<p>Esta es la fecha actual formateada con la función formatoCastellanoFechaActual " . formatoCastellanoFechaActual();
                echo "<h3>Sumando diferentes parámetros a la fecha actual con la función parametrosCastellanosFechaDistinta</h3>";
                echo "<p>Fecha en castellano dentro de 60 años : ". parametrosCastellanosFechaDistinta($fechaActualPrueba, 0, 0, 0, 0, 0, 60)."</p>";
                echo "<p>Fecha en castellano dentro de 60 meses : ". parametrosCastellanosFechaDistinta($fechaActualPrueba, 0, 0, 0, 60, 0, 0)."</p>";
                echo "<p>Fecha en castellano dentro de 60 días : ". parametrosCastellanosFechaDistinta($fechaActualPrueba, 0, 0, 0, 0, 60, 0)."</p>";
                echo "<p>Fecha en castellano dentro de 60 segundos : ". parametrosCastellanosFechaDistinta($fechaActualPrueba, 0, 0, 60, 0, 0, 0)."</p>";
                echo "<p>Fecha en castellano dentro de 60 minutos : ". parametrosCastellanosFechaDistinta($fechaActualPrueba, 0, 60, 0, 0, 0, 0)."</p>";
                echo "<p>Fecha en castellano dentro de 60 horas : ". parametrosCastellanosFechaDistinta($fechaActualPrueba, 60, 0, 0, 0, 0, 0)."</p>";
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