<?php
session_start();
require 'connection.php';
require 'funciones.php';

$mensaje = '';
$id_tema = $_SESSION['id_tema'];

// obtener las preguntas de la bd para mostrarlas
$sql = "SELECT * FROM preguntas WHERE id_tema = $id_tema";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
} else {

    
    $mensaje = "<p>No hay preguntas en este tema</p>";
}

$nombre_tema = obtener_nombre_tema($id_tema);

$pregunta = '';
$opcion_a = '';
$opcion_b = '';
$opcion_c = '';
$correcta = '';

// agregar una nueva pregunta a la bd
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pregunta = $_POST['pregunta'];
    $opcion_a = $_POST['opcion_a'];
    $opcion_b = $_POST['opcion_b'];
    $opcion_c = $_POST['opcion_c'];
    $correcta = $_POST['respuesta'];

    $sql_add_pregunta = "INSERT INTO preguntas VALUES(null, $id_tema, '$pregunta', '$opcion_a', '$opcion_b', '$opcion_c', '$correcta')";
    $result = $connection->query($sql_add_pregunta);

    if ($result) {
        // echo "pregunta creada";
        header('Location: ver_preguntas.php');
    } else {
        // echo "no se ha creado";
    }
}

// eliminar una pregunta de la bd
$id_pregunta = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_pregunta'])) {
    $id_pregunta = $_GET['id_pregunta'];

    $sql_delete_pregunta = "DELETE FROM preguntas WHERE id = $id_pregunta";
    $connection->query($sql_delete_pregunta);

    header('Location: ver_preguntas.php');
    // echo "se esta intentando borrar la pregunta".$id_pregunta;

}

// actualizar pregunta en la bd
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_update'])) {
    $id_pregunta = $_GET['id_update'];
    $_SESSION['id_pregunta'] = $id_pregunta;
    header('Location: actualizar.php');
}


alerta_admin();

?>




<?php include 'header.php'; ?>

<div class="container">
    <div class="row">

        <h3>Preguntas de <?php echo $nombre_tema ?></h3>


        <!-- boton nueva pregunta -->
         <?php  boton_crear_pregunta();?>
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva pregunta</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <div class="mb-3">
                                <label for="pre" class="col-form-label">Pregunta:</label>
                                <input type="text" class="form-control" id="pre" name="pregunta" required>
                            </div>

                            <div class="mb-3">
                                <label for="op_a" class="col-form-label">Opción a:</label>
                                <input type="text" class="form-control" id="op_a" name="opcion_a" required>
                            </div>

                            <div class="mb-3">
                                <label for="op_b" class="col-form-label">Opción b:</label>
                                <input type="text" class="form-control" id="op_b" name="opcion_b" required>
                            </div>

                            <div class="mb-3">
                                <label for="op_c" class="col-form-label">Opción c:</label>
                                <input type="text" class="form-control" id="op_c" name="opcion_c" required>
                            </div>

                            <div class="mb-3">
                                <p>Correcta</p>
                                <label for="a" class="col-form-label">A</label>
                                <input type="radio" name="respuesta" id="a" value="a" required>

                                <label for="b" class="col-form-label">B</label>
                                <input type="radio" name="respuesta" id="b" value="b" required>

                                <label for="c" class="col-form-label">C</label>
                                <input type="radio" name="respuesta" id="c" value="c" required>
                            </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit"" class=" btn btn-primary">Añadir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        <!-- mostrar preguntas -->
        <?php foreach ($result as $row) : ?>

            <div class="col-md-4">
                <div class="card m-4">
                    <p class="card-header"><?php echo $row['pregunta'] ?></p>

                    <div class="container m-1">
                        <div class="">

                            <!-- eliminar pregunta -->
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                                <input type="hidden" name="id_pregunta" value="<?php echo $row['id'] ?>">
                                <?php boton_eliminar_pregunta()?>
                            </form>


                            <!-- editar pregunta -->
                            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                                <input type="hidden" value="<?php echo $row['id'] ?>" name="id_update">
                                <?php boton_editar_pregunta();?>
                            </form>

                        </div>
                    </div>

                </div>
            </div>

        <?php endforeach ?>

        <p><?php echo $mensaje ?></p> <!-- muestra mensaje cuando no hay preguntas -->

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>