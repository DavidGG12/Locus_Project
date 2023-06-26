var select_publisher = document.getElementById('publisher_register');
var select_developer = document.getElementById('developer_register');

select_publisher.addEventListener("change", function(){
    var publisherID = select_publisher.value;

    select_developer.innerHTML = "";
    
    var petition = new XMLHttpRequest();
    petition.open("GET", "control/developer_read.php?publisherID=" + publisherID);

    petition.onload = function(){
        console.log(publisherID);
        console.log("Hola");
        var data = JSON.parse(petition.responseText);
        console.log(data);
        data.forEach(function(data) {
            var option = document.createElement("option");
            option.value = data.ID_DEVELOPER;
            option.textContent = data.DNAME;
            document.getElementById("developer_register").appendChild(option);
        });
    }

    petition.onreadystatechange = function(){
        if(petition.readyState == 4 && petition.status == 200)
        {

        }
    }

    petition.send();
});