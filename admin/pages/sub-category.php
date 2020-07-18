<?php include "../parts/header.php" ?>
<div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-lg-9">
        
      </div>
      <div class="col-lg-3 mb-5">
        <a href="add-subcategory.php" class="btn btn-primary btn-block text-uppercase" >
          Add Subcategory
        </a>
      </div>
    </div>
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
            <?php
                    include "../assets/include/config.php";

                    
                    $sql = "SELECT subcategory.sub_id, subcategory.subcategory_name, 
                    subcategory.subcategory_desc, subcategory.creationDate,subcategory.subcategory_img,
                    category.category_name,subcategory.category FROM subcategory 
                    LEFT JOIN category ON subcategory.category = category.category_id
                    ORDER BY subcategory.sub_id DESC";
                    
                    $result = mysqli_query($con, $sql) or die ("Query Faild.");
                    if(mysqli_num_rows($result) > 0){

                    
                ?>
                <table class="table table-hover tm-table-small tm-product-table">
                    <thead>
                        <tr>
                            <th scope="col">IMAGE</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">SUBCATEGORY</th>
                            <th scope="col">SUBCATEGORY DESCRIPTION</th>
                            <th scope="col">CREATION DATE</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            while($row = mysqli_fetch_assoc($result)){

                        ?>
                        <tr>
                            <th><img src="../assets/img/<?php echo $row['subcategory_img']; ?>" alt="" height="70px" width="70px"></th>
                            <td class="tm-product-name"><?php echo $row['category_name']; ?></td>
                            <td class="tm-product-name"><?php echo $row['subcategory_name']; ?></td>
                            <td><?php echo $row['subcategory_desc']; ?></td>
                            <td><?php echo $row['creationDate']; ?></td>
                            <td>
                                <a href="edit-subcategory.php?id=<?php echo $row["sub_id"] ?>" class="tm-product-edit-link">
                                    <i class="far fa-edit tm-product-edit-icon"></i>
                                </a>
                            </td>
                            <td>
                                <a href="delete-subcategory.php?id=<?php echo $row["sub_id"] ?>" class="tm-product-delete-link">
                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
                <?php

                    }

                ?>
            </div>
            </div>
        </div>
    </div>
</div>
<?php include "../parts/footer.php" ?>