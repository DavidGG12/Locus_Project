var btnUpdate = document.getElementById('btnUpdate');
var user = document.getElementById('user_name');

var input_user = document.getElementById('user_modal');
var input_email = document.getElementById('email_modal');
var input_password = document.getElementById('password_modal');
var input_password_repet = document.getElementById('password_repet_modal');

btnUpdate.addEventListener('click', function(){
    var petition = new XMLHttpRequest();

    petition.open("GET", "control/users_read.php?user=" + user);

    petition.onload = function(data){
        var data = JSON.parse(petition.responseText);
        data.forEach(function(data){
            input_user.value = data.USERNAME;
            input_user.textContent = data.USERNAME;
        });
    }

    petition.send();
});