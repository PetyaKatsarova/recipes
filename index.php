<?php

// create connection to db
include_once 'dbconnection.php';
?>

<h3>App functionality</h3>
<ul>
   <li>On every page there is an option: add recipe with all the details to be filled in</li>
   <li>On every page is a delete recipe btn which has a safety prom: r u sure u want to delete? and on confirmation deletes all the recipe data</li>
   <li>For now have 3 tables: recipes, ingredients, quantity</li>
</ul>

<form method="post" action="result.php">
    <label for="recipe_name">Enter Recipe Name</label>
    <select name="recipe_name" id="recipe_name">
        <option value="creme caramel">Creme Caramel</option>
        <option value="pat thi">Pat Thi</option>
        <option value="musaka">Musaka</option>
        <option value="kuku">Kuku</option>
    </select>
    <!-- <input type="text" name="recipe_name" /> -->
    <label for="number_pple">For: </label>
    <input type="number" name="number_pple" value=2>
    <input type="submit" name="submit" />
</form>

<a href="add_recipe.php">Add New Recipe</a>



