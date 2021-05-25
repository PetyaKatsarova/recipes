<?php
include_once 'data.php';


$option = isset($_POST['recipe_name']) ? $_POST['recipe_name'] : false;
// make it safe!!!!!!!!!!
//    if ($option) {
//       echo htmlentities($_POST['recipe_name'], ENT_QUOTES, "UTF-8");
//    } else {
//      echo "task option is required";
//      exit; 
//    }

if(isset($_POST['recipe_name'])){
    echo "<h3>" . ucfirst($recipe_name) . " for " . $_POST['number_pple'] . "</h3>";
    echo $ingredients;
    echo "<p>" . ucfirst($instructions) . "</p>";
}else{
    echo 'no recipe_name connection...';
};

$db->close();
?>
 <a href="index.php">Return to main page </a>
