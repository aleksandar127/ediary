<br>
<<<<<<< HEAD
<div style='width:750px;margin:auto;'>
<div id="parents_name" class="UsersForChatDiv"></div> <br>
<div id="message" class="messageChatDiv" >
=======
<div class="container">
    
<div id="parents_name" class="p-2" style="display:inline-block;width:400px;min-height:50px;max-height:50px;overflow:auto;"></div> <br>
<div id="message" style="display:inline-block;width:400px;min-height:300px;max-height:300px;overflow:auto;margin-right:10px;">
>>>>>>> dafa74aa1913d44295c1a5ac8cd187f79b7ac37d
</div><!-- end #message -->
   
    <div id="parents" class="usersChatHeader">
    
    <?php
foreach($this->data['parents'] as $parents):
    
   echo  "<div onclick='chat(this.id)' id='p".$parents['id']."' class='clickabile usersChat'>Profesor: ".$parents['last_name']." ".$parents['first_name']." ".$parents['name']."<br> </div>";

endforeach;

    ?>
    </div>
    <div id="sendMessage">
                
                <div id="chat">
                    
<<<<<<< HEAD
                        <textarea id="subject"  name="subject" placeholder="Write something.."  ></textarea><br>
                        <button onclick='ajaxSendMessage();'>Posalji</button>
                        <button onclick='ajax();'>Pregled novih poruka</button>
=======
                        <textarea class="form-control col-md-5" id="subject" name="subject" placeholder="Write something.." rows="5"></textarea><br>
                        <button class="btn btn-outline-info" onclick='ajaxSendMessage();'>Posalji</button>
                        <button class="btn btn-outline-info" onclick='ajax();'>Pregled novih poruka</button>
>>>>>>> dafa74aa1913d44295c1a5ac8cd187f79b7ac37d
                        
                </div>
            </div><!-- end #sendMessage -->
           

 </div>

<script src="<?php echo URLROOT; ?>/assets/parent/js/messages.js"></script>