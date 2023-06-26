//SELECT PARA LLENAR EL SELECT DEL DESARROLLADOR
var select_publisher = document.getElementById('publisher_register');
var select_developer = document.getElementById('developer_register');

//FUNCIÓN AL CAMBIO DEL VALOR DEL SELECT DEL PUBLICADOR
select_publisher.addEventListener("change", function(){
    var publisherID = select_publisher.value;

    select_developer.innerHTML = "";
    
    var petition = new XMLHttpRequest();
    petition.open("GET", "control/developer_read.php?publisherID=" + publisherID);

    petition.onload = function(){
        console.log(publisherID);
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


//OBTENER LOS VALORES DE LOS REGISTROS DE LA TABLA DEPENDIENDO DE DONDE LE DES CLICK

document.addEventListener('DOMContentLoaded', function(){
    var videogames_btnUpdate                = document.querySelectorAll('[id^="videogames_btnUpdate"]'),
        input_title                         = document.getElementById('title_modal'),
        input_subtitle                      = document.getElementById('subtitle_modal'),
        input_description                   = document.getElementById('description_modal'),
        input_version                       = document.getElementById('version_modal'),
        input_storage                       = document.getElementById('storage_int_modal'),
        input_platform                      = document.getElementById('platform_modal'),
        input_publisher                     = document.getElementById('publisher_update'),
        input_developer                     = document.getElementById('developer_update'),
        input_classification                = document.getElementById('classification_modal'),
        last_platform                       = document.getElementById('last_platform');
    
    videogames_btnUpdate.forEach(function(button_videogames) {
        button_videogames.addEventListener('click', function(){
            
            input_publisher.addEventListener("change", function(){
                var ChangePublisher = input_publisher.value;

                input_developer.innerHTML = "";

                var petition_change = new XMLHttpRequest();
                petition_change.open("GET", "control/developer_read.php?publisherID="+ChangePublisher);

                petition_change.onload = function(){
                    var data_change = JSON.parse(petition_change.responseText);
                    console.log(data_change);

                    data_change.forEach(function(data) {
                        var option_change = document.createElement("option");
                        option_change.value = data.ID_DEVELOPER;
                        option_change.textContent = data.DNAME;
                        input_developer.appendChild(option_change);
                    });
                }

                petition_change.send();
            });
            
            var row         = this.closest('tr'),
                title       = row.querySelector('input[name="title_update"]').value,
                subtitle    = row.querySelector('input[name="subtitle_update"]').value,
                platform    = row.querySelector('input[name="platform_update"]').value;
        
            var petition_update = new XMLHttpRequest();
            petition_update.open("GET", "http://localhost/Locus_Project/control/videogames_read.php?title="
            +title+"&subtitle="+ subtitle + "&platform="+platform);
        
            // console.log(title);
            // console.log(subtitle);
            // console.log(platform);
            
            petition_update.onreadystatechange = function() {
                if (petition_update.readyState == 4 && petition_update.status == 200) {
                    var data_videogames = JSON.parse(petition_update.responseText);
                    console.log(data_videogames);

                    input_title.value               = data_videogames.TITLE;
                    input_subtitle.value            = data_videogames.SUBTITLE;
                    input_description.value         = data_videogames.DESCRIPTION;
                    input_version.value             = data_videogames.VERSION;
                    input_storage.value             = data_videogames.STORAGE;
                    input_platform.value            = data_videogames.PLATFORM;
                    last_platform.value             = data_videogames.PLATFORM;
                    input_developer.value           = data_videogames.DEVELOPER;
                    input_classification.value      = data_videogames.CLASSIFICATION;
                }
            };
            
            petition_update.open("GET", "http://localhost/Locus_Project/control/videogames_read.php?title=" +
                encodeURIComponent(title) + "&subtitle=" + encodeURIComponent(subtitle) + "&platform=" + encodeURIComponent(platform));
            petition_update.send();

        });
    });
});