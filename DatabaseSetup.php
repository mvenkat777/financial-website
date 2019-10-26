<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'financialwebsite',
    'username'  => 'venkatma',
    'password'  => 'mallina',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();


//Test the DB fetch 
//$entity = Capsule::table('certificates')->first();
//echo "<pre>";print_r($entity);
?>