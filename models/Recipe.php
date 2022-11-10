<?php

class Recipe
{

    public $id;
    public $name;
    public $prepTime;
    public $cookTime;
    public $stepOne;
    public $stepTwo;
    public $stepThree;
    public $description;
    public $imageName;

    function __construct($id, $name, $prepTime, $cookTime, $stepOne, $stepTwo, $stepThree, $description, $imageName)
    {
        $this->id = $id;
        $this->name = $name;
        $this->prepTime = $prepTime;
        $this->cookTime = $cookTime;
        $this->stepOne = $stepOne;
        $this->stepTwo = $stepTwo;
        $this->stepThree = $stepThree;
        $this->description =  $description;
        $this->imageName = $imageName;
    }

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
}
