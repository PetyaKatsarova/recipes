

<?php
// populate  ingredients db 
include_once 'dbconnection.php';

$ingredients = $db->query("SELECT ingredient_name, ingredient_id FROM ingredients");
$ingredients_array = [];
while($row=$ingredients->fetch_assoc()){
    array_push($ingredients_array, $row['ingredient_name']);
}
//temporary fix: need to delete dublicates in table ingredients
// $no_dublicated_ingredients = [];
// foreach($ingredients_array as $ing){
//     if (!in_array( $ing,$no_dublicated_ingredients)){
//         array_push($no_dublicated_ingredients, $ing);
//     }
// }


// add ingredient

$new_ingredient = isset($_POST['new_ingredient']) ? $_POST['new_ingredient'] : false;
$stmt2 = false;
if(!empty($new_ingredient)){
    if (!in_array($new_ingredient, $ingredients_array)) {
        $stmt2 = $db->query("INSERT INTO ingredients (ingredient_name)
                       VALUES ('" . $new_ingredient . "')");
    }else{
        echo "The ingredient exist in the databes, select it from the list above.";
    }
}else{
   // echo 'Enter ingredient';
}

if($stmt2 === TRUE){
    echo "New record created successfully";
} else {
    // echo "Error: " . $new_ingredient . "<br>" . $db->error;

};

// delete existing ingredient

if(isset($_POST['delete_ingredient'])){
    $del_ingredient = $_POST['delete_ingredient'];
    $del = $db->query("DELETE FROM ingredients WHERE ingredient_id = '". $del_ingredient ."'");
    if($del){
        echo 'Ingredient successfully deleted';
    }
}

// $db->close();

// add to the db new recipe
if(isset($_POST['add_recipe'])  && isset($_POST['instructions'])){
    echo $_POST['add_recipe'] . "</br>";
    echo 'kku';
}







//  created table linking ingredients and recipes
// $q = "CREATE TABLE `link_recipe_ingredient` (
//     `recipe_id` int(10) unsigned NOT NULL,
//     `ingredient_id` int(10) unsigned NOT NULL,
//     `amount` decimal(4,2) DEFAULT NULL,
//     `unit` varchar(8) DEFAULT NULL,
//     INDEX (`recipe_id`)
// )";

// if ($db>query($db) === TRUE) {
//     echo "Table MyGuests created successfully";
// } else {
//     echo "Error creating table: " . $db->error;
// } 
 

