<?php include "header.php"; ?>
<?php date_default_timezone_set('America/Bogota'); 
require 'database.php';
  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $sql = "INSERT INTO users (nombre,apellido,email,password) VALUES (:nombre, :apellido,:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':apellido', $_POST['apellido']);
    if (($_POST['password'])==($_POST['confirm_password'])) {

      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $stmt->bindParam(':password', $password);
      if ($stmt->execute()) {
      echo"<script>alert('Usted ha creado un nuevo usuario')</script>";
      }

    }else {
     echo"<script>alert('No se ha podido crear usuario')</script>";
      }
  }

?>
<body class="bd-index">
  <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>


    <header class="jumbotron jumbotron-fluid">

        <div class="container-fluid text-center"> 

        </div>
<section class="container">
  
<div class="row text-center">

             <div  class="col-md-4 mb-4 mx-auto">
                <div class="card h-100">
                     <div class="login-purple-pink p-3 rounded" style="background: linear-gradient(145deg, #91190E, #000000);">
                <div class="pt-3">
                    <h2 class="text-white ">REGISTRO</h2>
                </div>

               <form action="signup.php" method="POST" class="mt-5">
                <div class="form-group">
                       <input name="nombre" type="text" 
                            class="form-control form-control-sm bg-light" 
                            placeholder="Nombre">
                    </div>
                    <div class="form-group">
                       <input name="apellido" type="text" 
                            class="form-control form-control-sm bg-light" 
                            placeholder="Apellido">
                    </div>
                    
                    <div class="form-group">
                       <input name="email" type="text" 
                            class="form-control form-control-sm bg-light" 
                            placeholder="Correo institucional">
                    </div>

                    <div class="form-group">
                         <input name="password" type="password"
                            class="form-control form-control-sm bg-light"
                            placeholder="Contraseña">
                    </div>
                      <div class="form-group">
                         <input name="confirm_password" type="password" 
                            class="form-control form-control-sm bg-light" 
                            placeholder="Confirmar contraseña">
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-success" type="submit" value="Submit">
                            Registro
                        </button>
                         <a class="btn btn-success" href="login.php">Login</a></span>  
                </form>
            </div>
        </div>
        </div>
        </div>
</section>
    </header>
</body>

<?php include "footer.php"; ?>


