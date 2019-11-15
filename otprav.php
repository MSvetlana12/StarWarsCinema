<?php session_start();
ob_start(); ?>
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
if (isset($_POST['message'])!='' ) {
        $messege=$_POST['message'];
        $email = $_SESSION['start'];
        $name=$_SESSION['name'];
        if ($result1 = $mysqli->query("INSERT INTO `comments`( `Name`, `Email`, `Comment`) VALUES ('$name','$email','$messege')")) {
          $smsg =  "Информация успешно добавлена в базу!";
          #echo '<div class="alert alert-success" role="alert">'.$smsg.'</div>';
          header('Location: http://kinoteatrsait/index.php');
          ob_enf_fluch();
        } else {
          $fsmsg =  "Информация не добавлена в базу!";
          #echo '<div class="alert alert-danger" role="alert">'.$fsmsg.'</div>';
        }
    } else {
        $mysqli->close();
    }

 ?>
