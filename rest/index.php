<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS, PATCH');
require '../vendor/autoload.php';
require 'UserDao.php';


Flight::register('userDao', 'UserDao');

Flight::route('/',function(){
    Flight::json(Flight::userDao()->getUsers());
    
    //echo'Hellow World';
});

Flight::route('/test',function(){
    echo'Hellow World';
});

Flight::route('GET /api/users', function(){
    Flight::json(Flight::userDao()->getUsers());
});

Flight::route('GET /api/addUser', function(){
    $firstName = Flight::request()->query['firstName'];
    $lastName = Flight::request()->query['lastName'];
    $age = Flight::request()->query['age'];
    
    Flight::json(Flight::userDao()->addUser(['firstName' => $firstName, 'lastName' => $lastName, 'age' => $age]));
});

Flight::route('POST /api/addUser2', function(){
    $firstName = Flight::request()->data->firstName;
    $lastName = Flight::request()->data->lastName;
    $age = Flight::request()->data->age;
    
    Flight::json(Flight::userDao()->addUser(['firstName' => $firstName, 'lastName' => $lastName, 'age' => $age]));
});



Flight::start();
?>
