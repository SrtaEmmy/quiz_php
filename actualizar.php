<?php
require 'connection.php';
session_start();

$id_pregunta = $_SESSION['id_pregunta'];

// mostrar pregunta para actualizarla
$sql = "SELECT * FROM preguntas WHERE id = $id_pregunta";
$result = $connection->query($sql);
$registro_pregunta = mysqli_fetch_assoc($result);
// echo $registro_pregunta['correcta'];

$pregunta = '';
$opcion_a = '';
$opcion_b = '';
$opcion_c = '';
$respuesta = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pregunta = $_POST['pregunta_'];
    $opcion_a = $_POST['opcion_a_'];
    $opcion_b = $_POST['opcion_b_'];
    $opcion_c = $_POST['opcion_c_'];
    $respuesta = $_POST['respuesta_'];

    $sql_update = "update preguntas set pregunta = '$pregunta', opcion_a = '$opcion_a', opcion_b = '$opcion_b', opcion_c = '$opcion_c', correcta = '$respuesta' where id = $id_pregunta";
    $connection->query($sql_update);
    header('Location: ver_preguntas.php');
}

?>




<?php include 'header.php'; ?>

    <div class="container">
        <div class="m-4">
            <div class="card">
                <h1 class="card-header">Actualizar pregunta</h1>
                <div class="container">
                    <div class="card_body">
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <!-- <input type="hidden" value="<?php echo $row['id'] ?>" name="id_update"> -->

                            <div class="mb-3">
                                <label for="preg" class="col-form-label">Pregunta</label>
                                <input type="text" value="<?php echo $registro_pregunta['pregunta'] ?>" class="form-control" id="preg" name="pregunta_">
                            </div>

                            <div class="mb-3">
                                <label for="op_a_" class="col-form-label">Opcion a</label>
                                <input type="text" value="<?php echo $registro_pregunta['opcion_a'] ?>" class="form-control" id="op_a_" name="opcion_a_">
                            </div>

                            <div class="mb-3">
                                <label for="op_b_" class="col-form-label">Opcion b</label>
                                <input type="text" value="<?php echo $registro_pregunta['opcion_b'] ?>" class="form-control" id="op_b_" name="opcion_b_">
                            </div>

                            <div class="mb-3">
                                <label for="op_c_" class="col-form-label">Opcion c</label>
                                <input type="text" value="<?php echo $registro_pregunta['opcion_c'] ?>" class="form-control" id="op_c_" name="opcion_c_">
                            </div>

                            <div class="mb-3">
                                <label for="_a" class="col-form-label">A</label>
                                <input type="radio" name="respuesta_" value="a" id="_a" <?php echo $registro_pregunta['correcta'] == 'a' ? 'checked' : '' ?>>

                                <label for="_b" class="col-form-label">B</label>
                                <input type="radio" name="respuesta_" value="b" id="_b" <?php echo $registro_pregunta['correcta'] == 'b' ? 'checked' : '' ?>>

                                <label for="_c" class="col-form-label">C</label>
                                <input type="radio" name="respuesta_" value="c" id="_c" <?php echo $registro_pregunta['correcta'] == 'c' ? 'checked' : '' ?>>
                            </div>



                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-outline-dark" href="ver_preguntas.php">Volver</a>
                        <button type="submit" class="btn btn-outline-dark">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>