<?php
    include_once 'add_recipe_logic.php';

?>
<!-- add recipe to the recipe table -->
<head>
    <link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<form method="post" >
    <h3>Add Recipe</h3>
    <label for="add_recipe">Name</label>
    <input type="text" name="add_recipe" id="add_recipe" />
    <textarea name="instructions" name="instructions" placeholder="Add instructions"></textarea>
    <input type="submit" value="Add New Recipe Name" name="submit_add_new_recipe" />
</form> 

<!-- add ingredients to the link table and recipe id for this recipe -->
<form method="post">
   <label for="recipe"> Recipe </label>
   <select name="recipe_for_link">
   <?php
   foreach($recipe_names as $name=>$id){
            ?>
                <option value="<?php echo $id ?>" ><?php echo $name ?></option>;
            <?php
    }
            ?>
   </select>

   <label for="link_ingredient"> Ingredient </label>
   <select name="ingredient_for_link">
   <?php
   foreach($ingrs as $id=>$name){
            ?>
                <option value="<?php echo $id ?>" ><?php echo $name ?></option>;
            <?php
    }
            ?>
   </select>
    <?php
    // asort($ingredients_array);
   ?>
 
    <label for="quantity">Quantity: </label>
    <input type="number" name="quantity" />
    <label for="measurement">Enter measurement:</label>
    <input type="text" name="measurement" />
    <input type="submit" value="Add Ingredients to the recipe" name="add_to_link" />
</form>

<!-- add ingredient to the ingredients list-->
<form method="post" action="">
    <label for="new_ingredient">Add Ingredient To The List</label>
    <input type="text" name="new_ingredient" />
    <input type="submit" value="Submit" />
</form>

<form method="post">
    <label for="delete_ingredient">Delete Ingredient From The List</label>
        <select name="delete_ingredient" id="delete_ingredient">
            <?php
            foreach($ingrs as $key=>$val){
            ?>
                <option value="<?php echo $key ?>" ><?php echo $val ?></option>;
            <?php
    }
            ?>

        </select> 
        <input type="submit" name="submitted_delete_ingredient" />
</form>
<a href="index.php">Return to main menu</a>








