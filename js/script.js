// This JS file is primarily for AJAX

let recipes = [];
const recipesContainerElement = document.querySelector(".recipes-list");

getRecipes();

// Because my button is not part of any form, I am making AJAX POST request when button is clicked
$(document).ready(function () {
  $(".delete").click(function () {
    var el = this;

    var deleteid = $(this).data("id");

    // AJAX Request
    $.ajax({
      url: "./handlers/delete_user.php",
      type: "POST",
      data: { id: deleteid },
      success: function (response) {
        if (response == "Success") {
          alert("Profile has been deleted successfully!");
          location.href = "./login.php";
        } else {
          alert(response);
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("Status: " + textStatus);
        alert("Error: " + errorThrown);
      },
    });
  });
});

// GET Request for Recipes for main page
function getRecipes() {
  $.ajax({
    url: "./handlers/get_recipes.php?getAll",
    type: "GET",
    success: function (response) {
      try {
        response = JSON.parse(response); // because we are getting recipes in JSON file
        recipes = response;
        renderRecipes();
      } catch (error) {
        console.log(`Error parsing response from server: ${error}`);
        return;
      }
    },
    error: function (XMLHttpRequest, textStatus, errorThrown) {
      alert("Status: " + textStatus);
      alert("Error: " + errorThrown);
    },
  });
}

// function to show (render recipe)
function renderRecipes() {
  recipesContainerElement.innerHTML = ""; // this will make my div empty
  recipes.forEach((recipe) => createNewRecipeElement(recipe)); // for each recipe it adds content in html
}

// function to add div element in recipe-list for every recipe
function createNewRecipeElement(recipe) {
  const elementTemplate = `<a href="single_recipe.php?${recipe.id}" class="recipe">
    <img src="./assets/recipes/${recipe.image}" class="img recipe-img" alt="" />
    <h5>${recipe.name}</h5>
    <p>Prep: ${recipe.prep_time} min | Cook: ${recipe.cook_time} min</p>
    </a>`;

  recipesContainerElement.insertAdjacentHTML("beforeend", elementTemplate);
}

// AJAX call to add recipe, in order not to refresh the whole page

$(document).ready(function (e) {
  $("#add_recipe").on("submit", function (e) {
    e.preventDefault(); // prevent page from reload

    $.ajax({
      url: "./handlers/add_recipe.php",
      type: "POST",
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        console.log(response);
        if (response == "Success") {
          alert("Recipe has benn added successfully!");
          getRecipes();
          renderRecipes();
        } else {
          alert("Problem adding recipe, try again!");
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert("Status: " + textStatus);
        alert("Error: " + errorThrown);
      },
    });
  });
});
