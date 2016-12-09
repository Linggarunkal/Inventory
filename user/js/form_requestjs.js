/**
 * Created by lkurniawan on 06/12/2016.
 */

var today = new Date();
var day = today.getDate();
var mon = today.getMonth()+1;
var year = today.getFullYear();
var HOUR = today.getHours();
var MIN = today.getMinutes();
var SEC = today.getSeconds();

if(day<10){
    day='0'+day
}
if(mon<10){
    mon='0'+mon
}
if(HOUR<10){
    HOUR='0'+HOUR;
}
if(MIN<10){
    MIN='0'+MIN;
}
if(SEC<10){
    SEC='0'+SEC;
}
var today = mon + '/' + day + '/' + year + ' ' + HOUR + ':' + MIN + ':' + SEC;
document.getElementById("dateRequest").value = today;

var due = document.getElementById('dateRequest').value;
var requestDate = new Date(due);
var dueRequest = new Date(requestDate);
dueRequest.setDate(dueRequest.getDate()+7);

var dd = dueRequest.getDate();
var mm = dueRequest.getMonth()+1;
var yy = dueRequest.getFullYear();
var HH = dueRequest.getHours();
var MM = dueRequest.getMinutes();
var SS = dueRequest.getSeconds();

if(dd<10){
    dd = '0'+dd;
}
if(mm<10){
    mm = '0'+mm;
}
if(HH<10){
    HH = '0'+HH;
}
if(MM<10){
    MM = '0'+MM;
}
if(SS<10){
    SS = '0'+SS;
}
var formatDue = mm + '/' + dd + '/' + yy + ' '+ HH + ':' + MM + ':' + SS;
document.getElementById('dueRequest').value = formatDue;

//addDetailBarang
$(document).ready(function() {
    var addbarang = $("#addDetailBarang").DataTable({
        "responsive": true,
        "bPaginate": false,
        "searching": false,
        "processing": true,
        "serverSide": true,
        "columnDefs": [{
            "targets": 0,
            "orderable": false,
            "searchable": false
        }],
        "ajax": {
            url: "ajax/data_BarangReq.php",
            type: "post",
            error: function () {
                $(".addDetailBarang-error").html("");
                $("#addDetailBarang").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak ditemukan</th></tr></tbody>');
                $("#addDetailBarang_processing").css("display", "none");
            }
        }
    });

    $("#multiDelete").on('click',function() {
        var status = this.checked;
        $(".deleteRow").each( function() {
            $(this).prop("checked",status);
        });
    });

    $('#delbarang').on("click", function(event){
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
                url: "ajax/delBarang.php",
                data: {data_barang:ids_string},
                success: function(result) {
                    addbarang.draw();
                },
                async:false
            });

        }
    });

});


function readDetailBarang(){
    var dataBarang = $("#addDetailBarang").DataTable();
    dataBarang.ajax.reload(function (json){
        $("#addDetailBarang").val(json.lastInput);
    });
}

function addDeatilBarang(){
    var id_barang = $("#addBarang").val();
    var qty = $("#qtyProduct").val();

    $.post("ajax/add_detailBarang.php",{
        id_barang: id_barang,
        qty: qty
    }, function(data,status){
        $("#addRequestProduct").modal("hide");

        readDetailBarang();

        $("#addBarang").val("");
        $("#qtyProduct").val("");
    });
}

/*function sendInput(){
    var id_barang = $("#addBarang").val();
    var qty = $("#qtyProduct").val();

    console.log(id_barang);
    console.log(qty);
    //sending
    $.post("ajax/countBarang.php",{
        id_barang: id_barang,
        qty: qty
    });
    //getting;

}

function ambildata(){
    sendInput();
    $.getJSON('http://localhost/inventory_staging/user/ajax/countBarang.php', function(data){
        var tes = JSON.parse(data);
        var tesoutput = tes.qty;
        console.log(tes);
    });
}*/

/*
function sendInput(id_barang){
    $("#addBarang").val(id_barang);
    $.post("ajax/countBarang.php",{
        id_barang:id_barang
    },
        function(data, status){
            var qty = JSON.parse(data);
            var testing = qty.qty;
            console.log(testing);
        }
    )
}*/

function send(){
    $.ajax({
       type:"POST",
        url: "ajax/countBarang.php",
        data:{
            id_barang: $("#addBarang").val()
        },
        success: function(data){
            getValue(data);
            return data;
        }
    });
}
function getValue(data){
    var tes = JSON.parse(data);
    var productQty = $("#qtyProduct").val();
    console.log(tes.qty+' data database');
    console.log(productQty+' dari product');
    if(productQty <= tes.qty){
        //alert("Barang Added");
        addDeatilBarang();
    }else{
        alert("Jumlah Barang Tidak Tersedia dalam System");
    }

    $("#addBarang").val("");
    $("#qtyProduct").val("");
}

//For validasi input detail barang delbarang
/*(function(){
    $('form > input').keyup(function(){
        var empty = false;
        $('form > input').each(function(){
            if($(this).val() == ''){
                empty=true;
            }
        });
        if(empty){
            $('#addProduct').attr('disabled','disabled');
        }else{
            $('#addProduct').removeAttr('disabled');
        }
    });
})()*/

/*$(document).ready(function(){
    $('input[type="button"]').prop('disabled', true);
    $('input[type="text"]').keyup(function(){
        if($(this).val() != ''){
            $('input[type="button"]').prop('disabled', false);
        }
    })
})*/
