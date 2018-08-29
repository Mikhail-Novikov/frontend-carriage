//var ajax_list_link;
var ajax_list_link = 'assets/js/point2.json';
var delWrapHiddenInput;
var autocompletionField;
var validContent;

$(function() {
	var form = $('.form-content'),
	dType = form.find('input[name="CARRIAGE_TYPE"]'),
	gBaseWeight = form.find('#base_weight'),
	gBasePlaces = form.find('#base_places'),
	gBaseVolume = form.find('#base_volume'),
	gBaseLength = form.find('#base_length'),
	gBaseWidth = form.find('#base_width'),
	gBaseHeight = form.find('#base_height'),
	gPropPack = form.find('#prop_pack'),
	gPropGoods = form.find('#prop_goods'),
	dParamTmg = form.find('#param_delivery_t'),	
	dParamDelType = form.find('#param_delivery_d'),			
	dParamFrom = form.find('#param_delivery_from'),	
	dParamTo = form.find('#param_delivery_to'),		
	gPropCurrency = form.find('#prop_currency');

	var formModal = $('.form-modal'),
	gCargoLength = formModal.find('#info_goods_length'),
	gCargoWidth = formModal.find('#info_goods_width'),
	gCargoHeight = formModal.find('#info_goods_height');

	//Создали условия для типа перевозок
	form.find('input[type="number"]:not(#base_volume)').on('click keyup change focus', function() {
		var numInput = this.value.match(/^\d+$/);
		if ($(this).val() < 0 || numInput === null) {
			$(this).val('');
		}

		if (gBaseLength.val() > 20 || gBaseLength.val() * gBasePlaces.val() > 20 || gBaseWeight.val() > 14000) {
			dType.filter('[value=Генеральня]').prop('checked', true);
		} else {
			dType.filter('[value=Сборная]').prop('checked', true);
		}
		dataExInput();
		//подсчёт объема
		if (gBaseWidth.val() * gBaseHeight.val() * gBaseLength.val() == 0) {
			gBaseVolume.val('ДxШxВ');
		} else {
			gBaseVolume.val(gBaseWidth.val() * gBaseHeight.val() * gBaseLength.val()).attr('readonly', true);
		}
		validContent();
	})

	//сброс значений ДxШxВ пр ручном вводе объема
	form.find('#base_volume').on('click keyup change focus', function() {		
		if (gBaseWidth.val() * gBaseHeight.val() * gBaseLength.val() == 0) {
			gBaseVolume.attr('readonly', false);
			gBaseWidth.val('');
			gBaseHeight.val('');
			gBaseLength.val('');			
		}
	})

	//подстановка значений полей в модальные окна и обратно
	$('#calculator').on('click', '.js-open-infocargo-window', function() {
		dataExInput();
		formModal.find('input').on('click keyup change focus', function() {
			gBaseLength.val(gCargoLength.val());
			gBaseWidth.val(gCargoWidth.val());
			gBaseHeight.val(gCargoHeight.val());
		});
	})

	function dataExInput() {
		gCargoLength.val(gBaseLength.val());
		gCargoWidth.val(gBaseWidth.val());
		gCargoHeight.val(gBaseHeight.val());
	}

	//Собираем коллекцию значений полей перед отправкой форм
	$('.js-open-notready-window').click(function() {
		$('.form-notready').append("<div class='js-wrap-hidden-input'></div>");
		addHiddenInputForm();
	});
	$('.js-open-infocargo-window').click(function() {
		$('.info-goods').append("<div class='js-wrap-hidden-input'></div>");
		addHiddenInputForm();
	});

	function addHiddenInputForm() {
		$('.form-content').find("input:checked, input[type='number'], input[type='text'], input[type='hidden'], .js-select, .js-select-param").each(function(index, el) {
			var $this = $(this);
			$this.clone().appendTo('.js-wrap-hidden-input').val($this.val()).attr("type", "hidden").css('display', 'block');	
		});
	}
	delWrapHiddenInput = function delWrapHiddenInput() {
		$('.js-wrap-hidden-input').remove();
	}

		    //проверка обязательных полей на основной странице калькулятора

	var contentValidateSet = {
    rules: {
        SCOPE: "required SCOPE",
        TYPE_OF_DELIVERY_ID: "required",
        CUSTOMS_ID: "required",
        WHERE_ID: "required",
        LOCATION_ID: "required",
    },
    errorPlacement: function(error, element) {}
	}
	$.validator.setDefaults({ ignore: ":hidden:not(.chosen) :hidden:not(input[name='LOCATION_ID'])" })
	$.validator.messages.required = '';

	$.validator.addMethod('SCOPE', function(value, element) {
		return this.optional(element) || /^[0-9]{1,25}$/i.test(value);
	}, '');

	$('.js-content-validate').validate(contentValidateSet);	 

	validContent = function validContent(id){	
		return $(".js-content-validate").valid();
	};

	//автодополнение полей поиска
	var type,
	query,
	ajaxListLink = ajax_list_link,
	direction = "LOCATION",
	dataArray;


	$('body').on('click', function(event) {
		switch (event.target.id) {
			case 'info_goods_city':
			type = 4;
			suggestionAjax(event.target.id);			
			break;
			case 'info_goods_province':
			type = 5;
			suggestionAjax(event.target.id);			
			break;
			case 'param_delivery_from':
			direction = "LOCATION";		
			type = 0;				
			suggestionAjax(event.target.id);			
			break;
			case 'param_delivery_to':
			type = 0;			
			direction = "WHERE";
			suggestionAjax(event.target.id);			
			break;						
			default:
			type = 0;
		}
	});


	function dataAjax(response){
			var dataArray = $.map(response, function(value){
				return {value: value.NAME, data: value.VALUE, cur_id: value.CURRENCY_ID};
			});
			return dataArray;
	}

	var suggestionAjax = function suggestionAjax(eventId) {
		var el = '#' + eventId;
		autocomplete = $(el).autocomplete({

			serviceUrl: ajaxListLink,
			minChars: 3,
			appendTo: $(el).next('.selection-ajax'),
			ajaxSettings: {
				dataType: "json",
				method: "GET",
				data: {
					dataType: "json",
					QUERY:  function(){ return $(el).val() },
					TYPE: type,
					TYPE_OF_DELIVERY_ID: $('#param_delivery_d').val(),
					DIRECTION: direction,
					CARRIAGE_TYPE: $('#type_delivery_assemb').prop("checked") == true ? 'Сборная' : 'Генеральня',
					COUNTRY_ID: $('#info_goods_country').val()
				}
			},
			transformResult: function(response, originalQuery) {				
				return {
					suggestions: dataAjax(response)
				};
			},
			onSelect: function(suggestion,x,b) {	
				console.log(suggestion);	
				setTimeout(resetForm, 500);
				validForm();
				validContent();
				switch (el) {
					case '#param_delivery_from':
						$('#param_delivery_from_id').val(suggestion.data);
						if (suggestion.cur_id != null && suggestion.cur_id > 0 && suggestion.cur_id < 4) {
							$("#prop_currency").val(suggestion.cur_id).trigger('chosen:updated');
							$('.js-add-currency').text('Стоимость,' + $('#prop_currency').next('.chosen-container-single').find('.chosen-single').text() + ":" );
						}							
					break;
					case '#param_delivery_to':
						$('#param_delivery_to_id').val(suggestion.data);
					break;
				};
			}
		});
	}
});