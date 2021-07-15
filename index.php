
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
<?php include 'head.php'?>

</head>

<body style="padding: 20px; width: 80%;">

<h1>Crear empleado</h1>
<div class="alert alert-primary" role="alert">Los campos con asteriscos(*) son obligatorios</div>

<div>
<form method="POST" action="controller/RegisterController.php">

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Nombre completo*</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Nombre completo del empleado"> 
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Correo electrónico*</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Correo electrónico"> 
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">sexo*</label>
    <div class="col-sm-10">
    <div class="form-check">
  <input class="form-check-input" type="radio" name="radioSex" id="flexRadioDefault1" value="M">
    Masculino
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="radioSex" value="F" id="flexRadioDefault2">
    Femenino
  </label>
</div>
  </div>
  </div>



  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Área*</label>
    <div class="col-sm-10">
    
    <select class="form-select" aria-label="Default select example" name="area" id="area">
    <?php
    include 'conexion.php';

$selectAreas = "SELECT * FROM areas";
$runAreas = mysqli_query($con, $selectAreas);

while ($row = mysqli_fetch_array($runAreas)) {
    $id = $row['id'];
    $name = $row['nombre'];
?>

<option value="<?php echo $id ?>" selected><?php echo $name ?></option>

<?php }?>

</select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Descripción*</label>
    <div class="col-sm-10">
  <textarea class="form-control" placeholder="Descripción de la experiencia del empleado" id="textAreaDescription" name="textAreaDescription" style="height: 100px"></textarea>

  <div class="form-check mb-4 mt-2">
  <input class="form-check-input" type="checkbox" value="si" id="checkBoletin" name="checkBoletin">
  <label class="form-check-label" for="flexCheckChecked">
    Deseo recibir boletín informativo
  </label>
</div>

    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Roles*</label>
    <div class="col-sm-10">
    <div class="form-check">
  <input class="form-check-input" type="checkbox" value="1" id="checkRole1" name="checkRole1">
  <label class="form-check-label" for="flexCheckDefault">
    Profesional de proyectos - Desarrollador
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="2" id="checkRole2" name="checkRole2">
  <label class="form-check-label" for="flexCheckChecked">
    Gerente estratégico
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="checkbox" value="3" id="checkRole3" name="checkRole3">
  <label class="form-check-label" for="flexCheckChecked">
    Auxiliar administrativo
  </label>
</div>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="inputPassword" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
    <button type="submit" name="btnRegister" class="btn btn-primary">Guardar</button>
    </div>
  </div>

</form>

</div>

</body>

</html>