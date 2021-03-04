    var socketIO = io('chatnodejs-8msfb.ondigitalocean.app/', {
        transports: ['websocket'],
        upgrade: false
    });

    var joinRoom, joinName;
    const chatForm = document.getElementById('chat-form');
    const chatContainer = document.getElementById('chat-message');
    const participantList = document.getElementById('participant-list');
    const token = $('meta[name="csrf-token"]').attr('content');
    const userAvatar = document.getElementById('avatar-name').value;
    const chatWindow = this.window;

    //Join Selected Room
    function enterRoom() {
        joinName = document.getElementById('userName').value;
        joinRoom = document.getElementById('roomValue').value;
        joinName = joinName.trim();
        if (!joinName) {
            document.getElementById('chat-error-msg').innerHTML = "Invalid Name Entered";
            return false;
        }
        socketIO.emit('joinRoom', { 'userName': joinName, 'userRoom': joinRoom, 'userAvatar': userAvatar });
    };

    //Leave Room
    function leaveRoom() {
        socketIO.emit('leaveRoom');
        document.getElementById('chat-box-container').style.display = "none";
        document.getElementById('chat-enter').style.display = "block";
        location.reload();
    }

    //Check if same username exists
    socketIO.on('userExists', function(data) {
        document.getElementById('chat-error-msg').innerHTML = data;
    });

    //Setup the user into the chat room
    socketIO.on('userSet', function(data) {
        chatIntro();
        document.getElementById('chat-box-container').style.display = "block";
        document.getElementById('chat-enter').style.display = "none";
        document.getElementById('roomName').innerHTML = `Chat Room: ${joinRoom}`;
        chatContainer.innerHTML = "";
        document.getElementById('chat-error-msg').innerHTML = "";
        chatContainer.innerHTML +=
            `<div class="media">
                <p class="text-small mb-0 text-muted mx-auto pb-3 text-center">Welcome ${joinName}.😊 <br/>Hope you enjoy chatting with other traders. Have fun!</p>
            </div>`
    });

    //Welcome Message for new user joining the channel
    socketIO.on('message', function(data) {
        chatContainer.innerHTML +=
            `<div class="media">
                <p class="text-small mb-0 text-muted mx-auto pb-3">${data.greeting}</p>
            </div>`
        participantList.innerHTML +=
            `<div class="list-group-item list-group-item-action rounded-0 rmv-border">
                    <div class="media"><i class="fas fa-user-alt avatar-size"></i>
                    <div class="media-body ml-4">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                        <h6 class="mb-0">${data.userName}</h6>
                        </div>
                    </div>
                    </div>
                </div>`
            //Scroll Down
        chatContainer.scrollTop = chatContainer.scrollHeight - chatContainer.clientHeight;
    });

    //Leave Message
    socketIO.on('leavemsg', function(data) {
        chatContainer.innerHTML +=
            `<div class="media">
                <p class="text-small mb-0 text-muted mx-auto pb-3">${data}</p>
            </div>`
            //Scroll Down
        chatContainer.scrollTop = chatContainer.scrollHeight - chatContainer.clientHeight;

    })

    //Send Message
    chatForm.addEventListener('submit', e => {
        e.preventDefault();
        var message = e.target.elements.chat_msg.value;

        message = message.trim();
        if (!message) {
            return false;
        }

        //Send Message
        socketIO.emit('chatMessage', { message, joinName });
        e.target.elements.chat_msg.value = "";
        e.target.elements.chat_msg.focus();

    });


    //Receive Message from other user
    socketIO.on('newMsg', function({ userName, userRoom, message, time }) {
        if (joinRoom == userRoom) {
            if (joinName == userName) {
                chatContainer.innerHTML +=
                    `<div class="media w-50 ml-auto mb-3">
        <div class="media-body">
        <div class="bg-primary rounded py-2 px-3 mb-2">
            <p class="text-small mb-0 text-white">${message}</p>
        </div>
        <p class="small text-muted sender">${time}</p>
        </div>
    </div>`
            } else {
                chatContainer.innerHTML +=
                    `<div class="media w-50 mb-3">
            <div class="media-body ml-3">
            <div class="bg-light rounded py-2 px-3 mb-2">
                <div class="chat-name">
                    ${userName}</div>
                <p class="text-small mb-0 text-muted">${message}</p>
            </div>
            <p class="small text-muted">${time}</p>
            </div>
        </div>`
                alertUser(userRoom);
            }
        }
        //Scroll Down
        chatContainer.scrollTop = chatContainer.scrollHeight - chatContainer.clientHeight;
    });

    socketIO.on('roomUsers', ({ room, users }) => {
                participantList.innerHTML =
                    `${users.map(user=>
        `<div class="list-group-item list-group-item-action rounded-0 rmv-border">
                <div class="media"><img src="${user.userAvatar}" class="rounded-circle" width="20">
                <div class="media-body ml-1">
                    <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0">${user.userName}</h6>
                    </div>
                </div>
                </div>
            </div>`
            ).join('')}`;
    })

    function alertUser(userRoom) {
        if (document.hasFocus() == false) {
            if (window.Notification && Notification.permission !== "denied") {
                Notification.requestPermission(function(status) { // status is "granted", if accepted by user
                    var notifyMessage = new Notification('ES Forex Trading', {
                        body: `You have received a new message from ${userRoom} room `,
                    });
                    notifyMessage.addEventListener('click', function() {
                        chatWindow.focus();
                    });
                });
            }
        }
    }

    window.addEventListener('beforeunload', function(e) {
        e.returnValue = '';
    });


    function exitChat() {
        window.close();
    }

    function chatIntro(){
        introJs().setOptions({
            steps: [{
                    title: `Live Chat <i class="far fa-comment-dots"></i>`,
                    intro: 'Hi there. For your information, our system does not store the conversation of every room. Once you left the room, you cannot view the previous conversation that happened in the room.',
                }
            ]
        }).start();
    }