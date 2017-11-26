window.onload=function(){
var oSr=document.getElementById('sr');
var oBtn=document.getElementById('btn');
var oShen=document.getElementById('shenfen');

var kg=true;
oBtn.onclick=function(){
if(kg){
oSr.disabled=false;
//oTel.disabled=false;
oShen.disabled=false;
$(this).css({ "color": "#ffffff", "background": "#a3a3a3" });
$('#send').css({ "color": "#ffffff", "background": "#64A8DD" });
$('#sr').css({ "color": "#111111" });
$('#shenfen').css({ "color": "#111111" });
$('#sr').focus()


}else{
oSr.disabled=true;
//oTel.disabled=true;
oShen.disabled=true;
$(this).css({ "color": "#ffffff", "background": "#64A8DD" });
}
kg=!kg;
}
}