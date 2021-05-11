<?php
include "db.php";
$sql = "SELECT *FROM loai_hang_hoas ";
$result2 = mysqli_query($conn,$sql);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("a").click(function(){
    $("#div1").load("product-list.php.php");
  });
});
</script>

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
					<?php foreach ($result2 as $dm ) {
						?>
						<div id="div1" class="panel-body"  style="padding:3px;margin-left:15px;">
							<ul>
								<li><a href="product-list.php?id_loai=<?php echo $dm['id'] ?> ">
									<?php echo $dm['Ten_loai'] ?>
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