<?php

// seules les classes filles seront instanciées
abstract class Model {

    private static $pdo; // accessible par toutes les classes filles

    private function setBdd() {
        // appelé par la function getBdd() seulement
        self::$pdo = new PDO("mysql:host=localhost;dbname=my_library;charset=utf8", "root", "root");
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd() {
        if(self::$pdo === null){
            self::setBdd();
        }
        return self::$pdo;
    }

}