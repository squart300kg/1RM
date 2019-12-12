/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {

	config.language = 'ko';          // 언어설정
    config.uiColor = "#F0F0F0";    // UI색상변경
    config.height = '400px';          // CKEditor 높이  
    config.width = '1125px';           // CKEditor 넓이    

    config.enterMode = CKEDITOR.ENTER_BR;            // Enter 입력시 <br/> 태그 변경
    config.shiftEnterMode = CKEDITOR.ENTER_P;        // Enter 입력시 <p> 태그 변경
    config.startupFocus = true;                                  // 시작시 포커스 설정
    config.font_defaultLabel = 'Gulim';                        // 기본 글씨 폰트
    config.font_names = '굴림/Gulim;돋움/Dotum;바탕/Batang;궁서/Gungsuh;';    // 사용가능한 기타 폰트 설정(한글폰트)
    config.fontSize_defaultLabel = '12px';                   // 기본 글씨 폰트 사이즈
    config.toolbarCanCollapse = true;//에디터 상단의 툴바를 접을 수 있게 함
 
    
    // CKFinder 설정
    //config.filebrowserBrowseUrl = 'ckfinder_php_3.5.0/ckfinder/ckfinder.html';
    config.filebrowserBrowseUrl = 'boardImagesUpload.php';
    config.filebrowserImageBrowseUrl = 'ckfinder_php_3.5.0/ckfinder/ckfinder.html?Type=Images';
    //config.filebrowserImageBrowseUrl = 'boardImagesUpload.php';
    //config.filebrowserFlashBrowseUrl = 'ckfinder_php_3.5.0/ckfinder/ckfinder.html?Type=Flash';
    config.filebrowserFlashBrowseUrl = 'boardImagesUpload.php';
    //config.filebrowserUploadUrl = 'ckfinder_php_3.5.0/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
    config.filebrowserUploadUrl = 'boardImagesUpload.php';
    //config.filebrowserImageUploadUrl ='ckfinder_php_3.5.0/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
    config.filebrowserImageUploadUrl = 'boardImagesUpload.php';
    //config.filebrowserFlashUploadUrl ='ckfinder_php_3.5.0/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';
    config.filebrowserFlashUploadUrl = 'boardImagesUpload.php';

	// Define changes to default configuration here.
	// For complete reference see:
	// https://ckeditor.com/docs/ckeditor4/latest/api/CKEDITOR_config.html

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors' },
		{ name: 'about' }
	];
	 config.extraPlugins = 'font';

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
};
