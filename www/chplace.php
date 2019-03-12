<?php 
$s_id=$_GET["s_id"];
include_once 'connection.php';
?>
<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Выбор места</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
 </head>
 <body>

  <ul id="nav">
      <li><a href="/index.php">Афиша</a></li>
      <li><a href="" onclick=history.back()>Расписание</a></li>
      
  </ul>
	
<form method="post" action="changepl.php">
   <p><b>Выберите место</b></p>
   <b>Ряд 1</b>
   <input type="checkbox" id="pl1" onchange = Change_CheckBox(document.getElementById("pl1"));>
   <input type="checkbox" id="pl2" onchange = Change_CheckBox(document.getElementById("pl2"));>
   <input type="checkbox" id="pl3" onchange = Change_CheckBox(document.getElementById("pl3"));>
   <input type="checkbox" id="pl4" onchange = Change_CheckBox(document.getElementById("pl4"));>
   <input type="checkbox" id="pl5" onchange = Change_CheckBox(document.getElementById("pl5"));>
   </p> 
   <b>Ряд 2</b>
   <input type="checkbox" id="pl6" onchange = Change_CheckBox(document.getElementById("pl6"));>
   <input type="checkbox" id="pl7" onchange = Change_CheckBox(document.getElementById("pl7"));>
   <input type="checkbox" id="pl8" onchange = Change_CheckBox(document.getElementById("pl8"));>
   <input type="checkbox" id="pl9" onchange = Change_CheckBox(document.getElementById("pl9"));>
   <input type="checkbox" id="pl10" onchange = Change_CheckBox(document.getElementById("pl10"));>
   </p>
   <b>Ряд 3</b>
   <input type="checkbox" id="pl11" onchange = Change_CheckBox(document.getElementById("pl11"));>
   <input type="checkbox" id="pl12" onchange = Change_CheckBox(document.getElementById("pl12"));>
   <input type="checkbox" id="pl13" onchange = Change_CheckBox(document.getElementById("pl13"));>
   <input type="checkbox" id="pl14" onchange = Change_CheckBox(document.getElementById("pl14"));>
   <input type="checkbox" id="pl15" onchange = Change_CheckBox(document.getElementById("pl15"));> 
   </p>
   <input type = "text" name = "s_id" value =<?php echo $s_id ?> hidden />
   
 
<script>
function initSostPl() {
<?php 
$result = $mysqli->query("SELECT * FROM `place` where s_id='$s_id'");
        $row = $result->fetch_assoc(); 
?>
if (String(<?php echo $row["pl1"] ?>)=="true"){
	system.log("t");
	document.getElementById("pl1").checked="checked";
   	document.getElementById("pl1").disabled="disabled";
}
if (String(<?php echo $row["pl2"] ?>)=="true"){
	document.getElementById("pl2").checked="checked";
   	document.getElementById("pl2").disabled="disabled";
}
if (String(<?php echo $row["pl3"] ?>)=="true"){
	document.getElementById("pl3").checked="checked";
   	document.getElementById("pl3").disabled="disabled";
}
if (String(<?php echo $row["pl4"] ?>)=="true"){
	document.getElementById("pl4").checked="checked";
   	document.getElementById("pl4").disabled="disabled";
}
if (String(<?php echo $row["pl5"] ?>)=="true"){
	document.getElementById("pl5").checked="checked";
   	document.getElementById("pl5").disabled="disabled";
}
if (String(<?php echo $row["pl6"] ?>)=="true"){
	document.getElementById("pl6").checked="checked";
   	document.getElementById("pl6").disabled="disabled";
}
if (String(<?php echo $row["pl7"] ?>)=="true"){
	document.getElementById("pl7").checked="checked";
   	document.getElementById("pl7").disabled="disabled";
}
if (String(<?php echo $row["pl8"] ?>)=="true"){
	document.getElementById("pl8").checked="checked";
   	document.getElementById("pl8").disabled="disabled";
}
if (String(<?php echo $row["pl9"] ?>)=="true"){
	document.getElementById("pl9").checked="checked";
   	document.getElementById("pl9").disabled="disabled";
}
if (String(<?php echo $row["pl10"] ?>)=="true"){
	document.getElementById("pl10").checked="checked";
   	document.getElementById("pl10").disabled="disabled";
}
if (String(<?php echo $row["pl11"] ?>)=="true"){
	document.getElementById("pl11").checked="checked";
   	document.getElementById("pl11").disabled="disabled";
}
if (String(<?php echo $row["pl12"] ?>)=="true"){
	document.getElementById("pl12").checked="checked";
   	document.getElementById("pl12").disabled="disabled";
}
if (String(<?php echo $row["pl13"] ?>)=="true"){
	document.getElementById("pl13").checked="checked";
   	document.getElementById("pl13").disabled="disabled";
}
if (String(<?php echo $row["pl14"] ?>)=="true"){
	document.getElementById("pl14").checked="checked";
   	document.getElementById("pl14").disabled="disabled";
}
if (String(<?php echo $row["pl15"] ?>)=="true"){
	document.getElementById("pl15").checked="checked";
   	document.getElementById("pl15").disabled="disabled";
}

}
initSostPl();

function Change_CheckBox(element) {
initSostPl();
  s_id=<?php echo $s_id ?>;
    if (element.checked) { var option = 'true';} 
    else {var option = 'false';} 
    $.ajax({
    url: 'changepl.php',
    type: 'POST',
    data: {s_id:s_id,pl:element.id, option:option},
    success: function(res){
        $('.alert').css('background','green')
        alertOut("Место забронировано."); 
    },
    error: function(){
	$('.alert').css('background','red')
        alertOut("Ошибка");
            }
    });



}		

function alertOut(Text){
  document.getElementById("alert").innerHTML = Text;
  $('.alert').animate({
    bottom: '10px',
    opacity: '1'
  },1000,function(){
    var alertHide = setInterval(function(){
      $('.alert').animate({
        bottom: '-100%',
        opacity: '0'
      },1000);
      clearInterval(alertHide);
    },2000); 
  });
}
</script> 
  </form>


<div class="alert" id="alert"> </div>
</body>
</html>
