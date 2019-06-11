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




if(isset($_POST['enviar'])){
if(!empty($_POST['valor'])) {


$valor = array_sum($_POST['valor']);
// Bucle para almacenar y visualizar valores activados checkbox.
foreach($_POST['valor'] as $seleccion) {
echo "<p>".$valor ."</p>";
}
echo "<br/><b>Nota :</b> <span>De manera similar, también puede realizar operaciones CRUD usando estos valores seleccionados.</span>";
}
else{
echo "<p><b>Por favor seleccione al menos una opción.</b></p>";
}
}


    $sql = "INSERT INTO users (precio) VALUES (:precio)";
    $stmt = $conn->prepare($sql);
      $stmt->bindParam(':precio', $valor);

 
?>


<body class="bd-index">
  <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <?php if(!empty($user)): ?>

<form class="needs-validation" action="formulario.php" method="post">
      <section class="container">
    <h2 class="display-4 text-center mt-5 mb-3">COMPRA TU COMIDA</h2>
    <div class="row text-center">
       <div class="col-md-4 mb-4">
        <div class="card h-100">
          <img class="card-img-top" src="style/desayuno.jpg" alt="Design">
          <div class="card-body">
            
            <div class="custom-control custom-checkbox custom-control-inline">
             <input type="checkbox" class="custom-control-input" id="defaultInline2" name="valor[]" value=1100>
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
  <input type="checkbox" class="custom-control-input" id="defaultInline1" name="valor[]" value=1100 >
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
  <input type="checkbox" class="custom-control-input" id="defaultInline3" name="valor[]" value=1100>
  <label class="custom-control-label" for="defaultInline3"> <h4 class="card-title">Cena</h4></label>
</div>
          </div>
        </div>

</div>

<div class="row text-center mx-auto" >
	<!--
            <h4 class="mb-3">Pago</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" value="c" name="m_pgo" checked required>
                <label class="custom-control-label" for="credit">Tarjeta de crédito</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" value="d" name="m_pgo" required>
                <label class="custom-control-label" for="debit">Tarjeta de débito</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nombre del tarjetahabiente</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" name="nom_tar" required>
                <small class="text-muted">Nombre completo (como se muestra en la tarjeta)</small>
                <div class="invalid-feedback">
                  Se requiere el nombre de la tarjeta
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Número de tarjeta de crédito</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" name="num_cc" required>
                <div class="invalid-feedback">
                  Se requiere el número de la tarjeta
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Mes de expiración (MM)</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" name="mo_exp" required>
                <div class="invalid-feedback">
                  Se requiere el mes de vencimiento
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Año de expiración (YYYY)</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" name="yr_exp" required>
                <div class="invalid-feedback">
                  Se requiere el año de vencimiento
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" name="n_cvv" required>
                <div class="invalid-feedback">
                  Se requiere el código de seguridad
                </div>
              </div>

            </div>

-->
            <hr align="center" class="mb-4" >
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="enviar">COMPRAR</button>
      </div>
</form>
    </div>
  </section>
    
    <?php else: ?>
    <h2 class="display-4 text-center mt-5 mb-3">QUE INTENTA SI NO ESTA REGISTRADO PRRO????</h2>

<body>




    <?php endif; ?>
    <?php include "footer.php"; ?>