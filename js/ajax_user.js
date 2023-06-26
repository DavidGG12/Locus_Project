var btnUpdate = document.getElementById('btnUpdate');

var last_user = document.getElementById('last_user');
var input_user = document.getElementById('user_modal');
var input_email = document.getElementById('email_modal');
var input_password = document.getElementById('password_modal');
var input_password_repet = document.getElementById('password_repeat_modal');

input_user.innerHTML = "";
input_email.innerHTML = "";
input_password.innerHTML = "";
input_password_repet.innerHTML = "";

btnUpdate.addEventListener('click', function(){
    var user_name = document.getElementById('user_name');
    var email = document.getElementById('email');
    var password = document.getElementById('password');

    var petitions = new XMLHttpRequest();

    last_user.value = user_name.value;
    input_user.value = user_name.value;
    input_email.value = email.value;
    input_password.value = password.value;
    input_password_repet.value = password.value;
});
