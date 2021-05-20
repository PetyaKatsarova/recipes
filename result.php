<?php
include_once 'data.php';

if(isset($_POST['recipe_name'])){
    echo "<h2>" . ucfirst($recipe_name) . "<h2><br/>";
    echo "<p>" . ucfirst($ingridients) . "</p><br/>";
}else{
    echo 'no recipe_name connection...';
};

$db->close();
