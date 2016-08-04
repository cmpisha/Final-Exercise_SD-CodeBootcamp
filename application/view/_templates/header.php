<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="<?php echo URL; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- Start Header -->
    <div class="container-fluid main-header">
      <div class="row">
          <div class="col-sm-5 site-branding">

            <h4>Web Development Showcase</h4>
            <h6>Caitlin Pisha</h6>
          </div>
          <div class="col-sm-7">
            <ul class="nav navbar-nav navbar-right nav-pills ">
              <li class="active"><a href="<?php echo URL; ?>">Home</a></li>
              <li><a href="<?php echo URL; ?>posts/index">Posts</a></li>
              <li><a href="<?php echo URL; ?>posts/addpost">Add New Post</a></li>
              <li><a href="<?php echo URL; ?>home/about">About</a></li>
              <li><a href="<?php echo URL; ?>home/contact"">Contact</a></li>
            </ul>
          </div>
         </div>
    </div>

    <!-- End Heading Container -->

    <!-- Start Carousel -->

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="<?php echo URL; ?>img/home-page-background_1.jpg" alt="Slide 1">
        </div>
        <div class="item">
          <img src="<?php echo URL; ?>img/home-page-background_2.jpg" alt="Slide 2">
        </div>
        <div class="item">
          <img src="<?php echo URL; ?>img/home-page-background_3.jpg" alt="Slide 3">
        </div>
      </div>
    </div><!-- End Carousel -->
