
      <div id="message">
        <div class="wrapper">
            <div id="sendMessage">
                <div id="scroll">
                <!-- <div id="parents" style="display:inline-block;position:fixed;height:400px;overflow:auto;"> -->
                    <div class="container">
                        <p>Hello. How are you today?</p>
                        <span class="time-right">11:00</span>
                    </div>
                    <div class="container darker">
                        <p>Hey! I'm fine. Thanks for asking!</p>
                        <span class="time-left">11:01</span>
                    </div>
                </div>
                <div id="chat">
                    <textarea id ="subject" name="subject" placeholder ="Write something.." rows="4"></textarea><br>
                    <button onclick='ajaxSendMessage();'>Posalji</button>
                    <button onclick='ajax();'>Pregled novih poruka</button>
                </div>
            </div><!-- end #sendMessage -->
            <div id="listUsers">
                <ul> 
                    <?php foreach($this->data['parents'] as $parents): ?>
                        <div onclick="chat(this.id)" id="p" <?php $parents['id'] ?> >
                            <li><a href="#"><span><?php echo $parents['first_name']; ?></span> <span><?php echo $parents['last_name']; ?></span> - <?php echo $parents['students_first_name']; ?></a></li>
                        </div>
                    <?php endforeach; ?> 
                </ul>
            </div><!-- end #listUsers -->
        </div><!-- end .wrapper -->
    </div><!-- end #message -->

    <script src="<?php echo URLROOT; ?>/assets/teacher/js/messages.js"></script>