/**
 * Created by lkurniawan on 08/12/2016.
 */
var pathname = window.location.href;
var patch = "http://localhost/inventory_staging/user/form_request.html";
if(pathname === patch){
    page=1;
    //alert("halaman ini halaman gahul"+page);
}else{
    page=0;
    //alert("Halaman Bukan form request"+page)
}
