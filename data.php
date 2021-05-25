<?php
include_once 'dbconnection.php';

$ingredientsQuantity = $db->query("SELECT quantity.ingredient_quantity, quantity.ingredient_measurement, ingredients.ingredient_name, recipes.recipe_name, recipes.instructions
FROM quantity JOIN ingredients JOIN recipes ON quantity.ingredient_id = ingredients.ingredient_id AND 
quantity.recipe_id = ingredients.recipe_id AND 
recipes.recipe_id = ingredients.recipe_id");

$recipe_name = "";
$ingredients = "<ol>";
$instructions = "";
// adjust ingridients_quantity for number of pple
$number_pple = $_POST['number_pple'];

if($ingredientsQuantity->num_rows > 0){
    while($row=$ingredientsQuantity->fetch_assoc()){
        $recipe_n = strtolower($_POST['recipe_name']);
        if(isset($_POST['recipe_name']) && $recipe_n === $row['recipe_name']){
            $recipe_name = $_POST['recipe_name'];
            $instructions = $row['instructions']; 
            $quantity = intval($_POST['number_pple']) * ($row['ingredient_quantity']);
          //  $quantity = 
        //     $isTrue = true;
            $ingredients .= "<li>" . $quantity . " " . $row['ingredient_measurement'] ." " . $row['ingredient_name'] . "</li>";       
         }else{
            continue;
        }
    }
}else{
    $ingredients = " null $ingredientsQuantitys for recipe and ingredients";
}
$ingredients .= "</ol>";

// delete recipe by name
$_POST['delete_recipe_name']);

    






