<?php include "header.php"; ?>

<?php date_default_timezone_set('America/Bogota'); 

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /SCRUD');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /SCRUD");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>



<body class="bd-index">
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <header class="jumbotron jumbotron-fluid">

        <div class="container-fluid text-center"> 
            <h1 class="display-3">La Venada a tu servicio</h1>
        </div>
<section class="container">
  
<div class="row text-center">
             <div  class="col-md-4 mb-4 mx-auto">
                <div class="card h-100">
                     <div class="login-purple-pink p-3 rounded" style="background: linear-gradient(145deg, #91190E, #000000);">
                <div class="pt-3">
                    <h2 class="text-white ">Ingreso</h2>
                </div>

                <form  action="login.php" method="POST" class="mt-5">
                    <div class="form-group">
                        <input name="email" type="text" 
                            class="form-control form-control-sm bg-light" 
                            placeholder="Correo institucional">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" 
                            class="form-control form-control-sm bg-light" 
                            placeholder="Contraseña">
                    </div>

                    <div class="mt-5">
                        <button class="btn btn-success" type="submit" value="Submit">
                            Ingreso
                        </button>
                        
                
                </form>
            </div>
        </div>
        </div>
        </div>
</section>
    </header>
</body>
<?php include "footer.php"; ?>

