var btnUpdate = document.getElementById('btnUpdate');

var last_user = document.getElementById('last_user');
var input_user = document.getElementById('user_modal');
var input_email = document.getElementById('email_modal');
var input_password = document.getElementById('password_modal');
var input_password_repet = document.getElementById('password_repeat_modal');

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

    // var Update = document.createElement('button');
    // Update.className = 'btn btn-primary';
    // Update.textContent = "Actualizar";
    // var modal = document.getElementById('modal-footer').appendChild(Update);

    // Update.addEventListener('click', function(){
    //     var data = {
    //         LAST_USER : last_user,
    //         USER_NAME : input_user.value,
    //         EMAIL : input_email.value,
    //         PASSWORD : input_password.value,
    //         PASSWORD_REPEATED : input_password_repet.value
    //     };

    //     const jsonString = JSON.stringify(data),
    //         endodedata = encodeURIComponent(jsonString),
    //         url = 'control/update_user.php?data=' + endodedata;

    //     petitions.open("GET", url);

    //     petitions.send();
        

    //     const requestOptions = {
    //         method : 'POST',
    //         headers: {'Content-Type': 'application/json'},
    //         body: JSON.stringify(data)
    //     };

    //     fetch('http://localhost/Locus_Project/control/update_user.php', requestOptions).then(response => response.text()).then(result=>{console.log(result);}).catch(error => {console.log(error);});

    //     var xhttp = new XMLHttpRequest();
    //     xhttp.onreadystatechange = function(){
    //         if(xhttp.readyState == 4 && xhttp.status == 200)
    //         {
    //             console.log(data);
    //         }
    //     };

    //     xhttp.open("POST", "http://localhost/Locus_Project/control/update_user.php");
    //     xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    //     xhttp.send(JSON.stringify(data));
    // });


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