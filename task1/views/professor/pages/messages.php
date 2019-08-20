<br>
<div id="message" style="display:inline-block;width:400px;">
     
    </div><!-- end #message -->
    <div id="parents" style="display:inline-block;">
    <?php
foreach($this->data['parents'] as $parents):
    
   echo  "<div onclick='chat(this.id)' id='p".$parents['id']."' >Roditelj: ".$parents['first_name']." ".$parents['first_name']." Ucenik: ".$parents['students_first_name']." ".$parents['students_first_name']." </div>";

endforeach;

    ?>
    </div>
    <div id="sendMessage">
                
                <div id="chat">
                    <form action="#">
                        <textarea id="subject" name="subject" placeholder="Write something.." ></textarea>
                        <button onclick='ajaxSendMessage();'>Posalji</button>
                    </form>
                </div>
            </div><!-- end #sendMessage -->
            <div id="listUsers">
                <ul>
                    
                    <li><a href="#"><span><?php echo "ime deteta"; ?></span> <span><?php echo "dete"; ?></a></li>
                    
                </ul>
            </div><!-- end #listUsers -->

<?php



echo "<button onclick='ajax();'>osvezi</button>";
echo "<div id='demo'></div>";
?>

<script>
window.addEventListener('load', ajax);
window.addEventListener('load', parents);
function ajax() {
    var message= document.getElementById("message");
    message.innerHTML="";
  // alert('aaa');
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     var a=JSON.parse(this.responseText);
     for(i in a)
		{
            //var message= document.getElementById("message");
            var div=document.createElement("div");
            var id=a[i]["id"];
			var message_body=a[i]["message"];
			var date=a[i]["date_and_time"];
            var is_read=a[i]["is_read"];	        
            div.innerHTML+=message_body;
            div.innerHTML+=date;      
            div.setAttribute('style',"background-color:silver;border-radius:10px;height:50px;width:200px;margin-top:5px;");
            div.setAttribute('onclick',"isRead(this.id)");
            div.setAttribute('id','c'+id);
            message.prepend(div);
			
			
        };
    }
  };
  xhttp.open("GET", "http://localhost/eDiary/task1/professor/ajax/", true);
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
     message.style="background-color:silver;border-radius:10px;height:50px;width:200px;margin-top:5px;";
     }
    }
  };
  xhttp.open("GET", "http://localhost/eDiary/task1/professor/ajax_is_read?id="+send_id, true);
  xhttp.send();
}

function chat(id) {
   id=id.substr(1);
   var message= document.getElementById("message");
   message.innerHTML="";
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
            //alert(is_read);
            if(a[i]["from_user"]==id){
            div.setAttribute('onclick','isRead(this.id)');
            div.setAttribute('style',"background-color:silver;border-radius:10px;height:50px;width:200px;margin-top:5px;margin-left:70px;");
            if(is_read==0){
            div.setAttribute('style',"background-color:red;border-radius:10px;height:50px;width:200px;margin-top:5px;margin-left:70px;");
            }
            }
            else{
            div.setAttribute('style',"background-color:gold;border-radius:10px;height:50px;width:200px;margin-top:5px;");
            
            }
            div.setAttribute('id','d'+msg_id);
            message.prepend(div);
           
			
			
        };
     
     }
   };
   xhttp.open("GET", "http://localhost/eDiary/task1/professor/ajax_chat?id="+id, true);
   xhttp.send();
 }



</script>