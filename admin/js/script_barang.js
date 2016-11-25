/**
 * Created by lkurniawan on 24/11/2016.
 */
$(document).ready(function(){
    var barang_table = $("#show_barang").DataTable({
        "processing": true,
        "serverSide": true,
        "columnDefs":[{
            "targets": 0,
            "orderable": false,
            "searchable": false
        }],
        "ajax": {
            url: "ajax/data_barang.php",
            type: "post",
            error: function() {
                $(".show_barang-error").html("");
                $("#show_barang").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak Di temukan</th></tr></tbody>');
                $("#show_barang_processing").css("display", "none");
            }
        }
    });

    $("#DeleteAll").on('click', function(){
        var status = this.checked;
        $(".deleteRow").each(function(){
            $(this).prop("checked", status);
        });
    });

    $('#deleteSelect').on('click', function(event){
        if($('.deleteRow:checked').length > 0){
            var ids = [];
            $('.deleteRow').each(function(){
                if($(this).is(':checked')){
                    ids.push($(this).val());
                }
            });
            var ids_string = ids.toString();
            $.ajax({
                type: "POST",
                url: "ajax/deleteBarang.php",
                data: {data_barang:ids_string},
                success: function(result) {
                    barang_table.draw();
                },
                async: false
            });
        }
    });

});

function readBarang(){

    var dataBarang = $("#show_barang").DataTable();
    dataBarang.ajax.reload(function (json){
        $("#submitBarang").val(json.lastInput);
    });
}
function addBarang_insert(){
    var product_name = $("#product_name").val();
    //console.log(product_name);
    var condition_barang = $("#condition_barang").val();
    //console.log(condition_barang);
    var status = $("#status").val();
    //console.log(status);
    var remarks = $("#remarks").val();
    //console.log(remarks);
    var qty = $("#qty").val();
    //console.log(qty);

    $.post("ajax/addBarang.php",{
        product_name: product_name,
        condition_barang: condition_barang,
        status: status,
        qty: qty,
        remarks: remarks
    }, function (data, status){
        $("#submitBarang").modal("hide");

            readBarang();

        $("#product_name").val("");
        $("#condition_barang").val("");
        $("#status").val("");
        $("#qty").val("");
        $("#remarks").val("");
    });
}

function getDetailBarang(id_barang){
    $("#hidden_barang_id").val(id_barang);
    $.post("ajax/getBarangDetail.php",{
        id_barang: id_barang
    },
        function(data, status){
            var barang = JSON.parse(data);
            $("#update_product_name").val(barang.id_model);
            $("#update_status").val(barang.status);
            $("#update_condition_barang").val(barang.condition_barang);
            $("#update_qty").val(barang.qty);
            $("#update_remarks").val(barang.remarks);
        });
    $("#updateBarang").modal("show");
}
function updateBarang(){
    var id_model = $("#update_product_name").val();
    var condition_barang = $("#update_condition_barang").val();
    var status = $("#update_status").val();
    var remarks = $("#update_remarks").val();
    var qty = $("#update_qty").val();
    var id_barang = $("#hidden_barang_id").val();

    $.post("ajax/updateBarang.php",{
        id_barang: id_barang,
        id_model: id_model,
        condition_barang: condition_barang,
        status: status,
        remarks: remarks,
        qty: qty
    },
    function(data, status){
        $("#updateBarang").modal("hide");
        readBarang();
    });
}