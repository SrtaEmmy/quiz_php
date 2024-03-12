<?php
require 'connection.php';
require 'funciones.php';
session_start();

// mostrar asignaturas
$sql = "SELECT * FROM temas";
$result = $connection->query($sql);


// eliminar una asignatura
$eliminar = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
    $eliminar = $_POST['eliminar'];


    // eliminar primero preguntas( por la FK)
    $sql_delete_preguntas = "DELETE FROM preguntas WHERE id_tema = $eliminar";
    $connection->query($sql_delete_preguntas);

    $sql_delete = "DELETE FROM temas WHERE id = $eliminar";
    $connection->query($sql_delete);
    header('Location: admin.php');
}

$nuevo_tema = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nuevo_tema'])) {
    $nuevo_tema = $_POST['nuevo_tema'];

    $sql_insert_tema = "INSERT INTO temas VALUES(null, '$nuevo_tema')";
    $connection->query($sql_insert_tema);
    header('Location: admin.php');
}

if (isset($_GET['id_tema'])) {
    $_SESSION['id_tema'] = $_GET['id_tema'];
    echo "se ha recibido" . $_SESSION['id_tema'];
    header('Location: ver_preguntas.php');
}


alerta_admin();


?>


<?php include 'header.php'; ?>

 <div class="container">
 <h3 class="card-header mx-auto text-center">Temas</h3>
 </div>

<div class="container">
<div class="row">

    <!-- modal para agregar nuevo tema -->
<?php     boton_crear_tema();?>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Tema</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre del Tema</label>
                            <input type="text" name="nuevo_tema" class="form-control" id="recipient-name" placeholder="Ej: programación" required>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- mostrar temas -->
    <?php foreach ($result as $row) : ?>

        <div class="col-md-4">
        <div class="card m-4">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <span>
                <h3 class="card-header"><?php echo $row['nombre'] ?></h3>
                <input type="hidden" name="eliminar" value="<?php echo $row['id'] ?>">

                  <div class="card-body">
                <!-- boton de eliminar -->
                <!-- <span class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminarId<?php echo $row["id"] ?>">
                    Eliminar
                </span> -->
                <?php $id = $row['id']?>

               <?php boton_eliminar_tema($id)?>
 
                
                <!-- Modal de confirmacion -->
                <div class="modal fade" id="eliminarId<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminar tema</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ¿Seguro que deseas eliminar <?php echo $row['nombre'] ?>?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar
                                </button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
                </span>
            </form>


            <!-- boton de ver preguntas -->
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="get">
                <input type="hidden" name="id_tema" value="<?php echo $row['id']; ?>">
                <button type="submit" class="btn my_bg m-1">Preguntas <i class="bi bi-book"></i></button>
            </form>
            </div>
            </div>
        </div>
    <?php endforeach ?>





</div>
</div>

<script src="jugar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>