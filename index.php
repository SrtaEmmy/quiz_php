<?php
require 'funciones.php';

$temas = obtener_registro_temas();

if (isset($_GET['id_tema'])) {
  session_start();
     // Redirigir al usuario a jugar.php
     header('Location: jugar.php');
     
    $id_tema = $_GET['id_tema'];
    // verifica si el tema tiene preguntas
    $preguntas = obtener_ids_preguntas_por_tema($id_tema);
    if (empty($preguntas)) {
        header('Location: sin_preguntas.php');
        exit();
    }
}
?>


<?php include 'header.php'; ?>

<div class="content-wrapper">
<div class="container">
    <div class="row">
        <h1 class="mx-auto text-center">Quiz en 🐘 y 🐬</h1>

        <h3>Elige la asignatura</h3>

        <?php foreach ($temas as $row) : ?>
           <div class="col-md-4">
           <form action="<?php $_SERVER['PHP_SELF'] ?>" method="get">
                <input type="hidden" name="id_tema" value="<?php echo $row['id'] ?>">
                <div class="card m-1">
                <input class="card-body asignatura" type="submit" value="<?php echo $row['nombre'] ?>">
                </div>
            </form>
           </div>
        <?php endforeach ?>

    </div>
</div>
</div>

<footer>
  <div class="container">
    <hr>
    <p><b>© Mi Sitio Web.</b></p>
    <ul>
      <li><a href="https://www.linkedin.com/in/emmily-santos-a6851327b">Linkedin |</a></li>
      <li><a href="https://github.com/SrtaEmmy">GitHub </a></li>
    </ul>
  </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>