<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <link rel="stylesheet" href="../webroot/css/estilosPlantilla.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Ejercicio 04</title>
    </head>
    <body>
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 04.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Mostrar fecha y hora actual en Oporto formateada en portugués</h3>
                <h4>Fecha establecida con date.timezone</h4>
                <?php
                //formato date.
                //estableciendo zona horaria.
                ini_set('date.timezone', 'Europe/Lisbon');
                print "<p>" . "La fecha y hora de oporto son = " . date("d-m-Y H:i:s A") . "</p>";
                //Construcción objeto DateTime.
                $oFechaActualLisboa = new DateTime("now", new DateTimeZone("Europe/Lisbon"));
                print "<h4>Salida formateada de hora en Lisboa establecida como objeto datetime.</h4>";
                printf("<p>La fecha mostrada a continuación es de tipo %s y está contenida en la variable %s  %s", gettype($oFechaActualLisboa), '$oFechaActualLisboa', ".</p>");
                print("<p>Mostrando con datetime un objeto de tipo DateTime con la fecha y hora local en Lisboa  : " . $oFechaActualLisboa->format("l, j F Y H:i:s </p>"));
                //Dando formato como string al objeto datetime.
                $sFechaActualLisboa = strftime("%A, %d %B  %G %T");
                echo "<h4>Salida formateada de hora en Lisboa establecida como string.</h4>";
                printf("<p>La fecha mostrada a continuación es de tipo %s y está contenida en la variable %s  %s", gettype($sFechaActualLisboa), '$sFechaActualLisboa', ".</p>");
                print("<p>Mostrando con datetime un objeto de tipo string con la fecha actual en Lisboa: $sFechaActualLisboa</p>");
                //estableciendo idioma local con setlocale
                $locale = "pt_PT.utf8";
                setlocale(LC_ALL, $locale);
                //preparando cadena con formato de idioma usando strftime.
                print "<h4>Salida formateada en portugués de fecha con strftime</h4>";
                $fechaFormateada = strftime("%A, %d de %B de %G %T");
                printf("<p>Mostrando con strftime la fecha actual en portugués: %s = %s %s", '$fechaFormateada', $fechaFormateada, "</p>");
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