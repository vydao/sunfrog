$(document).ready(function(){
	tinymce.init({
		selector:'textarea',
		theme: "modern",
	    height: 400,
		setup: function(editor) {
			editor.on('change', function(e) {
				$('textarea#news-content').val(tinymce.get('news-content').getContent());
			});
		}
	});
});