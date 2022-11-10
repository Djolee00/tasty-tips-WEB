<?php

require 'models/Recipe.php';
require 'db_connection.php';

session_start();
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}

if (!isset($_GET['recipe_id'])) {
  header('Location: index.php');
  exit();
}

$recipe = Recipe::getById($conn, $_GET['recipe_id']);

if (!$recipe) {
  header('Location: index.php');
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Single recipe</title>
  <!-- favicon -->
  <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
  <!-- normalize -->
  <link rel="stylesheet" href="./css/normalize.css" />
  <!-- font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
  <!-- index css -->
  <link rel="stylesheet" href="./css/index.css" />
</head>

<body>
  <!-- nav-->
  <nav class="navbar">
    <div class="nav-center">
      <!-- header -->
      <div class="nav-header">
        <a href="index.php" class="nav-logo">
          <img src="./assets/logo.png" alt="simply recipes" />
        </a>
        <button type="button" class="btn nav-btn">
          <i class="fas fa-align-justify"></i>
        </button>
      </div>
      <!-- links -->
      <div class="nav-links">
        <a href="index.php" class="nav-link">Home</a>

        <div class="nav-link logout-link">
          <a href="logout.php" class="btn">Log out</a>
        </div>
      </div>
    </div>
  </nav>
  <!-- end of nav-->

  <!-- main -->
  <main class="page">
    <section class="recipe-hero">
      <img src="./assets/recipes/<?php echo $recipe->imageName ?>" class="img recipe-hero-img" alt="" />
      <article>
        <h2><?php echo $recipe->name ?></h2>
        <p>
          <?php echo $recipe->description ?>
        </p>
        <!-- recipe icons -->
        <div class="recipe-icons">
          <!-- single recipe icon -->
          <article>
            <i class="fas fa-clock"></i>
            <h5>prep time</h5>
            <p><?php echo $recipe->prepTime ?></p>
          </article>
          <!-- single recipe icon -->
          <article>
            <i class="far fa-clock"></i>
            <h5>cook time</h5>
            <p><?php echo $recipe->cookTime ?></p>
          </article>
          <!-- single recipe icon -->
          <article>
            <i class="fas fa-user-friends"></i>
            <h5>servings</h5>
            <p><?php echo $recipe->num_of_servings ?> servings</p>
          </article>
        </div>
      </article>
    </section>
    <!-- recipe content-->
    <section class="recipe-content">
      <article>
        <h4>instructions</h4>
        <!-- single instruction -->
        <div class="single-instruction">
          <header>
            <p>step 1</p>
            <div></div>
          </header>
          <p>
            <?php echo $recipe->stepOne ?>
          </p>
          <!-- single instruction -->
          <div class="single-instruction">
            <header>
              <p>step 2</p>
              <div></div>
            </header>
            <p>
              <?php echo $recipe->stepTwo ?>
            </p>
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 3</p>
                <div></div>
              </header>
              <p>
                <?php echo $recipe->stepThree ?>
              </p>
            </div>
      </article>
      <article class="second-column"></article>
    </section>
  </main>
  <!-- end of main -->

  <!-- footer -->
  <footer class="page-footer">
    <p>
      &copy; <span id="date"></span>
      <span class="footer-logo">TastyTips</span>
      Built by
      <a href="https://github.com/Djolee00?tab=repositories">Djordje Ivanovic</a>
    </p>
  </footer>

  <script src="./js/app.js"></script>
</body>

</html>