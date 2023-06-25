var btnUpdate = document.getElementById('btnUpdate');
var btnRegister = document.getElementById('register_user');

var input_user = document.getElementById('user_modal');
var input_email = document.getElementById('email_modal');
var input_password = document.getElementById('password_modal');
var input_password_repet = document.getElementById('password_repeat_modal');

btnUpdate.addEventListener('click', function(){
    var user_name = document.getElementById('user_name');
    var email = document.getElementById('email');
    var password = document.getElementById('password');

    var petitions = new XMLHttpRequest();

    input_user.value = user_name.value;
    input_email.value = email.value;
    input_password.value = password.value;
    input_password_repet.value = password.value;
    btnRegister.name = "Update_BTN";
    btnRegister.textContent = "Actualizar";



    // petitions.open("GET", "control/user_read.php?user_name=" + user_name);
    
    // petitions.onload = function(){
    //     console.log(petitions.responseText);
    //     var data = JSON.parse(petitions.responseText);
    //     console.log(data);
    //     input_user.value = data.EMAIL;


    // }

    // petitions.onreadystatechange = function(){
    //     if(petitions.readyState == 4 && petitions.status == 200)
    //     {

    //     }
    // }

    // petitions.send();
});