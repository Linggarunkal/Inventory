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

    $("#multiDelete").on('click',function() {
        var status = this.checked;
        $(".deleteRow").each( function() {
            $(this).prop("checked",status);
        });
    });

    $('#deleteTriger').on("click", function(event){
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
                url: "ajax/deleteUser.php",
                data: {data_user:ids_string},
                success: function(result) {
                    table_user.draw();
                },
                async:false
            });

        }
    });

});

function addUser(){

    var fname = $("#fname").val();
    //console.log(txtNamaDepan);
    var lname = $("#lname").val();
    //console.log(txtNamaBelakang);
    var id_divisi = $("#id_divisi").val();
    var email = $("#email").val();
    var username = $("#username").val();
    var password = $("#password").val();
    var id_level = $("#id_level").val();
    //console.log(levSelect);
    var id_manager = $("#id_manager").val();

    $.post("ajax/addUser.php",{
        fname : fname,
        lname : lname,
        id_divisi : id_divisi,
        email : email,
        username : username,
        password : password,
        id_level : id_level,
        id_manager : id_manager
    }, function (data, status){
        $("#userSubmit").modal("hide");

        readUser();

        $("#fname").val("");
        $("#lname").val("");
        $("#id_divisi").val("");
        $("#email").val("");
        $("#username").val("");
        $("#password").val("");
        $("#id_level").val("");
        $("#id_manager").val("");
    });

}

function readUser(){
    var dataUser = $("#show_user").DataTable();
    dataUser.ajax.reload(function (json){
       $("#add_user").val(json.lastInput);
    });
}


function getDetailUser(id_user){
    $("#detail_user_hidden").val(id_user);
    $.post("ajax/getUserDetail.php", {
        id_user: id_user

    },
    function (data, status){
        var user = JSON.parse(data);
        $("#fname_update").val(user.fname);
        $("#lname_update").val(user.lname);
        $("#id_divisi_update").val(user.id_divisi);
        $("#email_update").val(user.email);
        $("#username_update").val(user.username);
        $("#password_update").val(user.password);
        $("#id_level_update").val(user.id_level);
        $("#id_manager_update").val(user.id_manager);

    });
    $("#userUpdate").modal("show");
}

function updateUser(){

    var fname = $("#fname_update").val();
    console.log(fname);
    var lname = $("#lname_update").val();
    var id_divisi = $("#id_divisi_update").val();
    var email = $("#email_update").val();
    var username = $("#username_update").val();
    var password = $("#password_update").val();
    var id_level = $("#id_level_update").val();
    var id_manager = $("#id_manager_update").val();
    var id_user = $("#detail_user_hidden").val();

    $.post("ajax/updateUser.php",{
        id_user: id_user,
        fname: fname,
        lname: lname,
        username: username,
        password: password,
        id_divisi: id_divisi,
        id_level: id_level,
        id_manager: id_manager,
        email: email
    },
    function(data, status){
        $("#userUpdate").modal("hide");
        readUser();
    });
}
