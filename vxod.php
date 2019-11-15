<? session_start();  //открытие сессии ?> 
<!DOCTYPE html>
<html lang="ru">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Businnes, Portfolio, Corporate">
    <meta name="Author" content="WebThemez">
    <title> Кинотеатр StarWars Cinema </title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="elegant_font/style.css" />
    <!--[if lte IE 7]><script src="elegant_font/lte-ie7.js"></script><![endif]-->
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/slider-pro.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <link rel="stylesheet" href="css/animate.css">
	    <link rel="stylesheet" href="elegant_font/style.css">
    <link rel="stylesheet" href="css/style.css">

    <!--[if lt IE 9]>
        <script src="js/html5shiv.min.js"></script>
        <script src="js/respond.min.js"></script>
        <script type="text/javascript" src="js/selectivizr.js"></script>
    <![endif]-->
</head>
<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="status"></div>
    </div>
    <!-- Header End -->
    <header>
        <!-- Navigation Menu start-->
	<nav id="topNav" class="navbar navbar-default main-menu">
    <div class="container">
        <button class="navbar-toggler hidden-md-up pull-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            ☰
        </button>
		 <a class="navbar-brand page-scroll" href="#slider"><img class="logo" id="logo" src="images/logotip.png" alt="logo" width="170"></a>
        <div class="collapse navbar-toggleable-sm" id="collapsingNavbar">
            <ul class="nav navbar-nav">
                 <li>
                   <a href="index.html">Главная</a>
                 </li>
                 <li>
                   <a href="index.html">О кинотеатре</a>
                 </li>
                 <li>
                   <a href="index.html">Сегодня в кино</a>
                 </li>
                 <li>
                   <a href="index.html">Цены</a>
                 </li>
                 <li>
                   <a href="index.html">Контакты</a>
                 </li>
                 <li class="active">
                   <a href="vxod.html">Вход</a>
                 </li>
                 <li>
                   <a href="registraciya.php">Регистрация</a>
                </li>
            </ul>
        </div>
    </div>
 </nav>
    </header>
    <!-- Header End -->
    <br>
    <br>
    <br>
    <br>
    <main class= "mt-6 pt-6 mb-6 pb-6">
      <div class="container">
        <section class="mt-4">
          <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <div style="text-align: center">
                <h1>Вход</h1>
              </div>
              <?php
              $host = 'localhost';
              $db_name = 'starwars_cinema';
              $db_user = 'root';
              $db_pass = '';
              $mysqli = new mysqli($host, $db_user, $db_pass, $db_name);
              if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
              }
              if (isset($_POST['email'])!='' ) {
                if (isset($_POST['AV'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                }
                $query = "SELECT * FROM `registraciya` WHERE Email='$email' ";
                if ($result = $mysqli->query($query)) {
                    while ($obj = $result->fetch_object()) {
                        $prov = $obj->Password;
                    }
                }
                if ($prov == $password) {
                    $result->close();
                    $_SESSION['start']=$email;
                    include ('index.php');
                    exit;
                } else {
                    echo 'Такой логин с паролем не найдены в базе данных.';
                }
              }
              $mysqli->close();
              ?>
              <!-- какие то скрипты-->
              <div class="content-block" align="center">
                <div style="max-width: 300px; text-align: left">
                  <form method="POST" name=form>
                    <div class="form-droup">
                      <label for="Email">Email</label>
                      <input type="email" name="email" value="" class="form-control" id="Email" placeholder="user@mail.ru" required autofocus>
                    </div>
                    <div class="form-droup">
                      <label for="Password">Password</label>
                      <input type="password" name="password" value="" class="form-control" id="Password" placeholder="Password" required>
                    </div>
                    <div class="form-droup" align="left">
                        <input type="checkbox" name="" value="remember-me">
                        <font>Запомнить меня</font>
                    </div>
                    <br>
                    <a href="restore.html">Забыли пароль?</a>
                    <br>
                    <br>
                    <div style="text-align: center">
                      <button type="submit" name="AV" class="btn btn-lg btn-primary btn-block">Войти</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-1"></div>
          </div>
        </section>
      </div>
    </main>
    <br>
    <br>
</body>
<!-- Contact Section End -->
<section class="footer-container">
    <div class="container">
        <div class="row footer-containertent">
            <div class="col-md-8">
                <img src="images/logotip.png" alt="" width="170">
                <p>Онлайн-покупка билетов в кино - это возможность заранее планировать поход в кино с друзьями или родными,
                  гарантия того, что билеты на запланированный сеанс и на выбранные места точно будут.После выбора киносеанса и мест,
                  проведения оплаты, электронный билет присылается на ваш мобильный телефон в виде SMS.
                  Данный билет на кассе кинотеатра обменивается на бумажный.</p>
            </div>
  <div class="col-md-4 contac-us" align="left" >
      <h4>Контакты</h4>
      <ul>
        <li><i class="fa fa-home"></i> г.Алматы, ул.Жарокова д.145 </li>
        <li><i class="fa fa-phone"></i> 8(747)325-15-67 </li>
        <li><i class="fa fa-envelope-o"></i> starwarscinema@mail.ru </li>
     </ul>
  </div>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="row">
            <div class="footer-containertent">

                <ul class="footer-social-info">
                    <li>
                        <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                    </li>
                </ul>
      <br/><br/>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End -->

<script src="js/jquery-1.11.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/jquery.easypiechart.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/jquery.fitvids.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/imagesloaded.pkgd.min.js"></script>
<script src="js/smooth-scroll.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.sliderPro.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="contact/jqBootstrapValidation.js"></script>
<script src="contact/contact_me.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
