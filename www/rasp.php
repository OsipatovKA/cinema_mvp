<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8" />
  <title></title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

<?php
include_once 'connection.php';
$f_id= $_GET['f_id']; 
$result = $mysqli->query("SELECT * FROM `filmname` where f_id='$f_id'");
        $row = $result->fetch_assoc(); ?>
<ul id="nav">
      <li><a href="/index.php">Афиша</a></li>
      </ul>
<h1> Расписание сеансов фильма: <?php echo $row["f_name"] ?></h1>

<h2> Выберите сеанс:</h2>
<?php 
$result = $mysqli->query("SELECT * FROM `session` where f_id='$f_id'");
        //$row = $result->fetch_array(); 
while($row=mysqli_fetch_array($result)){
    echo "<a href=chplace.php?s_id=".($row["s_id"]).">".$row["date"]."  ".$row['time']."<br>";
    $i++;
    }
?>
</body>
</html>
