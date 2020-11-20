<?php

@session_start();
// Массив доступных для выбора языков
$LangArray = array("ru", "ua", "ro");
// Язык по умолчанию
$DefaultLang = "ru";
// Если язык уже выбран и сохранен в сессии отправляем его скрипту
if(@$_SESSION['NowLang']) {
	// Проверяем если выбранный язык доступен для выбора
	if(!in_array($_SESSION['NowLang'], $LangArray)) {
		// Неправильный выбор, возвращаем язык по умолчанию
		$_SESSION['NowLang'] = $DefaultLang;
	}
}
 else {
 	$_SESSION['NowLang'] = $DefaultLang;
 }
// Выбранный язык отправлен скрипту через GET
$language = addslashes($_GET['lang']);
if($language) {
	// Проверяем если выбранный язык доступен для выбора
	if(!in_array($language, $LangArray)) {
		// Неправильный выбор, возвращаем язык по умолчанию
		$_SESSION['NowLang'] = $DefaultLang;
	}
	 else {
	 	// Сохраняем язык в сессии
	 	$_SESSION['NowLang'] = $language;
	 }
}
// Открываем текущий язык
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang.".$CurentLang.".php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo $Lang['title']; ?></title>
<style type="text/css">
body {margin:0; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:14px; color:#000000;}
h1, h2, h3 {margin:0;}
a {color:#FFFFFF; text-decoration:none;}
img {border:0;}
.header {height:100px; text-align:center; padding:25px; background:#CCCCCC;}
.menu {background:#666666; height:30px; text-align:center;}
.content {padding-left:100px; padding:50px;}
.footer { background:#CCCCCC; padding:10px; text-align:center; border-top: 1px solid #000000;}
</style>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="header">
		<h1><?php echo $Lang['header_title']; ?></h1>
		<h3><?php echo $Lang['site_slogan']; ?></h3>
	</td>
  </tr>
  <tr>
    <td class="menu"><a href="index.php"><?php echo $Lang['index_menu']; ?></a> | <a href="index.php"><?php echo $Lang['contact_menu']; ?></a> | 
	<a href="index.php"><?php echo $Lang['site_map']; ?></a> | <a href="index.php"><?php echo $Lang['advertisement']; ?></a>
	<a href="index.php?lang=ru"><img src="img/ru.png"></a> 
	<a href="index.php?lang=ua"><img src="img/ua.png"></a> 
	<a href="index.php?lang=ro"><img src="img/ro.png"></a>
	</td>
  </tr>
  <tr>
    <td class="content">Данный сайт является примером мультиязычного сайта. Нажимаем на флаги вышеуказанных трех стран и увидем смену языка на сайте</td>
  </tr>
  <tr>
    <td class="footer"> Coding & Design: Live-Code.ru</td>
  </tr>
</table>
</body>
</html>
