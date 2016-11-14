$(document).ready(function(){
    var table_user = $("#show_user").DataTable({
        "processing": true,
        "serverSide": true,
        /*"columnDefs": [{
            "targets": 0,
            "orderable": false,
            "searchable": false
        }],*/
        "ajax": {
            url: "ajax/data_user.php",
            type: "post",
            error: function(){
                $(".show_user-error").html("");
                $("#show_user").append('<tbody class="employee-grid-error"><tr><td>Data Tidak ditemukan</td></tr></tbody>');
                $("#show_user_processing").css("display","none");
            }
        }
    });
    
});