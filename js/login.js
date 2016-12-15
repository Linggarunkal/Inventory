/**
 * Created by lkurniawan on 09/12/2016.
 */

/*
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
}*/
function checkingLogin(){
    var username = $("#username").val();
    var password = $("#password").val();

    $.ajax({
        type: "POST",
        url: "ajax/login.php",
        data:{
            username: username,
            password: password
        },
        success: function(data){
            //console.log(data);
            getData(data);
            return data;
        }
    });
}
function getData(data){
    var dataLogin = JSON.parse(data);
    var txtUsername = $("#username").val();
    var txtPassword = $("#password").val();
    console.log(dataLogin.id_user);
    if(dataLogin.username === txtUsername && dataLogin.password === txtPassword){
        if(dataLogin.role_level === "User"){
            $.ajax({
                type: "POST",
                url: "user/ajax/session.php",
                data:{
                    username: dataLogin.username,
                    id_user: dataLogin.id_user
                }
            });
            window.location.href='user/index.html';
        }else if(dataLogin.role_level === "Manager"){
            //alert("role_level Manager")
            $.ajax({
                type: "POST",
                url: "user/ajax/session.php",
                data:{
                    username: dataLogin.username
                }
            });
            window.location.href='user/index.html'
        }else{
            $.ajax({
                type: "POST",
                url: "ajax/session.php",
                data:{
                    username: dataLogin.username
                }
            });
            //alert("role Level admin");
        }
    }else{
        alert("Username dan Password tidak benar atau Belum terdaftar dalam system");
    }
}
