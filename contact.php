<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="ThemeBadge" />
    <!-- Document Title -->
    <title>Theme Title</title>
    <!--favicon icon-->
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <!--Font icons-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/components/component.css">
    <link rel="stylesheet" href="style.css">
    <!-- JavaScripts -->
    <script src="assets/js/vendor/modernizr.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    $link = @Mysqli_connect("localhost","root","");
    if(mysqli_connect_errno())
    {
        printf("Connection failed: %s\n",mysqli_connect_error());
        exit();
    }
    //select database
    Mysqli_select_db($link,"construction");
    //show errors message
    $errors= array();
    if(empty($_POST['fullname'])){
        $errors[]='You did not enter your full name';
    }
    else{
        $fullname = mysqli_real_escape_string($link,trim($_POST['fullname']));
    }

    // start 2nd field
    if(empty($_POST['phone'])){
        $errors[]='You did not enter your phone number';
    }
    else{
        $phone =mysqli_real_escape_string($link,trim($_POST['phone']));
    }
    // start 3rd field
    if(empty($_POST['email'])){
        $errors[]='You did not enter your Email Address';
    }
    else{
        $email =mysqli_real_escape_string($link,trim($_POST['email']));
    }
    // start 4th field
    if(empty($_POST['subject'])){
        $errors[]='You did not enter your subject ';
    }
    else{
        $subject = mysqli_real_escape_string($link,trim($_POST['subject']));
    }
    // 5th field email name
    if(empty($_POST['message'])){
        $errors[]='You did not enter your message';
    }
    else{
        $message =mysqli_real_escape_string($link,trim($_POST['message']));
    }


    //insert query starting

    if(empty($errors)){  // if $error is empty
        $sql="INSERT INTO `contacts` (`id`,`fullname`, `phone`, `email`, `subject`, `message`) VALUES ('','$fullname', '$phone', '$email', '$subject', '$message')";
        $result=@mysqli_query($link,$sql);

        if($result){    //if it ran query
            header('location: index.php');
            exit();
        }
        else{ //if it dont ran query
            echo '<p>'.mysqli_error($link).'<br /><br /> query'.$sql.'</p>';
        }
        mysqli_close($link);
        exit();
    }
    else{ //  if $error is not empty
        echo '<h2 style="color:red">The following error occured: <br /></h2>';
        foreach($errors as $msg){
            echo '<h4 style="color:#cc3717">'.$msg.'</h4>';
        }
        echo '<h2 style="color:red">Please try again</h2>';
    }
}
?>


    <!--Preloader Coding Here
        ==============================================-->
    <div id="preloader">
        <div class="preloader-spinner"></div>
    </div>

    <!--*****************Top Area End*************-->
    <!--*****************Menu Area Start*************-->
    <div class="menu-area">
        <div class="container">
            <div class="row">
                <div class="xs-12">
                    <div class="menu-left">
                        <a href="#">
                            <img src="assets/img/logo.png" alt="logo">
                        </a>
                    </div>
                    <div class="menu-right">
                        <div class="menu-menu">
                            <ul class="mobile" id="menu">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="service.html">Service</a></li>
                                <li><a href="project.php">Project</a></li>
                                <li><a href="contact">Contact</a></li>
                            </ul>
                        </div>
                        <div class="mobile-menu"></div>
                        <div class="menu-search">
                            <ul>
                                <li>
                                    <a class="search-button" href="#">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="search-box">
                            <form action="#">
                                <input name="googlesearch" type="search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--*****************Menu Area End*************-->
    <!--*****************Construction Area End*************-->
   
    <div class="Contact-area section-padding">
        <div class="container">
           <div class="row">
               <div class="col-xs-12">
                   <div class="section-title">
                        <h1>Write Us</h1>
                        <p>No more tons of useless features! functionality and design in mind.</p>
                    </div>
               </div>
           </div>
            <div class="row">
                <div class="col-xs-12">
                    <form action="contact.php" method="post">
                        <div class="contact-form">
                            <div class="contact-form-left">
                                <input type="text" name="fullname" placeholder="Full Name">
                                <input type="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="contact-form-right">

                                <input type="text" name="phone" placeholder="Phone">
                                <input type="text" name="subject" placeholder="Subject">

                            </div>
                        </div>
                        <div class="contact-textarea">
                            <textarea rows="6" cols="50" name="message" placeholder="Message"></textarea>
                            <input type="submit" name="submit" value="Send Message" class="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  
    <!--*****************Footer Area Start*************-->
    <div class="footer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="single-footer footer-one">
                        <h2>About Company</h2>
                        <a href="#">
                            <img src="assets/img/logo.png" alt="logo">
                        </a>
                        <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit,</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="single-footer footer-two">
                        <h2>Explor link</h2>
                        <ul>
                            <li><span><i class="fa fa-play" aria-hidden="true"></i></span><a href="project.php">Our services</a></li>
                            <li><span><i class="fa fa-play" aria-hidden="true"></i></span><a href="#">Meet our team</a></li>
                            <li><span><i class="fa fa-play" aria-hidden="true"></i></span><a href="contact.php">Help center</a></li>
                            <li><span><i class="fa fa-play" aria-hidden="true"></i></span><a href="contact.php">Contact Cekas</a></li>
                            <li><span><i class="fa fa-play" aria-hidden="true"></i></span><a href="policy.php">Privacy Policy</a></li>
                            <li><span><i class="fa fa-play" aria-hidden="true"></i></span><a href="map.php">Site map</a></li>
                        </ul>
                    </div>
                    <div class="single-footer footer-three">
                        <h2>Latest post</h2>
                        <div class="footer-single-text">
                            <div class="date">
                                <p>
                                    20
                                    <span>Aug</span>
                                </p>
                            </div>
                            <a href="#">Luptatum omittantur duo ne mpetus indoctum</a>
                        </div>
                        <div class="footer-single-text">
                            <div class="date">
                                <p>
                                    20
                                    <span>Aug</span>
                                </p>
                            </div>
                            <a href="#">Luptatum omittantur duo ne mpetus indoctum</a>
                        </div>
                        <div class="footer-single-text">
                            <div class="date">
                                <p>
                                    20
                                    <span>Aug</span>
                                </p>
                            </div>
                            <a href="#">Luptatum omittantur duo ne mpetus indoctum</a>
                        </div>
                        <div class="footer-single-text">
                            <div class="date">
                                <p>
                                    20
                                    <span>Aug</span>
                                </p>
                            </div>
                            <a href="#">Luptatum omittantur duo ne mpetus indoctum</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--*****************Footer Area End*************-->
    <!--*****************Copyright Area Start*************-->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <p>Copyright @ 2019 | Designed By <span>nirobcse.com</span></p>
                </div>
            </div>
        </div>
    </div>
    <!--*****************Copyright Area End*************-->


    <!-- Script file Here -->
    <script src="assets/js/vendor/jquery.min.js"></script>
    <!-- <script src="assets/js/vendor/jquerymigrate.js"></script> -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.matchHeight.js"></script>
    <script src="assets/js/easing.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/isotope.pkgd.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>


    <!-- Common Scripts -->
    <script src="assets/js/main.js"></script>
</body>

</html>
