<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/casamira_1.png">
  <title>Casa Mira Online Mapping and Customization</title>

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
<body>

  <div class="account-pages"  style="background-image: url(assets/images/gallery/background.jpg); background-attachment: fixed; background-repeat: no-repeat; background-position:center;  background-size: cover;"></div>
  <div class="clearfix"></div>
  <div class="wrapper-page">
    <div class="card-box">
      <div class="panel-heading">
        <h3 class="text-center">Sign Up to <strong class="text-custom">Casa Mira</strong></h3>
      </div>

      <div class="panel-body">
          <form class="form-horizontal m-t-20" method="post" action="register.php">
            <?php include('errors.php'); ?>
            <div class="form-group ">
              <div class="col-xs-12">
                <input class="form-control" type="text"  name="username" required="" placeholder="Username" value="<?php echo $username; ?>">
              </div>
            </div>

            <div class="form-group ">
              <div class="col-xs-12">
                <input class="form-control" type="email" name="email" required="" placeholder="Email" value="<?php echo $email; ?>">
              </div>
            </div>


            <div class="form-group">
              <div class="col-xs-12">
                <input class="form-control" type="password" name="password_1" required="" placeholder="Password">
              </div>
            </div>

              <div class="form-group">
              <div class="col-xs-12">
                <input class="form-control" type="password" name="password_2" required="" placeholder="Confirm Password">
              </div>
            </div>

           <div class="form-group">
              <div class="col-xs-12">
                <div class="checkbox checkbox-primary">
                  <input id="checkbox-signup" type="checkbox" checked="checked" required="">
                  <label for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
                </div>
              </div>
            </div>

            <div class="form-group text-center m-t-40">
              <div class="col-xs-12">
                <button class="btn btn-pink btn-block text-uppercase waves-effect waves-light" type="submit" name="reg_user">
                  Register
                </button>
              </div>
            </div>

            <div class="col-sm-12 text-center">
              <p>
                Already have account?<a href="login.php" class="text-primary m-l-5"><b>Sign In</b></a>
              </p>
           </div>
          </form>

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