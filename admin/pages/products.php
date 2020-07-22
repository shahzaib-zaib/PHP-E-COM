<?php include "../parts/header.php" ?>
<div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-lg-9">
        
      </div>
      <div class="col-lg-3 mb-5">
        <a href="add-product.php" class="btn btn-primary btn-block text-uppercase" >
            ADD PRODUCT
        </a>
      </div>
    </div>
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
            <?php

                include "../assets/include/config.php";
                
                $sql = "SELECT products.*,category.category_name,subcategory.subcategory_name 
                from products join category on category.category_id = products.category join 
                subcategory on subcategory.sub_id = products.sub_category
                ORDER BY product_id DESC";

                $result = mysqli_query($con, $sql) or die ("Query Faild.");

                if(mysqli_num_rows($result) > 0){

            ?>
                <table class="table table-hover tm-table-small tm-product-table">
                    <thead>
                        <tr>
                            <th scope="col">PRODUCT IMAGE</th>
                            <th scope="col">PRODUCT NAME</th>
                            <th scope="col">CATEGORY</th>
                            <th scope="col">SUB CATEGORY</th>
                            <th scope="col">BRAND</th>
                            <th scope="col">IN STOCK</th>
                            <th scope="col">POSTING DATE</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 

                            while($row = mysqli_fetch_assoc($result)){

                        ?>
                        <tr>
                            <th><img src="../assets/img/<?php echo $row['product_image1']; ?>" alt="" height="70px" width="auto"></th>
                            <td class="tm-product-name"><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['subcategory_name']; ?></td>
                            <td><?php echo $row['product_company']; ?></td>
                            <td><?php echo $row['product_stock']; ?></td>
                            <td><?php echo $row['posting_date']; ?></td>
                            <td>
                                <a href="edit-product.php?pid=<?php echo $row["product_id"] ?>" class="tm-product-edit-link">
                                    <i class="far fa-edit tm-product-edit-icon"></i>
                                </a>
                            </td>
                            <td>
                                <a href="delete-product.php?pid=<?php echo $row["product_id"] ?>" class="tm-product-delete-link">
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