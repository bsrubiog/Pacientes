<?php

include('db.php');


 if (isset($_POST['save'])) {
  $id = $_POST['id'];
  $tipo_documento_id = $_POST['tipo_documento_id'];
  $numero_documento = $_POST['numero_documento'];
  $nombre1 = $_POST['nombre1'];
  $nombre2 = $_POST['nombre2'];
  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $genero_id = $_POST['genero_id'];
  $departamento_id = $_POST['departamento_id'];
  $municipio_id = $_POST['municipio_id'];


$query = "INSERT INTO paciente(id, tipo_documento_id, numero_documento, nombre1, nombre2, apellido1,apellido2, genero_id, departamento_id, municipio_id) VALUES ('$id', '$tipo_documento_id',
  '$numero_documento', '$nombre1','$nombre2','$apellido1','$apellido2','$genero_id','$departamento_id','$municipio_id')";

    $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usuario guardado exitosamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}


?>