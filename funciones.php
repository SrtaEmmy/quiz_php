<?php
// funciones para obtener datos de la base de datos

function obtener_registro_temas(){
    require 'connection.php';

    $sql = "SELECT * FROM temas";
    $result = $connection->query($sql);
    return $result;
}

// configuracion para establecer el numero de preguntas por partida
function obtener_config(){
    require 'connection.php';

    $sql = "SELECT * FROM config WHERE id = 1";

    $result = $connection->query($sql);
    $row_config = mysqli_fetch_assoc($result);
    $total_preguntas = $row_config['totalPreguntas'];
    return $total_preguntas;
}

function obtener_nombre_tema($id_tema){
    require 'connection.php';
    $sql = "SELECT nombre FROM temas WHERE id = $id_tema";
    $result = $connection->query($sql);
    $nombre_tema = mysqli_fetch_assoc($result);
    return $nombre_tema['nombre'];
}

function obtener_ids_preguntas_por_tema($id_tema){
    require 'connection.php';

    $sql = "SELECT id FROM preguntas WHERE id_tema = $id_tema";
    $result = $connection->query($sql);
    return $result;
}

function obtener_pregunta_por_id($id_array){
    require 'connection.php';
    $id_pregunta = $id_array['id']; //la funcion extrae el id del array pasado por parametro
    $sql = "SELECT * FROM preguntas WHERE id = $id_pregunta";
    $result = $connection->query($sql);
    $registro_pregunta = mysqli_fetch_assoc($result);
    return $registro_pregunta;
}

// verifica si el usuario ha iniciado sesion como administrador
function usuario_es_admin(){
    return isset($_SESSION['admin_id']); 
}


// funciones que muestran los botones habilitados o no en funcion de si el usuario es admin
function boton_crear_tema(){
    if (usuario_es_admin()) {
        echo '<button type="button" class="btn my_bg_toggle" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Crear nuevo Tema
        </button>';
    }else{
        echo '<button type="button" class="btn my_bg_toggle admin" data-bs-toggle="modal" data-bs-target="#no" data-bs-whatever="@mdo">Crear nuevo Tema
        </button>';
    }
}


function boton_eliminar_tema($id){
    if (usuario_es_admin()) {
        echo ' <span class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#eliminarId'.$id.'">
        Eliminar
    </span>';
    }else{
        echo '<span class="btn btn-danger m-1 admin" data-bs-toggle="modal" data-bs-target="#eliminarId">
        Eliminar
    </span>';
    }
}

function boton_crear_pregunta(){
    if (usuario_es_admin()) {
        echo '<button type="button" class="btn my_bg_toggle" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Añadir pregunta</button>
        ';
    }else{
        echo '<button type="button" class="btn my_bg_toggle admin" data-bs-toggle="modal" data-bs-target="#no" data-bs-whatever="@mdo">Añadir pregunta</button>
        ';
    }
}

function boton_eliminar_pregunta(){
    if (usuario_es_admin()) {
        echo '<button type="submit" class="btn btn-danger">Eliminar
        </button>';
    }else {
        echo '<button type="button" class="btn btn-danger admin">Eliminar
        </button>';
    }
}

function boton_editar_pregunta(){
    if (usuario_es_admin()) {
        echo '<button type="submit" class="btn my_bg">Editar<i class="bi bi-pencil-square"></i></button>
        ';
    }else {
        echo '<button type="button" class="btn my_bg admin">Editar<i class="bi bi-pencil-square"></i></button>
        ';
    }
}


function alerta_admin(){
    // si el usuario no es administrador, muestra una alerta en los botones con funcion de adminisitrador
if (!usuario_es_admin()) {
    echo '<script> 
               document.addEventListener("DOMContentLoaded", function(){
                let btns_admin = document.getElementsByClassName("admin");

                for (let i = 0; i < btns_admin.length; i++) {
                    btns_admin[i].addEventListener("click", function(){
                        alert("Inicia sesion como administrador para tener acceso a esta función");
                    });
                }
               });
    </script>';
}

}


?>