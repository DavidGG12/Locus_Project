document.addEventListener("DOMContentLoaded", function() {
    var btnUpdate_colaborator = document.querySelectorAll('[id^="colaborator_btnUpdate"]');
    
    var last_user_colaborator = document.getElementById('last_user_colaborator');
    var input_user_colaborator = document.getElementById('colaborator_user_update');
    var input_email_colaborator = document.getElementById('colaborator_email_update');
    var input_password_colaborator = document.getElementById('colaborator_password_update');
    var input_password_repet_colaborator = document.getElementById('colaborator_password_repeat_update');
    
    
    //DATOS DE LOS COLABORADORES
    btnUpdate_colaborator.forEach(function(button_colaborator) {
        button_colaborator.addEventListener('click', function(){
            var row_colaborator = this.closest('tr');
            var user_name = row_colaborator.querySelector('input[name="colaborator_user_update"]').value;
            var email = row_colaborator.querySelector('input[name="colaborator_email_update"]').value;
            var password = row_colaborator.querySelector('input[name="colaborator_password_update"]').value;
    
            last_user_colaborator.value = user_name;
            input_user_colaborator.value = user_name;
            input_email_colaborator.value = email;
            input_password_colaborator.value = password;
            input_password_repet_colaborator.value = password;
    
            console.log(user_name);
        });
    });
});

