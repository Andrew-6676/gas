/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'ru';
	config.height	= 600;
	// config.stylesSet = false;
		// можно указать свой стиль для содержимого, по умолчанию используется <CKEditor folder>/contents.css'
	config.contentsCss = '../../../css/page/page.css';
		//Если установлено true то редактируемая область будет содержать полноценный html документ, если false - только контент (без скриптов и стилей).
	//config.fullPage = true;
	config.skin = 'office2013';
		// какой тег ставить по Enter: _BR, _P, _DIV
	config.enterMode = CKEDITOR.ENTER_BR;
	config.shiftEnterMode = CKEDITOR.ENTER_P;

	config.startupFocus = true; //При открытии стр. где есть радактор - брать фокус на себя

	// config.uiColor = '#f00';
		// Выключаем подсказки названия тэга в строке состояния редактора
	// config.removePlugins = 'elementspath';
		// кодирование кавычек
	config.entities = false;
		// не рабоает почему -то
	//config.extraCss = 'body{background:#F0F;text-align:left;font-size:0.8em;}';

};
