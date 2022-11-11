<?php

class Recipe
{

    public $id;
    public $name;
    public $prepTime;
    public $cookTime;
    public $num_of_servings;
    public $stepOne;
    public $stepTwo;
    public $stepThree;
    public $description;
    public $imageName;
    public $user_id;

    function __construct($id = null, $name, $prepTime, $cookTime, $num_of_servings, $stepOne, $stepTwo, $stepThree, $description, $imageName, $user_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->prepTime = $prepTime;
        $this->cookTime = $cookTime;
        $this->num_of_servings = $num_of_servings;
        $this->stepOne = $stepOne;
        $this->stepTwo = $stepTwo;
        $this->stepThree = $stepThree;
        $this->description =  $description;
        $this->imageName = $imageName;
        $this->user_id = $user_id;
    }

    // function to get all recipes
    static function getRecipes(mysqli $conn)
    {
        $sql = "SELECT * FROM recipe";
        $result = $conn->query($sql);
        $array = array();
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
        }

        return $array;
    }

    // function to add recipe 
    function insert(mysqli $conn)
    {
        $sql = "INSERT INTO recipe (name,prep_time,cook_time,num_of_servings,step_one,step_two,step_three,description,image,user_id) VALUES (?,?,?,?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($sql);   // using prepared statement to avoid SQL Injection
        $stmt->bind_param("siiisssssi", $this->name, $this->prepTime, $this->cookTime, $this->num_of_servings, $this->stepOne, $this->stepTwo, $this->stepThree, $this->description, $this->imageName, $this->user_id);   //s for string

        $success = $stmt->execute();

        $stmt->close();

        return $success;
    }

    // function to get recipe by id
    static function getById(mysqli $conn, $id)
    {
        $sql = "SELECT * FROM recipe WHERE id = ?";

        $stmt = $conn->prepare($sql);   // using prepared statement to avoid SQL Injection
        $stmt->bind_param("i", $id);
        $success = $stmt->execute();

        if ($success) {
            $res = $stmt->get_result();
            $array_res = $res->fetch_array();
            $recipe = new Recipe(
                $array_res['id'],
                $array_res['name'],
                $array_res['prep_time'],
                $array_res['cook_time'],
                $array_res['num_of_servings'],
                $array_res['step_one'],
                $array_res['step_two'],
                $array_res['step_three'],
                $array_res['description'],
                $array_res['image'],
                $array_res['user_id']
            );
            return $recipe;
        }

        return false;
    }


    // function to filter recipes from DB
    static function filterRecipes(
        mysqli $conn,
        $name,
        $prepTimeFrom,
        $prepTimeTo,
        $cookTimeFrom,
        $cookTimeTo
    ) {

        if ((!empty($prepTimeTo) && $prepTimeTo < $prepTimeFrom) || (!empty($cookTimeTo) && $cookTimeTo < $cookTimeFrom)) {
            return array();
        }

        $sql = "SELECT * FROM recipe WHERE 1=1";

        if (!empty($name)) {
            $name = strtolower($name);
            $sql .= " AND LOWER(name) LIKE '$name%'";
        }

        if (!empty($prepTimeFrom)) {
            $prepTimeFrom = (int) $prepTimeFrom;
            $sql .= " AND prep_time >= $prepTimeFrom";
        }

        if (!empty($prepTimeTo)) {
            $prepTimeTo = (int) $prepTimeTo;
            $sql .= " AND prep_time <= $prepTimeTo";
        }

        if (!empty($cookTimeFrom)) {
            $cookTimeFrom = (int) $cookTimeFrom;
            $sql .= " AND cook_time >= $cookTimeFrom";
        }


        if (!empty($cookTimeTo)) {
            $cookTimeTo = (int) $cookTimeTo;
            $sql .= " AND cook_time <= $cookTimeTo";
        }

        $result = $conn->query($sql);
        $array = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            return $array;
        }
    }
}
