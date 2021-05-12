<?php
include "db.php";

$sql2 ="SELECT b.Ten_loai, count(a.id) as sl,b.id FROM hang_hoas a left JOIN loai_hang_hoas b on a.id_loai=b.id group by id_loai";


$demsp = mysqli_query($conn,$sql2);

?>



<div class="col-sm-3">
	<div class="left-sidebar">
		<h2>Category</h2>
		<div class="panel-group category-products" id="accordian"><!--category-productsr-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordian" href="#sportswear">
							<span class="badge pull-right"><i class="fa fa-plus"></i></span>
							Loại hàng     
						</a>
					</h4>
				</div>
				<div id="sportswear" class="panel-collapse collapse">
					<?php foreach ($demsp as $dm ) {
						?>
						<div id="div1" class="panel-body"  style="padding:3px;margin-left:15px;">
							<ul>
								<li><a href="product-list.php?id_loai=<?php echo $dm['id'] ?> ">
									<?php echo $dm['Ten_loai'] ?>

									(<?php echo $dm['sl']; ?>)
								</a></li>

							</ul>
						</div>
					<?php } ?>
				</div>
			</div>



		</div><!--/category-products-->

		<div class="shipping text-center"><!--shipping-->
			<img src="../images/home/shipping.jpg" alt="" />
		</div><!--/shipping-->

		

	</div>
</div>