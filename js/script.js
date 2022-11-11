// This JS file is primarily for AJAX

let recipes = [];
const recipesContainerElement = document.querySelector(".recipes-list");
const sortSelect = document.querySelector("#sort-select");
const filters = {
  name: document.querySelector("#filter-name"),
  prepTimeFrom: document.querySelector("#filter-prepTimeFrom"),
  prepTimeTo: document.querySelector("#filter-prepTimeTo"),
  cookTimeFrom: document.querySelector("#filter-cookTimeFrom"),
  cookTimeTo: document.querySelector("#filter-cookTimeTo"),
};

getRecipes();

// Because my button is not part of any form, I am making AJAX POST request when button is clicked
$(document).ready(function () {
  $(".delete").click(function () {
    var el = this;

    var deleteid = $(this).data("id");

    // AJAX Request
    $.ajax({
      url: "./handlers/user_handlers/delete_user.php",
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
    url: "./handlers/recipe_handlers/get_recipes.php?getAll",
    type: "GET",
    success: function (response) {
      try {
        console.log(response);
        if (response != null) {
          response = JSON.parse(response); // because we are getting recipes in JSON file
          recipes = response;
        } else {
          recipes = [];
        }
        sortRecipes();
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
  if (recipes != null)
    recipes.forEach((recipe) => createNewRecipeElement(recipe)); // for each recipe it adds content in html
}

// function to add div element in recipe-list for every recipe
function createNewRecipeElement(recipe) {
  const elementTemplate = `<a href="single_recipe.php?recipe_id=${recipe.id}" class="recipe">
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
      url: "./handlers/recipe_handlers/add_recipe.php",
      type: "POST",
      data: new FormData(this),
      processData: false,
      contentType: false,
      cache: false,
      success: function (response) {
        console.log(response);
        if (response == "Success") {
          alert("Recipe has been added successfully!");
          getRecipes();
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

// functio to sort Recipe based on choice

function sortRecipes() {
  const sortingParam = sortSelect.value;
  const sortOrder = document.querySelector(
    'input[name="sortOrderRadio"]:checked'
  ).value;

  if (sortingParam == "prep_time" || sortingParam == "cook_time") {
    recipes.sort((a, b) => {
      aValue = parseInt(a[sortingParam]);
      bValue = parseInt(b[sortingParam]);
      if (sortOrder == "asc") {
        return aValue < bValue ? -1 : 1;
      } else if (sortOrder == "desc") {
        return aValue > bValue ? -1 : 1;
      } else {
        return 0;
      }
    });
  } else {
    recipes.sort((a, b) => {
      aValue = a[sortingParam];
      bValue = b[sortingParam];
      if (sortOrder == "asc") {
        return aValue < bValue ? -1 : 1;
      } else if (sortOrder == "desc") {
        return aValue > bValue ? -1 : 1;
      } else {
        return 0;
      }
    });
  }
  renderRecipes();
}

// AJAX for filtering recipes

function filterRecipes() {
  var formData = new FormData();
  formData.append("name", filters.name.value);
  formData.append("prepTimeFrom", filters.prepTimeFrom.value);
  formData.append("prepTimeTo", filters.prepTimeTo.value);
  formData.append("cookTimeFrom", filters.cookTimeFrom.value);
  formData.append("cookTimeTo", filters.cookTimeTo.value);

  $.ajax({
    url: "./handlers/recipe_handlers/get_recipes.php?filter",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: function (response) {
      try {
        console.log(response);
        if (response != null) {
          response = JSON.parse(response); // because we are getting recipes in JSON file
          recipes = response;
        } else {
          recipes = [];
        }
        sortRecipes();
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
