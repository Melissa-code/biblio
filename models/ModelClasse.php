<?php

// seules les classes filles seront instanciées
abstract class Model {

    private static $pdo; // accessible par toutes les classes filles

    private function setBdd() {
       
        $url = getenv('JAWSDB_URL');

        if($url) {
            $dbparts = parse_url($url);

            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');
        }
        else {
            $hostname = 'localhost';
            $username = 'melissa';
            $password = 'melissa'; 
            $database = 'my_library';
        }

        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
            // set the PDO error mode to exception
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
            }
        catch(PDOException $e)
            {
            echo "Connection failed: " . $e->getMessage();
            }
    }

    
    protected function getBdd() {
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }

}