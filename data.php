<?php
include_once 'dbconnection.php';

$recipe_id = isset($_POST['recipe_id']) ? $_POST['recipe_id'] : false;

 $recipe_name='';
 $stmt = $db->query("SELECT recipe_name FROM recipes WHERE recipe_id = '". $recipe_id ."'");
 while($row=$stmt->fetch_assoc()){
      $recipe_name = $row['recipe_name'];
 }

$ingredientsQuantity = $db->query("SELECT 
-- quantity.ingredient_quantity, quantity.ingredient_measurement, 
ingredients.ingredient_name, recipes.recipe_name, recipes.instructions
-- FROM quantity JOIN
 FROM recipes JOIN ingredients ON 
--  quantity.ingredient_id = ingredients.ingredient_id AND 
-- quantity.recipe_id = ingredients.recipe_id AND 
recipes.recipe_id = ingredients.recipe_id WHERE recipes.recipe_id = '". $recipe_id ."'");

// $recipe_name = "";
$ingredients = "<ul>";
$instructions = "";
echo $recipe_id;


if($ingredientsQuantity->num_rows > 0){
    while($row=$ingredientsQuantity->fetch_assoc()){
        // $recipe_n = strtolower($_POST['recipe_name']);
        if(isset($_POST['recipe_id']) && (strtolower($recipe_name) === strtolower($row['recipe_name']))){
            // $recipe_name = $_POST['recipe_name'];
            // $instructions = $row['instructions']; 
            // $quantity = intval($_POST['number_pple']) * ($row['ingredient_quantity']);
            echo $row['recipe_name'];
            $ingredients .= "<li>" . " Some " . $row['ingredient_name'] . "</li>";       
         }else{
            continue;
        }
    }
}else{
    echo 'error in retrieving ingredientsQuantity query';
}
$ingredients .= "</ul>";

    






