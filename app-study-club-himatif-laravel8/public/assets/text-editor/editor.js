$(document).ready(function () {
	CKEDITOR.replace( 'file', {
		filebrowserImageBrowseUrl : '/assets/kcfinder/browse.php',

		filebrowserBrowseUrl : '/assets/kcfinder/browse.php?type=files',
		filebrowserImageBrowseUrl : '/assets/kcfinder/browse.php?type=images',
		filebrowserFlashBrowseUrl : '/assets/kcfinder/browse.php?type=flash',
		filebrowserUploadUrl : '/assets/kcfinder/upload.php?type=files',
		filebrowserImageUploadUrl : '/assets/kcfinder/upload.php?type=images',
		filebrowserFlashUploadUrl : '/assets/kcfinder/upload.php?type=flash',
		height : 450,
		toolbarGroups : [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'tools', groups: [ 'tools' ] }
		],

		removeButtons : 'Source,Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Anchor,Flash,Smiley,SpecialChar,PageBreak,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,ShowBlocks,Save,NewPage,ExportPdf,Preview,Print,Templates,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,Language,BidiRtl,BidiLtr,About',
	} )

	CKEDITOR.replace( 'soal', {
		filebrowserImageBrowseUrl : '/assets/kcfinder/browse.php',

		filebrowserBrowseUrl : '/assets/kcfinder/browse.php?type=files',
		filebrowserImageBrowseUrl : '/assets/kcfinder/browse.php?type=images',
		filebrowserFlashBrowseUrl : '/assets/kcfinder/browse.php?type=flash',
		filebrowserUploadUrl : '/assets/kcfinder/upload.php?type=files',
		filebrowserImageUploadUrl : '/assets/kcfinder/upload.php?type=images',
		filebrowserFlashUploadUrl : '/assets/kcfinder/upload.php?type=flash',
		height : 450,
		toolbarGroups : [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'tools', groups: [ 'tools' ] }
		],

		removeButtons : 'Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Anchor,Flash,Smiley,SpecialChar,PageBreak,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,ShowBlocks,Save,NewPage,ExportPdf,Preview,Print,Templates,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,Language,BidiRtl,BidiLtr,About,Source',
	} )

	CKEDITOR.replace( 'jawaban', {
		filebrowserImageBrowseUrl : '/assets/kcfinder/browse.php',

		filebrowserBrowseUrl : '/assets/kcfinder/browse.php?type=files',
		filebrowserImageBrowseUrl : '/assets/kcfinder/browse.php?type=images',
		filebrowserFlashBrowseUrl : '/assets/kcfinder/browse.php?type=flash',
		filebrowserUploadUrl : '/assets/kcfinder/upload.php?type=files',
		filebrowserImageUploadUrl : '/assets/kcfinder/upload.php?type=images',
		filebrowserFlashUploadUrl : '/assets/kcfinder/upload.php?type=flash',
		height : 450,
		toolbarGroups : [
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'about', groups: [ 'about' ] },
		{ name: 'tools', groups: [ 'tools' ] }
		],

		removeButtons : 'Cut,Copy,Paste,PasteText,PasteFromWord,Redo,Undo,Find,Replace,SelectAll,Scayt,Anchor,Flash,Smiley,SpecialChar,PageBreak,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,ShowBlocks,Save,NewPage,ExportPdf,Preview,Print,Templates,CopyFormatting,RemoveFormat,Blockquote,CreateDiv,Language,BidiRtl,BidiLtr,About,Source',
	} )
})