
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Live Chat</title>
</head>

<link href="{{ asset('css/chat.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
<script src="https://chatnodejs-8msfb.ondigitalocean.app/socket.io/socket.io.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<link href="https://cdn.bootcdn.net/ajax/libs/intro.js/3.2.1/introjs-ltr.css" rel="stylesheet">
<link href="https://cdn.bootcdn.net/ajax/libs/intro.js/3.2.1/introjs-ltr.min.css" rel="stylesheet">
<link href="https://cdn.bootcdn.net/ajax/libs/intro.js/3.2.1/introjs.css" rel="stylesheet">
<link href="https://cdn.bootcdn.net/ajax/libs/intro.js/3.2.1/introjs.min.css" rel="stylesheet">
<script src="https://cdn.bootcdn.net/ajax/libs/intro.js/3.2.1/intro.js"></script>
<script src="https://cdn.bootcdn.net/ajax/libs/intro.js/3.2.1/intro.min.js"></script> 

<div id ="chat-enter" class="lightbox py-5">
            <div class="modal-content modal adjusted-chat-height my-5 mx-auto">
                <div class="modal-header">
                    <div class="modal-title mx-auto"><b>Chat</b></div>
                </div>
                <div class="modal-body remove-padding">
                    <div class="form-group1 mx-auto">
                        <label for="name">Name:</label>
                        <input class="form-control" type="text" id="userName" name="username" value="{{$user->name}}" />
                        <input type="hidden" id="avatar-name" value="{{$user->avatar}}" />
                    </div>
                    <div class="form-group1 mx-auto mt-2">
                        <label for="name">Room:</label>
                        <select class="form-control" id="roomValue" name="roomname">
                            <option value="General Discussion">General Discussion</option>
                            <option value="Forex News">Forex News</option>
                            <option value="Analysis Discussion">Forex Analysis</option>
                            <option value="Education">Forex Education</option>
                            <option value="Strategy Discussion">Forex Strategy</option>
                            <option value="Forex Signals">Forex Signals</option>
                        </select>
                    </div>
                    <div class="chat-name-error" id="chat-error-msg"></div>                       
                        <a href="#" id="join-btn"class="form-control btn-primary col-md-5 mx-auto"onclick="enterRoom()">Join</a>
                        <a href="#" id="join-btn" class="form-control btn-danger col-md-5 mx-auto my-2" onclick="exitChat()">Exit</a>
                    </div>
            </div>
        </div>
</div>
@include('subpage.chat-room')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
<script type="text/javascript" src="{{ URL::asset('js/chat.js') }}"></script> 
