

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



document.body.onclick = function( e ) {

    // Cross-browser handling
    var evt = e || window.event,
        target = evt.target || evt.srcElement;
    // If the element clicked is an anchor
    if ( target.nodeName === 'A' && target.dataset.a !='0' ) {
        if (target.dataset.a ==='delete' ){
            return confirm( 'POTVRDI' );
        }
        var a=document.getElementById(target.id);
        var inp='a'+target.id;
        var inp=document.getElementById(inp).value;
        if(inp<1 || inp>5 && a.className!=='btn-danger'){
            alert('Unesite validnu ocenu');
            return false; 
        }
       // Add the confirm box
        return confirm( 'POTVRDI' );
        }
    };

