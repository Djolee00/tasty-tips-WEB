<?php


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
      <img src="./assets/recipes/recipe-4.jpeg" class="img recipe-hero-img" alt="pancakes" />
      <article>
        <h2>Banana Pancakes</h2>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aliquid
          nostrum fugiat exercitationem totam tempore et harum eaque nesciunt
          ipsa soluta obcaecati, necessitatibus blanditiis numquam ea, quidem
          voluptate repudiandae consectetur fugit.
        </p>
        <!-- recipe icons -->
        <div class="recipe-icons">
          <!-- single recipe icon -->
          <article>
            <i class="fas fa-clock"></i>
            <h5>prep time</h5>
            <p>30min.</p>
          </article>
          <!-- single recipe icon -->
          <article>
            <i class="far fa-clock"></i>
            <h5>cook time</h5>
            <p>15min.</p>
          </article>
          <!-- single recipe icon -->
          <article>
            <i class="fas fa-user-friends"></i>
            <h5>servings</h5>
            <p>6 servings</p>
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi
            commodi veniam cum amet ipsum adipisci quae.
          </p>
          <!-- single instruction -->
          <div class="single-instruction">
            <header>
              <p>step 1</p>
              <div></div>
            </header>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi
              commodi veniam cum amet ipsum adipisci quae.
            </p>
            <!-- single instruction -->
            <div class="single-instruction">
              <header>
                <p>step 1</p>
                <div></div>
              </header>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi
                commodi veniam cum amet ipsum adipisci quae.
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