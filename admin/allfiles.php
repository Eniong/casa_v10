<?php
include("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="assets/images/casamira_1.png">
	<title>ALL FILES</title>
		 <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>
</head>
	<body class="widescreen fixed-left-void">
		<div id="wrapper" class="enlarge force">
			<div class="topbar">
				<div class="topbar-left"  style="background-color: #F0E68C">
					<div class="text-center">
						<a href="index.php" class="logo">
	            		<i class="icon-c-logo"><img src="assets/images/casamira_1.png" height="59" class="md md-album"/></i>
	            		<span><img src="assets/images/casamira_2.png" height="70"></span>
	          			</a>
					</div>
				</div>

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
                                <li><a href="../casamira/blueprint3d(new)/customization/index.html" target="_blank" class="bg-custom waves-effect waves-light"><strong>Customization</strong></a></li>   
                            </ul>

                            <ul class="nav navbar-nav hidden-xs">
                                <li><a href="allfiles.php" class="bg-danger waves-effect waves-light"><strong>Uploaded Files</strong></a></li>   
                            </ul>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>

			</div>

			<div style="background-color: #F5F5F5;" class="left side-menu">
			<div class="sidebar-inner slimscrollleft">
				<!--Divider-->
				<div id="sidebar-menu">
					<ul>
                            	<li class="has_sub">
                                		<a href="javascript:void(0);" class="waves-effect"><i class="ti-location-pin"></i> <span> Phase 1 </span></span> <span class="menu-arrow"></span></a>
                            	</li>


                             	<li class="has_sub">
                                	<a href="javascript:void(0);" class="waves-effect"><i class="ti-location-pin"></i><span> Phase 2 </span> <span class="menu-arrow"></span></a>
                            	</li>

                            	<li class="has_sub">
                                	<a href="javascript:void(0);" class="waves-effect"><i class="ti-location-pin"></i><span> Phase 3 </span> <span class="menu-arrow"></span></a>
                            	</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="content-page">
			<div class="content">
				<div class="container">
					<table  class="table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
							<tr>
							<th class="bg-primary"> FILENAME </th> 
							<th class="bg-purple text-white text-center"> TYPE </th>
							<th class="bg-danger text-white text-center"> FILE SIZE </th>
							<th class="bg-success text-white text-center"> DOWNLOAD </th>
							</tr>
						</thead>	
						
					
						<?php
						$query = "SELECT * FROM uploads ORDER BY id DESC ";
						$result =  mysqli_query($conn, $query) or die (mysqli_error($conn));
						if (mysqli_num_rows($result) > 0) {
							while ($row = mysqli_fetch_array($result)){ 
								$filename = $row['file'];
								$filetype = $row['type'];
								$filesize = $row['size'];
								echo "<tr>
								<td>$filename</td>
								<td>$filetype</td>
								<td>$filesize KB</td>
								<td class='text-center'><a href='uploads/$filename' download> Download file </td>
								</tr>";

							}
						}
						else {
							echo "NO FILES UPLOADED YET";
						}
						?>

					</table>
					
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


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
	</body>



</html>