


<div id="message" style="display:inline-block;width:400px;min-height:300px;max-height:300px;overflow:auto;">
     
    </div><!-- end #message -->
    <div id="parents" style="display:inline-block;position:fixed;height:400px;">
    <?php
foreach($this->data['parents'] as $parents):
    
   echo  "<div onclick='chat(this.id)' id='p".$parents['id']."'  style='background-color:#d1ede8;width:350px;margin-bottom:3px;'>Roditelj: ".$parents['last_name']." ".$parents['first_name']."<br> </div>";

endforeach;

    ?>
    </div>
    <div id="sendMessage">
                
                <div id="chat">
                    
                        <textarea id="subject"  name="subject" placeholder="Write something.." ></textarea>
                        <button onclick='ajaxSendMessage();'>Posalji</button>
                    
                </div>
            </div><!-- end #sendMessage -->
          

<?php



echo "<button onclick='ajax();'>osvezi</button>";

?>

<script src="http://localhost/eDiary/task1/assets/parent/js/messages.js"></script>