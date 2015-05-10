$(document).ready(function(){
	tinymce.init({
		selector:'#news-content',
		theme: "modern",
	    height: 400,
		setup: function(editor) {
			editor.on('change', function(e) {
				$('textarea#news-content').val(tinymce.get('news-content').getContent());
			});
		},		
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image filemanager",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
	});
	
	tinymce.init({
		selector:'#news-description',
		theme: "modern",
	    height: 150,
		setup: function(editor) {
			editor.on('change', function(e) {
				$('textarea#news-description').val(tinymce.get('news-description').getContent());
			});
		}
	});
	
	
	tinymce.init({
        selector: ".tinymce_tag textarea",
        theme: "modern",
        height: 400,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image filemanager",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        templates: [
            {title: 'Test template 1', content: 'Test 1'},
            {title: 'Test template 2', content: 'Test 2'}
        ]
    });
    
    $("#delete-prod").click(function(){
        var cfr = confirm("Are you sure want to delete this product?");
        if(true == cfr){
            return true;
        }
        return false;
    });
    
});