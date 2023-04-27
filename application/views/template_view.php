<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>ToDo List</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/jquery-1.6.2.js" type="text/javascript"></script>
		<script src="js/script.js" type="text/javascript"></script>
	</head>
	<body>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-6 logo">
						<strong>ToDo List</strong>
					</div>	
					<div class="col-6 dashboard-entrance">
						<a href="#!">Личный кабинет</a>
					</div>	
				</div>
			</div>
		</header>
		<div class="workarea">
			<div class="container">
				<div class="content">
					<?php include 'application/views/'.$content_view; ?>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<p>Данный ToDo List доступен для просмотра всем.</p>
				<p>Добавление задач возможно всем посетителям, редактирование — только администратору. </p>
				<p>Пользователь администратора: <strong>admin:123</strong>.</p>
			</div>
		</footer>
		<!--
		<div id="wrapper">
			<div id="header">
				<div id="logo">
					<a href="/todo">ОЛОЛОША</span> <span class="cms">TEAM</span></a>
				</div>
				<div id="menu">
					<ul>
						<li class="first active"><a href="/todo">Главная</a></li>
						<li><a href="portfolio">Портфолио</a></li>
					</ul>
					<br class="clearfix" />
				</div>
			</div>
			<div id="page">
				<div id="sidebar">
					<div class="side-box">
						<h3>Случайная цитата</h3>
						<p align="justify" class="quote">
						«Сайт, как живой организм, изменяется и развивается.
						Нельзя сразу написать идеальный вариант и на этом откланяться - это утопия»
						</p>
						<p align="justify" class="quote">
						«Все должно быть очень просто, как текстовый файл и при этом функционально
						и тогда пользователи от нас уйдут»
						</p>
						<p align="justify" class="quote">
						«Критика - это когда критик объясняет автору, как сделал бы он, если бы умел»
						</p>
						<p align="justify" class="quote">
						«Сумасшедшим становиться тот, кто попытался разобраться в этом сумасшедшем мире»
						</p>
						<p align="justify" class="quote">
						«Опытный разработчик знает, какой выбор ведет к поставленной цели, в то время как
						новичок каждый раз делает шаг в неизвестность»
						</p>
					</div>
					<div class="side-box">
						<h3>Основное меню</h3>
						<ul class="list">
							<li class="first "><a href="/todo">Главная</a></li>
							<li><a href="portfolio">Портфолио</a></li>
						</ul>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					</div>
					<br class="clearfix" />
				</div>
				<br class="clearfix" />
			</div>
			<div id="page-bottom">

				<div id="page-bottom-content">
					<h3>Справочная информация</h3>
					<p>
						Данный ToDo List доступен для просмотра всем. 
						Редактирование возможно только авторизированным пользователям. 
						Пользователь: <strong>admin:123</strong>.
					</p>
				</div>
				<br class="clearfix" />
			</div>
		</div>
		<div id="footer">
			&copy; <a href="/todo">ToDo List</a></a>
		</div>-->
	</body>
</html>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>