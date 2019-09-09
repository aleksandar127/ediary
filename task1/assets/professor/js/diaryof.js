

// function edit(id){
// var a=document.getElementById(id);
// var student_id = id.substr(2);
// var sub=id.length-student_id.length;
// var el=id.substr(1,1)+student_id;
// if(sub>2)
// var el=id.substr(1,2)+student_id;
// el="i"+el;
// var i=document.getElementById(el).value;
// a.href+="/"+i;

// }
function edit(id){
var a=document.getElementById(id);
var el="a"+id;
var i=document.getElementById(el).value;
a.href+="/"+i;

}

function newGrade(id){
    
    var a=document.getElementById(id);
    var el="a"+id;
    var i=document.getElementById(el).value;
    a.href+="/"+i;

}

function finalGrade(id){

    var a=document.getElementById(id);
    var el="a"+id;
    var i=document.getElementById(el).value;
    a.href+="/"+i;
}



// document.body.onclick = function( e ) {

//     // Cross-browser handling
//     var evt = e || window.event,
//         target = evt.target || evt.srcElement;

//     // If the element clicked is an anchor
//     if ( target.nodeName === 'A' && target.dataset.a !='0' ) {
//        // Add the confirm box
//         return confirm( 'POTVRDI' );
//     }
// };


