<?
global $arParams;
$arParams['TITLE'] = 'Персональная информация';
?>

<?require_once($_SERVER['DOCUMENT_ROOT'].'/markup/header.php');?>
<div class="pink-header-line">
	<div class="container">
		<h1>Персональная информация:</h1>
		<ul class="nav nav-tabs">
			<li class="active"><a href="personal-data.php">Персональные данные</a></li>
			<li><a href="calculate-page.php">Расчеты</a></li>
			<li><a href="request-page.php">Заявки</a></li>
			<li><a href="calculate-page.php">Рассчитать перевозку</a></li>
		</ul>
	</div>
</div>
<div class="content">
	<hr class="line-under-tabs">
	<div class="container">
			<form>	
				<div class="blue-gradient-container clearfix">
					<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 personal-data-block personal-data-block--short">
						<ul class="dotted-list">
							<li><span class="dotted-list-title">Компания</span><textarea class="dotted-list-value" readonly>Red look</textarea></li>
							<li><span class="dotted-list-title">Дата создания</span><textarea class="dotted-list-value" readonly>21.07.2018</textarea></li>
						</ul>
					</div>
					<div class="col-lg-offset-1 col-lg-3 col-md-6 col-sm-6 col-xs-12 personal-data-block personal-data-block--short">
						<ul class="dotted-list">
							<li><span class="dotted-list-title">Фамилия</span><textarea class="dotted-list-value" readonly>Иванов</textarea></li>
							<li><span class="dotted-list-title">Имя</span><textarea class="dotted-list-value" readonly>Иван</textarea></li>
							<li><span class="dotted-list-title">Отчество</span><textarea class="dotted-list-value" readonly>Иваныч</textarea></li>
						</ul>
					</div>
					<div class="col-lg-offset-1 col-lg-4 col-md-6 col-sm-6 col-xs-12 personal-data-block  personal-data-block--long">
						<ul class="dotted-list">
							<li><span class="dotted-list-title">E-mail</span><textarea class="dotted-list-value" readonly>hello@redlook.com</textarea></li>
							<li><span class="dotted-list-title">Телефон</span><textarea class="dotted-list-value" readonly>+7 910 44 66</textarea></li>
						</ul>
					</div>
					<div class="col-xs-12 text-right">
						<a href="#" class="btn-change js-change-persona-data">Изменить</a>
					</div>
					<div class="clearfix"></div>
					<div class="change-persona-data">
						<p class="title">Хотите изменить пароль?</p>
						<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
								<label>введите новый пароль</label>
								<input type="password" name="" placeholder="">
							</div>
							<div class="col-lg-4 col-md-6  col-sm-6 col-xs-12">
								<label>подтвердите новый пароль</label>							
								<input type="password" name="" placeholder="">							
							</div>
							<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 text-md-right">

								<button class="btn btn-yellow" type="submit">Сохранить изменения</button>
							</div>
						</div>						
					</div>						
				</div>
			</form>

        <div class="row">
            <div class="col-md-12">
                <a href="/calculation/" onclick="javascript:;" class="btn btn-pink">Рассчитать перевозку</a>
            </div>
        </div>

		</div>
	</div>
</div>
<?require_once($_SERVER['DOCUMENT_ROOT'].'/markup/footer.php');?>