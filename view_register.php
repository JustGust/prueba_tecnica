<?php
  session_start();

 ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver registros</title>
<?php include 'head.php'?>

</head>

<body style="padding: 20px; width: 80%;">

<h1 class="mb-4 ">Listar empleados</h1>
<a name="btnRegister" class="btn btn-primary mb-4 " href="index.php" >Registrar nueno empleado </a>


<?php if(isset($_SESSION['mensajeExito'] )){ ?>
<div class="alert alert-primary" role="alert"><?php echo $_SESSION['mensajeExito'] ?></div>
<?php unset($_SESSION['mensajeExito']); }?>
<div>


<table class="table table-hover table-striped">
                            <thead>
                                <tr class="thead-dark">
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Sexo</th>
                                    <th>Area</th>
                                    <th>Boletin</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include 'conexion.php';

                                $selectWorker = "SELECT *, empleados.id as empleado_id ,empleados.nombre as nombre_empleado , areas.nombre as nombre_area FROM empleados INNER JOIN areas ON empleados.area_id = areas.id ORDER BY empleados.id DESC";
                                $runSWorker = mysqli_query($con, $selectWorker);

                                while ($row = mysqli_fetch_array($runSWorker)) {
                                    $id = $row['empleado_id'];
                                    $name = $row['nombre_empleado'];
                                    $email = $row['email'];
                                    $sex = $row['sexo'];
                                    $name_area = $row['nombre_area'];
                                    $boletin= $row['boletin'];
                                    $myBoletin = "";

                                    if($boletin == 0){
                                        $boletin = "Si";
                                    }else{
                                        $boletin = "No";
                                    }

                                    if($sex == "F"){
                                        $sex = "Femenino";
                                    }else{
                                        $sex = "Masculino";
                                    }

                                ?>

                                    <tr>
                            
                                        <td style="max-width:300px">
                                            <h6><?php echo $name ?></h6>
                                        </td>
                                        <td style="max-width:300px">
                                            <h6><?php echo $email ?></h6>
                                        </td>
                                        <td style="max-width:300px">
                                            <h6><?php echo $sex ?></h6>
                                        </td>
                                        <td style="max-width:300px">
                                            <h6><?php echo $name_area ?></h6>
                                        </td>
                                        <td style="max-width:300px">
                                            <h6><?php echo $boletin ?></h6>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-primary">Actualizar</a>
                                        </td>
                                        <td>
                                            <a href="controller/UpdateController.php?idWorker=<?php echo $id; ?>" class="btn btn-danger">Eliminar</a>
                                        </td>
                                    </tr>

                                <?php } ?>

                            </tbody>
                        </table>


</body>

</html>