  
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
                    <div class="container">
                        <p>Sweet! So, what do you wanna do today?</p>
                        <span class="time-right">11:02</span>
                    </div>
                    <div class="container darker">
                        <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                        <span class="time-left">11:05</span>
                    </div>
                    <div class="container">
                        <p>Sweet! So, what do you wanna do today?</p>
                        <span class="time-right">11:02</span>
                    </div>
                    <div class="container darker">
                        <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                        <span class="time-left">11:05</span>
                    </div>
                    <div class="container">
                        <p>Sweet! So, what do you wanna do today?</p>
                        <span class="time-right">11:02</span>
                    </div>
                    <div class="container darker">
                        <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                        <span class="time-left">11:05</span>
                    </div>
                    <div class="container">
                        <p>Sweet! So, what do you wanna do today?</p>
                        <span class="time-right">11:02</span>
                    </div>
                    <div class="container darker">
                        <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                        <span class="time-left">11:05</span>
                    </div>
                    <div class="container">
                        <p>Sweet! So, what do you wanna do today?</p>
                        <span class="time-right">11:02</span>
                    </div>
                    <div class="container darker">
                        <p>Nah, I dunno. Play soccer.. or learn more coding perhaps?</p>
                        <span class="time-left">11:05</span>
                    </div>
                </div>
                <div id="chat">
                    <form action="#">
                        <textarea id="subject" name="subject" placeholder="Write something.." ></textarea>
                        <input onclick='ajaxSendMessage()'; type="submit" value="Posalji">
                        <input onclick='ajax();'; type="submit" value="Pregled novih poruka">
                    </form>
                </div>
            </div><!-- end #sendMessage -->
            <div id="listUsers">
                <ul> 
                    
                     <?php foreach($this->data['parent'] as $parents): ?>
                    <li><a href="#"><span><?php echo $parents['first_name']; ?></span> <span><?php echo $parents['last_name']; ?></span> - <?php echo $parents['students_first_name']; ?></a></li>
                    <?php endforeach; ?> 
                   
                   
                    <li><a href="#">Marko</a></li>
                </ul>
            </div><!-- end #listUsers -->
        </div><!-- end .wrapper -->
    </div><!-- end #message -->
      