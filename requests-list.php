<?
global $arParams;
$arParams['TITLE'] = 'Заявки список';
?>

<?require_once($_SERVER['DOCUMENT_ROOT'].'/markup/header.php');?>
<div class="pink-header-line">
	<div class="container">
		<h1>Заявки список:</h1>
		<ul class="nav nav-tabs">
			<li><a href="personal-data.php">Персональные данные</a></li>
			<li><a href="calculations-list.php">Расчеты</a></li>
			<li class="active"><a href="request-page.php">Заявки</a></li>
			<li><a href="calculate-page.php">Рассчитать перевозку</a></li>
		</ul>
	</div>
</div>
<div class="container">
	<div class="filter-block">
		<form action="/">
			<div class="row">
				<div class="col-md-6">
					<select class="calculator-select">
						<option selected disabled>Страна-Откуда </option>
						<option value="1">Значение 1</option>
						<option value="2">Значение 2</option>
						<option value="1">Значение 3</option>
						<option value="2">Значение 4</option>				
					</select>
				</div>
				<div class="col-md-6">
					<select class="calculator-select">
						<option selected disabled>Страна-Куда</option>
						<option value="1">Значение 1</option>
						<option value="2">Значение 2</option>
						<option value="1">Значение 3</option>
						<option value="2">Значение 4</option>				
					</select>
				</div>				
				<div class="col-md-6">
					<select class="calculator-select">
						<option selected disabled>Город-Откуда </option>
						<option value="1">Значение 1</option>
						<option value="2">Значение 2</option>
						<option value="1">Значение 3</option>
						<option value="2">Значение 4</option>				
					</select>
				</div>					
				<div class="col-md-6">
					<select class="calculator-select">
						<option selected disabled>Город-Куда</option>
						<option value="1">Значение 1</option>
						<option value="2">Значение 2</option>
						<option value="1">Значение 3</option>
						<option value="2">Значение 4</option>				
					</select>
				</div>
				<div class="col-xs-12 text-right text-sm-center ">
					<input type="text" id="dateCreateField" class="filter-input js-datepicker" placeholder="Дата создания">
					<input type="text" id="calcNumberField" class="filter-input" placeholder="Номер расчета">
					<input type="submit" value="Поиск" class="btn btn-yellow mt-sm-25 ml-sm-0">					

				</div>
			</div>
		</form>
	</div>
	<h2 class="with-line transparent"><span>Список заявок</span></h2>
</div>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="table-responsive table-sort" style="max-width: 100%">
					<div class="stripped-table red-cells-on-hover" style="min-width: 940px;">
						<div class="table-row table-header-row" style="margin-top: 20px;">
							<a href="#" style="width: 10%" class="table-heading sorting_asc">Номер рассчета</a>
							<a href="#"  style="width: 11%" class="table-heading sorting_desc">Суммарная стоимость</a>
							<a href="#"  style="width: 9%;" class="table-heading sorting">Откуда</a>
							<a href="#"  style="width: 8%;" class="table-heading sorting">Куда</a>
							<a href="#"  style="width: 7%;" class="table-heading sorting">Товар</a>
							<a href="#"  style="width: 10%" class="table-heading sorting">Тип<br>доставки</a>
							<a href="#"  style="width: 8%;" class="table-heading sorting">Вес</a>
							<a href="#"  style="width: 8%;" class="table-heading sorting">Объем</a>
							<a href="#" style="width: 13%;" class="table-heading sorting">Идентификатор</a>
							<a href="#"  style="width: 10%" class="table-heading sorting">Дата создания</a>
						</div>
						<div class="gray-table-container">
							<div class="table-responsive">
								<div class="table-responsive" style="height: 560px;">
									<div class="table-body">
										<?for($i = 0; $i < 10; $i++){?>
											<div onclick="javascript:location.href='#';" class="table-row">
												<span style="width: 10%" class="table-cell">1</span>
												<span style="width: 11%" class="table-cell">1</span>
												<span style="width: 9%" class="table-cell">Москва</span>
												<span style="width: 8%" class="table-cell">Милан</span>
												<span style="width: 8%" class="table-cell"><?=$i?></span>
												<span style="width: 10%" class="table-cell">Авиа</span>
												<span style="width: 8%" class="table-cell">45</span>
												<span style="width: 8%" class="table-cell">3</span>
												<span style="width: 13%" class="table-cell">3</span>
												<span style="width: 10%" class="table-cell">21.06.2018</span>
											</div>
										<? } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>						
		<div class="row">
			<div class="col-sm-6 text-center text-md-left">
				<div>
			      <ul class="pagination pagination-sm mt-25">
			        <li class="disabled"><a href="#">«</a></li>
			        <li class="active"><a href="#">1</a></li>
			        <li><a href="#">2</a></li>
			        <li><a href="#">3</a></li>
			        <li><a href="#">4</a></li>
			        <li><a href="#">5</a></li>
			        <li><a href="#">»</a></li>
			      </ul>
			    </div>
			</div>
			<div class="col-sm-6 table-footer-button mt-25">
				<a href="javascript:;" class="btn btn-pink">Рассчитать перевозку</a>
			</div>									
		</div>	
		<div class="row">
			<div class="col-xs-12 text-center text-md-left">
				<a href="javascript:;" class="btn-excel">Выгрузить в excel</a>
			</div>
		</div>
	</div>
</div>

<?require_once($_SERVER['DOCUMENT_ROOT'].'/markup/footer.php');?>