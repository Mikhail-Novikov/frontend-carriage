<?global $arParams?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?=$arParams['TITLE']?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<link rel="stylesheet" href="assets/css/bootstrap-reboot.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/animated-input.css">
	<link rel="stylesheet" href="assets/css/validate.css">
	<link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">	
	<link rel="stylesheet" href="assets/css/datatables.min.css">
	<link rel="stylesheet" href="assets/css/jquery.arcticmodal-0.3.css">
	<link rel="stylesheet" href="assets/css/chosen.min.css">				
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/responsive.css">	
	<link rel="stylesheet" href="assets/css/print.css" media="print"/>
</head>
<body>
	<div class="header-wrapper">
		<div class="container">
			<div class="row header">
				<div class="col-md-6 col-sm-6 col-xs-12 logo-block">
					<a href="#"><div class="logo"></div></a>
					<!-- <p class="header-slogan">Мы считаем, вы зарабатываете</p> -->
				</div>
				<?if($arParams['HIDE_AUTH'] != true) {?>
					<div class="col-md-6 col-sm-6 col-xs-12 auth-block <?= $arParams['HIDE_AUTH'] ? 'hidden' : ''?>">
						<div class="wrap-dropdown-menu">
							<a href="#"><i class="user-icon"></i><span>Александр Длиннофамильевский</span></a>
							<i class="arrow-down"></i>
							<ul class="dropdown-menu">
								<li><a href="">Выход<i class="glyphicon glyphicon-log-out"></i></a></li>
							</ul>
						</div>
					</div>
				<? } ?>
			</div>
		</div>
	</div>