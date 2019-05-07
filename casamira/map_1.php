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

    
    <link rel="stylesheet" type="text/css" href="scroll.css">
    <link href="assets/plugins/smoothproducts/css/smoothproducts.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" type="text/css" href="map_1.css">

	<!--Morris Chart CSS -->
	<link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <style type="text/css">
      .table-wrapper-scroll-y {
        display: block;
        max-height: 500px;
        overflow-y: auto;
        -ms-overflow-style: -ms-autohiding-scrollbar;
        }
    </style>
    <script src="assets/js/modernizr.min.js"></script>

</head>
<body class="fixed-left">
<?php

    include('dbconnect.php');

    $query = "SELECT * FROM tblots ORDER BY lot_no ASC";

    $result = mysqli_query($conn, $query);

   
  ?>

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
                                    	<li><a href="blueprint3d(new)/customization/index.html">Start Customization</a></li>
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
                  

                     <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <ol class="breadcrumb">
                                    <li><a href="index.php">Casa Mira</a></li>
                                    <li><a href="#">Map</a></li>
                                    <li class="text-white">Phase 1</li>
                                </ol>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-lg-7">
                          <div class="panel" style="background-color: #F8F8FF">

                            <div class="panel-heading bg-purple">
                                        <h4 class="panel-title text-white">Phase 1 Gayaman</h4>
                            </div>

                             <svg width="500px" height="350px" viewBox="0 0 1000 792" style="width: 100%; height: auto;">
                              
                              <g id="A"> 
                                <a xlink:title="10165-A" xlink:href="">
                                <polygon fill="#E6E7E8" points="175.956,729.752 119.658,767.94 9.382,631.762 67.459,593.336   "/>
                                <g>
                                  <path fill="#8DC63F" d="M119,766c0-14-5-26.5-3-40.5c2-17.5,6.599-33.49,19.599-46.49l40.356,50.742L119,766z"/>
                                </g>
                                <g>
                                  <path fill="#8DC63F" d="M9.382,631.762l58.078-38.426l40.356,50.742C79.315,663.078,39.5,652.5,13,632.5"/>
                                </g>
                              </g>

                              <g id="B">
                                <a xlink:title="10165-B">

                                <polygon id="10165-B" fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="145.126,618.85 107.815,644.078 67.459,593.336 
                                  104.771,568.109"/>
                                <text transform="matrix(1 0 0 1 97.3335 603.333)" font-family="'MyriadPro-Regular'" font-size="21">B</text>

                                </a>
                    
                              </g>
                              <g id="C">
                                <a xlink:title="10165-C">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="182.438,593.623 145.126,618.85 104.771,568.109 
                                  142.082,542.881"/>
                                <text transform="matrix(1 0 0 1 136 580.333)" font-family="'MyriadPro-Regular'" font-size="21">C</text>
                              </g>

                              <g id="D">
                                <a xlink:title="10165-D">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="219.749,568.395 182.437,593.623 142.081,542.881 
                                  179.393,517.652   "/>
                                <text transform="matrix(1 0 0 1 173 558.667)" font-family="'MyriadPro-Regular'" font-size="21">D</text>

                              </g>
                              <g id="E">
                                <a xlink:title="10165-E">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="257.06,543.168 219.749,568.395 179.393,517.652 
                                  216.703,492.426   "/>
                                <text transform="matrix(1 0 0 1 213.3335 531.667)" font-family="'MyriadPro-Regular'" font-size="21">E</text>
                              </g>
                              <g id="F">
                                <a xlink:title="10165-F">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="294.371,517.939 257.06,543.168 216.703,492.426 
                                  254.014,467.199   "/>
                                <text transform="matrix(1 0 0 1 251 509.333)" font-family="'MyriadPro-Regular'" font-size="21">F</text>
                              </g>
                              <g id="G">
                                <a xlink:title="10165-G">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="331.682,492.713 294.37,517.939 254.014,467.199 
                                  291.325,441.972   "/>
                                <text transform="matrix(1 0 0 1 285.667 483)" font-family="'MyriadPro-Regular'" font-size="21">G</text>
                              </g>
                              <g id="H">
                                <a xlink:title="10165-H">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="368.992,467.484 331.681,492.713 291.325,441.972 
                                  328.636,416.744   "/>
                                <text transform="matrix(1 0 0 1 322 459.667)" font-family="'MyriadPro-Regular'" font-size="21">H</text>
                              </g>
                              <g id="I">
                                <a xlink:title="10165-I">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="406.304,442.259 368.992,467.484 328.635,416.744 
                                  365.947,391.518   "/>
                                <text transform="matrix(1 0 0 1 361.3335 434)" font-family="'MyriadPro-Regular'" font-size="21">I</text>
                              </g>
                              <g id="J">
                                <a xlink:title="10165-J">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="443.614,417.03 406.303,442.26 365.946,391.518 
                                  403.257,366.29  "/>
                                <text transform="matrix(1 0 0 1 398.667 406)" font-family="'MyriadPro-Regular'" font-size="21">J</text>
                              </g>
                              <g id="K">
                                <a xlink:title="10165-K">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="480.926,391.806 443.612,417.033 403.256,366.291 
                                  440.568,341.063   "/>
                                <text transform="matrix(1 0 0 1 438.0908 383.0483)" font-family="'MyriadPro-Regular'" font-size="21">K</text>
                              </g>
                              <g id="L">
                                <a xlink:title="10165-L">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="213.267,704.523 175.956,729.752 135.599,679.01 
                                  172.911,653.783   "/>
                                <text transform="matrix(1 0 0 1 168 695)" font-family="'MyriadPro-Regular'" font-size="21">L</text>
                              </g>
                              <g id="M">
                                <a xlink:title="10165-M">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="250.578,679.297 213.267,704.525 172.911,653.783 
                                  210.221,628.555   "/>
                                <text transform="matrix(1 0 0 1 205.3335 671.333)" font-family="'MyriadPro-Regular'" font-size="21">M</text>
                              </g>
                              <g id="N">
                                <a xlink:title="10165-N">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="287.888,654.068 250.577,679.299 210.221,628.555 
                                  247.532,603.328   "/>
                                  <text transform="matrix(1 0 0 1 242.667 646)" font-family="'MyriadPro-Regular'" font-size="21">N</text>
                              </g>
                              <g id="O">
                                <a xlink:title="10165-O">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="325.201,628.844 287.889,654.07 247.532,603.33 
                                  284.843,578.1   "/>
                                  <text transform="matrix(1 0 0 1 280 622)" font-family="'MyriadPro-Regular'" font-size="21">O</text>
                              </g>
                              <g id="P">
                                <a xlink:title="10165-P">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="362.51,603.613 325.2,628.844 284.843,578.1 
                                  322.154,552.873   "/>
                                   <text transform="matrix(1 0 0 1 321 596.667)" font-family="'MyriadPro-Regular'" font-size="21">P</text>
                              </g>
                              <g id="Q">
                                <a xlink:title="10165-Q">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="399.822,578.389 362.51,603.615 322.154,552.875 
                                  359.466,527.646   "/>

                                 <text transform="matrix(1 0 0 1 355.3389 568)" font-family="'MyriadPro-Regular'" font-size="21">Q</text>
                              </g>
                              <g id="R">
                                <a xlink:title="10165-R">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="437.133,553.16 399.822,578.389 359.465,527.646 
                                  396.776,502.42  "/>
                                   <text transform="matrix(1 0 0 1 390.6719 544.667)" font-family="'MyriadPro-Regular'" font-size="21">R</text>
                              </g>
                              <g id="S">
                                <a xlink:title="10165-S">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="474.443,527.934 437.131,553.16 396.774,502.418 
                                  434.086,477.191   "/>
                                <text transform="matrix(1 0 0 1 429.3389 518)" font-family="'MyriadPro-Regular'" font-size="21">S</text>
                              </g>
                              <g id="T">
                                <a xlink:title="10165-T">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="511.754,502.705 474.443,527.934 434.087,477.191 
                                  471.396,451.963   "/>
                                 <text transform="matrix(1 0 0 1 467.6719 496.333)" font-family="'MyriadPro-Regular'" font-size="21">T</text>
                              </g>
                              </g>
                              <g id="U">
                                <a xlink:title="10165-U">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="549.065,477.48 511.754,502.707 471.396,451.965 
                                  508.708,426.738   "/>
                                  <text transform="matrix(1 0 0 1 502.6719 468.667)" font-family="'MyriadPro-Regular'" font-size="21">U</text>
                              </g>
                              <g id="V">
                                <a xlink:title="10165-V">
                                <polygon fill="#E6E7E8" points="605.216,434.985 549.065,477.48 440.568,341.063 498.505,302.832  "/>
                              </g>
                              <g id="W">
                                <a xlink:title="10165-V">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="576.622,328.819 539.31,354.047 498.953,303.304 
                                  536.265,278.077   "/>
                                  <text transform="matrix(1 0 0 1 528.0059 318)" font-family="'MyriadPro-Regular'" font-size="21">W</text>

                              </g>
                              <g id="X">
                                <a xlink:title="10165-X">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="614.573,303.484 577.261,328.712 536.904,277.97 
                                  574.217,252.743   "/>
                                  <text transform="matrix(1 0 0 1 568.7383 294.7275)" font-family="'MyriadPro-Regular'" font-size="21">X</text>
                              </g>
                              <g id="Y">
                                <a xlink:title="10165-Y">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="653.408,277.604 616.096,302.832 575.739,252.089 
                                  613.051,226.862   "/>
                                  <text transform="matrix(1 0 0 1 610.6719 270)" font-family="'MyriadPro-Regular'" font-size="21">Y</text>
                              </g>
                              <g id="Z">
                                <a xlink:title="10165-Z">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="692.243,251.849 654.931,277.077 614.573,226.334 
                                  651.886,201.107   "/>
                                  <text transform="matrix(1 0 0 1 648.0059 242)" font-family="'MyriadPro-Regular'" font-size="21">Z</text>
                              </g>
                              <g id="AA">
                                <a xlink:title="10165-AA">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="729.312,226.515 691.998,251.743 651.642,201 
                                  688.954,175.773   "/>
                                  <text transform="matrix(1 0 0 1 678.6719 220.3335)" font-family="'MyriadPro-Regular'" font-size="21">AA</text>
                              </g>
                              <g id="BB">
                                <a xlink:title="10165-BB">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="768.146,200.634 730.833,225.862 690.477,175.119 
                                  727.789,149.892   "/>
                                  <text transform="matrix(1 0 0 1 718.0059 191.6665)" font-family="'MyriadPro-Regular'" font-size="21">BB</text>
                              </g>
                              <g id="CC">
                                <a xlink:title="10165-CC">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="806.98,175.879 769.668,201.107 729.312,150.365 
                                  766.623,125.138   "/>
                                  <text transform="matrix(1 0 0 1 757.6719 167.6665)" font-family="'MyriadPro-Regular'" font-size="21">CC</text>
                              </g>
                              <g id="DD">
                                <a xlink:title="10165-DD">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="844.815,149.545 807.503,174.773 767.146,124.03 
                                  804.458,98.803  "/>
                                  <text transform="matrix(1 0 0 1 793.6719 143.3335)" font-family="'MyriadPro-Regular'" font-size="21">DD</text>
                              </g>
                              <g id="EE">
                                <a xlink:title="10165-EE">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="882.65,123.664 845.337,148.892 804.98,98.149 
                                  842.293,72.922  "/>
                                  <text transform="matrix(1 0 0 1 834.0059 117)" font-family="'MyriadPro-Regular'" font-size="21">EE</text>
                              </g>
                              <g id="FF">
                                <a xlink:title="10165-FF">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="642.529,409.757 605.216,434.985 564.859,384.242 
                                  602.172,359.015   "/>
                                  <text transform="matrix(1 0 0 1 593.6719 402)" font-family="'MyriadPro-Regular'" font-size="21">FF</text>
                              </g>
                              <g id="GG">
                                <a xlink:title="10165-GG">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="680.364,383.805 643.051,409.033 602.694,358.291 
                                  640.007,333.063   "/>
                                  <text transform="matrix(1 0 0 1 628.3389 378.6665)" font-family="'MyriadPro-Regular'" font-size="21">GG</text>
                              </g>
                              <g id="HH">
                                <a xlink:title="10165-HH">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="718.199,358.998 680.886,384.226 640.529,333.483 
                                  677.842,308.256   "/>
                                  <text transform="matrix(1 0 0 1 666.6719 352.6665)" font-family="'MyriadPro-Regular'" font-size="21">HH</text>
                              </g>
                              <g id="II">
                                <a xlink:title="10165-II">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="757.034,333.787 719.721,359.015 679.364,308.272 
                                  716.677,283.045   "/>
                                  <text transform="matrix(1 0 0 1 713.1992 327.0303)" font-family="'MyriadPro-Regular'" font-size="21">II</text>
                              </g>
                              <g id="JJ">
                                <a xlink:title="10165-JJ">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="795.869,307.835 758.556,333.063 718.199,282.32 
                                  755.512,257.093   "/>
                                  <text transform="matrix(1 0 0 1 749.6719 299.6665)" font-family="'MyriadPro-Regular'" font-size="21">JJ</text>
                              </g>
                              <g id="KK">
                                <a xlink:title="10165-KK">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="834.704,283.027 797.391,308.256 757.034,257.513 
                                  794.347,232.286   "/>
                                  <text transform="matrix(1 0 0 1 785.6719 273.3335)" font-family="'MyriadPro-Regular'" font-size="21">KK</text>
                              </g>
                              <g id="LL">
                                <a xlink:title="10165-LL">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="872.539,256.816 835.226,282.045 794.869,231.302 
                                  832.182,206.075   "/>
                                  <text transform="matrix(1 0 0 1 828.0059 248.6665)" font-family="'MyriadPro-Regular'" font-size="21">LL</text>
                              </g>
                              <g id="MM">
                                <a xlink:title="10165-MM">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="910.374,230.865 873.061,256.093 832.704,205.35 
                                  870.017,180.123   "/>
                                  <text transform="matrix(1 0 0 1 854.5391 222.1084)" font-family="'MyriadPro-Regular'" font-size="21">MM</text>
                              </g>
                              <g id="NN">
                                <a xlink:title="10165-NN">
                                <polygon fill="#C2B59B" stroke="#000000" stroke-miterlimit="10" points="948.209,206.057 910.896,231.286 870.539,180.542 
                                  907.852,155.315   "/>
                                  <text transform="matrix(1 0 0 1 897.374 198.3008)" font-family="'MyriadPro-Regular'" font-size="21">NN</text>
                              </g>
                              <g id="OO">
                                <a xlink:title="10165-OO">
                                <polygon fill="#E6E7E8" points="980.929,179.97 948.209,205.057 843.31,72.705 911.889,31.34  "/>
                              </g>

                              <g id="ROAD">
                                <polygon fill="#E6E7E8" points="508.708,426.738 135.599,679.01 107.815,644.078 481.865,391.874  "/>
                                <polygon fill="#E6E7E8" points="908.093,153.904 565.998,385.324 539.269,353.986 882.965,121.139   "/>
                              </g>
                              </svg>


                             </div>
                          </div> 
                       
                         
                                <div class="col-lg-5">
                                  <div class="panel"> 
                                    <div class="panel-heading bg-inverse">
                                        <h4 class="text-white panel-title">Casa Mira Realty Homes</h4>
                                    </div>
                                      <div class="table-responsive table-wrapper-scroll-y">
                                        
                                        <table  class="table table-striped" cellspacing="0" width="100%">
                                          <thead>
                                            <tr>
                                              <th class="bg-success text-white text-center"><i class="fa fa-sort-alpha-asc"></i> Lot Number</th>
                                              <th class="bg-primary text-white text-center">Status</th>
                                            </tr>
                                          </thead>

                                          <tbody>
                                              <?php
                                                 

                                                while($row = mysqli_fetch_assoc($result))
                                                {


                                    

                                              
                                                ?>

                                              <tr>
                                                <td class="text-center"><?php echo $row['lot_no']; ?></td>
                                                <td class="text-center"><?php echo $row['status']; ?></td>

                                              </tr>

                                               <?php

                                                }

                                                mysqli_close($conn);

                                                ?>
                                          </tbody>  
                                        </table>

                                  </div>
                             </div>   
                           </div>
                                 
        <footer class="footer bg-inverse text-white">
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

       
        <script src="assets/plugins/smoothproducts/js/smoothproducts.min.js"></script>
        
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        
        
       
</body>
</html>