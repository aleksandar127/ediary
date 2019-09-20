<br>

<div style='width:750px;margin:auto;'>
<div id="parents_name" style="display:inline-block;width:400px;min-height:50px;max-height:50px;overflow:auto;"></div> <br>
<div id="message" style="display:inline-block;width:400px;min-height:300px;max-height:300px;overflow:auto;margin-right:10px;">
    </div><!-- end #message -->
    <div id="parents" style="display:inline-block;position:fixed;height:400px;overflow:auto;">
    <?php
foreach($this->data['parents'] as $parents):
    
   echo  "<div onclick='chat(this.id)' id='p".$parents['id']."' class='clickabile' style='border:1px solid black;background-color:#d1ede8;width:350px;margin-bottom:3px;'> Roditelj: ". $parents['first_name'] . " " . $parents['last_name'] . "<br> Ucenik: ".$parents['students_first_name']." ".$parents['students_last_name']."<br> </div>";

endforeach;

    ?>
    </div>
    <div id="sendMessage">
                <div id="chat" >
                    <textarea id ="subject" name="subject" placeholder ="Write something.." rows="4"></textarea><br>
                    <button onclick='ajaxSendMessage();'>Posalji</button>
                    <button onclick='ajax();'>Pregled novih poruka</button>
                </div>
            </div><!-- end #sendMessage -->
    </div>  

<?php





?>


<script src="<?php echo URLROOT; ?>/assets/teacher/js/messages.js"></script>