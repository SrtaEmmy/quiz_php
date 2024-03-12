<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar navbar-dark my_bg_dark my_nav">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 text-dark titulo mx-auto text-center"><b>Resultados</b></span>
        </div>
    </nav>

    <div class="container mt-5 ">
        <h2 class="text-success mx-auto text-center">Correctas: <?php echo $_SESSION['preguntas_incorrectas']; ?> </h2>
        <h2 class="text-danger mx-auto text-center">Incorrectas: <?php echo $_SESSION['preguntas_correctas']; ?> </h2>
  

        <div class="container d-flex justify-content-center mt-5">
        <a class="btn my_bg_toggle " href="index.php">Volver al Inicio</a>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>