CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'pt-br';
	// config.uiColor = '#AADC6E';
	config.height = 200;
	config.filebrowserBrowseUrl      = 'plugins/ckeditor/ckfinder/ckfinder.html',
	config.filebrowserImageBrowseUrl = 'plugins/ckeditor/ckfinder/ckfinder.html?type=Images',
	config.filebrowserFlashBrowseUrl = 'plugins/ckeditor/ckfinder/ckfinder.html?type=Flash',
	config.filebrowserUploadUrl      = 'plugins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	config.filebrowserImageUploadUrl = 'plugins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	config.filebrowserFlashUploadUrl = 'plugins/ckeditor/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
	config.disableNativeSpellChecker = false;
	//config.scayt_autoStartup = false;
	//config.scaytParams = {sLang : 'pt_BR'};
// Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
	config.extraPlugins = 'placeholder';
	config.toolbar = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', 'NewPage', 'Preview', /*'Print', */'-', 'Templates' ] },
		//{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo','Scayt' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
		{ name: 'links', items: [ 'Link', 'Unlink' ] },
		{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak' ] },
		'/',
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'textindent' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },

		{ name: 'tools', items: [ 'Maximize', 'ShowBlocks', 'CreatePlaceholder' ] },
		{ name: 'others', items: [ '-' ] }
	];

};
CKEDITOR._scaytParams = {sLang : 'pt_BR'};