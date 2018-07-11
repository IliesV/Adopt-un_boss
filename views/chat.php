
<?php include 'assets/scripts/header.php'; ?>
<link rel="stylesheet" href="/assets/styles/chat.css"/>

    <body>
         <?php include 'views/barNav.php'; ?>
        <div class="container">
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <div class="recent_heading">
                                <h4>Recent</h4>
                            </div>
                        </div>
                        <div class="inbox_chat">
                        </div>
                    </div>
                    <div class="mesgs">
                        <div class="msg_history">
                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" placeholder="Type a message" />
                                <button class="msg_send_btn" type="button" onclick='save_message()'>S</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js" type="text/javascript"></script>
        <script src="/assets/scripts/chat/chat_user.js" type="text/javascript"></script>
    </body>
</html>