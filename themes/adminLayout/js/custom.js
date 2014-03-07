
function ajaxSetStatus(elem, id){
    $.ajax({
        type:"post",
        url: $(elem).attr('href'),
        success: function(){
            $('#'+id).yiiGridView.update(id);
        }
    });
}