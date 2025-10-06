<?php include ("db.php") ?>



<?php 
// Connection variables 

$host = "localhost"; // MySQL host name eg. localhost
$user = "root"; // MySQL user. eg. root ( if your on localserver)
$password = ""; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "clinica"; // MySQL Database name

// Connect to MySQL Database
$conn = new mysqli($host, $user, $password, $database);

//echo '0'; exit;




?>

 


<?php include("includes/header.php") ?>


 <!-- ADD TASK FORM -->
 <main class="container p-4">
 <div class="row">
 <div class="col-md-3">




 <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>


      


        <div class="card card-body">
        <form action="save.php" method="POST">

        <div class="form-group">
            <textarea name="id" rows="1" class="form-control" placeholder="ID"></textarea>
          </div>

        <div class="form-group">            
        <select  id="" name="tipo_documento_id">
                 <option value="">seleccione</option>
                 <?PHP 
                  $query = "SELECT * FROM tipos_documrento";
                 if (!$result = mysqli_query($conn, $query)) {
                 exit(mysqli_error($conn));
                 }

                 while ($row = mysqli_fetch_array($result)){
                 echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                 }
                  
                 ?>
      </SELECT>
          </div>

        <div class="form-group">
            <textarea name="numero_documento" rows="1" class="form-control" placeholder="Documento"></textarea>
          </div>

         <div class="form-group">
            <textarea name="nombre1" rows="1" class="form-control" placeholder="Nombre 1"></textarea>
          </div>
          <div class="form-group">
            <textarea name="nombre2" rows="1" class="form-control" placeholder="Nombre 2"></textarea>
          </div>
          <div class="form-group">
            <textarea name="apellido1" rows="1" class="form-control" placeholder="Apellido 1"></textarea>
          </div>
          <div class="form-group">
            <textarea name="apellido2" rows="1" class="form-control" placeholder="Apellido 2"></textarea>
          </div>


          <div class="form-group">            
        <select  id="" name="genero_id">
                 <option value="">seleccione</option>
                 <?PHP 
                  $query = "SELECT * FROM genero";
                 if (!$result = mysqli_query($conn, $query)) {
                 exit(mysqli_error($conn));
                 }

                 while ($row = mysqli_fetch_array($result)){
                 echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                 }
                  
                 ?>
      </SELECT>
          </div>

     <div class="form-group">            
        <select  id="" name="departamento_id">
                 <option value="">seleccione</option>
                 <?PHP 
                  $query = "SELECT * FROM departamentos";
                 if (!$result = mysqli_query($conn, $query)) {
                 exit(mysqli_error($conn));
                 }

                 while ($row = mysqli_fetch_array($result)){
                 echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                 }
                  
                 ?>
      </SELECT>
          </div>
          
        <div class="form-group">            
        <select  id="" name="municipio_id">
                 <option value="">seleccione</option>
                 <?PHP 
                  $query = "SELECT * FROM municipios";
                 if (!$result = mysqli_query($conn, $query)) {
                 exit(mysqli_error($conn));
                 }

                 while ($row = mysqli_fetch_array($result)){
                 echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                 }
                  
                 ?>
      </SELECT>
          </div>




          <input type="submit" name="save" class="btn btn-success btn-block" value="Agregar paciente">
        </form>
      </div>
    </div>


   
     <div class="col-md-2">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>TIPODOC </th>
            <th>NUMDOCUMENT</th>
            <th>NOMBRE1</th>
            <th>NOMBRE2</th>
            <th>APELLIDO1</th>
            <th>APELLIDO2</th>
            <th>GENERO</th>
            <th>DEPART</th> 
            <th>MUNICI </th>
            <th>Accion</th>
            
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM paciente";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['tipo_documento_id']; ?></td>
            <td><?php echo $row['numero_documento']; ?></td>
            <td><?php echo $row['nombre1']; ?></td>
            <td><?php echo $row['nombre2']; ?></td>
            <td><?php echo $row['apellido1']; ?></td>
            <td><?php echo $row['apellido2']; ?></td>
            <td><?php echo $row['genero_id']; ?></td>
            <td><?php echo $row['departamento_id']; ?></td>
            <td><?php echo $row['municipio_id']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>







<?php include("includes/footer.php") ?>



