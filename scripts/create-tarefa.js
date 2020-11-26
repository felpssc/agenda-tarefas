var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0!
var yyyy = today.getFullYear();
var hora = today.getHours();
var min = today.getMinutes();
horaAtual = hora+':'+min;
console.log(horaAtual);
console.log(min);
if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById('data-input').setAttribute('min', today);

if (document.getElementById('data-input').value == today){
    document.getElementById('time-input').setAttribute('min', horaAtual)
}