<br>

<div style='width:750px;margin:auto;'>
<div id="parents_name" class="UsersForChatDiv"></div> <br>
<div id="message" class="messageChatDiv">
    </div><!-- end #message -->
    <div id="parents" class="usersChatHeader">
    <?php
foreach($this->data['parents'] as $parents):
    
     echo  "<div onclick='chat(this.id)' id='p".$parents['id']."' class='clickabile usersChat' >Roditelj: ".$parents['first_name']." ".$parents['first_name']."<br> Ucenik: ".$parents['students_first_name']." ".$parents['students_last_name']."<br> </div>";

endforeach;

    ?>
    </div>
    <div id="sendMessage">
                
                <div id="chat" >
                    
                        <textarea id="subject"  name="subject" placeholder="Write something.." ></textarea>
                        <br>
                        <button onclick='ajaxSendMessage();'>Posalji</button>
                        <button onclick='ajax();'>Pregled novih poruka</button>
                    
                </div>
            </div><!-- end #sendMessage -->

 </div>  

<?php





?>


<script src="<?php echo URLROOT; ?>/assets/professor/js/messages.js"></script>


