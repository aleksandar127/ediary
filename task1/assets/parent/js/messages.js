window.addEventListener('load', ajax);
window.addEventListener('load', parents);
function ajax() {
  var parents_name= document.getElementById("parents_name");
  parents_name.innerHTML='';
    var message= document.getElementById("message");
    message.innerHTML="";
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     var a=JSON.parse(this.responseText);
      
     for(i in a)
		{ 
            var div=document.createElement("div");
            var id=a[i]["id"];
            var user=a[i]["user"];
            user="p"+user;
			var message_body=a[i]["message"];
			var date=a[i]["date_and_time"];
      var last_name=a[i]["last_name"];
			var first_name=a[i]["first_name"];
            var is_read=a[i]["is_read"];	        
            div.innerHTML+=message_body;
            div.innerHTML+=date; 
            div.innerHTML+="<br>";   
            div.innerHTML+=last_name+" "; 
            div.innerHTML+=first_name;   
            div.setAttribute('class',user); 
            div.setAttribute('style',"background-color:silver;border-radius:10px;min-height:50px;width:200px;margin-top:5px;");
            div.setAttribute('onclick',"isRead(this.id)");
            div.setAttribute('onclick',"chat(this.className)");
            div.setAttribute('id','c'+id);
            message.prepend(div);
			
			
        };
    }
  };
  xhttp.open("GET", "http://localhost/eDiary/task1/parent/ajax/", true);
  xhttp.send();
}

function isRead(id) {
    var send_id=id.substr(1);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     var a=JSON.parse(this.responseText);
    
     if(a['response']){
     var message= document.getElementById(id);
     if(message.style.backgroundColor!="gold")
     message.style="background-color:silver;border-radius:10px;min-height:50px;width:200px;margin-top:5px;margin-left:70px;";
     }
    }
  };
  xhttp.open("GET", "http://localhost/eDiary/task1/parent/ajax_is_read?id="+send_id, true);
  xhttp.send();
}


function chat(id) {
  var parents_name= document.getElementById("parents_name");
  var parent= document.getElementById(id);
 if( parent!=null)
  parents_name.innerHTML=parent.innerHTML;
  
  
   id=id.substr(1);
   var subject= document.getElementById("subject");
   subject.className =id;
   var message= document.getElementById("message");
   message.innerHTML='';
   var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
     if (this.readyState == 4 && this.status == 200) {
      var a=JSON.parse(this.responseText);
      for(i in a)
		{  
            
            var div=document.createElement("div");
            var msg_id=a[i]["id"];
		      	var message_body=a[i]["message"];
		      	var date=a[i]["date_and_time"];
            var is_read=a[i]["is_read"];	        
            div.innerHTML+=message_body;
            div.innerHTML+=date;      
            div.setAttribute('style',"background-color:silver;border-radius:10px;height:50px;width:200px;margin-top:5px;");
           
            if(a[i]["from_user"]==id){
            div.setAttribute('onclick','isRead(this.id)');
            div.setAttribute('style',"background-color:silver;border-radius:10px;height:50px;width:200px;margin-top:5px;margin-left:70px;");
            if(is_read==0){
            div.setAttribute('style',"background-color:green;border-radius:10px;height:50px;width:200px;margin-top:5px;margin-left:70px;");
            }
            }
            else{
            div.setAttribute('style',"background-color:gold;border-radius:10px;height:50px;width:200px;margin-top:5px;");
            
            }
            div.setAttribute('id','d'+msg_id);
            message.append(div);
           
			
        };
     
     }
   };
   xhttp.open("GET", "http://localhost/eDiary/task1/parent/ajax_chat?id="+id, true);
   xhttp.send();
 }


function ajaxSendMessage(){
  var parents_name= document.getElementById("parents_name").innerHTML;
  if(parents_name==''){
    alert('Niste izabrali primaoca');
  return;}

  var msg= document.getElementById("subject");
  var message= document.getElementById("subject").value;
  var parent=msg.className;
  var id="a"+parent;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var a=JSON.parse(this.responseText);
      msg.value='';
     chat(id);
    
      
    } 
  }; 
  
  xhttp.open("GET", "http://localhost/eDiary/task1/parent/ajax_send_message?message="+message+"&id="+parent, true);
  xhttp.send();
  
  
}