//Check and submit the input to server
function submitForm() {
    var amount = document.getElementById('amount_input').value;
    amount = parseFloat(amount);
    var status = document.getElementById('cross').style.display;
    if (amount <= 0 || isNaN(amount) == true || status == "inline" || amount == "") {
        document.getElementById('error-msg').innerHTML = "*Invalid amount is entered";
    } else {
        document.getElementById("myForm").submit();
    }
}

//Check the input
function validateWithdrawalInput(balance) {
    var amount = document.getElementById('amount_input').value;
    var acc_balance = parseFloat(balance);
    amount = parseFloat(amount);
    if (amount < acc_balance && amount != 0 && (acc_balance - amount) >= 100.00) {
        document.getElementById('cross').style.display = 'none';
        document.getElementById('tick').style.display = 'inline';
    } else if (amount >= acc_balance || (acc_balance - amount) < 100.00) {
        document.getElementById('tick').style.display = 'none';
        document.getElementById('cross').style.display = 'inline';
    } else {
        document.getElementById('tick').style.display = 'none';
        document.getElementById('cross').style.display = 'inline';
    }
    document.getElementById('error-msg').innerHTML = "";
}

//Check the input entered by user
function validateDepositInput(balance) {
    var amount = document.getElementById('amount_input').value;
    var acc_balance = parseFloat(balance);
    amount = parseFloat(amount);

    if (amount <= 50000 && amount != 0 && (acc_balance + amount) <= 100000.00) {
        document.getElementById('cross').style.display = 'none';
        document.getElementById('tick').style.display = 'inline';
    } else if (amount >= acc_balance || (acc_balance + amount) > 100000.00) {
        document.getElementById('tick').style.display = 'none';
        document.getElementById('cross').style.display = 'inline';
    } else {
        document.getElementById('tick').style.display = 'none';
        document.getElementById('cross').style.display = 'inline';
    }
    document.getElementById('error-msg').innerHTML = "";
}

function toggleFundsLightbox() {

    var check = document.getElementById('funds-lightbox').style.display;
    if (check == "" || check == "none") {
        $('#funds-lightbox').fadeIn(300);
    } else {
        $('#funds-lightbox').fadeOut(300);
    }
}