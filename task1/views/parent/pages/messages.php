<br>
<div class="container" style='width:850px;margin:auto;'>
    
<div id="parents_name" class="p-2 UsersForChatDiv"></div> <br>
<div id="message" class="messageChatDiv">
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
                    
                        <textarea id="subject" name="subject" placeholder="Write something.." rows="4" style="margin:0 0 5px 0px;width:400px;"></textarea><br>
                        <button class="btn btn-outline-info" onclick='ajax();' style="margin:0px 10px 0px 35px;">Pregled novih poruka</button>
                        <button class="btn btn-outline-info" onclick='ajaxSendMessage();'  >Posalji poruku</button>
                        
                </div>
            </div><!-- end #sendMessage -->
           

 </div>

<script src="<?php echo URLROOT; ?>/assets/parent/js/messages.js"></script>