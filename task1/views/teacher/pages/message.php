
      <div id="message">
        <div class="wrapper">
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
                <div id="chat">
                    <textarea id ="subject" name="subject" placeholder ="Write something.." rows="4"></textarea><br>
                    <button>Posalji</button>
                    <button>Pregled novih poruka</button>
                </div>
            </div><!-- end #sendMessage -->
            <div id="listUsers">
                <ul> 
                    <?php foreach($this->data['parents'] as $parents): ?>
                        <div>
                            <li><a href="#"><span><?php echo $parents['first_name']; ?></span> <span><?php echo $parents['last_name']; ?></span> - <?php echo $parents['students_first_name']; ?></a></li>
                        </div>
                    <?php endforeach; ?> 
                </ul>
            </div><!-- end #listUsers -->
        </div><!-- end .wrapper -->
    </div><!-- end #message -->

    <script src="<?php echo URLROOT; ?>/assets/teacher/js/messages.js"></script>