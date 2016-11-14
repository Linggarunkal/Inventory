$(document).ready(function(){
    var table_user = $("#show_user").DataTable({
        "processing": true,
        "serverSide": true,
        "columnDefs": [{
            "targets": 0,
            "orderable": false,
            "searchable": false
        }],
        "ajax": {
            url: "ajax/data_user.php",
            type: "post",
            error: function(){
                $(".show_user-error").html("");
                $("#show_user").append('<tbody class="employee-grid-error"><tr><th colspan="8">Data Tidak ditemukan</th></tr></tbody>');
                $("#show_user_processing").css("display","none");
            }
        }
    });
    
});

function addUser(){

    var txtNama = $("#txtNama").val();
    var divSelect = $("#divSelect").val();
    var txtEmail = $("#txtEmail").val();
    var txtUserName = $("#txtUserName").val();
    var txtPassword = $("#txtPassword").val();
    var levSelect = $("#levSelect").val();
    var manSelect = $("#manSelect").val();

    $.post("ajax/addUser.php",{
        txtNama : txtNama,
        divSelect : divSelect,
        txtEmail : txtEmail,
        txtUsername : txtUserName,
        txtPassword : txtPassword,
        levSelect : levSelect,
        manSelect : manSelect
    }, function (data, status){
        $("#userSubmit").modal("hide");

        readUser();

        $("#txtNama").val("");
        $("#divSelect").val("");
        $("#txtEmail").val("");
        $("#txtUserName").val("");
        $("#txtPassword").val("");
        $("#levSelect").val("");
        $("#manSelect").val("");
    });
}

function readUser(){
    var dataUser = $("#show_user").DataTable();
    dataUser.ajax.reload(function (json){
       $("#add_user").val(json.lastInput);
    });
}