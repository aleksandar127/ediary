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
                </div><!-- #scroll-->
                <div id="chat">
                    <form action="#">
                        <textarea id="subject" name="subject" placeholder="Write something.." ></textarea>
                        <input type="submit" value="Posalji">
                    </form>
                </div>
            </div><!-- end #sendMessage -->
            <div id="listUsers">
                <ul>
                    <?php foreach($this->data['child'] as $child): ?>
                    <li><a href="#"><span><?php echo $child['first_name']; ?></span> <span><?php echo $child['last_name']; ?></span> - <?php echo $child['name_students']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div><!-- end #listUsers -->
        </div><!-- end .wrapper -->
    </div><!-- end #message -->