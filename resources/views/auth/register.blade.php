@extends('layouts.default')
@section('content')
<?php 
    use App\Common;
?>

<div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- <h2 class="text-center"><strong>Register</strong> an account.</h2> -->
                <div class="form-group">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" required autofocus>
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" placeholder="Phone Number" required oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;">
                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" required>
                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input type="text" name="avatar" id="avatar-name" class="d-inline form-control col-md-8 mx-1 @error('avatar') is-invalid @enderror" placeholder="Click select to pick avatar" READONLY required/>
                    <button type="button" class="d-inline btn btn-secondary col-md-3 mx-2" data-toggle="modal" data-target="#avatarList" >Select</button>
                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Register</button></div>
                <div class="form-group"><a href="{{ url('/login') }}" class="btn btn-register btn-block">Cancel</a></div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="avatarList" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                    <div class="modal-header d-flex align-items-center text-white">
                        <h6 class="modal-title mb-0" id="threadModalLabel">Pick your avatar</h6>
                        <a class="close remove-decoration" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        @foreach(Common::$avatarLists as $key => $value)
                            <div style="width:60px;height:70px" class="float-left mx-3 my-2">
                                <img src="{{$key}}" class="rounded-circle avatar-border" width="50" alt="User" />
                                <input type="radio" name="avatar-list" value="{{$value}}" style="margin-left:35%"/>
                            </div>
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="form-control btn-danger col-md-2" id="dismissModalBtn" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="form-control btn-primary col-md-2" onclick="assignAvatar()">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
            function assignAvatar(){
                var avatarList = document.getElementsByName('avatar-list'); 
                for(i = 0; i < avatarList.length; i++) { 
                    if(avatarList[i].checked) 
                    document.getElementById('avatar-name').value = avatarList[i].value;
                    document.getElementById('dismissModalBtn').click();
                }
            }
        </script>


@endsection
