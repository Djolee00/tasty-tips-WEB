<?php 

require 'models/User.php';
require 'db_connection.php';

session_start();
if(!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}

if (isset($_GET['message'])) {
  $message = $_GET['message'];
  echo "<script>alert($message)</script>";
}

$user = unserialize($_SESSION['user']);



?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>TastyTips</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/favicon.ico" type="image/x-icon" />
    <!-- normalize -->
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
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
          <a href="index.html" class="nav-link">Home</a>
          <a href="#" class="nav-link" onclick="popAddNewRecipeModal(true)"
            >Add recipe</a
          >
          <a href="#" class="nav-link" onclick="popEditProfileDataModal(true)">Edit profile</a>
          <a href="#" class="nav-link" onclick="popDeleteProfileModal(true)"
            >Delete profile</a
          >

          <div class="nav-link logout-link">
            <a href="logout.php" class="btn">Log out</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- end of nav-->

    <!-- main -->
    <main class="page">
      <!-- header -->
      <header class="hero">
        <div class="hero-container">
          <div class="hero-text">
            <h1>Tasty Tips</h1>
            <h4>A recipe is a story that ends with a good meal.</h4>
          </div>
        </div>
      </header>
      <!-- end of header -->
      <section class="recipes-container">
        <!-- tag container -->
        <div class="search-sort-container">
          <h4>recipes</h4>
          <div class="search-sort-list">
            <!-- sorting part -->
            <label for="">Sort by:</label>
            <select
              id="sort-select"
              class="form-select form-select-sm"
              aria-label=".form-select-sm example"
              onchange=""
            >
              <option value="prep_time" selected>Preparation time</option>
              <option value="cook_time">Cook time</option>
              <option value="name">Name</option>
            </select>
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="sortOrderRadio"
                id="sortOrderRadio1"
                value="asc"
                onchange=""
              />
              <label class="form-check-label" for="sortOrderRadio1">
                Ascending
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="sortOrderRadio"
                id="sortOrderRadio2"
                value="desc"
                checked
                onchange="sortAds()"
              />
              <label class="form-check-label" for="sortOrderRadio2">
                Descending
              </label>
            </div>
            <br /><br />
            <!-- searching part-->
            <div class="first-row">
              <div>
                <label for="">Name:</label>
                <input
                  id="filter-brand"
                  type="search"
                  class="form-control form-control-dark"
                  placeholder="Search..."
                  aria-label="Search"
                />
              </div>
              <div class="preptime-div">
                <div>
                  <label for="">Preparation time from: </label>
                  <input
                    id="filter-priceFrom"
                    type="number"
                    class="form-control form-control-dark"
                    placeholder="Search..."
                    aria-label="Search"
                  />
                </div>
                <div>
                  <label for="">Preparation time to:</label>
                  <input
                    id="filter-priceTo"
                    type="number"
                    class="form-control form-control-dark"
                    placeholder="Search..."
                    aria-label="Search"
                  />
                </div>
              </div>
              <div class="year-div">
                <div>
                  <label for="">Cook time from:</label>
                  <input
                    id="filter-yearFrom"
                    type="number"
                    class="form-control form-control-dark"
                    placeholder="Search..."
                    aria-label="Search"
                  />
                </div>
                <div>
                  <label for="">Cook time to:</label>
                  <input
                    id="filter-yearTo"
                    type="number"
                    class="form-control form-control-dark"
                    placeholder="Search..."
                    aria-label="Search"
                  />
                </div>
              </div>
              <hr />
              <button
                type="button"
                class="search-icon btn btn-success"
                onclick=""
              >
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-search"
                  viewBox="0 0 16 16"
                >
                  <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
                  ></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <!-- end of tag container -->
        <!-- recipes list -->
        <div class="recipes-list">
          <!-- single recipe -->
          <a href="single-recipe.php" class="recipe">
            <img
              src="./assets/recipes/recipe-1.jpeg"
              class="img recipe-img"
              alt=""
            />
            <h5>Carne Asada</h5>
            <p>Prep : 15min | Cook : 5min</p>
          </a>
          <!-- end of single recipe -->
          <!-- single recipe -->
          <a href="single-recipe.php" class="recipe">
            <img
              src="./assets/recipes/recipe-2.jpeg"
              class="img recipe-img"
              alt=""
            />
            <h5>Greek Ribs</h5>
            <p>Prep : 15min | Cook : 5min</p>
          </a>
          <!-- end of single recipe -->
          <!-- single recipe -->
          <a href="single-recipe.php" class="recipe">
            <img
              src="./assets/recipes/recipe-3.jpeg"
              class="img recipe-img"
              alt=""
            />
            <h5>Vegetable Soup</h5>
            <p>Prep : 15min | Cook : 5min</p>
          </a>
          <!-- end of single recipe -->
          <!-- single recipe -->
          <a href="single-recipe.php" class="recipe">
            <img
              src="./assets/recipes/recipe-4.jpeg"
              class="img recipe-img"
              alt=""
            />
            <h5>Banana Pancakes</h5>
            <p>Prep : 15min | Cook : 5min</p>
          </a>
          <!-- end of single recipe -->
        </div>
        <!-- end of recipes list -->
      </section>
    </main>
    <!-- end of main -->

    <!-- footer -->
    <footer class="page-footer">
      <p>
        &copy; <span id="date"></span>
        <span class="footer-logo">TastyTips</span>
        Built by
        <a href="https://github.com/Djolee00?tab=repositories"
          >Djordje Ivanovic</a
        >
      </p>
    </footer>

    <!-- modal for creating recipe -->
    <div id="addNewRecipeModal">
      <div class="addNewRecipeTitle">Describe your recipe:</div>
      <form method="POST" action="" enctype="multipart/form-data">
        <!-- multipart/form-data is needed when we use type="file"-->
        <input type="text" name="title" placeholder="Recipe name" required />
        <input
          type="number"
          name="prep_time"
          placeholder="Preparation time in minutes"
          required
        />
        <input
          type="number"
          name="cook_time"
          placeholder="Cook time in minutes"
          required
        />
        <input
          type="number"
          name="serving"
          placeholder="Number of servings"
          required
        />
        <input type="text" name="step_1" placeholder="Step 1" required />
        <input type="text" name="step_2" placeholder="Step 2" required />
        <input type="text" name="step_3" placeholder="Step 3" required />
        <textarea
          name="description"
          cols="30"
          rows="10"
          placeholder="Description"
        ></textarea>
        <div class="files-div">
          <label for="files" class="btn">Insert image</label>
          <input
            type="file"
            id="files"
            name="image"
            accept=".img, .jpeg, .jpg, .png, .jfif"
            value="Insert image"
            required
            style="visibility: hidden"
          />
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
      <button
        type="button"
        class="btn btn-danger close-modal-btn"
        onclick="closeModals()"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-x-octagon-fill"
          viewBox="0 0 16 16"
        >
          <path
            d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"
          ></path>
        </svg>
      </button>
    </div>
    <!-- modal for creating recipe -->

    <!-- modal for deleting account -->
    <div id="deleteProfileModal">
      <div class="question">
        Are you sure you want to delete your profile?
        <br />
        All of your recipes will be deleted
      </div>
      <div class="buttons">
        <button
          type="button"
          class="btn btn-danger"
          onclick="deleteProfile(); popDeleteProfileModal(false)"
        >
          Delete
        </button>
        <button
          type="button"
          class="btn btn-dark"
          onclick="popDeleteProfileModal(false)"
        >
          Cancel
        </button>
      </div>
    </div>
    <!-- end of modal for deleting account -->

    <!-- edit profile data modal -->
    <div id="editProfileDataModal">
      <div class="editProfileDataModal">
        <strong>Change your profile data:</strong>
      </div>
      <form method="POST" action="handlers/edit_user.php">
        <label for="username">Username: </label>
        <input
          type="text"
          name="username"
          id="username"
          value="<?php  echo $user->getUsername();?>"
        />

        <label for="username">Email: </label>
        <input
          type="email"
          name="email"
          id="email"
          value="<?php echo $user->getEmail()?>"
        />
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
      <hr />
      <div class="editProfileDataModal"><strong>Change password: </strong></div>
      <form method="POST" action="">
        <label for="old-password">Old password: </label>
        <input type="password" name="old-password" id="old-password" />

        <label for="new-password">New password: </label>
        <input type="password" name="new-password" id="new-password" />
        <button type="submit" class="btn btn-primary">Change password</button>
      </form>
      <button
        type="button"
        class="btn btn-danger close-modal-btn"
        onclick="popEditProfileDataModal(false)"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="16"
          height="16"
          fill="currentColor"
          class="bi bi-x-octagon-fill"
          viewBox="0 0 16 16"
        >
          <path
            d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zm-6.106 4.5L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"
          ></path>
        </svg>
      </button>
    </div>
    <!-- end of edit profile data modal -->

    <div id="background-overlay" onclick="closeModals()"></div>
    <script src="./js/app.js"></script>
  </body>
</html>
