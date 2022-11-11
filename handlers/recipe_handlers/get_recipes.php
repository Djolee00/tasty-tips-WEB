<?php

require '../../db_connection.php';
require '../../models/Recipe.php';

// the response is JSON file with all recipes from DB
if (isset($_GET['getAll'])) {
    $recipes = Recipe::getRecipes($conn);

    $res = json_encode($recipes);
    echo  $res;
}

if (isset($_GET['filter'])) {
    echo json_encode(Recipe::filterRecipes(
        $conn,
        sanitizeUserData($_POST['name']),
        $_POST['prepTimeFrom'],
        $_POST['prepTimeTo'],
        $_POST['cookTimeFrom'],
        $_POST['cookTimeTo']
    ));
}

function sanitizeUserData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
