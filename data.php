<?php
include_once 'dbconnection.php';

$r_name = '';
if(isset($_POST['recipe_name'])){
    $r_name = $_POST['recipe_name'];
}

 $recipe_id = null;
 $stmt = $db->query("SELECT recipe_id FROM recipes WHERE recipe_name = '". $r_name ."'");
 while($row=$stmt->fetch_assoc()){
      $recipe_id = $row['recipe_id'];
 }

$ingredientsQuantity = $db->query("SELECT quantity.ingredient_quantity, quantity.ingredient_measurement, ingredients.ingredient_name, recipes.recipe_name, recipes.instructions
FROM quantity JOIN ingredients JOIN recipes ON quantity.ingredient_id = ingredients.ingredient_id AND 
quantity.recipe_id = ingredients.recipe_id AND 
recipes.recipe_id = ingredients.recipe_id WHERE recipes.recipe_id = '". $recipe_id ."'");

$recipe_name = "";
$ingredients = "<ul>";
$instructions = "";

if($ingredientsQuantity->num_rows > 0){
    while($row=$ingredientsQuantity->fetch_assoc()){
        // $recipe_n = strtolower($_POST['recipe_name']);
        if(isset($_POST['recipe_name']) && (strtolower($_POST['recipe_name'] === $row['recipe_name']))){
            $recipe_name = $_POST['recipe_name'];
            $instructions = $row['instructions']; 
            $quantity = intval($_POST['number_pple']) * ($row['ingredient_quantity']);
            $ingredients .= "<li>" . $quantity . " " . $row['ingredient_measurement'] ." " . $row['ingredient_name'] . "</li>";       
         }else{
            continue;
        }
    }
}else{
    echo 'some error';
}
$ingredients .= "</ul>";

    






