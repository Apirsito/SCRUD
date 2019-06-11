<?php include "header.php"; ?>
<?php date_default_timezone_set('America/Bogota'); ?>
<?php
  session_start();
  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
    <?php if(!empty($user)): ?>
      <body class="bd-index">
	<header class="jumbotron jumbotron-fluid">
		<div class="container-fluid text-center"> 
			<h1 class="display-3">La Venada a tu servicio</h1>
			<p class="lead pb-4"> <br> Bienvenido <?= $user['email']; ?></p>
			<p><a href="logout.php" class="btn btn-primary btn-lg" role="button">Desloguearte</a></p>
			<p><a href="formulario.php" class="btn btn-primary btn-lg" role="button">Ver formulario</a></p>
			</div>
			<div>
		<section class="container">
		<div class="row text-center">
			 <div class="col-md-4 mb-4">
				<div class="card h-100">
					<img class="card-img-top" src="style/desayuno.jpg" alt="Design">
					<div class="card-body">
						<h4 class="card-title">Desayuno</h4>
					
				</div>
			</div>
		</div>

		<div class="col-md-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="style/almuerzo.png" alt="Development">
				<div class="card-body">
					<h4 class="card-title">Almuerzo</h4>
				
 				</div>
				
			</div>
		</div>
      
		<div class="col-md-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="style/cena.jpg" alt="Analytics">
				<div class="card-body">
					<h4 class="card-title">Cena</h4>
			
					</div>
					
				</div>
			</div>
		</div>
	</section>
			</div>
	</header>
    <?php else: ?>
    
<body class="bd-index">
	<header class="jumbotron jumbotron-fluid">
		<div class="container-fluid text-center"> 
			<h1 class="display-3">La Venada a tu servicio</h1>
			<p class="lead pb-4">Porque sabemos que odias las filas.</p>

			<p><a href="login.php" class="btn btn-primary btn-lg" role="button">Ingreso</a> 
		
			</div>
			<div>
				""
			</div>
	</header>
<!--  
	<section class="container">
		<h2 class="display-4 text-center mt-5 mb-3">Minuta para el día <?php echo $current_date = date('d/m/Y'); ?></h2>

		<div class="row text-center">
			 <div class="col-md-4 mb-4">
				<div class="card h-100">
					<img class="card-img-top" src="style/desayuno.jpg" alt="Design">
					<div class="card-body">
						<h4 class="card-title">Desayuno</h4>
						<p class="card-text">Lorem impsum Lorem impsum Lorem impsum Lorem impsum.</p>
            			</div>
				<div class="card-footer py-4">
					<a href="formulario.php" class="btn btn-secondary">ver formulario &raquo;</a>
				</div>
			</div>
		</div>

		<div class="col-md-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="style/almuerzo.png" alt="Development">
				<div class="card-body">
					<h4 class="card-title">Almuerzo</h4>
						<p class="card-text">Lorem impsum Lorem impsum Lorem impsum Lorem impsum.</p>
 				</div>
				<div class="card-footer py-4">
					<a href="formulario.php" class="btn btn-secondary">ver formulario &raquo;</a>
				</div>
			</div>
		</div>
      
		<div class="col-md-4 mb-4">
			<div class="card h-100">
				<img class="card-img-top" src="style/cena.jpg" alt="Analytics">
				<div class="card-body">
					<h4 class="card-title">Cena</h4>
					<p class="card-text">Lorem impsum Lorem impsum Lorem impsum Lorem impsum.</p>
					</div>
					<div class="card-footer py-4">
						<a href="formulario.php" class="btn btn-secondary">ver formulario &raquo;</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	-->
<body>
</html>



    <?php endif; ?>
    <?php include "footer.php"; ?>
  