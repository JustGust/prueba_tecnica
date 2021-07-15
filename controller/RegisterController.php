<?php 

include "../conexion.php";
session_start();

if(isset($_POST['btnRegister'])){

    $name = $_POST['inputName'];
    $email = $_POST['inputEmail'];
    $sex = $_POST['radioSex'];
    $area = $_POST['area'];
    $description = $_POST['textAreaDescription'];
    $boletin = $_POST['checkBoletin'];
    $checkRole1 = $_POST['checkRole1'];
    $checkRole2 = $_POST['checkRole2'];
    $checkRole3 = $_POST['checkRole3'];

    $check = $checkRole1+$checkRole2+$checkRole3; 

    if($name == "" || $email == "" || $sex == "" || $area == "" || $description == "" || $check == ""){

        echo "faltan datos";

    }else{

        if($boletin == ""){
            $boletin = 0;
        }else{
            $boletin = 1;
        }

        $registrar = "INSERT INTO empleados (nombre, email, sexo, area_id, boletin, descripcion)VALUES ('$name', '$email', '$sex', '$area', '$boletin', '$description')";
        $runRegister = mysqli_query($con, $registrar);
        if(isset($runRegister)){
            $_SESSION['mensajeExito'] = "Registro exitoso";
            header('Location: ../view_register.php');
        }else{
           echo "error en el registro";
        }
    }

}


?>