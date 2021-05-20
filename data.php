<?php
include_once 'dbconnection.php';

$result = $db->query("SELECT ingredients.ingredient_name, ingredients.recipe_id, recipes.recipe_name,
 recipes.recipe_id FROM ingredients JOIN recipes ON ingredients.recipe_id = recipes.recipe_id ");
$recipe_name = '';
$ingridients = "";
$isTrue = false;

// get info abt recipe name/show msg no such name if incorrect, get all ingredients for that recipe
if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        if(isset($_POST['recipe_name']) && $_POST['recipe_name'] === $row['recipe_name']){
            $recipe_name = $_POST['recipe_name'];
            $isTrue = true;
            $ingridients .= $row['ingredient_name'] . ", recipe_id: " . $row['recipe_id'] . "<br/>";
        }else{
            continue;
        }
    }
}else{
    $ingridients = " null results for recipe and ingredients";
}
if($isTrue == false){
    echo "Please, enter a valid recipe name.";
}

// get ingredients quantity and measurement for that recipe


