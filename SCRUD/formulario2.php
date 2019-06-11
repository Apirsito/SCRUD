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

      <section class="container">
    <h2 class="display-4 text-center mt-5 mb-3">COMPRA TU COMIDA</h2>

    <div class="row text-center">
       <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="style/desayuno.jpg" alt="Design">
          <div class="card-body">
            
            <div class="custom-control custom-checkbox custom-control-inline">
             <input type="checkbox" class="custom-control-input" id="defaultInline2">
            <label class="custom-control-label" for="defaultInline2"><h4 class="card-title">Desayuno</h4></label>
            </div>
      
                  </div>
       
      </div>
    </div>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="style/almuerzo.png" alt="Development">
        <div class="card-body">
          
          <div class="custom-control custom-checkbox custom-control-inline">
  <input  type="checkbox" class="custom-control-input" id="defaultInline1">
  <label class="custom-control-label" for="defaultInline1"><h4 class="card-title">Almuerzo</h4></label>
</div>
           
        </div>
        
      </div>
    </div>
      
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="style/cena.jpg" alt="Analytics">
        <div class="card-body">
         
          <div class="custom-control custom-checkbox custom-control-inline">
  <input type="checkbox" class="custom-control-input" id="defaultInline3">
  <label class="custom-control-label" for="defaultInline3"> <h4 class="card-title">Cena</h4></label>
</div>
      
          </div>
         
        </div>
      </div>
    </div>
  </section>
    
    <?php else: ?>
    <h2 class="display-4 text-center mt-5 mb-3">QUE INTENTA SI NO ESTA REGISTRADO PRRO????</h2>

<body>




    <?php endif; ?>
    <?php include "footer.php"; ?>
  