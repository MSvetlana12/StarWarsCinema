<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "starwars_cinema";
// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);
// Проверка подключения
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST ['Email']))
{
$email=$_POST ['Email']; //Защита от хостингов, не поддерживающих прямую передачу переменных из формы на сервер
}
if (isset($_POST ['Password']))
{
$password=$_POST ['Password'];
}

  $sql = "SELECT * FROM `registraciya` WHERE Email='$email' and Password ='$password'";
  $result = $conn->query($sql) or die (mysqli_error($conn));
  $count = mysqli_num_rows($result);

  if ($count==1){
    $_SESSION['Email'] = $email;
  }else {
    echo "ОШИБКА";
  }
  if (isset($_SESSION ['Email'])){
    $email = $_SESSION ['Email'];
    echo "Вы вошли под " .$email."";
    #echo <a href="logout.php" class="btn btn-lg btn-primary btn-block"> Выйти </a>;
  }
?>
