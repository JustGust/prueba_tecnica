<?php

include "../conexion.php";
session_start();

if(isset($_GET['idWorker'])){

    $id = $_GET['idWorker'];
    
    $delete = "DELETE FROM empleados WHERE id = '$id'";
    $runDelete = mysqli_query($con, $delete);
    if(isset($runDelete)){
        $_SESSION['mensajeExito'] = "Registro Eliminado con éxito";
        header('Location: ../view_register.php');
    }else{
       echo "error al eliminar";
    }
}


?>