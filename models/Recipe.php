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
}
