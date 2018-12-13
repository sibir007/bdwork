<?php
namespace App;
//include '../vendor/autoload.php';
include __DIR__ . '/../src/App/DDLManager.php';

//print_r(\PDO::getAvailableDrivers());
$host = '127.0.0.1';
$db = 'test1';
$user = 'postgres';
$pass = '12345678';
$dsn = "pgsql:host=$host;dbname=$db";
$dll = new DDLManager($dsn, $user, $pass);
$dll->dropTable("users");
$dll->createTable("users", ["id" => "integer", "name" => "text"]);
$dll->addValueInTableUesers(3, 'dendl');
$dll->addValueInTableUesers(4444, "ddden");
$dll->addValueInTableUesers(44, "euden");


$res = $dll->getAllFromTable("users")->fetchAll();


echo "<pre>";
print_r($res);
echo "<pre>";
