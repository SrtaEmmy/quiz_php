<?php
session_start();

require 'funciones.php';

$_SESSION['total_preguntas'] = obtener_config();
$_SESSION['nombre_tema'] = obtener_nombre_tema($_SESSION['id_tema']); //usamos el id obtenido en index.php al pulsar una asignatura
$_SESSION['ids_preguntas_tema'] = obtener_ids_preguntas_por_tema($_SESSION['id_tema']);

if (isset($_GET['siguiente'])) { //ya esta jugando y ha pulsado "siguiente"

    // controlar respuestas correctas
    if ($_SESSION['respuesta_correcta'] === $_GET['respuesta']) {
        $_SESSION['correctas'] = $_SESSION['correctas'] + 1;
    } 
    // pasar a la siguiente pregunta
    $_SESSION['num_pregunta_actual'] = $_SESSION['num_pregunta_actual'] + 1;

    // actualizar la respuesta correcta
    if ($_SESSION['num_pregunta_actual'] < $_SESSION['total_preguntas']) {
        $pregunta_actual = obtener_pregunta_por_id($_SESSION['id_preguntas'][$_SESSION['num_pregunta_actual']]);
        $_SESSION['respuesta_correcta'] = $pregunta_actual['correcta'];
    } else { 
        // Guardar resultados en sesiones antes de redirigir
    $_SESSION['preguntas_correctas'] = $_SESSION['correctas'];
    $_SESSION['preguntas_incorrectas'] = $_SESSION['total_preguntas'] - $_SESSION['correctas'];
        header('Location: resultados.php ');
    }
} else { //ha comenzado a jugar
    $_SESSION['id_preguntas'] = array();
    $_SESSION['num_pregunta_actual'] = 0;
    $_SESSION['correctas'] = 0;

    foreach ($_SESSION['ids_preguntas_tema'] as $id_pregunta) {
        array_push($_SESSION['id_preguntas'], $id_pregunta); //guardamos en el array vacio creado anterior, los id de cada pregunta para mostrar su registro luego
    }

    shuffle($_SESSION['id_preguntas']); // Desordena las preguntas

    $pregunta_actual = obtener_pregunta_por_id($_SESSION['id_preguntas'][0]); //el id es 4 por ejemplo, por ende se obtiene el registro completo de esa pregunta 
    // definir la respuesta correcta
    $_SESSION['respuesta_correcta'] = $pregunta_actual['correcta'];
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>En partida</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-dark my_bg_dark my_nav">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-dark titulo"><b>Quiz de <?php echo $_SESSION['nombre_tema']; ?></b></span>
        </div>
    </nav>




    <div class="container m-4">
            <div class="card">
                <h3 class="card-header">
                    <?php echo $pregunta_actual['pregunta'] ?>
                </h3>

                <div class="card-body">
                   <div class="container">
                        <div class="row">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                        <div>
                        <label class="answer" for="respuesta1">
                            <p> <?php echo $pregunta_actual['opcion_a'] ?> </p>
                            <input  type="radio" value="a" name="respuesta" id="respuesta1" required >
                        </label>
                        </div>

                        <div>
                        <label class="answer " for="respuesta2">
                            <p> <?php echo $pregunta_actual['opcion_b'] ?> </p>
                            <input type="radio" value="b" name="respuesta" id="respuesta2" required>
                        </label>
                        </div>

                        <div>
                        <label class="answer" for="respuesta3">
                            <p> <?php echo $pregunta_actual['opcion_c'] ?> </p>
                            <input type="radio" value="c" name="respuesta" id="respuesta3" required>
                        </label>
                        </div>

                        <div class="container d-flex justify-content-center">
                        <input class="btn my_bg btn-outline-dark" type="submit" value="siguiente" name="siguiente">
                        </div>

                    </form>
                    <div class="container mx-auto text-center">
                        <span>Pregunta </span> <?php echo $_SESSION['num_pregunta_actual']+1?> <span>de</span> <?php echo $_SESSION['total_preguntas']?>
                    </div>
                        </div>
                   </div>
                </div>


            </div>
    </div>

    <script src="jugar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>