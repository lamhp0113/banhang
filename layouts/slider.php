<?php 
require 'db.php';

$sql="SELECT * FROM tintuc";
$tintuc= mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($tintuc);
?>

<?php  ?>



<section id="slider"><!--slider-->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
           <?php   for ($i=0; $i < $rowcount ; $i++) {
            $tt = mysqli_fetch_array($tintuc);
             if ($i==0) {
               echo "<div class='item active'>";
             }else{
              echo("<div class='item'>");
            }
            ?>
            <div class="col-sm-6">
              <h1><span>E</span>-SHOPPER</h1>
              <h2><?php echo($tt['tieude']) ?>
              </h2>
              <p><?php echo($tt['mota']) ?> </p>
            </div>
            <div class="col-sm-6">
              <a href="chitiettintuc.php?id=<?php echo $tt['id']; ?>">
              <img src="../<?php echo($tt['hinhanh']) ?>" style="width:450px;height:400px;"  class="girl img-responsive" alt="" />
            </a>
            </div>
          </div>


        <?php } ?>



      </div>

      <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
        <i class="fa fa-angle-left"></i>
      </a>
      <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
        <i class="fa fa-angle-right"></i>
      </a>
    </div>

  </div>
</div>

  </section><!--/slider-->