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

//Begin proses form Request
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true,
        bPaginate: false,
        searching: false
    });
});





