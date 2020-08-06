<div class="pagination-holder">
	<div class="container">
		<div class="row">
			<?php
				include "includes/config.php";

				$sql = "SELECT * FROM products ";
				$result = mysqli_query($con, $sql) or die ("Query Failed");

				if(mysqli_num_rows($result) > 0){
					$total_record = mysqli_num_rows($result);
					
					$total_pages = ceil($total_record / $limit);

                        
            ?>
			<div class="col-md-4 col-sm-4">
				<?php
					if($page > 1){
						echo '<a href="index.php?page=shop&pageid='.($page - 1).'" class="prev"><i class="icon icon-pagination-left icon-prev"></i><span>Previous</span></a>';
					}
				?>
			</div><!-- /.col -->
			<div class="col-md-4 col-sm-4 text-center">
            <?php
                       
					echo "<ul class='pagination'>";
					for($i = 1; $i <= $total_pages; $i++){
						if ($i == $page) {
							$active = "active";
						} else {
							$active = "";
						}
						
						echo '<li class="'.$active.'"><a href="index.php?page=shop&pageid='. $i .'">'. $i .'</a></li>';
					}
					
				echo "</ul>";
			}
		  	?>
			</div><!-- /.col -->

			<div class="col-md-4 col-sm-4">
			<?php
				if($total_pages > $page){
					echo '<a href="index.php?page=shop&pageid='.($page + 1).'" class="next"><span>Next</span><i class="icon icon-pagination-right icon-next"></i></a>';
				}
			?>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.pagination-holder -->