<?php
include_once 'dbconnection.php';

$ingredients = $db->query("SELECT ingredient_name FROM ingredients");
$ingredients_array = [];
while($row=$ingredients->fetch_assoc()){
    array_push($ingredients_array, $row['ingredient_name']);
}
//temporary fix: need to delete dublicates in table ingredients
$no_dublicated_ingredients = [];
foreach($ingredients_array as $ing){
    if (!in_array( $ing,$no_dublicated_ingredients)){
        array_push($no_dublicated_ingredients, $ing);
    }
}

sort($no_dublicated_ingredients);
?>
   <ul>
<?php
foreach($no_dublicated_ingredients as $ingredient){
    ?>
    <li class="ingredient"><?php echo $ingredient ?> 

        <script>
            let checkbox = document.createElement('input');
            checkbox.type = "checkbox";
            let parentEl = document.querySelector('li');
            parentEl.appendChild(checkbox);
        </script>
    </li>
<?php
}


// add ingredient

$new_ingredient = isset($_POST['new_ingredient']) ? $_POST['new_ingredient'] : false;

if(!empty($new_ingredient)){
    if (!in_array($new_ingredient, $no_dublicated_ingredients)) {
        $stmt = $db->query("INSERT INTO ingredients (ingredient_name)
                       VALUES ('" . $new_ingredient . "')");
    }else{
        echo "The ingredient exist in the databes, select it from the list above.";
    }
}else{
    echo 'Enter ingredient';
}

if($stmt === TRUE){
    echo "New record created successfully";
} else {
    // echo "Error: " . $new_ingredient . "<br>" . $db->error;
    
}
$db->close();









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