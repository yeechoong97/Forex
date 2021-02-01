@extends('layouts.default')
@section('content')
<?php
  use App\Common;
 ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<body style="overflow:hidden">
<div class="funds-container mx-auto">
    <div class="main-funds-header">Account Details  &ensp;<i class="far fa-question-circle" onclick="toggleFundsLightbox()"></i></div>
        <div class="funds-subcontainer">
            <div class="funds-left-div">
                <div class="form-group1 mx-auto">
                    <label for="name">Name :</label>
                    <input class="form-control" type="text" value="{{$account->user->name}}" disabled/>
                </div>
                <div class="form-group1 mx-auto">
                    <label for="name">Currency :</label>
                    <input class="form-control" type="text" value="USD" disabled/>
                </div>
                <div class="form-group1 mx-auto">
                    <label for="name">Balance</label>
                    <input class="form-control" type="text" value="${{$account->balance}}" disabled/>
                </div>
                <div class="form-group1 mx-auto">
                    <label for="name">Margin Available:</label>
                    <input class="form-control" type="text" id="account-margin" value="${{$account->margin}}"  disabled/>
                </div>
            </div>
            <div class="funds-right-div">
                <div class="form-group1 mx-auto">
                    <label for="name">Margin Used :</label>
                    <input class="form-control" type="text" id="account-margin-used" value="{{$account->margin_used}}" disabled/>
                </div>
                <div class="form-group1 mx-auto">
                    <label for="name">Leverage :</label>
                    <div id="leverage-div">
                        <input class="form-control" type="text" id="leverage-id" value="{{$account->leverage}}" disabled/>
                        <a href="#" class="edit-btn" onclick="editLeverage()">Edit</a>
                    </div>
                </div>
                <div class="btn-div">
                    <div class="form-group align-btn" id="general-btn-div">
                        <a href="{{ route('fund-deposit') }}" class="btn btn-primary btn-block">Deposit</a>
                        <a href="{{ route('fund-withdraw') }}" class="btn btn-second btn-block">Withdraw</a>
                    </div>
                    <div class="form-group align-btn" id="lev-btn-div" style="display:none" >
                        <a href="#" class="btn btn-primary btn-block"onclick="submitForm()">Confirm</a>
                        <a href="#" class="btn btn-second btn-block" onclick="cancelEdit()">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('funds.funds-lightbox')
</body>
<script>
window.onclick = function(event) {
    var lightbox = document.getElementById('funds-lightbox');
    if (event.target == lightbox) {
        $('#funds-lightbox').fadeOut(300);
    }
}

function editLeverage(){
    @if (count($account->order)==0)
        var data = `<form action="{!! route('fund-update') !!}" method="post" id="myForm">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <select class="form-control" name="leverage" id="leverage-list">
                    @foreach(Common::$leverage as $key=> $value)
                        @if ($account->leverage== $key)
                        <option value="{{$key}}" selected>{{$value}}</option>
                        @else
                        <option value="{{$key}}">{{$value}}</option>
                        @endif
                    @endforeach
                    </select>
                    </form>
                    <span id="alert-box" class="alert-span"></span>
                    `;
        document.getElementById('leverage-div').innerHTML = data;
        document.getElementById('general-btn-div').style.display = "none";
        document.getElementById('lev-btn-div').style.display = "block";
    @else
        alert('You are not allowed to edit leverage unless all of your orders are completed.');
    @endif
}

function submitForm(){
    var initial = '{{$account->leverage}}';
    var value = document.getElementById('leverage-list').value;
    var span = document.getElementById('alert-box');
    if(value==initial){
        span.innerHTML = "*Please select a different leverage ratio.";
    }
    else{
        document.getElementById("myForm").submit();
    }
}

function cancelEdit(){
    var data = `<input class="form-control" type="text" id="leverage-id" value="{{$account->leverage}}" disabled/>
                <a href="#" class="edit-btn" onclick="editLeverage()">Edit</a>`;
    document.getElementById('leverage-div').innerHTML = data;
    document.getElementById('general-btn-div').style.display = "block";
    document.getElementById('lev-btn-div').style.display = "none";
}
</script>

<!-- Alert the message -->
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist)
    alert(msg);
</script>
@stop