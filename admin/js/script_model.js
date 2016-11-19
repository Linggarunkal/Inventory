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

function readModel(){

    var dataModel = $("#show_model").DataTable();
    dataModel.ajax.reload(function(json){
        $("#submitModel").val(json.lastInput);
    });
}

function addDataModel(){

    var product_name = $("#product_name").val();
    var type = $("#type").val();
    var brand = $("#brand").val();
    var qty = $("#qty").val();

    $.post("ajax/addModel.php",{
        product_name : product_name,
        type : type,
        brand : brand,
        qty : qty
    }, function(data, status){
        $("#submitModel").modal("hide");

        readModel();

        $("#product_name").val("");
        $("#type").val("");
        $("#brand").val("");
        $("#qty").val("");

    });
}

function getDetailModel(id_model){
    $("#model_id_hidden").val(id_model);
    $.post("ajax/getDetailModel.php", {
            id_model: id_model
        },
        function (data, status){
            var model = JSON.parse(data);
            $("#update_product_name").val(model.product_name);
            $("#update_type").val(model.type);
            $("#update_brand").val(model.brand);
            $("#update_qty").val(model.qty);
        }
    );
    $("#updateDataModel").modal("show");

}

function updateModel(){

}