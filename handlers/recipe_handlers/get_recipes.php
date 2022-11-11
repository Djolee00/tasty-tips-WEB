<?php

require '../../db_connection.php';
require '../../models/Recipe.php';

// the response is JSON file with all recipes from DB
if (isset($_GET['getAll'])) {
    $recipes = Recipe::getRecipes($conn);

    $res = json_encode($recipes);
    echo  $res;
}
