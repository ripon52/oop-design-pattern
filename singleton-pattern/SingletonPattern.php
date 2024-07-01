<?php

class SingletonPattern
{

    CONST APP_NAME="Singleton Pattern App";
    const APP_VERSION="1.0.0";

    private static $instance = null;

    public function __construct()
    {
        echo "Singleton Pattern";
    }

    public static function getInstance()
    {
        if (!is_null(self::$instance)) {
            self::$instance = new SingletonPattern();
        }
        return self::$instance;
    }
}


$singletonApp = SingletonPattern::getInstance();
echo $singletonApp::APP_NAME;

/**
 * Output Result :
 * Singleton Pattern // From Constructor
 * Singleton Pattern App // From instance echo
 * */

$singletonApp2 = SingletonPattern::getInstance();
echo $singletonApp2::APP_VERSION;


/**
 * Output Result :
 * 1.0.0 // From instance echo
 * */