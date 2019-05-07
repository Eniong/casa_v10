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

<?php
include("connection.php");
if (isset($_POST['upload']))
{
    $file = rand(25000,2500000). "-" . $_FILES['file']['name'];
    $file_loc=  $_FILES['file']['tmp_name'];
    $file_size  = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder = "../admin/uploads/";
    $new_file_name  = strtolower($file);
    $final_file = str_replace(' ', '-', $new_file_name);
    if ($file_size > 250000000)  {
        echo "<script>alert('file size too big');
        window.location.href='index.php';</script>";
    }
    else if ($file_size == 0 ) {
    echo "<script>alert('select a file to upload');</script>";
}
    else if ($file_size <= 250000000) {
        move_uploaded_file($file_loc, $folder.$final_file);
        $new_size = $file_size / 2500;
        $query = "INSERT into uploads(file,type,size) VALUES ('$final_file' , '$file_type', '$new_size') " ;
        $result = mysqli_query($conn , $query) or die (mysqli_error($conn));
        if ($result) {
            echo "<script>alert('file uploaded successfully');
            window.location.href= 'index.php';</script>";
        }
    }
    else {
        echo "<script>alert('error');</script>";
    }
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
    <link href="assets/plugins/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />


        <!-- Plugins css-->
        <link href="assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" />
        <link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />


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
                                <li><a href="about.php" class="waves-effect waves-light bg-success">About</a></li>
                                <li><a href="gallery.php" class="waves-effect waves-light">Gallery</a></li>
                                
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
                                    	<li><a href="blueprint3d(new)/customization/index.html" target="_blank">Start Customization</a></li>
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
                <div class="content"  style="background-image:url(assets/images/gallery/376863.jpg);background-attachment: fixed; background-repeat: no-repeat; background-position:center;  background-size: cover;">
                    <div class="container">

                    	 <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title text-warning">Casa Mira Subdivision Deed of Restrictions</h4>
                                <ol class="breadcrumb">
                                    <li><a href="#">Casa Mira</a></li>
                                    <li class="active">About</li>
                                </ol>  
                            </div>
                            <div class="col-sm-6 pull-right">
               					<div class="panel bg-success">
               						<div class="panel-body text-white">
               							<div class="dropcap">T</div>he parcel of land subject of this contract shall be exclusively used for residential purpose and said use shall be duly annotated on the Trasfer Certificate/s of the Title to be issued in favor of the buyer.
               						</div>
               					</div>
               				</div>
                        </div>
               			
               			

               			<div class="row">
                            <div class="col-lg-12"> 
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                                            <span class="hidden-xs">Luse of Lot</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#profile-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                                            <span class="hidden-xs">Building and Architecture</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#messages-2" data-toggle="tab" aria-expanded="true"> 
                                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                                            <span class="hidden-xs">Seweragee Disposal or Excavations</span> 
                                        </a> 
                                    </li> 
                                    <li class="tab"> 
                                        <a href="#settings-2" data-toggle="tab" aria-expanded="false"> 
                                            <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                                            <span class="hidden-xs">Walls and Fences</span> 
                                        </a> 
                                    </li> 
                                </ul> 
                                <div class="tab-content"> 
                                    <div class="tab-pane active" id="home-2">
                                        <p><strong class="dropcap">1</strong> Lot/s shall not be subdivided. However, two lots may be cosolidated into one. Three or more lots may be consolidated and subdivided into lesser number of lots, provided that one of the resulting lots shall be smaller in area than the smallest lot before consolidation and provided that only one single family private residential house shall be erected in each resulting lot. In all cases, the consolidation subdivision plan shall be duly approved by <i class="text-custom">Casa Mira Realty and/or the Registry of Deeds</i></p>

                                        <p><strong class="dropcap">2</strong> Only one private singel-family residential house shall be erected on the lot. No accesorial/apartment/condominium/townhouse shall be constructed thereon. Any violation of this shall cause the Developer to dimantle or remove such structures and the cost of removing the said structure plus damages which in no case shall be lesser than <b class="text-purple">P50,000.00</b> shall be charged to the buyer's account. 
                                        </p>

                                        <p><strong class="dropcap">3</strong> The Buyer shall not in any way use his lot as an access and/or roadway to any adjacent lands outside the subdivision. Any violation of this nature will cause the cancellation of the contract between the Developer and the buyer and the immediate extrajudicial closure of said access road.

                                        </p> 

                                        <p><strong class="dropcap">4</strong> Commercial or advertising signs shall not be placed, constructed or erected on the lots. Nameplates are permitted so long as they not exceed <b class="text-danger">30x60</b> centimeters in size and placed only within the premises of the buyer.

                                        </p>

                                        <p><strong class="dropcap">5</strong> No cattle, pig, goat, sheep, horse, carabao or other beasts of burden shall be kept and/or maintained on the lot. Keeping of dogs, cats or other domisticated animals in non commercial quantities, may be allowed, provided it passed the Municipal health and safety ordinances or unless further restricted and subjected to regulations as the Developer/Association may adopt. For this purpose, the Owner can keep only one of each kind as a domestic pet. The number of such domestic pets at any one time shall not exceed two for household/Unit. Any violation of this rule shall be subject to a fine of <b class="text-danger">Php10,000.00</b> The maintenance of such domestic pets or other animals within the Unit and the manner of introducing them into the said Unit, in particular, and within the Subdivision, in general, shall be subject to the rules and regulations of the Association.

                                        </p>

                                        <p><strong class="dropcap">6.</strong> 

                                        </p>
                                         
                                        <p><strong class="dropcap">7.</strong> 

                                        </p>
                                         
                                        <p><strong class="dropcap">8.</strong> 

                                        </p>
                                         
                                        <p><strong class="dropcap">9.</strong> 

                                        </p>
                                        
                                        <p><strong class="dropcap">10.</strong> 

                                        </p>
                                         
                                        <p><strong class="dropcap">11.</strong> 

                                        </p>
                                         
                                        <p><strong class="dropcap">12.</strong> 

                                        </p>
                                         
                                        <p><strong class="dropcap">13.</strong> 

                                        </p>
                                          
                                        <p><strong class="dropcap">14.</strong> 

                                        </p>
                                         
                                        <p><strong class="dropcap">15.</strong> 

                                        </p>
                                          
                                        <p><strong class="dropcap">16.</strong> 

                                        </p>
                                                   
                                    </div> 
                                    <div class="tab-pane" id="profile-2">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p> 
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p> 
                                    </div> 
                                    <div class="tab-pane" id="messages-2">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p> 
                                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p> 
                                    </div> 
                                    <div class="tab-pane" id="settings-2">
                                        <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>  
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p> 
                                    </div> 
                                </div> 
                            </div> 
                    </div>

                        <!--CONTENT-->

                        <!--end-->

             
                            
                </div>
            </div>
              
    


                <footer class="footer">
                    © Casa Mira 2018. All rights reserved.
                </footer>
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

        <script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="assets/plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="assets/plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="assets/pages/autocomplete.js"></script>

        <script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>

        <script src="assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script type="text/javascript">
            // wait for images to load
            $(window).load(function() {
                $('.sp-wrap').smoothproducts();
            });
        </script>
        <script src="assets/plugins/owl.carousel/dist/owl.carousel.min.js"></script>
        
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                //owl carousel
                $("#owl-slider").owlCarousel({
                    loop:true,
                    nav:false,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoplayHoverPause:true,
                    animateOut: 'fadeOut',
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                });
                
                $("#owl-slider-2").owlCarousel({
                    loop:false,
                    nav:false,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoplayHoverPause:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                });
                
                //Owl-Multi
                $('#owl-multi').owlCarousel({
                    loop:true,
                    margin:20,
                    nav:false,
                    autoplay:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        480:{
                            items:2
                        },
                        700:{
                            items:4
                        },
                        1000:{
                            items:3
                        },
                        1100:{
                            items:5
                        }
                    }
                })
            });
            
        </script>

        <script type="text/javascript">
            $(window).load(function(){
                var $container = $('.masonry-container');
                $container.isotope({
                    filter: '*'
                });
            });
        </script>
</body>
</html>