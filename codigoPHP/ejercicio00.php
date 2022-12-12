<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="index, follow">
        <meta name="author" content="Ricardo Santiago Tomé">
        <link rel="stylesheet" href="../webroot/css/estilosEjercicio00.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" sizes="96x96" href="../../webroot/images/favicon-96x96.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Ejercicio 00 Tema3</title>
        <!-- Última actualización 23/11/2022 -->
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
            </style>
    </head>
    <body>
        <?php 
        /**
         * @author Ricardo Santiago Tomé RicardoSantom en Github <https://github.com/RicardoSantom>
         * @version 1.0
         * @since __/10/2022
         * Llamada a la función phpinfo() que imprime por pantalla todas las especificaciones técnicas de la 
         * versión instalada de php.
         */
        ?>
        <header class="headerPropio">
            <div class="overlay">
                <h1>Ejercicios Proyecto Tema 3</h1>
                <h2>Ejercicio 00.php</h2>
            </div>
        </header>
        <main>
            <article>
                <h3>Enunciado: Hola mundo y phpinfo().</h3>
                <!--Impresión en html de la primera letra del mensaje Hola Mundo
                El resto del mensaje se imprimirá desde el código php embebido.
                Función y objeto de esto "uso, disfrute y exhibición" de la interacción entre
                lenguaje de marcas y código php embebido.-->
                <h4 style="color:red">H<?php 
                /*
                 * Este comentario será visible en el mostrarCodigo correspondiente a este ejercicio.
                 * La letra H del mensaje "Hola Mundo" ha sido impresa en pantalla como texto entre etiquetas html.
                 * El resto del mensaje se imprimirá desde el código php embebido.
                 */
                echo("ola Mundo"); ?></h4>
                <?php phpinfo(); ?>
            </article>
        </main>
        <footer>
            <p>2022-23  IES LOS SAUCES. <a href="../../../index.html" id="enlacePrincipal" title="Enlace a Index Principal">Ricardo Santiago Tomé</a> © Todos los derechos reservados</p>
            <a href="https://github.com/RicardoSantom/208DWESproyectoTema3" target="blank" id="github" title="RicardoSantom en GitHub"></a>
            <a href="https://www.linkedin.com/in/ricardo-santiago-tom%C3%A9/" id="linkedin" title="Ricardo Santiago Tomé en Linkedim" target="_blank"></a>
            <a href="../../doc/curriculumRicardo.pdf" class="material-icons" title="Curriculum Vitae Ricardo Santiago Tomé" target="_blank" id="curriculum"><span class="material-icons md-18">face</span></a>
            <a href="../indexProyectoTema3.php" id="enlaceSecundario" title="Enlace a Index Proyecto Tema3">Index Proyecto Tema3</a>
        </footer>
    </body>
</html>
