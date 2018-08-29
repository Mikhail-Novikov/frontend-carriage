<?
global $arParams;
$arParams['TITLE'] = 'Рассчитать перевозку';
?>

<?require_once($_SERVER['DOCUMENT_ROOT'].'/markup/header.php');?>
<div class="calculator-background">
	<div class="pink-header-line pink-header-line--gray transparent">
		<div class="container">
			<h1>Расчет:</h1>
			<ul class="nav nav-tabs">
				<li><a href="personal-data.php">Персональные данные</a></li>
				<li><a href="calculate-page.php">Расчеты</a></li>
				<li><a href="request-page.php">Заявки</a></li>
				<li class="active"><a href="calculate-page.php">Рассчитать перевозку</a></li>
			</ul>
		</div>
	</div>
	<div id="calculator" class="content">
		<form class="form-content container js-content-validate" action="" >
			<div class="row">
				
				<div class=" calculator-white-container">


					<div class="col-md-3">
						<h2 class="nowrap">Параметры груза:</h2>
					</div>
					<div class="col-md-9 ">
						<label class="calculate-tag-label">
							<input id="type_delivery_general" class="calculate-checkbox type_delivery" type="radio" name="CARRIAGE_TYPE" value="Генеральня">
							<span class="calculate-checkbox-custom"></span>
							<span class="calculate-label">Генеральная перевозка</span>
						</label>
						<label class="calculate-tag-label">
							<input id="type_delivery_assemb" class="calculate-checkbox" type="radio" name="CARRIAGE_TYPE" value="Сборная" checked>
							<span class="calculate-checkbox-custom"></span>
							<span class="calculate-label">Сборная перевозка</span>
						</label>                
					</div>
					<div class="clearfix"></div>

					<div class="col-md-6 col-xs-12 w50-print">
						<div class="calculator-line without-cross">
							<i class="calculator-weight"></i>
							<div class="calculator-input-container">

								<input id="base_weight" type="number" class="calculator-input"  placeholder="Вес" name='base_weight'>
								<input id="base_places" type="number" class="calculator-input"  placeholder="Мест" name='base_places'>
								<input id="base_volume" type="number" class="calculator-input"  placeholder="Объем" name='SCOPE'>
							</div>
						</div>
						<div class="calculator-line">
							<i class="calculator-ruller"></i>
							<div class="calculator-input-container">							
								<input id="base_length" type="number" class="calculator-input" placeholder="Длина" name='base_length'>
								<i class="calculator-cross"></i>
								<input id="base_width" type="number" class="calculator-input" placeholder="Ширина" name='base_width'>
								<i class="calculator-cross"></i>
								<input id="base_height" type="number" class="calculator-input" placeholder="Высота" name='base_height'>
							</div>
						</div>

					</div>
					<div class="col-md-6 col-xs-12 w50-print">
						<div class="calculator-line text-lg-right">
							<i class="calculator-package"></i>
							<select id="prop_pack" class="calculator-select js-select" name='prop_pack'>
								<option selected disabled>Упаковка</option>
								<option value="1">Упаковка 1</option>
								<option value="2">Упаковка 2</option>
								<option value="3">Упаковка 3</option>
								<option value="4">Упаковка 4</option>
							</select>
							<i class="calculator-pricetag"></i>
							<select id="prop_goods"	class="calculator-select js-select" name='prop_goods'> 
								<option selected disabled>Товар</option>
								<option value="1">Значение 1</option>
								<option value="2">Значение 2</option>
							</select>
						</div>
						<div class="calculator-line  without-cross rb text-lg-right">

							<select id="prop_descr" class="calculator-select js-select ml-0 calculator-select--multiple" name='prop_descr' multiple data-placeholder="Особенности груза">
								<option value="не компактный">не компактный</option>
								<option value="стеклянный">стеклянный</option>
								<option value="горючий">горючий</option>
								<option value="химический">химический</option>
								<option value="колючий">колючий</option>
								<option value="живой">живой</option>
							</select>

								<input id="prop_invoice" type="number" class="calculator-input rb w125-print" placeholder="Стоимость по инвойсу" name='prop_invoice'>

								<select id="prop_currency" class="calculator-select currency js-select w35-print" name='prop_currency'>
									<option selected value="1">&#36;</option>
									<option value="2">R</option>
									<option value="3">&euro;</option>
								</select>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 col-md-12 col-xs-12 calculator-white-container pr-15-print pl-15-print w50-print border-print">
					<h2>Параметры перевозки:</h2>
					<div class="row">
						<div class="col-sm-6 col-xs-12 w50-print">
							<select id="param_delivery_t" class="calculator-select-bordered chosen js-select-param" name="CUSTOMS_ID">
								<option selected disabled>Таможня назначение</option>
								<option value="t1">Назначение 1</option>
								<option value="t2">Назначение 2</option>
								<option value="t3">Назначение 3</option>
								<option value="t4">Назначение 4</option>								
								<option value="t5">Назначение 5</option>
							</select>
						</div>
						<div class="col-sm-6 col-xs-12 w50-print">
							<select id="param_delivery_d" class="calculator-select-bordered chosen js-select-param" name="TYPE_OF_DELIVERY_ID">
								<option selected disabled>Тип доставки</option>
								<option value="1">Доставка 1</option>
								<option value="2">Доставка 2</option>
								<option value="3">Доставка 3</option>
								<option value="4">Доставка 4</option>
							</select>
						</div>
					</div>
					<h2 style="margin-top: 69px;">Маршрут:</h2>
					<div class="row">

						<div class="col-sm-6 col-xs-12 w50-print">
							<input id="param_delivery_from_id" type="hidden" name="LOCATION_ID">
							<input type="text" id="param_delivery_from" class="calculator-select-machroute chosen chosen-machroute" name="param_delivery_from">	
							<div class="selection-ajax selection-ajax--machroute"></div>
						</div>

						<div class="col-sm-6 col-xs-12 w50-print">
							<input id="param_delivery_to_id" type="hidden" name="WHERE_ID">						
							<input id="param_delivery_to" class="calculator-select-machroute chosen chosen-machroute" name="param_delivery_to">
							<div class="selection-ajax selection-ajax--machroute"></div>							
						</div>
					</div>
					
					<div class="calculator-bottom-button">
						<a href="#" class="btn btn-yellow btn-calculator w-100 js-open-notready-window">Не готов подтвердить</a>
					</div>
				</div>
				<div class="col-lg-6 col-md-12 col-xs-12 w50-print">
						
						<div class="calculator-white-blue-container w100-print border-print">
							<div class="tab-content">
								<div id="home" class="tab-pane fade in active">
									<h2 style="margin-bottom: 0px;">Расчет:</h2>
									<div class="table-responsive" style="max-width: 100%">
										<div class="calculator-dashed-table">
											<div class="table-row table-heading">
												<span class="table-cell"></span>
												<span class="table-cell"></span>
												<span class="table-cell js-add-currency"><span class="only-desktop">Стоимость,</span>&#36;:</span>
												<span class="table-cell">Дней:</span>
											</div>
											<div class="table-row" data-trigger="truck">
												<span class="table-cell"><i class="calcualtion-truck"></i></span>
												<span class="table-cell">АВТО</span>
												<span style="text-align: center;" class="table-cell">150</span>
												<span style="text-align: center;" class="table-cell">7</span>
											</div>
											<div class="table-row" data-trigger="train">
												<span class="table-cell"><i class="calcualtion-train"></i></span>
												<span class="table-cell">Ж/Д</span>
												<span style="text-align: center;" class="table-cell">1000</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row" data-trigger="ship">
												<span class="table-cell"><i class="calcualtion-ship"></i></span>
												<span class="table-cell">МОРЕ</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row" data-trigger="plane">
												<span class="table-cell"><i class="calcualtion-plane"></i></span>
												<span class="table-cell">АВИА</span>
												<span style="text-align: center;" class="table-cell">В разработке</span>
												<span style="text-align: center;" class="table-cell"></span>
											</div>
										</div>
									</div>

									<div class="calculator-table-footer">
										<a href="javascript:;" class="only-desktop d-none-print" onclick="window.print();return false;"><i class="print-icon"></i></a>
										<label class="calculator-table-footer-label">
											<input class="calculate-checkbox js-check-coverage" type="checkbox" name="coverage" value="coverage1" checked="">
											<span class="calculate-checkbox-custom"></span>
											<span class="calculate-label">Страховка</span>
										</label>
										<a href="javascript:;" class="btn btn-pink btn-calculator-pink js-open-infocargo-window d-none-print">Подтвердить заявку</a>
									</div>

								</div>
								<div id="truck" class="tab-pane fade">
									<div class="table-responsive" style="max-width: 100%">
										<div class="calculator-dashed-table flat">
											<div class="table-row table-heading">
												<span class="table-cell"></span>
												<span class="table-cell"></span>
												<span class="table-cell js-add-currency"><span class="only-desktop">Стоимость,</span>&#36;:</span>
												<span class="table-cell">Дней:</span>
											</div>
											<div class="table-row">
												<span class="table-cell"><i class="calcualtion-truck"></i></span>
												<span style="color: #ff3366; font-weight: 600;" class="table-cell">АВТО</span>
												<span style="text-align: center;color: #ff3366;font-weight: 600;" class="table-cell">1000</span>
												<span style="text-align: center;color: #ff3366;font-weight: 600;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
										</div>
									</div>
									<div class="calculator-table-footer">
										<a href="javascript:;" class="only-desktop"><i class="print-icon"></i></a>
											<label class="calculator-table-footer-label">
											<input class="calculate-checkbox js-check-coverage" type="checkbox" name="coverage" value="coverage1" checked="">
											<span class="calculate-checkbox-custom"></span>
											<span class="calculate-label">Страховка</span>
										</label>
										<a href="javascript:;" class="btn btn-pink btn-calculator-pink js-open-infocargo-window">Подтвердить заявку</a>
									</div>
								</div>
								<div id="train" class="tab-pane fade">
									<div class="table-responsive" style="max-width: 100%">
										<div class="calculator-dashed-table flat">
											<div class="table-row table-heading">
												<span class="table-cell"></span>
												<span class="table-cell"></span>
												<span class="table-cell js-add-currency">Стоимость,&#36;:</span>
												<span class="table-cell">Дней:</span>
											</div>
											<div class="table-row">
												<span class="table-cell"><i class="calcualtion-train"></i></span>
												<span style="color: #ff3366; font-weight: 600;" class="table-cell">Ж/Д</span>
												<span style="text-align: center;color: #ff3366;font-weight: 600;" class="table-cell">1000</span>
												<span style="text-align: center;color: #ff3366;font-weight: 600;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
										</div>
									</div>
									<div class="calculator-table-footer">
										<a href="javascript:;" class="only-desktop"><i class="print-icon"></i></a>
											<label class="calculator-table-footer-label">
											<input class="calculate-checkbox js-check-coverage" type="checkbox" name="coverage" value="coverage1" checked="">
											<span class="calculate-checkbox-custom"></span>
											<span class="calculate-label">Страховка</span>
										</label>
										<a href="javascript:;" class="btn btn-pink btn-calculator-pink js-open-infocargo-window">Подтвердить заявку</a>
									</div>
								</div>
								<div id="ship" class="tab-pane fade">
									<div class="table-responsive" style="max-width: 100%">
										<div class="calculator-dashed-table flat">
											<div class="table-row table-heading">
												<span class="table-cell"></span>
												<span class="table-cell"></span>
												<span class="table-cell js-add-currency"><span class="only-desktop">Стоимость,</span>&#36;:</span>
												<span class="table-cell">Дней:</span>
											</div>
											<div class="table-row">
												<span class="table-cell"><i class="calcualtion-ship"></i></span>
												<span style="color: #ff3366; font-weight: 600;" class="table-cell">МОРЕ</span>
												<span style="text-align: center;color: #ff3366;font-weight: 600;" class="table-cell">1000</span>
												<span style="text-align: center;color: #ff3366;font-weight: 600;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
										</div>
									</div>
									<div class="calculator-table-footer">
										<a href="javascript:;" class="only-desktop"><i class="print-icon"></i></a>
											<label class="calculator-table-footer-label">
											<input class="calculate-checkbox js-check-coverage" type="checkbox" name="coverage" value="coverage1" checked="">
											<span class="calculate-checkbox-custom"></span>
											<span class="calculate-label">Страховка</span>
										</label>
										<a href="javascript:;" class="btn btn-pink btn-calculator-pink js-open-infocargo-window">Подтвердить заявку</a>
									</div>
								</div>
								<div id="plane" class="tab-pane fade">
									<div class="table-responsive" style="max-width: 100%">
										<div class="calculator-dashed-table flat">
											<div class="table-row table-heading">
												<span class="table-cell"></span>
												<span class="table-cell"></span>
												<span class="table-cell js-add-currency"><span class="only-desktop">Стоимость,</span>&#36;:</span>
												<span class="table-cell">Дней:</span>
											</div>
											<div class="table-row">
												<span class="table-cell"><i class="calcualtion-plane"></i></span>
												<span style="color: #ff3366; font-weight: 600;" class="table-cell">ВОЗДУХ</span>
												<span style="text-align: center;color: #ff3366;font-weight: 600;" class="table-cell">1000</span>
												<span style="text-align: center;color: #ff3366;font-weight: 600;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
											<div class="table-row">
												<span class="table-cell"></span>
												<span class="table-cell">Услуга 1</span>
												<span style="text-align: center;" class="table-cell">200</span>
												<span style="text-align: center;" class="table-cell">20</span>
											</div>
										</div>
									</div>
									<div class="calculator-table-footer">
										<a href="javascript:;" class="only-desktop"><i class="print-icon"></i></a>
										<label class="calculator-table-footer-label">
											<input class="calculate-checkbox js-check-coverage" type="checkbox" name="coverage" value="coverage1" checked="">
											<span class="calculate-checkbox-custom"></span>
											<span class="calculate-label">Страховка</span>
										</label>
										<a href="javascript:;" class="btn btn-pink btn-calculator-pink js-open-infocargo-window">Подтвердить заявку</a>
									</div>
								</div>
							</div>
						</div>

						<div class="calculator-floating-block">
							<a class="calcualtor-floating-button home" style="display: none;" data-hover-target="home" data-toggle="tab" href="#home"></a>
							<a class="calcualtor-floating-button cyan" data-hover-target="truck" data-toggle="tab" href="#truck"><i class="calcualtion-truck-white"></i></a>
							<a href="#train" class="calcualtor-floating-button pink" data-hover-target="train" data-toggle="tab"><i class="calcualtion-train-white"></i></a>
							<a href="#ship" class="calcualtor-floating-button yellow" data-hover-target="ship" data-toggle="tab"><i class="calcualtion-ship-white"></i></a>
							<a href="#plane" class="calcualtor-floating-button magenta" data-hover-target="plane" data-toggle="tab"><i class="calcualtion-plane-white"></i></a>
						</div>
						
				</div>

				
			</div>
		</form>
	</div>
</div>

<!-- форма информация о грузе -->
<div class="hidden">
	<div class="box-modal js-modal-infocargo">
		<div class="box-modal_close arcticmodal-close"><img src="assets/img/close.png" alt="cargo"></div>
			<h2 class="text-center">Информация о грузе</h2>

				<form method="post" class="form-modal info-goods js-form-validate">
					<div class="wrap-border">
						<p class="title">Укажите данные о поставщике:</p>
							<input id="name_company" type="text" class="modal-input big" placeholder="Наименование предприятия">
						<div class="row">	
							<div class="col-lg-12 col-md-6 col-sm-6 mb-25">

									<select id="info_goods_country" class="calculator-select-machroute chosen chosen-machroute js-select-param">
										<option selected disabled>Страна</option>
										<option value="1">Значение 1</option>
										<option value="2">Значение 2</option>
									</select>

										<div class="form-valid">
											<input id="info_goods_city" type="text" class="modal-input mid" placeholder="Город" name="PROVIDER_CITY">
											<div id="selction-city" class="selection-ajax"></div>
											<span>Поле не заполнено</span>
										</div>
										
										<div class="form-valid">
											<input id='info_goods_province' type="text" class="modal-input mid" placeholder="Провинция">
										<div id="selction-provinces" class="selection-ajax"></div>	
											<span>Поле не заполнено</span>
											
										</div>

										<div class="form-valid">								
											<input id="info_goods_street" type="text" class="modal-input mid" placeholder="Улица" name="street">
											<span>Поле не заполнено</span>
										</div>	

										<div class="form-valid">
											<input id="info_goods_home" type="number" class="modal-input small" placeholder="Дом" name="home">
											<span>Поле не заполнено</span>
										</div>
							</div>
							
							<div class="col-lg-12 col-md-6 col-sm-6 mid-modal-block mb-25">

								<div class="mmb-l">
									<p class="title">Контакты представителя поставщика:</p>	
									<div class="form-valid">
										<input id="info_goods_nic" type="text" class="modal-input big" placeholder="Имя" name="nic">
										<span>Поле не заполнено</span>
									</div>

									<div class="form-valid">								
										<input id="info_goods_phone" type="text" class="modal-input mid" placeholder="Телефон"  data-mask="+7 (999) 999-99-99"  aria-type='phone' name="phone">
										<span>Поле не заполнено</span>
									</div>

									<div class="form-valid">
										<input id="info_goods_email" type="text" class="modal-input mid" placeholder="email" name="email">	
										<span>Поле не заполнено</span>
									</div>

								</div>
								<div class="mmb-r">
									<p class="text-left title">Получатель согласно инвойсу:</p>	

									<div class="form-valid">														
										<input id="info_goods_nic_enterprise" type="text" class="modal-input big" placeholder="Имя"  name="nic_enterprise">	
										<span>Поле не заполнено</span>
									</div>
								</div>

							</div>
							<div class="clearfix"></div>

							<div class="col-md-12 calculator-line">
							<p class="title">Параметры груза:</p>							
								<i class="calculator-ruller"></i>
								<div class="calculator-input-container">	

									<div class="form-valid">													
										<input id="info_goods_length" type="number" class="calculator-input" placeholder="Длина" name="cargo_length">
										<span>Поле не заполнено</span>
									</div>
									<i class="calculator-cross"></i>
									<div class="form-valid">									
									<input id="info_goods_width" type="number" class="calculator-input" placeholder="Ширина" name="cargo_width">
										<span>Поле не заполнено</span>
									</div>

									<i class="calculator-cross"></i>
									<div class="form-valid">								
										<input id="info_goods_height" type="number" class="calculator-input" placeholder="Высота" name="cargo_height">
										<span>Поле не заполнено</span>
									</div>

								</div>
							</div>
						<div class="col-xs-12">
							<p class="title">Ваш комментарий:</p>						
							<textarea class="calculator-textarea"></textarea>
						</div>

						</div>

					</div>
					<div class="modal-info">
						<span class="text-warning">Параметры не соответствуют типу транспорта:</span> 
						<a href="/markup/calculate-page.php" class="btn btn-gray ">Изменить на странице расчета</a>
						<a href="/markup/calculate-page.php" class="btn btn-gray icon-back arcticmodal-close">Вернуться в калькулятор</a>

					</div>
					<div class="text-center mt-25">
					<button type="submit" class="btn btn-pink btn-calculator-pink">Подтвердить заявку</button></div>
				</form>	
	</div>	
		<!-- форма Не готов подтвердить -->
	<div class="box-modal js-modal-notready">
		<div class="box-modal_close arcticmodal-close"><img src="assets/img/close.png"></div>

			<form method="post" class="form-modal form-notready js-form-validate">
				<h2 class="text-center">Не готов подтвердить</h2>
				<p class="title text-center mb-25">Выберите причину, по которой вы не готовы подтвердить заявку:</p>

				<div class="form-notready-wrap">
					<label class="calculate-tag-label">
						<input class="calculate-checkbox" type="checkbox" name="notready[]" value='notready1'>
						<span class="calculate-checkbox-custom"></span>
						<span class="calculate-label">груз не готов </span>
					</label>
					<label class="calculate-tag-label">
						<input class="calculate-checkbox" type="checkbox" name="notready[]" value='notready2'>
						<span class="calculate-checkbox-custom"></span>
						<span class="calculate-label">дорого</span>
					</label>
					<label class="calculate-tag-label">
						<input class="calculate-checkbox" type="checkbox" name="notready[]" value='notready3'>
						<span class="calculate-checkbox-custom"></span>
						<span class="calculate-label">убрать услугу</span>
					</label>
					<label class="calculate-tag-label">
						<input class="calculate-checkbox" type="checkbox" name="notready[]" value='notready4'>
						<span class="calculate-checkbox-custom"></span>
						<span class="calculate-label">добавить услугу</span>
					</label>
					<label class="calculate-tag-label">
						<input class="calculate-checkbox" type="checkbox" name="notready[]" value='notready5'>
						<span class="calculate-checkbox-custom"></span>
						<span class="calculate-label">сроки не устраивают</span>
					</label>

					<p class="reason">Пожалуйста, укажите хотя бы одну причину<p>

					<p class="title mt-25 mb-25">Если вам необходима помощь в работе с системой или консультация свяжитесь с вашим менеджером:</p>

					<div class="form-valid">
						<p class="modal-input mid info-field" title="Админ админ адм">Админ админ адм</p>

					</div>
					<div class="form-valid">					
						<a href="tel:+78128888888" class="modal-input mid info-field" title="+7(812)888-88-88">+7(812)888-88-88</a>

					</div>	
					<div class="form-valid">
						<a href="mailto: freelines@freelines.ru" class="modal-input mid info-field" title="freelines@freelines.ru">freelines@freelines.ru</a>

					</div>	
				</div>

				<div class="text-center mt-25">
				<button class="btn btn-pink btn-calculator-pink js-btn-notready" >Сохранить</button></div>

			</form>
	</div>		

		<!-- окно страховки -->
	<div class="box-modal js-modal-coverage">
		<div class="box-modal_close arcticmodal-close"><img src="assets/img/close.png"></div>
				<p class="text-center coverage-text  mt-25">Обратите внимание, что отказываясь от страхования груза, Вы берете на себя риски, связанные с повреждением и утерей.</p>
	</div>

</div>
	
<?require_once($_SERVER['DOCUMENT_ROOT'].'/markup/footer.php');?>