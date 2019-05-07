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

<?php

    include 'db.php';

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
                                <li><a href="#" class="waves-effect waves-light bg-success">Home</a></li>
                                <li><a href="about.php" class="waves-effect waves-light">About</a></li>
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
                <div class="col-sm-8">
                    <div style="opacity: 0.9" class="card-box bg-inverse">
                    
                        <h2 class="text-white text-center">Low down payment</h2>
                        <h2 class="text-white text-center">Affordable amorization</h2>
                   
                            <h1 class="text-center text-white">for as low as <b class="text-warning">P12,000</b> per month</h1>
                 
                   </div>
                 </div>             
           
                    <div class="col-sm-4 pull-right">
                       <div class="panel panel-success">
                           <div class="panel-heading">
                               <h3 class="panel-title text-white">Contact Information</h3>
                           </div>
                           <div class="panel-body">
                               <p>Lots and micro houses located at <b>San Jose, Gayaman, Binmaley Pangasinan</b></p>
                               <p>
                               <i class="glyphicon glyphicon-earphone"></i> <label>Contact numbers</label> <br>
                                <b>0977 684 2613</b> and <b>0923 612 7011</b>
                               </p>

                           </div>
                       </div>
                    </div>
                   
                </div>

                <div class="row">
                    <div class="col-sm-6">
                    
                        <div class="card-box bg-inverse text-white">
                            <div class="card-box bg-inverse">
                            <?php
                            
                                $query = "SELECT * FROM chat_info ORDER BY id DESC";
                                $query_run   = mysqli_query($con,$query);
            //                    $query_run =$con -> query($query);
                            
            //                    $query_array = mysql_fetch_assoc($query_run)
                                
                                while($query_row = mysqli_fetch_assoc($query_run)):?>
                            
                            <div id ="chat_data">
                            </div>
                            <span class="text-warning"><strong><?php echo $query_row['name'].' : '; ?></strong></span>
                            <span style="font-family:cursive;"><?php echo $query_row['msg']; ?></span>
                            <span style = "font-family:cursive;float:right;"><?php echo formatDate($query_row['date']); ?></span>
            <!--
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
            -->
                            
                            <?php endwhile; ?>
                    </div>

                            <form method = "post" action="index.php" class="form-horizontal">

                                <div class="form-group">
                                    <div hidden="" class="col-sm-2">
                                       <input type="text" name ="chatname" class="form-control" readonly="" value="<?php echo $_SESSION['username']; ?>">
                                    </div>
                                    <div class = "col-sm-12">
                                        <textarea name = "message" class="form-control" rows="2" id="comment"></textarea>
                                     </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-2 pull-right">
                                      <button type="submit" name = "submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>

                            </form>
                        </div>
        
                    </div>


 
                            
                             <?php
                                    if(isset($_POST['chatname']) && isset($_POST['message']))
                                    {
                                        $name = $_POST['chatname'];
                //                        echo $name;
                                        $message = $_POST['message'];
                //                        echo $message;
                                        $query_1 = "INSERT INTO chat_info (name,msg) VALUES ('$name','$message')";
                                        $query_run = mysqli_query($con,$query_1);
                                
                                        if($query_run)
                                        {
                                            echo "<audio src = 'sound/134332-facebook-chat-sound.mp3' hidden = 'true' autoplay = 'true' /></audio>";
                                        }

                                   }
                                ?>
    

                    <div class="col-sm-6">
                        <div class="card-box bg-inverse">
                            <p>
                                
                            </p>

                            <form action="" method="POST" enctype="multipart/form-data">
                            
                            <h3 class="text-custom text-center">
                                 Rename the file by your  <strong>username</strong> before you upload it. 
                            </h3>
        
                                
                            </p>
                            <p class="text-center text-warning">
                                <strong>
                                    "eg. JuanDelaCruz.custom"
                                </strong>
                            </p>

                            <input class="filestyle" type = "file" name="file" data-buttonbefore="true" >
                             <br>
                           
                            <input class="btn btn-custom btn-success" type="submit" name="upload" value="UPLOAD">
                            </form>


                        </div>
                    </div>
                </div>

                <div class="row">
                    

                    

                    

                </div>
               

                <div class="row">
                            <div class="col-sm-12 ">
                                <div class="panel panel-custom panel-border">
                                    
                                    <div class="panel-heading">
                                        <h4 class="panel-title">Casa Mira Realty Homes</h4>
                                    </div>
                                    <div class="panel-body">

                                        <div class="owl-carousel owl-theme" id="owl-multi">
                                        
                                        <div class="item">
                                            <img src="assets/images/gallery/sample_4.jpg" />
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/gallery/sample_5.jpg" />
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/gallery/sample_6.jpg" />
                                        </div>
                                        <div class="item">
                                            <img src="assets/images/gallery/sample_7.jpg" />
                                        </div>
                                        
                                         <div class="item">
                                            <img src="assets/images/gallery/sample_10.jpg" />
                                        </div>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>   
                        </div>

                        <!--CONTENT-->

                        <!--end-->

             
                            </div>
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