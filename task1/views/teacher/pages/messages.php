<div id="messagee">
    <div class="wrapper">
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
                <div id="scroll">
                    <div class="container">
                        <p>Hello. How are you today?</p>
                        <span class="time-right">11:00</span>
                    </div>
                    <div class="container darker">
                        <p>Hey! I'm fine. Thanks for asking!</p>
                        <span class="time-left">11:01</span>
                    </div>
                </div><!-- end #scroll -->
                <div id="chat" >
                    <textarea id ="subject" name="subject" placeholder ="Write something.." rows="4"></textarea><br>
                    <button onclick='ajaxSendMessage();'>Posalji</button>
                    <button onclick='ajax();'>Pregled novih poruka</button>
                </div><!-- end #chat -->
            </div><!-- end #sendMessage -->
            
    </div><!-- end .wrapper -->
</div><!-- end #message -->

<script src="<?php echo URLROOT; ?>/assets/teacher/js/messages.js"></script>