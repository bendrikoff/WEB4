window.onload= function(){
//scroll bttn
var bttn = document.querySelector('.upBttn');

function upScroll(){
    if (window.pageYOffset > 20){
        bttn.style.opacity='0.5';
        bttn.style.visibility='visible';

    } else{
        bttn.style.opacity='0';
    }
}
window.onscroll = upScroll;

bttn.onmouseover = function(){
    this.style.opacity='1';
}
bttn.onmouseout= function(){
    this.style.opacity='0.5';
}
bttn.onclick = function(){
    window.scrollTo(0,0);
    bttn.style.visibility='hidden';
}
//telegram scroll
var div= document.querySelector('.telegram');
    var y;
              
    document.addEventListener('scroll',scrollTg);


              
    function scrollTg(){
        y=window.scrollY/5;
        var coords = '50% '+ -y +'px';
        div.style.backgroundPosition=coords;
    }

//popup
 var popUpBttn = document.querySelector('.popUpBttn');
 var popUp = document.querySelector('.dialog');
 
 var popUpClose = document.querySelector('.close');
 var overlay = document.querySelector('.overlay');

popUpBttn.onclick= openDialog;
function openDialog(){
    document.location.href = "./contact.php";
}
popUpClose.onclick= closeDialog;
overlay.onclick=closeDialog;
function closeDialog(){
    document.location.href = "./";
    
}
// //validation
// var sendBttn = document.querySelector('.send');
// var mail = document.querySelector('.mail');
// var fulltext = document.querySelector('.subject');
// var number = document.querySelector('.number');

// let reg = /^[a-z][a-z0-9\._+%-]*[a-z0-9]@[a-z]+\.[a-z]{2,}$/i;

// let regNum=/^(\+7)|8[0-9]{10}$/;




// sendBttn.onclick=validation;

// function validation(){
//     var flag =true;
//     event.preventDefault();
//     if(!reg.test(mail.value)){
//         mail.style["boxShadow"]="0px 0px 5px 1px rgba(255,0,0,0.5)";
//         console.log('asd');
//         setTimeout(() => mail.style["boxShadow"]="none",1000);
//         flag=false;
//     }
//     if(fulltext.value.length>400||!fulltext.value){
//         fulltext.style["boxShadow"]="0px 0px 5px 1px rgba(255,0,0,0.5)";
//         setTimeout(()=> fulltext.style["boxShadow"]="none",1000);
//         flag=false;
//         if(fulltext.value.length>400){
//             document.querySelector('.countSym').style.color='red';
//             setTimeout(()=> document.querySelector('.countSym').style.color='black',1000);

//         }
//     }
//     if(!regNum.test(number.value)){
//         number.style["boxShadow"]="0px 0px 5px 1px rgba(255,0,0,0.5)";
//         setTimeout(()=> number.style["boxShadow"]="none",1000);
//     }
//     if(flag){
//         document.querySelector('.dialogForm').style.visibility='hidden';
//         document.querySelector('.dialog').style.height='150px';
//         document.querySelector('.thanks').style.marginTop='75px';
//         document.querySelector('.thanks').innerHTML="Спасибо за обращение!";

//     }
// }
// fulltext.oninput=function() {
//     document.querySelector('.countSym').innerHTML = fulltext.value.length+"/400";
// }
//time
var timeEl = document.querySelector(".time");

var date = new Date();
timeEl.innerHTML = date.toLocaleTimeString();

function time() {
    var date = new Date();
    timeEl.innerHTML = date.toLocaleTimeString();
}

setInterval(time, 1000);
//log
var log = document.querySelector(".log");

var date = new Date();

log.innerHTML = "Log("+date.getMinutes()+")="+Math.log2(date.getMinutes()).toFixed(2);


function logComp() {
    var date1 = new Date();
    log.innerHTML = "Log("+date1.getMinutes()+")="+Math.log2(date1.getMinutes()).toFixed(2);
}

setInterval(logComp, 6000);
  
}