@extends('layouts.default')
@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<body style="overflow:hidden">
<div class="funds-container mx-auto">
    <div class="funds-header">Withdrawal</div>
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
                    <div class="beautiful bs-callout bs-callout-info">
                        <h5>Info</h5>
                        <ul class="notice-list">
                            <li>Minimum Account Balance is 100.00</li>
                            <li>Maximum Withdrawal Amount is 50,000.00</li>
                            <li>Fees are <strong>NOT</strong> required For Withdrawal Process</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="funds-right-div">
                <div class="form-group1 mx-auto">
                    <label for="name">Balance :</label>
                    <input class="form-control" type="text" value="${{$account->balance}}" disabled/>
                </div>
                <div class="form-group1 mx-auto">
                    <label for="name">Amount :</label>
                    <div id="leverage-div">
                        <form method="post" id="myForm" action="{!! route('withdraw-update') !!}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="input-container">
                                <input class="form-control" type="number" name="amount" id="amount_input" placeholder="Enter Amount" onkeyup="validateWithdrawalInput('{{$account->balance}}')" onkeydown="javascript: return event.keyCode == 69 || event.keyCode==109 || event.keyCode==107 || event.keyCode==187 || event.keyCode==189 || event.keyCode == 13 ? false : true"/>
                                <i class="fas fa-check tick-span" id="tick" style="display:none"></i>
                                <i class="fas fa-times cross-span" id="cross" style="display:none"></i>
                             </div>
                        </form>
                    </div>
                    <div class="error-label" id="error-msg"></div>
                </div>
                <div class="btn-div">
                    <div class="form-group align-btn" id="lev-btn-div" >
                        <a href="#" class="btn btn-primary btn-block" id="submit-btn" onclick="submitForm()">Confirm</a>
                        <a href="{{ route('fund-index') }}" class="btn btn-second btn-block">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@stop
