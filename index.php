<?php 

session_start();
?>
<?php require __DIR__ . "/inc/header.php"; ?>
     
<section id= "Landing-page" style="padding-top: 20px; padding-bottom: 20px;">

<section id="heading">

    <div class = "container">

       <div class = "">
            <div class="card text-center">
                <div class="card-body">
                <h5 class="card-title">Welcome!</h5>
                <p class="card-text">Welcome to Gormet Grocers inventory management system. Please Log in or register your account</p>
                <a href="login.php" class="btn btn-primary">Log in/Register</a>
                </div>
            </div>
        </div>

    </div>

</section>

<section id="content" style="padding-top: 20px; padding-bottom: 20px;">

    <div class = "container">
    <div class="card-columns">
    <div class="card text-center p-3" style="width: 22rem;">
  <div class="card-body">
    <h5 class="card-title">Inventory</h5>
    <p class="card-text">Check up on current inventory here.</p>
    <a href="Inventory.php" class="btn btn-primary">Inventory</a>
  </div>
</div>

<div class="card">
    <img class="card-img" src="https://images.unsplash.com/photo-1487646709898-58d3c6e8d886?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Card image">
  </div>

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Already Logged in?</h5>
      <p class="card-text">Use the links at the top to navigate your way through the system</p>
    </div>
  </div>

  <div class="card text-center p-3">
    <blockquote class="blockquote mb-0">
      <h1>Gourmet Grocers</h1>
    </blockquote>
  </div>

  <div class="card p-3">
    <blockquote class="blockquote mb-0 card-body">
      <p>Working hard, or hardly working?</p>
      <footer class="blockquote-footer">
        <small class="text-muted">
          The Boss
        </small>
      </footer>
    </blockquote>
  </div>

  <div class="card">
    <img class="card-img" src="img/sales-img.png" alt="Card image">
  </div>

  <div class="card text-center" style="height: 15rem;">
    <div class="card-body">
      <h5 class="card-title">New Employee?</h5>
      <p class="card-text">Please Register your account with us here.</p>
      <p class="card-text text-muted">Ensure to keep note of your credentials for future uses</p>
      <a href="register.php" class="btn btn-primary">Register</a>
    </div>
  </div>
</div>


    </div>

</section>

</section>

<?php require __DIR__ . "/inc/footer.php"; ?>