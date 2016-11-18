/**
 * Created by lkurniawan on 18/11/2016.
 */
$(document).ready(function(){
    var model_table = $('#show_model').DataTable({
        "processing": true,
        "serverSide": true,
        "columnDefs":[{
            "targets": 0,
            "orderable":false,
            "searchable":false
        }],
        "ajax":{
            url: "ajax/data_model.php",
            type: "post",
            error: function(){
                $(".show_model-error").html("");
                $("#show_model").append('<tbody class="show_model-error"><tr><th colspan="3">Data Tidak di temukan</th></tr></tbody>');
                $("#show_model_processing").css("display","none");
            }
        }
    });

    $("#MultiDeleteModel").on('click',function() {
        var status = this.checked;
        $(".deleteRow").each( function() {
            $(this).prop("checked",status);
        });
    });

    $('#delete_model').on("click", function(event){
        if( $('.deleteRow:checked').length > 0 ){
            var ids = [];
            $('.deleteRow').each(function(){
                if($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            var ids_string = ids.toString();
            $.ajax({
                type: "POST",
                url: "ajax/deleteModel.php",
                data: {data_model:ids_string},
                success: function(result) {
                    model_table.draw();
                },
                async:false
            });

        }
    });
});
