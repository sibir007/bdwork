<?php


namespace App;


interface DDLManagerInterface
{
public function __construct($dsn, $user, $pass);


public function createTable($table, array $params);
}

