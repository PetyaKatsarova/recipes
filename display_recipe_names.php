<?php
include_once 'dbconnnection.php';

$stmt = $db->query("SELECT recipe_name, recipe_id FROM recipes");
if($stmt->num_rows > 0){
    while($row=$stmt->fetch_assoc()){
?>
    <option value="<?php echo $row['recipe_id'] ?>" ><?php echo $row['recipe_name'] ?></option>";
<?php
    }
}
?>
