<?php
    include "../assets/include/config.php";
    
    if(!empty($_POST["cat_id"])){
        $id = intval($_POST['cat_id']);
        $sql = "SELECT * FROM subcategory WHERE categoryid = $id";
        $query=mysqli_query($con, $sql);

?>
    <option value="">Select Subcategory</option>

<?php

    while($row=mysqli_fetch_array($query)){
        
?>

    <option value="<?php echo htmlentities($row['id']); ?>"><?php echo htmlentities($row['subcategory_name']); ?></option>

<?php
    }
}
?>