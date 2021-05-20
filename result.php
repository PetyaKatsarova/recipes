<?php
include_once 'index.php';
echo 'kuku from result :))<br/>';

if(isset($_POST['recipe_name'])){
    echo "<h2>" . ucfirst($recipe_name) . "<h2>";
}else{
    echo 'no recipe_name connection...';
};