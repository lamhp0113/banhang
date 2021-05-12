    <?php
    include "db.php";
    $sql = "SELECT *FROM loai_hang_hoas ";
    $result2 = mysqli_query($conn,$sql);
    ?>
    

    <header id="header"><!--header-->
      <div class="header_top"><!--header_top-->
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="contactinfo">
                <ul class="nav nav-pills">
                  <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                  <li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="social-icons pull-right">
                <ul class="nav navbar-nav">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!--/header_top-->

      <div class="header-middle"><!--header-middle-->
        <div class="container">
          <div class="row">
            <div class="col-md-4 clearfix">
           
              <div class="btn-group pull-right clearfix">


              </div>
            </div>
            <div class="col-md-5 clearfix">
              <div class="shop-menu clearfix pull-right">
                <ul class="nav navbar-nav">


                  <li><a href="cart-hienthi.php"><i class="fa fa-shopping-cart"></i> Giỏ hàng </a></li>


                </ul>
              </div>
            </div>
          </div>
        </div>
      </div><!--/header-middle-->

      <div class="header-bottom"><!--header-bottom-->
        <div class="container">
          <div class="row">
            <div class="col-sm-9">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <div class="mainmenu pull-left">
                <ul class="nav navbar-nav collapse navbar-collapse">
                  <li><a href="trangchu.php" class="active">Trang chủ</a></li>
                  <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                    <ul role="menu" class="sub-menu">
                      <?php foreach ($result2 as $dm ) {
                        ?>
                        <li><a href="product-list.php?id_loai=<?php echo $dm['id'] ?> ">
                          <?php echo $dm['Ten_loai'] ?>
                        </a></li>

                      <?php } ?>
                    </ul>
                  </li> 
                  



                </ul>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="search_box pull-right">
                <input type="text" placeholder="Search"/>
              </div>
            </div>
          </div>
        </div>
      </div><!--/header-bottom-->
    </header><!--/header-->
