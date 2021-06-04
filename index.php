<?php
include_once 'dbconnection.php';
?>

<head>
   <link href="styles.css" type="text/css" rel="stylesheet" />
</head>
<body>
    <h3>Shopping List</h3>
    <ul>
    <li>add recipe </li>
    <li>For now have 3 tables: recipes, ingredients, quantity</li>
    </ul>

    <form method="post" action="work_in_progress.php" name="selected_recipe"> 
        <label for="recipe_id">Enter Recipe Name</label> 
        <select name="recipe_id" id="recipe_id">
            <?php
            include 'display_recipe_names.php';
            ?>
        </select> 
        <label for="number_pple">For: </label>
        <input type="number" name="number_pple" value=2 />
        <input type="submit" name="submit" value="To the shopping list and instructions" />
    </form> 
    
    <script>
        function ConfirmDelete(){
            document.getElementById('delete_recipe_name').addEventListener('click', ()=>{
                var x = confirm("Are you sure you want to delete?");
                if (x)
                    return true;
                else
                    return false;
                });
        }
    </script>

    <form method="post" name="delete_recipe" action="">
        <label for="delete_recipe_name">Recipe</label>
        <!-- <input type="text" name="delete_recipe_name" id="delete_recipe_name" /> -->
        <select name="delete_recipe_name" id="delete_recipe_name">
            <?php
                include 'display_recipe_names.php';
            ?>
            <!-- <button Onclick="return ConfirmDelete();" type="submit" name="actiondelete" value="1"><img src="images/action_delete.png" alt="Delete"></button> -->
        </select> 
        <input type="submit" value="Delete" Onclick="return ConfirmDelete();" />
    </form>  
    <?php 
        include_once 'delete_recipe_from_db.php';
    ?>
    <a href="add_recipe.php">Add New Recipe</a>
</body>



