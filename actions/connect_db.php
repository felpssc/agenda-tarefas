<?php 

    $host        = "host=127.0.0.1";
    $port        = "port=5432";
    $dbname      = "dbname=projetotarefas";
    $credentials = "user=postgres password=okdsmudar";

    $connect = pg_connect("$host $port $dbname $credentials"  ) or die("Could not connect: " . pg_last_error());

?>