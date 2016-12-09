/**
 * Created by lkurniawan on 08/12/2016.
 */
var pathname = window.location.href;
var patch = "http://localhost/inventory_staging/user/form_request.html";
if(pathname === patch){
    //alert("alert ini page request");
    page=0;
    $.ajax({
       type:"POST",
        url: "ajax/checkTemp.php",
        data:{
            transaksi: page
        }
    });
}else{
    //alert("alert ini bukan page request")
    page=1;
    $.ajax({
        type:"POST",
        url: "ajax/checkTemp.php",
        data:{
            transaksi: page
        }
    });
}
