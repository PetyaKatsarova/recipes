<?php

// create connection to db
$db = new mysqli("localhost", "root", "koekjes", "test");
if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}
echo "Connected successfully.<br/>";

// $result = $db->query("SELECT * FROM recipes");
// if($result->num_rows > 0){
//     while($row=$result->fetch_assoc()){
//         echo "id: " . $row['recipe_id'] . ", name: " . $row['recipe_name'] . ", instructions: " . $row['instructions'] . "<br/>";
//     }
// }else{
//     echo " null results";
// }

$result2 = $db->query("SELECT ingredients.ingredient_name, ingredients.recipe_id, recipes.recipe_name FROM ingredients LEFT JOIN recipes ON ingredients.recipe_id = recipes.recipe_id ");
$recipe_name = '';

if($result2->num_rows > 0){
    while($row=$result2->fetch_assoc()){
        echo "ingridient name: " . $row['ingredient_name'] . ", recipe_id: " . $row['recipe_id'] . ", recipe name: ". $row['recipe_name'] ."<br/>";
    }
}else{
    echo " null results";
}

if(isset($_POST['recipe_name'])){
    $recipe_name = $_POST['recipe_name'];
}

$db->close();
?>
<form method="post" action="result.php">
    <label for="recipe_name">Enter the recipe name</label>
    <input type="text" name="recipe_name">
    <input type="submit" name="submit" />
</form>



