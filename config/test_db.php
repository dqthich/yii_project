<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=localhost;dbname=yii_db';
$db['username'] = 'root';
$db['password'] = 'root_password';
return $db;
