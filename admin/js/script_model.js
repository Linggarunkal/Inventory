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

});
