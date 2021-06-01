

<?php
include_once 'dbconnection.php';

$ingredients = $db->query("SELECT ingredient_name, ingredient_id FROM ingredients");
$ingredients_array = [];
while($row=$ingredients->fetch_assoc()){
    // array_push($ingredients_array, $row['ingredient_name']);
    $ingredients_array[$row['ingredient_id']] = $row['ingredient_name'];
}

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

//add new recipe name and instructions to recipes
// make sure dont add existing recipe name

$st = $db->query("SELECT recipe_name, recipe_id FROM recipes");
$recipe_names = [];
$isDub = false;
while($row=$st->fetch_assoc()){
    $recipe_names[$row['recipe_name']] = $row['recipe_id'];
}

if(isset($_POST['submit_add_new_recipe'])){
    $name = strtolower($_POST['add_recipe']);
    $instructions= $_POST['instructions'];
    $ingredients = [];


    // checking if the new recipe is in the db:
    foreach($recipe_names as $rec=>$rec_id){
        if($rec === $name){
            echo ucfirst($rec) . " is already in the database";
            $isDub = true;
        }
    }
    if(empty($name) || empty($instructions)){
        echo 'Please enter recipe name and/or instructions';
    }else{
        if($isDub === false){
            $q = "INSERT INTO recipes (recipe_name, instructions)
            VALUES('". $name ."', '". $instructions ."')";
            if ($db->query($q) === TRUE) {
                echo "New recipe created successfully";
            } else {
                echo "Error: " . $q . "<br>" . $db->error;
            }

            // insert into link ingredient_id and 
            //recipe_id, message that was done
            $insert_recipe_id = "INSERT INTO link (recipe_id, ingredient_id VALUES()";
        }            
    } 
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
 

