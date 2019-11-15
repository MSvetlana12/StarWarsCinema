<?php session_start();
ob_start();
?>
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
<?php
$host = 'localhost'; //создание переменных для подключения к БД
$db_name = 'starwars_cinema';
$db_user = 'root';
$db_pass = '';
$mysqli = new mysqli($host, $db_user, $db_pass, $db_name); //создание запроса с помощью класса для подключения
if (mysqli_connect_errno()) { //проверка подключения
    printf("Connect failed: %s\n", mysqli_connect_error()); //вывод ошибки при неудачном подключении
    exit();
}
#echo $_POST['Email'];
if (isset($_POST['Email'])!='' ) { //проверка на заполнение поля е-мейла
    if (isset($_POST['reg'])) { //проверка на нажатие кнопки
        $email = $_POST['Email']; //создание переменных для внесения значений из формы в БД
        $name=$_POST ['Name'];
        $lastname=$_POST ['Lastname'];
		$pas = $_POST['Password'];
		$pas = str_replace(" ","",$pas); // Удаления пробелов в пароле
		if (strlen($pas) >= 6){     // Проверка парельей на количество символов должно быть больше 6 сисмволов
			$password = $pas;   
		}
    }
    $query = "SELECT * FROM `registraciya` WHERE Email='$email' "; //запрос на проверку существования такого е-мейла
    if ($result = $mysqli->query($query)) {
        while ($obj = $result->fetch_object()) { //проверка всех строк БД на наличие
            $prov = $obj->Email; //запись в переменную при наличии е-мейла
        }
    }
    if ($prov != null) { //если такой е-мейл уже существует
      $err =  "Такой E-mail уже существует!";
      echo '<div class="alert alert-danger" role="alert">'.$err.'</div>'; //вывод ошибки
        $result->close();
    } else { //если нет, тогда запросом занесение значений хранящихся в переменных в БД
        if($password != ""){
			if ($result1 = $mysqli->query("INSERT INTO `registraciya`(`Email`, `Name`, `Lastname`, `Password`) VALUES ('$email','$name','$lastname','$password')")) {
			  $smsg =  "Информация успешно добавлена в базу!"; //сообщение об удачном заполнении
			  #echo '<div class="alert alert-success" role="alert">'.$smsg.'</div>';
			  #include ('index.php');
			  header('Location: http://kinoteatrsait/index.php'); //возврат на главную страницу
			  ob_enf_fluch();
			} else {
			  $fsmsg =  "Информация не добавлена в базу!"; // вывод ошибки
			  #echo '<div class="alert alert-danger" role="alert">'.$fsmsg.'</div>';
			}
		}
		else{
			 $err =  "Пароль должен быть больше 6 символов и не содержать пробелов";
		echo '<div class="alert alert-danger" role="alert">'.$err.'</div>'; //вывод ошибки
			$result->close();
		}
    }
}
$mysqli->close(); //закрытие запроса
?>
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
                   <a href="index.php">Главная</a>
                 </li>
                 <li>
                   <a href="index.php">О кинотеатре</a>
                 </li>
                 <li>
                   <a href="index.php">Сегодня в кино</a>
                 </li>
                 <li>
                   <a href="index.php">Цены</a>
                 </li>
                 <li>
                   <a href="index.php">Контакты</a>
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
                <h1>Регистрация</h1>
              </div>
              <!-- какие то скрипты-->
              <div class="content-block" align="center" >
                <div style="max-width: 300px; text-align: left">
                  <form method="POST" name=form action="">
                    <div class="form-droup">
                      <label for="Email">Email:</label>
                      <input type="email" name="Email" value=""   autocomplete='off' class="form-control" id="Email" placeholder="mail@mail.ru" required autofocus>
                    </div>
                    <div class="form-droup">
                      <label for="Name">Name</label>
                      <input type="name" name="Name" value="" autocomplete='off' class="form-control" id="Name" placeholder="Your name" required>
                    </div>
                    <div class="form-droup">
                      <label for="LastName">LastName</label>
                      <input type="lastname" name="Lastname" value="" autocomplete='off' class="form-control" id="LastName" placeholder="Your lastname" required>
                    </div>
                    <div class="form-droup">
                      <label for="LastName">Password</label>
                      <input type="password" name="Password" value="" autocomplete='off' class="form-control" id="Password" placeholder="Your password" required>
                    </div>
                    <br>
                    <br>
                    <div style="text-align: center">
                      <button type="submit" name="reg" class="btn btn-lg btn-primary btn-block" >Зарегистрироваться</button>
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
                  гарантия того, что билеты на запланированный сеанс и на выбранные места точно будут. После выбора киносеанса и мест,
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
