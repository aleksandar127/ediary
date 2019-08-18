
function edit(id){
var a=document.getElementById(id);
var student_id = id.substr(2);
var el=id.substr(1,1)+student_id;
el="i"+el;
var i=document.getElementById(el).value;
a.href+="/"+i;
}

function newGrade(id){
var a=document.getElementById(id);
var student_id = id.substr(2);
var el=id.substr(1,1)+student_id;
el="o"+el;
var i=document.getElementById(el).value;
a.href+="/"+i;

}

function finalGrade(id){
var a=document.getElementById(id);
var student_id = id.substr(2);
var el=id.substr(1,1)+student_id;
el="m"+el;
var i=document.getElementById(el).value;
a.href+="/"+i;

}
