<br>
<div class="container">
    
<div id="parents_name" class="p-2" style="display:inline-block;width:400px;min-height:50px;max-height:50px;overflow:auto;"></div> <br>
<div id="message" style="display:inline-block;width:400px;min-height:300px;max-height:300px;overflow:auto;margin-right:10px;">
</div><!-- end #message -->
   
    <div id="parents" style="display:inline-block;position:fixed;height:400px;overflow:auto;">
    
    <?php
foreach($this->data['parents'] as $parents):
    
   echo  "<div onclick='chat(this.id)' id='p".$parents['id']."' class='clickabile' style='border:1px solid black;background-color:#d1ede8;width:350px;margin-bottom:3px;'>Profesor: ".$parents['last_name']." ".$parents['first_name']." ".$parents['name']."<br> </div>";

endforeach;

    ?>
    </div>
    <div id="sendMessage">
                
                <div id="chat">
                    
                        <textarea class="form-control col-md-5" id="subject" name="subject" placeholder="Write something.." rows="5"></textarea><br>
                        <button class="btn btn-outline-info" onclick='ajaxSendMessage();'>Posalji</button>
                        <button class="btn btn-outline-info" onclick='ajax();'>Pregled novih poruka</button>
                        
                </div>
            </div><!-- end #sendMessage -->
           

 </div>

<script src="<?php echo URLROOT; ?>/assets/parent/js/messages.js"></script>