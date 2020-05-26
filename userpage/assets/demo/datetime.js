function printDate() {
    var nowdate = document.getElementById("nowdate");
    var now1 = new Date();
    
    nowdate.innerHTML =
    now1.getFullYear() + "-"+
    (now1.getMonth() + 1) + "-"+
    now1.getDate()
    setTimeout("printDate()", 1000);
  }

windows.onload = function(){
    printDate();
}

function printTime() {
    var nowtime = document.getElementById("nowtime");
    var now2 = new Date();
    
    nowtime.innerHTML =
    now2.getHours() + ":"+
    now2.getMinutes() + ":"+
    not2.getSeconds()
    setTimeout("printTime()", 1000);
  }
  windows.onload = function(){
    printTime();
}