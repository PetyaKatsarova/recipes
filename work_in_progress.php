<?php
include_once 'dbconnection.php';

$rec_id = $_POST['recipe_id'];
echo $rec_id;
$recipes_list = [];

if(isset($_POST['recipe_id']) && !empty($_POST['recipe_id'])){

    $stmt = $db->query("SELECT recipes.recipe_name, recipes.recipe_id, ingredients.ingredient_name, link.quantity, link.measurement FROM link JOIN recipes JOIN ingredients ON link.recipe_id = recipes.recipe_id AND link.ingredient_id = ingredients.ingredient_id WHERE recipes.recipe_id = '". $rec_id ."' ");
    if($stmt->num_rows > 0){
        while($row=$stmt->fetch_assoc()){
            array_push($recipes_list, $row['recipe_id']=>$row['recipe_name']);
        }
    }
    foreach($id as $rec_id=>$rec_name){
        if($id === $rec_id){
            echo "You already have this recipe in the list";
        }else{
            echo "<h3>Recipe for $rec_id for </h3>"
        }
    }
    var_dump($recipes_list);

}
$






