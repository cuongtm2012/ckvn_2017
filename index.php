<?php
session_start();
include_once 'conf.php';
?>
<!DOCTYPE html>
<html lang="vi-VN">

<head>

    <meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="Trần Mạnh Cường - Chuyên gia phân tích TTCK - 0934 696 594" />
	<meta name="keywords" content="Trần Mạnh Cường - Chuyên gia phân tích TTCK - 0934 696 594" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trần Mạnh Cường - Chuyên gia phân tích TTCK</title>

    <!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />

    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">
    
    <link rel="shortcut icon" href="images/demo/logoTMC.ico" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>
	
			<!-- Code Google Analytics -->
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            
              ga('create', 'UA-90534662-1', 'auto');
              ga('send', 'pageview');
            
            </script>
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
                <a class="navbar-brand page-scroll" href="index.php">TRANG CHỦ</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar1">
			<ul class="nav navbar-nav navbar-right">
				<?php if (isset($_SESSION['usr_id'])) { ?>
				<li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
				<li><a href="logout.php">Log Out</a></li>
				<?php } else { ?>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Đăng Ký</a></li>
				<?php } ?>
			</ul>
		</div>
	</div>
</nav>

    <!-- Intro Section -->
    <section id="intro" class="intro-section">
		<header>
			<h1 style="color:white;">TRẦN MẠNH CƯỜNG</h1>
			<p>Chào mừng bạn đến với website của tôi</p>
		</header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-default page-scroll" href="#contact">Thông tin về chúng tôi</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h1>Thế mạnh của website</h1>
                    </br>
                    <h1>I. Phân tích vị thế, sức mạnh cổ phiếu</h1>
                    <h1>II. Xác định điểm mua bán cổ phiếu kịp thời</h1>
                    <h1>III. Nhận định thị trường và dòng tiền daily</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Liên hệ đầu tư : Trần Mạnh Cường</h2>
                    <h2>Phone/Zalo/Viber : 01678 246 333</h2>
                    <h2>Email : cuongtm2012@gmail.com</h2>
                    <h2>Skype : cuongtm2012</h2>
                </div>
            </div>
        </div>
    </section>


</body>
</html>

