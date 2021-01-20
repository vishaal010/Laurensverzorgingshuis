<?php

require_once 'include/db.inc.php';
require_once "vendor/autoload.php";

$faker = \Faker\Factory::create();


for($i = 0; $i < 100; $i++){
    $query = "INSERT INTO users(appointment_id,username,password,name,email,tel)
    VALUES('".$faker->numberBetween($min = 1, $max = 25) ."', '".$faker->userName."', '".$faker->password."', '".$faker->name."', '".$faker->freeEmail ."', '".$faker->ean8."')";
    mysqli_query($mysqli, $query);
     echo $query;


}

echo "DONE";












