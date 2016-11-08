// Display DataTables from mysql to HTML
$(document).ready(function() {
                var dataTable = $('#show_divisi').DataTable( {
                    "processing": true,
                    "serverSide": true,
                    "columnDefs":[{
                        "targets": 0,
                        "orderable":false,
                        "searchable":false
                    }],
                    "ajax":{
                        url :"ajax/data_divisi.php", 
                        type: "post",  
                        error: function(){ 
                            $(".show_divisi-error").html("");
                            $("#show_divisi").append('<tbody class="employee-grid-error"><tr><th colspan="3">Data Tidak Di temukan</th></tr></tbody>');
                            $("#show_divisi_processing").css("display","none");
                        }
                    }

                } );

                $("#bulkDelete").on('click',function() { // bulk checked
                    var status = this.checked;
                    $(".deleteRow").each( function() {
                        $(this).prop("checked",status);
                    });
                });
                
                $('#deleteTriger').on("click", function(event){ // triggering delete one by one
                    if( $('.deleteRow:checked').length > 0 ){  // at-least one checkbox checked
                        var ids = [];
                        $('.deleteRow').each(function(){
                            if($(this).is(':checked')) { 
                                ids.push($(this).val());
                            }
                        // console.log(ids);
                        });
                        var ids_string = ids.toString();  // array to string conversion 
                        // console.log(ids_string);
                        $.ajax({
                            type: "POST",
                            url: "ajax/deleteRecord.php",
                            data: {data_ids:ids_string},
                            success: function(result) {
                                dataTable.draw(); // redrawing datatable
                            },
                            async:false
                        });

                    }
                }); 
            } );

 


// Add Record from database script
function addRecord() {
    var divisi_name = $("#divisi_name").val();

    $.post("ajax/addRecords.php",{
        divisi_name: divisi_name
    }, function (data, status){
        $("#modalLayout").modal("hide");

        readRecord();

        $("#divisi_name").val("");
    });
}


// Reload DataTables After insert Form 
function readRecord() {
    var table = $('#show_divisi').DataTable();

    table.ajax.reload(function (json){
        $('#add').val( json.lastInput );
    });
}


//Get Detail record row datatables
function getDetailDivisi(id_divisi){
   // alert(id_divisi);
   $("#user_id_hidden").val(id_divisi);
   $.post("ajax/readUserDetail.php", {
        id_divisi: id_divisi
   },
    function (data, status){
        // parser JSON data
        var divisi = JSON.parse(data);
        $("#divisi_name_update").val(divisi.divisi_name);
    }
   );
$("#update_user_modal").modal("show");

}


// update Record row datatables
function updateDivisi(){

    // get value to modal
    var divisi_name = $("#divisi_name_update").val();
    // get hidden id value
    var id_divisi = $("#user_id_hidden").val();

    // send to proses update
    $.post("ajax/updateDivisiName.php",{
        id_divisi: id_divisi,
        divisi_name: divisi_name
    },
    function (data, status){
        $("#update_user_modal").modal("hide");
        readRecord();
    }
    );
}

$(document).ready(function () {

    readRecord();
});


// TO script.js and ajax user.html