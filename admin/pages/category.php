<div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-lg-9">
        
      </div>
      <div class="col-lg-3 mb-5">
        <a href="index.php?page=add-category" class="btn btn-primary btn-block text-uppercase" >
          Add Category
        </a>
      </div>
    </div>
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
            <?php

                include "assets/include/config.php";

                $limit = 3;


                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else{
                    $page = 1;
                }
                $offset = ($page - 1) * $limit;

                $sql = "SELECT * FROM category ORDER BY category_id DESC LIMIT {$offset}, {$limit}";
                $result = mysqli_query($con, $sql) or die ("Query Faild.");

                if(mysqli_num_rows($result) > 0){

            ?>
                <table class="table table-hover tm-table-small tm-product-table">
                    <thead>
                        <tr>
                            <th scope="col">CATEGORY IMAGE</th>
                            <th scope="col">CATEGORY NAME</th>
                            <th scope="col">CATEGORY DESCRIPTION</th>
                            <th scope="col">PRODUCTS</th>
                            <th scope="col">CREATION DATE</th>
                            <th scope="col">EDIT</th>
                            <th scope="col">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><img src="assets/img" alt="" height="100px" width="100px"></th>
                            <td class="tm-product-name">Lorem Ipsum Product 1</td>
                            <td>Lorem Ipsum Product 1</td>
                            <td>1,450</td>
                            <td>28 March 2019</td>
                            <td>
                                <a href="#" class="tm-product-edit-link">
                                    <i class="far fa-edit tm-product-edit-icon"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="tm-product-delete-link">
                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</div>