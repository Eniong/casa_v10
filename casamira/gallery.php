<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
	<link rel="shortcut icon" href="assets/images/casamira_1.png">

	<title>Casa Mira Realty</title>
    <link href="assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="assets/plugins/magnific-popup/css/magnific-popup.css"/>

	<!--Morris Chart CSS -->
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>

</head>
<body class="fixed-left">
<?php if (isset($_SESSION['username'])) : ?>
	<!--Begin page -->
	<div id="wrapper">
		<!--topbar-->
		<div class="topbar">
			<!--company logo-->
			<div class="topbar-left"  style="background-color: #F0E68C">
				<div class="text-center">
					<a href="index.html" class="logo">
            		<i class="icon-c-logo"><img src="assets/images/casamira_1.png" height="59" class="md md-album"/></i>
            		<span><img src="assets/images/casamira_2.png" height="70"></span>
          			</a>
				</div>
			</div>
			<!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation"  style="background-color: #2F4F4F">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav hidden-xs">
                                <li><a href="index.php" class="waves-effect waves-light">Home</a></li>
                                <li><a href="about.php" class="waves-effect waves-light">About</a></li>
                                <li><a href="#" class="waves-effect waves-light bg-success">Gallery</a></li>
                                
                            </ul>

                            


                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true"><img src="assets/images/users/use.png" alt="user-img" class="img-circle"> </a>
                                    <ul class="dropdown-menu">
                                       
                                        <li><a href="index.php?logout='1'"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
		</div>

			<!--Top bar end-->

				
				<!-- ========== Left Sidebar Start ========== -->
				<div class="left side-menu" style="background-color: #E6E6FA">
					<div class="sidebar-inner slimscrollleft">
						<div class="user-details">
							<div class="pull-left">
								<img src="assets/images/users/use.png" alt="" class="thumb-md img-circle">
							</div>
							<div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?logout='1'"><i class="md md-settings-power text-danger"></i> Logout</a></li>
                                </ul>
                            </div>
                            <p class="text-muted m-0">User</p>

							</div>			
						</div>

						<!--- Divider -->
						<div id="sidebar-menu">
							<ul>

                        		<li class="text-muted menu-title">Menu</li>

                            	<li class="has_sub">
                                		<a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Customization </span></span> <span class="menu-arrow"></span></a>
                                	<ul class="list-unstyled">
                                		<li><a href="introduction.html">Introduction</a></li>
                                    	<li><a href="tutorial.html">Tutorial</a></li>
                                    	<li><a href="blueprint3d(new)/customization/index.html" target="blank">Start Customization</a></li>
                        			</ul>
                            	</li>


                             	<li class="has_sub">
                                	<a href="javascript:void(0);" class="waves-effect"><i class="ti-location-pin"></i><span> Map </span> <span class="menu-arrow"></span></a>
                                		<ul class="list-unstyled">
                                    		<li><a href="map_1.php"> Phase 1</a></li>
                                    		<li><a href="#"> Phase 2</a></li>
                                    		<li><a href="#"> Phase 3</a></li>
                                    
                                		</ul>
                            	</li>
                        	</ul>

						</div>

				</div>
		<?php if (isset($_SESSION['success'])) : ?>
                    <div class="error success">
                      <h3>
                        <?php 
                           echo $_SESSION['success']; 
                           unset($_SESSION['success']);
                        ?>
                       </h3>
                    </div>
                  <?php endif ?>

	</div>
	<!--End wrapper-->
<?php endif ?>


    <div class="content-page">
        <div class="content" style="background-image:url(assets/images/gallery/376863.jpg);background-attachment: fixed; background-repeat: no-repeat; background-position:center;  background-size: cover;">
            <div class="container">
                



                            <div class="row port">
                            <div class="m-b-15">
                              
                                <div class="col-sm-6 col-lg-4 col-md-4 mobiles">

                                    <div class="product-list-box thumb">
                                        <a href="assets/images/gallery/catalog/adelfa.jpg" class="image-popup" title="Adelfa">
                                            <img src="assets/images/gallery/catalog/adelfa.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>

                                        <div class="price-tag bg-danger text-white">
                                            2.4M
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">Adelfa</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> FA: 65 sq m</span></h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="assets/images/gallery/catalog/luna.jpg" class="image-popup" title="Luna">
                                            <img src="assets/images/gallery/catalog/luna.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>

                                        <div class="price-tag bg-danger text-white">
                                            2.2M
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">Luna</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> FA: 63 sq m</span></h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="assets/images/gallery/catalog/mirasol.jpg" class="image-popup" title="Mirasol">
                                            <img src="assets/images/gallery/catalog/mirasol.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>

                                        <div class="price-tag bg-danger text-white">
                                            3.3M
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">Mirasol</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> FA: 78 sq m</span></h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="assets/images/gallery/catalog/magnolia.jpg" class="image-popup" title="Magnolia">
                                            <img src="assets/images/gallery/catalog/magnolia.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>

                                        <div class="price-tag bg-danger text-white">
                                            3.2M
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">Magnolia</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> FA: 78 sq m</span></h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="assets/images/gallery/catalog/verbana.jpg" class="image-popup" title="Verbana">
                                            <img src="assets/images/gallery/catalog/verbana.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>

                                        <div class="price-tag bg-danger text-white">
                                            2.0M
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">Verbana</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> FA: 56 sq m</span></h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb">
                                        <a href="assets/images/gallery/catalog/peonia.jpg" class="image-popup" title="Peonia">
                                            <img src="assets/images/gallery/catalog/peonia.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>

                                        <div class="price-tag bg-danger text-white">
                                            2.3M
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-t-0"><a href="" class="text-dark">Peonia</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> FA: 60 sq m</span></h5>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb bg-inverse">
                                        <a href="assets/images/gallery/catalog/armira_duplex.jpg" class="image-popup" title="Armira Duplex">
                                            <img src="assets/images/gallery/catalog/armira_duplex.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>
                                        <div class="price-tag bg-danger text-white">
                                            1.2M
                                        </div>
                                        <div class="detail bg-inverse">
                                            <h4 class="m-t-0"><a href="" class="text-white">Armira Duplex</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> Typical Lot Area: 64 sq m</span></h5>
                                            <h5 class="m-0"> <span class="text-muted"> Building Area: 49 sq m</span></h5>
                                       </div>
                                       <div class="detail bg-inverse">
                                            <h4 class="m-t-0 text-white"><b>Features</b></h4>
                                            <h5 class="m-0"> <span class="text-muted"> Living and Dining Areas, Kitchen, Toilet and Bath, Provision for 3 Bedrooms, Carport and Service Area.</span></h5>
                                            <br>
                                            <h6 class="m-0"> <span class="text-muted"> <b>BUILDING TYPE: </b>Two Storey, Duplex</span></h6>
                                            <h6 class="m-0"> <span class="text-muted"> <b>PACKAGE:</b> Bare</span></h6>
                                            <h6 class="m-0"> <span class="text-muted"> <b>CONSTRUCTION SYSTEM:</b> Traditional</span></h6>
                                        </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb bg-inverse">
                                        <a href="assets/images/gallery/catalog/leonora.jpg" class="image-popup" title="Leonora">
                                            <img src="assets/images/gallery/catalog/leonora.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>
                                        <div class="price-tag bg-danger text-white">
                                            972K
                                        </div>
                                        <div class="detail bg-inverse">
                                            <h4 class="m-t-0"><a href="" class="text-white">Leonora</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> Typical Lot Area: 36 sq m</span></h5>
                                            <h5 class="m-0"> <span class="text-muted"> Building Area: 42 sq m</span></h5>
                                       </div>
                                       <div class="detail bg-inverse">
                                            <h4 class="m-t-0 text-white"><b>Features</b></h4>
                                            <h5 class="m-0"> <span class="text-muted"> Living and Dining Areas, Kitchen, Toilet and Bath, Provision for 2 Bedrooms and Service Area.</span></h5>
                                            <br>
                                            <h6 class="m-0"> <span class="text-muted"> <b>BUILDING TYPE: </b>Two Storey, Town House</span></h6>
                                            <h6 class="m-0"> <span class="text-muted"> <b>PACKAGE:</b> Bare</span></h6>
                                            <h6 class="m-0"> <span class="text-muted"> <b>CONSTRUCTION SYSTEM:</b> Traditional</span></h6>
                                        </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb bg-inverse">
                                        <a href="assets/images/gallery/catalog/melchora.jpg" class="image-popup" title="Melchora">
                                            <img src="assets/images/gallery/catalog/melchora.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>
                                        <div class="price-tag bg-danger text-white">
                                            1.1M
                                        </div>
                                        <div class="detail bg-inverse">
                                            <h4 class="m-t-0"><a href="" class="text-white">Melchora</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> Typical Lot Area: 42 sq m</span></h5>
                                            <h5 class="m-0"> <span class="text-muted"> Building Area: 49 sq m</span></h5>
                                       </div>
                                       <div class="detail bg-inverse">
                                            <h4 class="m-t-0 text-white"><b>Features</b></h4>
                                            <h5 class="m-0"> <span class="text-muted"> Living and Dining Areas, Kitchen, Toilet and Bath, Provision for 1 Bedroom, Service Area and Carport.</span></h5>
                                            <br>
                                            <h6 class="m-0"> <span class="text-muted"> <b>BUILDING TYPE: </b>Two Storey, Town House</span></h6>
                                            <h6 class="m-0"> <span class="text-muted"> <b>PACKAGE:</b> Bare</span></h6>
                                            <h6 class="m-0"> <span class="text-muted"> <b>CONSTRUCTION SYSTEM:</b> Traditional</span></h6>
                                        </div>

                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-lg-4 col-md-4 mobiles">
                                    <div class="product-list-box thumb bg-inverse">
                                        <a href="assets/images/gallery/catalog/gabriela.jpg" class="image-popup" title="Gabriela">
                                            <img src="assets/images/gallery/catalog/gabriela.jpg"  class="thumb-img" alt="work-thumbnail">

                                        </a>
                                        <div class="price-tag bg-danger text-white">
                                            488K
                                        </div>
                                        <div class="detail bg-inverse">
                                            <h4 class="m-t-0"><a href="" class="text-white">Gabriela</a> </h4>
                                            <h5 class="m-0"> <span class="text-muted"> Typical Lot Area: 36 sq m</span></h5>
                                            <h5 class="m-0"> <span class="text-muted"> Building Area: 22 sq m</span></h5>
                                       </div>
                                       <div class="detail bg-inverse">
                                            <h4 class="m-t-0 text-white"><b>Features</b></h4>
                                            <h5 class="m-0"> <span class="text-muted"> Living and Dining Areas, Kitchen, Toilet and Bath, Provision for 1 Bedroom and Service Area.</span></h5>
                                            <br>
                                            <h6 class="m-0"> <span class="text-muted"> <b>BUILDING TYPE: </b>Two Storey, Duplex</span></h6>
                                            <h6 class="m-0"> <span class="text-muted"> <b>PACKAGE:</b> Bare</span></h6>
                                            <h6 class="m-0"> <span class="text-muted"> <b>CONSTRUCTION SYSTEM:</b> Traditional</span></h6>
                                        </div>

                                        </div>
                                    </div>

                            </div>
                        </div>
                        
                            <!-- <div class="row">

                               
                                <div class="col-sm-3">
                                <div class="sp-loading"><img src="assets/images/sp-loading.gif" alt=""><br>LOADING IMAGES
                                </div>

                                <div class="sp-wrap">
                                    <a href="assets/images/gallery/catalog/armira_duplex.jpg"><img src="assets/images/gallery/catalog/armira_duplex.jpg" alt=""></a>
                                </div>
                                </div>

                                <div class="col-sm-3">
                                <div class="sp-loading"><img src="assets/images/sp-loading.gif" alt=""><br>LOADING IMAGES
                                </div>

                                <div class="sp-wrap">
                                    <a href="assets/images/gallery/catalog/gabriela.jpg"><img src="assets/images/gallery/catalog/gabriela.jpg" alt=""></a>
                                </div>
                                </div>

                                <div class="col-sm-3">
                                <div class="sp-loading"><img src="assets/images/sp-loading.gif" alt=""><br>LOADING IMAGES
                                </div>

                                <div class="sp-wrap">
                                    <a href="assets/images/gallery/catalog/leonora.jpg"><img src="assets/images/gallery/catalog/leonora.jpg" alt=""></a>
                                </div>
                                </div>

                                <div class="col-sm-3">
                                <div class="sp-loading"><img src="assets/images/sp-loading.gif" alt=""><br>LOADING IMAGES
                                </div>

                                <div class="sp-wrap">
                                    <a href="assets/images/gallery/catalog/melchora.jpg"><img src="assets/images/gallery/catalog/melchora.jpg" alt=""></a>
                                </div>
                                </div> -->
                               

                                
                            
                   </div>
                </div>
            </div>
        </div>
    </div>


		<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript" src="assets/plugins/isotope/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>

        <script type="text/javascript">
           

              $(window).load(function(){
                var $container = $('.portfolioContainer');
                $container.isotope({
                    filter: '*',
                    animationOptions: {
                        duration: 750,
                        easing: 'linear',
                        queue: false
                    }
                });

                $('.portfolioFilter a').click(function(){
                    $('.portfolioFilter .current').removeClass('current');
                    $(this).addClass('current');

                    var selector = $(this).attr('data-filter');
                    $container.isotope({
                        filter: selector,
                        animationOptions: {
                            duration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    });
                    return false;
                }); 
            });
            
            $(document).ready(function() {
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>
</body>
</html>