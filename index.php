<?php session_start();?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Depository</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link href="http://ajax.aspnetcdn.com/ajax/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="css/animations.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="color/default2.css" rel="stylesheet">
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        <section class="hero" id="intro">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-right navicon">
                        <a id="nav-toggle" class="nav_slide_button" href="#"><span></span></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center inner">
                        <div class="animatedParent">
                            <h1 class="animated fadeInDown tep">Depository</h1>
                            <p class="animated fadeInUp">where people can register found item and owner can search their lost item</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <a href="#service" class="learn-more-btn btn-scroll">Get Start</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Navigation -->
        <div id="navigation">
            <nav class="navbar navbar-custom" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="site-logo">
                                <a href="index.php" class="brand">Depository</a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                                    <i class="fa fa-bars"></i>
                                </button>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="menu">
                                <ul class="nav navbar-nav navbar-right">
                                    <!--<li class="active"><a href="#intro">Home</a></li>-->
                                    <li class="active"><a href="#service">Home</a></li>
                                    <li><a href="#about">About Us</a></li>
                                    <li><a href="#contact">Contact</a></li>
                                    <?php if ($_SESSION['uid']) {
                                      echo "<li><a href='profile.php'>Profile</a></li>";
                                      echo "<li><a href=''> hello: &nbsp;". $_SESSION['uname']."</a></li>";
                                      echo "<li><a href='out.php' class='btn btn-info'>Log Out</a></li>";
                                      } else {
                                      echo '<li><a href="sign.php">Log in</a></li>';
                                      }
                                 ?>
                                </ul>
                            </div>
                            <!-- /.Navbar-collapse -->
                        </div>
                    </div>
                </div>
                <!-- /.container -->
            </nav>
        </div>
        <!-- /Navigation -->

        <!-- Section: services -->
        <section id="service" class="home-section color-dark bg-gray">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div>
                            <div class="section-heading text-center">
                                <h2 class="h-bold">What we can do for you</h2>
                                <div class="divider-header"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <div class="container">
                    <div class="row animatedParent">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-2">
                            <!--<div class="animated rotateInDownLeft">  edited -->
                            <div class="">
                                <div class="service-box">
                                    <div class="service-icon">
                                        <span class="fa fa-search fa-2x"></span>
                                    </div>
                                    <div class="service-desc">
                                        <h5>Search</h5>
                                        <div class="divider-header"></div>
                                        <p>
                                            Search your lost Item.
                                        </p>
                                        <a href="search.php" class="btn btn-skin">Click Here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4">
                            <!--<div class="animated rotateInDownLeft slower">-->
                            <div>
                                <div class="service-box">
                                    <div class="service-icon">
                                        <span class="fa fa-plus fa-2x"></span>
                                    </div>
                                    <div class="service-desc">
                                        <h5>Register</h5>
                                        <div class="divider-header"></div>
                                        <p>
                                            If you found any item, please register it.
                                        </p>
                                        <a href="sign.php" class="btn btn-skin">Click Here</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: services -->

        <!-- Section: about -->
        <section id="about" class="home-section color-dark bg-white">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="animatedParent">
                            <div class="section-heading text-center animated bounceInDown">
                                <h2 class="h-bold">About Us</h2>
                                <div class="divider-header"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 animatedParent">
                        <div class="text-center">
                            <p>
                                We provide a platform where people can register any item which they found and owner can search their items.
                            </p>
                            <a href="#service" class="btn btn-skin btn-scroll">What we do</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: about -->

        <!-- Section: contact -->
        <section id="contact" class="home-section nopadd-bot color-dark bg-gray text-center">
            <div class="container marginbot-50">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="animatedParent">
                            <div class="section-heading text-center">
                                <h2 class="h-bold animated bounceInDown">Get in touch with us</h2>
                                <div class="divider-header"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row marginbot-80">
                    <div class="col-md-8 col-md-offset-2">
                        <form id="contact-form">
                            <div class="row marginbot-20">
                                <div class="col-md-6 xs-marginbot-20">
                                    <input type="text" required class="form-control input-lg" name="name" placeholder="Enter name" id="name" />
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control input-lg" name="email" placeholder="Enter email" id="email" required="required" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control input-lg" name="subject" placeholder="Subject" id="subject" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <textarea name="message" name="message" class="form-control" rows="4" cols="25" id="message" required="required" placeholder="Message"></textarea>
                                    </div>
                                    <button type="button" class="btn btn-skin btn-lg btn-block" id="btnContactUs">
                                        Send Message</button><br><br>
                                    <div class="pull-center">Contact: +91 9462508886</div>
                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Section: contact -->

        <footer style='position:relative'>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="footer-menu">
                            <li><a href="#service">Home</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 text-right">
                        <!--<p>&copy;Copyright 2014 - Depository.com</p>-->
                        <p>Depository.com</p>
                        <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Bocor
                    -->
                    </div>
                </div>
            </div>
        </footer>
        <!-- Core JavaScript Files -->
        <!-- change src before deploying-->
        <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.2.4.min.js'></script>
        <script src="http://ajax.aspnetcdn.com/ajax/bootstrap/3.3.5/bootstrap.min.js"></script>
        <script src="js/jquery.sticky.js"></script>
        <script src="js/jquery.easing.min.js"></script>
        <script src="js/jquery.scrollTo.js"></script>
        <script src="js/jquery.appear.js"></script>
        <script src="js/stellar.js"></script>
        <script src="js/custom.js"></script>
        <script src="js/css3-animate-it.js"></script>
        <script src="js/jquery.toaster.js"></script>
        <script src="js/email.js"></script>
        <script>
            $(function() {
                $('.navbar-nav').on('click', 'li', function(){
                    $('.navbar-toggle').click();
                }); 
            });
            
        </script>
    </body>
</html>