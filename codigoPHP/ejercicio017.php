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
        <title>Ejercicio 017 Proyecto Tema3</title>
        <style>
            .null{
                background-color: #cccccc;
            }
            td,th{
                text-align: center !important;
            }
        </style>
    </head>
    <body><!-- Inicialización de un arrray bidimensional con los nombres de personas que han reservado un asiento en un teatro de 20 
            filas de 15 asientos cada una. -->
        <header>
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 017.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Inicializar un array (bidimensional con dos índices numéricos) donde almacenamos el nombre de las personas
                    que tienen reservado el asiento en un teatro de 20 filas y 15 asientos por fila
                </h3>
                <?php
                /**
                 * @author Ricardo Santiago Tomé RicardoSantom en GitHub <https://github.com/RicardoSantom>
                 * @version 1.0
                 * @since 06/12/2022
                 * Fecha de última modificación: 06/12/2022
                 * Inicializar un array (bidimensional con dos índices numéricos) 
                 * donde almacenamos el nombre de las personas que tienen reservado el asiento en 
                 * un teatro de 20 filas y 15 asientos por fila.(Inicializamos el array ocupando 
                 * únicamente 5 asientos).Recorrer el array con distintas técnicas 
                 * (foreach(), while(), for()) para mostrar los asientos ocupados en cada fila y las personas que lo ocupan.
                 */
                //Array bidimensional que va a guardar los asientos.
                $aAsientos = [[]];
                //Con 2 bucles anidado uno dentro de otro,inicializo array con 20 x 15 asientos a null.
                // 20 filas en el for externo y 15 columnas en el for interno.
                ?>
                <h2>Recorrido del array con for()</h2>
                <table><tbody><caption>TEATRO VACÍO</caption>
                    <?php
                    for ($filas = 0;
                            $filas <= 19;
                            $filas++) {
                        echo "<tr>";
                        for ($columnas = 0;
                                $columnas <= 14;
                                $columnas++) {
                            echo '<td class="null">' . $filas . '-' . $columnas . ($aAsientos[$filas][$columnas] = null) . '</td>';
                        }
                        echo "</tr>";
                    }
                    ?>
                    </tbody></table>
                <?php
                //Doy valor a 5 posiciones del array bidimensional
                $aAsientos[0][0] = ('Ricardo');
                $aAsientos[3][1] = ('David');
                $aAsientos[1][7] = ('Luis');
                $aAsientos[14][6] = ('Alejandro');
                $aAsientos[19][14] = ('Manuel');
                //Recorrido del array con foreach()
                $contadorFilas=-1;
                $contadorColumnas=-1;
                echo '<br><h2>Recorrido del array con foreach()</h2>';
                echo '<table><caption>TEATRO OCUPADO</caption>';
                foreach ($aAsientos as $valorFila) {
                    echo "<tr>";
                    foreach ($valorFila as $personaSentada) {
                        if ($personaSentada == null) {
                            echo '<td class="null">VACÍO</td>';
                        } else {
                            echo "<td class='ocupado'>" . $personaSentada . "</td>";
                        }
                    }
                    echo "</tr>";
                }
                echo '</table>';
                echo "<br><h2>Con bucle while()</h2><br>";
                $indiceFilas = 0;
                echo "<table>";
                while ($indiceFilas <= $filas-1) {
                    echo "<tr>";
                    $indiceColumnas = 0;
                    while ($indiceColumnas <= $columnas-1) {
                        $asientoActual = $aAsientos[$indiceFilas][$indiceColumnas];
                        if ($asientoActual != null){
                            echo "<td class='ocupado'>" . $asientoActual . "</td>";
                        }else{
                            echo "<td class='null'>VACIO</td>";
                        }
                        $indiceColumnas++;
                    }
                    $indiceFilas++;
                    echo "</tr>";
                }
                echo "</table>";
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