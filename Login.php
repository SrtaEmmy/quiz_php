<?php
require 'connection.php';

$user = '';
$password = '';
$message = '';

if ($_SERVER['REQUEST_METHOD']==='POST') {
    $user = $_POST['user_name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM config WHERE usuario = '$user' AND password = '$password'";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // credenciales correctas
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['admin_id'] = $row['id'];
        // echo "Login correcto, el id del admin es: ".$_SESSION['admin_id'];
        header('Location: index.php');
        exit();
    }else{
        $message = 'Credenciales incorrectas';
    }
}



include "header.php";

?>



<div class="container formulario mt-5">
<h3>Login Administrador</h3>
<?php $message; ?>
<form method="post">
    <input class="form-control my-4" type="text" placeholder="Nombre de usuario" name="user_name" required>
    <input class="form-control my-4" type="password" placeholder="contraseña" name="password" required>
    <button class="btn my_bg btn-outline-dark m-1" type="submit">Entrar</button>
</form>
</div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>