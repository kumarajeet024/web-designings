
var today;
var h;
var m;
var s;
var alarm;
 var sound = new Audio("alarm_01.wav");
        sound.loop = true;


function setAlarm(){

            var alarmhour = document.getElementById("hour").value;
            var alarmmin = document.getElementById("minutes").value;
            var alarmsec = document.getElementById("seconds").value;

             alarm = alarmhour + ":" + alarmmin + ":" + alarmsec;
       
}
function startTime() {
    today = new Date();
    h = today.getHours();
    m = today.getMinutes();
    s = today.getSeconds();
   
   var a = document.getElementById('currentTime').innerHTML = h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
    if(alarm == a)
    {
        sound.play();
    }
}









