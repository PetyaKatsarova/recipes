<?php
    include_once 'add_recipe_logic.php';
?>
<form method="post" >
    <h3>Add Recipe</h3>
    <label for="add_recipe">Name</label>
    <input type="text" name="add_recipe" id="add_recipe" />
<?php
    sort($ingredients_array);
 ?>
    <ul>
<?php
   foreach($ingredients_array as $ingredient){
?>
    <li class="ingredient"><?php echo $ingredient ?></li>
<?php
   }  
?>

<script>
    let ingredients = document.querySelectorAll('.ingredient');

    for(let i=0; i<ingredients.length; i++){
        let checkbox = document.createElement("input");
        checkbox.type = 'checkbox';
        ingredients[i].appendChild(checkbox);
    }
</script>

    </ul>
    <textarea name="directions" name="instructions" placeholder="Add instructions"></textarea>
    <input type="submit" value="Add the Recipe" name="submit_add_new_recipe" />
</form>


<form method="post" action="">
    <h3>Add Ingredient</h3> 
    <label for="new_ingredient">Add Ingredient To The List</label>
    <input type="text" name="new_ingredient" />
    <input type="submit" value="Submit" />
</form>

<form method="post">
    <label for="delete_ingredient">Delete Ingredient From The List</label>
        <select name="delete_ingredient" id="delete_ingredient">
            <?php
            $stmt = $db->query("SELECT ingredient_name, ingredient_id FROM ingredients");
            $ingrs = [];
            if($stmt->num_rows > 0){
                while($row=$stmt->fetch_assoc()){
                    $ingrs[$row['ingredient_name']]=$row['ingredient_id'];
                }
            }
            ksort($ingrs);
            foreach($ingrs as $key=>$val){
            ?>
                <option value="<?php echo $val ?>" ><?php echo $key ?></option>;
            <?php
    }
            ?>

        </select> 
        <input type="submit" name="submitted_delete_ingredient" />
</form>
<?php 
//add new recipe name and instructions to recipes
$statement = $db->query("INSERT INTO recipes('recipe_name', 'instructions')");







