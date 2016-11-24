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

});

function readBarang(){

    var dataBarang = $("#show_barang").DataTable();
    dataBarang.ajax.reload(function (json){
        $("#submitBarang").var(json.lastInput);
    });
}
function addBarang_insert(){
    var product_name = $("#product_name").val();
    var condition_barang = $("#condition_barang").val();
    var status = $("#status").val();
    var remarks = $("#remarks").val();
    var qty = $("#qty").val();

    $.post("ajax/addBarang.php",{
        product_name: product_name,
        condition_barang: condition_barang,
        status: status,
        qty: qty,
        remarks: remarks
    }, function(data, status){
        $("#submitBarang").modal("hide");
        readBarang();

        $("#product_name").val("");
        $("#condition_barang").val("");
        $("#status").val("");
        $("#qty").val("");
        $("#remarks").val("");
    });
}