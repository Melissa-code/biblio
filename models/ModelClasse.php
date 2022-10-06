<?php

// seules les classes filles seront instanciées
abstract class Model {

    private static $pdo; // accessible par toutes les classes filles

    private function setBdd() {
       
        //$url = getenv('mysql://m06nyqahlwtrn6lg:napg0r77g9015zve@au77784bkjx6ipju.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/ivr0m1c3970mqxnd');
        //if(getenv('JAWSDB_URL') !== false) {
        // if($url) {
        //     $dbparts = parse_url($url);

        //     $hostname = $dbparts['host'];
        //     $username = $dbparts['user'];
        //     $password = $dbparts['pass'];
        //     $database = ltrim($dbparts['path'],'/');
        // }
        // else {
        //     $hostname = 'localhost';
        //     $username = 'melissa';
        //     $password = 'melissa'; 
        //     $database = 'my_library';
        // }

        $url = getenv('mysql://m06nyqahlwtrn6lg:napg0r77g9015zve@au77784bkjx6ipju.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/ivr0m1c3970mqxnd');
        $dbparts = parse_url($url);

        $hostname = $dbparts['host'];
        $username = $dbparts['user'];
        $password = $dbparts['pass'];
        $database = ltrim($dbparts['path'],'/');


        try {
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
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