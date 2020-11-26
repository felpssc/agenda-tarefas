<?php 

    $host        = "ec2-52-204-232-46.compute-1.amazonaws.com";
    $port        = "port=5432";
    $dbname      = "dbname=d2tt54tc77jgfh";
    $credentials = "user=qttkfeqqmbydet password=7aae424a6a712fbe8a0b82a3711fcd5c70d90fef6b1e0d849900730a058cbe7c";

    $connect = pg_connect("$host $port $dbname $credentials"  ) or die("Could not connect: " . pg_last_error());

?>