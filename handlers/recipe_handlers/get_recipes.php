<?php

require '../../db_connection.php';
require '../../models/Recipe.php';

// the response is JSON file with all recipes from DB
if (isset($_GET['getAll'])) {
    $recipes = Recipe::getRecipes($conn);

    $res = json_encode(utf8ize($recipes));
    echo  $res;
}

if (isset($_GET['filter'])) {
    echo json_encode(utf8ize(Recipe::filterRecipes(
        $conn,
        sanitizeUserData($_POST['name']),
        $_POST['prepTimeFrom'],
        $_POST['prepTimeTo'],
        $_POST['cookTimeFrom'],
        $_POST['cookTimeTo']
    )));
}

function sanitizeUserData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/* Use it for json_encode some corrupt UTF-8 chars
 * useful for = malformed utf-8 characters possibly incorrectly encoded by json_encode
 */
function utf8ize($mixed)
{
    if (is_array($mixed)) {
        foreach ($mixed as $key => $value) {
            $mixed[$key] = utf8ize($value);
        }
    } elseif (is_string($mixed)) {
        return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
    }
    return $mixed;
}
