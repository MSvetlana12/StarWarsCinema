<?php
#unset($_POST ['Email']);
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
$sql = "SELECT * FROM `registraciya`";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    // выходные данные каждой строки
   while($row = $result->fetch_assoc())
 {
        $i++;
 }
}
//строка запроса
if (isset($_POST ['Email']))
{

  $email=$_POST ['Email']; //Защита от хостингов, не поддерживающих прямую передачу переменных из формы на сервер

  echo "<br/>$email";
}
if (isset($_POST ['Name']))
{
$name=$_POST ['Name'];
}
if (isset($_POST ['Lastname']))
{
$lastname=$_POST ['Lastname'];
}
if (isset($_POST ['Password']))
{
$password=$_POST ['Password'];
}
if ($email!=''){
$sql = "SELECT * FROM `registraciya` WHERE Email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
   {
            $prover=$row["Email"];
   }
}
if($email==$prover)
{
  $err =  "Такой E-mail уже существует!";
}else
{
  $k = $i+1;
  $sql = "INSERT INTO `registraciya`(`ID`, `Email`, `Name`, `Lastname`, `Password`) VALUES ('$k','$email','$name','$lastname','$password')";
  $result = $conn->query($sql);
  If ($result=='true')
  {
      $smsg = "Информация успешно добавлена в базу!";
  }
  else
  {
      $fsmsg = "Информация не добавлена в базу!";
  }

}
}



?>
  <?php if(isset($err)){?> <div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div> <?php } ?>
