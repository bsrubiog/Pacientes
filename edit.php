<?php
include("db.php");
$id = '';
$tipo_documento_id= '';
$numero_documento= '';
$nombre1= '';
$nombre2= '';
$apellido1= '';
$apellido2= '';
$genero_id= '';
$departamento_id= '';
$municipio_id= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM paciente WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $tipo_documento_id = $row['tipo_documento_id'];
    $numero_documento = $row['numero_documento'];
    $nombre1 = $row['nombre1'];
    $nombre2 = $row['nombre2'];
    $apellido1 = $row['apellido1'];
    $apellido2 = $row['apellido2'];
    $genero_id = $row['genero_id'];
    $departamento_id = $row['departamento_id'];+
    $municipio_id = $row['municipio_id'];
  }
}

if (isset($_POST['update'])) {
  
    $id = $_GET['id'];
    $tipo_documento_id = $_POST['tipo_documento_id'];
    $numero_documento = $_POST['numero_documento'];
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $genero_id = $_POST['genero_id'];
    $departamento_id = $_POST['departamento_id'];+
    $municipio_id = $_POST['municipio_id'];

  $query = "UPDATE paciente set id = '$id', tipo_documento_id = '$tipo_documento_id', 
  numero_documento = '$numero_documento', nombre1 = '$nombre1',
  nombre2 = '$nombre2', apellido1 = '$apellido1',
  apellido2 = '$apellido2', genero_id = '$genero_id',
  departamento_id = '$departamento_id', municipio_id = '$municipio_id'
  WHERE id=$id";


  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario Actualizado';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="id" type="text" class="form-control" value="<?php echo $id; ?>" placeholder="Update Title">
        </div>
        <div class="form-group">
        
        <textarea name="tipodocumnet" class="form-control" cols="30" rows="1"><?php echo $tipo_documento_id;?></textarea>
        
        </div>
         <div class="form-group">
        <textarea name="numdocument" class="form-control" cols="30" rows="1"><?php echo $numero_documento;?></textarea>
        </div>
         <div class="form-group">
        <textarea name="nombre1" class="form-control" cols="30" rows="1"><?php echo $nombre1;?></textarea>
        </div>
         <div class="form-group">
        <textarea name="noimbre2" class="form-control" cols="30" rows="1"><?php echo $nombre2;?></textarea>
        </div>
         <div class="form-group">
        <textarea name="apellido1" class="form-control" cols="30" rows="1"><?php echo $apellido1;?></textarea>
        </div>
         <div class="form-group">
        <textarea name="apellido2" class="form-control" cols="30" rows="1"><?php echo $apellido2;?></textarea>
        </div>
         <div class="form-group">
        <textarea name="genero" class="form-control" cols="30" rows="1"><?php echo $genero_id;?></textarea>
        </div>
         <div class="form-group">
        <textarea name="departamento" class="form-control" cols="30" rows="1"><?php echo $departamento_id;?></textarea>
        </div>
         <div class="form-group">
        <textarea name="municipio" class="form-control" cols="30" rows="1"><?php echo $municipio_id;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
© 2021 GitHub, Inc.