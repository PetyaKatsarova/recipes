<?php
include_once 'data.php';
include_once 'dbconnection.php';
// include_once 'index.php';
// echo 'hello from data!!';



// echo 'kuku from result :))<br/>';


if(isset($_POST['recipe_name'])){
    echo "<h2>" . ucfirst($recipe_name) . "<h2><br/>";
    echo "<p>" . ucfirst($recipe) . "</p><br/>";
}else{
    echo 'no recipe_name connection...';
};

$db->close();
