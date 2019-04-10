function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('currentTime').innerHTML =
  h + ":" + m + ":" + s;
  var t = setTimeout(startTime, 500);
  setTimeout(checkSleepTime, 300000)
}
function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

// function checkSleepTime() {
//   var today = new Date();
//   var sleepH = (today.getHours()+1)+":00:00";
//   var waketime1 = (today.getHours()+2)+":30:00";
//   var waketime2 = (today.getHours()+7)+":00:00";
//   var waketime3 = (today.getHours()+8)+":30:00";
//   var waketime4 = (today.getHours()+10)+":00:00";
//   document.getElementById('sleeptime').innerHTML = "If you go to sleep at "+sleepH+", the best times to wake up are: "+waketime1+", "+waketime2+", "+waketime3+", "+waketime4;
// }