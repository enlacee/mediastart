$(function () {
    
    // 01 - editor (buque para todos los editor)    
    for(var i=0; i<=8;i++) {
        var editor_id = '#editor';
        if(i != 0) {
            editor_id += "_"+i;
        }       
        $(editor_id).liveEdit({
            height: 230,
            css: ['editor/bootstrap/css/bootstrap.min.css', 'editor/bootstrap/bootstrap_extend.css'] /* Apply bootstrap css into the editing area */,
            groups: [
                ["group1", "", ["Bold", "Italic", "Underline", "ForeColor", "RemoveFormat"]],
                ["group2", "", ["Bullets", "Numbering", "Indent", "Outdent"]],
                ["group3", "", ["Paragraph", "FontSize", "FontDialog", "TextDialog"]],
                ["group4", "", ["LinkDialog", "ImageDialog", "TableDialog", "Emoticons", "Snippets"]],
                ["group5", "", ["Undo", "Redo", "FullScreen", "SourceDialog"]]
                ] /* Toolbar configuration */
        });
        $(editor_id).data('liveEdit').startedit();        
    }    

    // 02 - validate                
    $('#form').validate({
        rules: {
            nombre: {required : true, minlength: 3, maxlength: 100}
          },

        //Detecta cuando se realiza el submit o se presiona el boton
        submitHandler: function(form){
            form.submit();
        },

        //Detecta los error y abre los span con los posibles errores
        errorPlacement: function(error, element){
        error.insertAfter(element);
        }
    });

});