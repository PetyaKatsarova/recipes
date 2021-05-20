<?php
include_once 'dbconnection.php';
// echo 'hello from data!!';

$result = $db->query("SELECT ingredients.ingredient_name, ingredients.recipe_id, recipes.recipe_name FROM ingredients LEFT JOIN recipes ON ingredients.recipe_id = recipes.recipe_id ");
$recipe_name = '';

if(isset($_POST['recipe_name'])){
    $recipe_name = $_POST['recipe_name'];
}

$recipe = "<h3>ingridients:</h3><br/>";
if($result->num_rows > 0){
    while($row=$result->fetch_assoc()){
        $recipe .= $row['ingredient_name'] . ", recipe_id: " . $row['recipe_id'] . "<br/>";
    }
}else{
    $recipe = " null results for recipe and ingredients";
}
