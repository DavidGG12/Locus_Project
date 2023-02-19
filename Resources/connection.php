<?php

    function connection()
    {
        $servername = "localhost:3306";
        $user = "root";
        $password = "FQMC#A#NGG890";
        $database = "locus";
        //COLOCAR UN IF PARA MANDAR A OTRA PÁGINA DE ERROR POR SI NO CONCETA CON LA BASE DE DATOS
        
        return $con = new mysqli($servername, $user, $password, $database);
    } 
?>