<?php

// create connection to db
 include_once 'dbconnection.php';
?>
<form method="post" action="result.php">
    <label for="recipe_name">Enter the recipe name</label>
    <input type="text" name="recipe_name">
    <input type="submit" name="submit" />
</form>



