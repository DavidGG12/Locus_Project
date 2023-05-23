<?php

    function connection()
    {
        $servername = "b6rzpd5jmxzxv6hux5yf-mysql.services.clever-cloud.com";
        $user = "unvt0coqmwyxy2pq";
        $password = "dAyf3jUN2wWWJg0U8xuz";
        $database = "b6rzpd5jmxzxv6hux5yf";
        //COLOCAR UN IF PARA MANDAR A OTRA PÁGINA DE ERROR POR SI NO CONCETA CON LA BASE DE DATOS
        
        return $con = new mysqli($servername, $user, $password, $database);
    } 
?>