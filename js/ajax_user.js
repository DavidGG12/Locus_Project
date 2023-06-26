
//DATOS DE LOS MODALES DE USUARIOS
var btnUpdate = document.querySelectorAll('[id^="btnUpdate"]');

var last_user = document.getElementById('last_user');
var input_user = document.getElementById('user_modal');
var input_email = document.getElementById('email_modal');
var input_password = document.getElementById('password_modal');
var input_password_repet = document.getElementById('password_repeat_modal');


//DATOS DE LOS MODALES DE COLABORADORES
var btnUpdate_colaborator = document.querySelectorAll('[id^="btnUpdate_colaborator"]');

var last_user_colaborator = document.getElementById('last_user_colaborator');
var input_user_colaborator = document.getElementById('user_modal_colaborator');
var input_email_colaborator = document.getElementById('email_modal_colaborator');
var input_password_colaborator = document.getElementById('password_modal_colaborator');
var input_password_repet_colaborator = document.getElementById('password_repeat_modal_colaborator');


//PARA CAPTURAR LOS DATOS DEPENDIENDO DE LA FILA 
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
    });
});

//DATOS DE LOS COLABORADORES
btnUpdate_colaborator.forEach(function(button_colaborator) {
    button_colaborator.addEventListener('click', function(){
        var row_colaborator = this.closest('tr');
        var user_name = row_colaborator.querySelector('input[name="user_colaborator"]').value;
        var email = row_colaborator.querySelector('input[name="email_colaborator"]').value;
        var password = row_colaborator.querySelector('input[name="password_colaborator"]').value;

        last_user_colaborator.value = user_name;
        input_user_colaborator.value = user_name;
        input_email_colaborator.value = email;
        input_password_colaborator.value = password;
        input_password_repet_colaborator.value = password;

        console.log(user_name);
    });
});

