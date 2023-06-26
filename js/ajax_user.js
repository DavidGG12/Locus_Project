var btnUpdate = document.querySelectorAll('[id^="btnUpdate"]');

var last_user = document.getElementById('last_user');
var input_user = document.getElementById('user_modal');
var input_email = document.getElementById('email_modal');
var input_password = document.getElementById('password_modal');
var input_password_repet = document.getElementById('password_repeat_modal');

btnUpdate.forEach(function(button) {

    button.addEventListener('click', function(){
        var row = this.closest('tr');
        var user_name = row.querySelector('input[name="user"]').value;
        var email = row.querySelector('input[name="email"]').value;
        var password = row.querySelector('input[name="password"]').value;

        last_user.value = user_name;
        input_user.value = user_name;
        input_email.value = email;
        input_password.value = password;
        input_password_repet.value = password;

        console.log(user_name);
        
        // var user_name = document.getElementById('user_name');
        // var email = document.getElementById('email');
        // var password = document.getElementById('password');
    
        // var petitions = new XMLHttpRequest();
    
        // last_user.value = user_name.value;
        // input_user.value = user_name.value;
        // input_email.value = email.value;
        // input_password.value = password.value;
        // input_password_repet.value = password.value;
    });
});

